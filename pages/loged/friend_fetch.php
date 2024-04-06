<?php
    session_start();
    include("$_SESSION[priv]/connect.php");
    if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");

    $clientTimezone = isset($_GET['timezone']) ? $_GET['timezone'] : 'UTC';
    
    // Fetch messages from the database
    $query = "select uid,fuid from friends where (uid=$_SESSION[uid] or fuid=$_SESSION[uid]) and  fstat = 'A' ";
    $result = mysqli_query($dbase,$query); //$dbase->query($query);

    
    
    $friends = [];
    while ($row = $result->fetch_assoc()) {
        if($row['uid']!=$_SESSION['uid']) $fuid=$row['uid'];
        else                              $fuid=$row['fuid'];
        $friend = mysqli_fetch_assoc(mysqli_query($dbase,"select * from users where $fuid = uid"));
        if($friend ["icid"]){
            $image = mysqli_fetch_row(mysqli_query($dbase,"SELECT iid FROM `imgconnect` WHERE icid=$friend[icid]"));
            $pic_image = mysqli_fetch_row(mysqli_query($dbase,"SELECT iid FROM `image` WHERE iid=$image[iid] istat = 'A' order by date desc"));
            if($pic){
                $pic = "./uploads/$pic_image[inname]";
            }
            else{
                $pic = NULL;
            }
        } $pic = $friend["icid"];
        if($pic == NULL) $pic="$_SESSION[R1]/image/default.png" ;
        $stat = str_contains($friend["ustat"],"Online");
        if($stat){ 
            $stat="Online";
            $st_time = "Online";
        }
        else{

            $stat="Offline";
            if(!str_contains($friend["ustat"],"NLI")){
                $date = explode(",",$friend["ustat"])[1];
                $last = DateTime::createFromFormat('Y-m-d H:i:s', $date);
                $now = new DateTime("now");

                $last->setTimezone(new DateTimeZone($clientTimezone));
                $now->setTimezone(new DateTimeZone($clientTimezone));
                
                // Check if date parsing was successful
                if (!$last) {
                    echo "Failed to parse date string.";
                } else {
                    // Calculate the difference
                    $time = $last->diff($now);
                
                    // Format the difference as a string
                    /*
                    $st_time = sprintf(
                        '%04d-%02d-%02d %02d:%02d:%02d',
                        
                        $time->y,
                        $time->m,
                        $time->d,
                        
                        $time->h,
                        $time->i,
                        $time->s
                    );
                    */
                    if($time->y>0)                      $st_time = $last->format("Y.m.d"); 
                    else if($time->m>0)                 $st_time = $time->m ." month";
                    else if($time->d>=7)                $st_time = intval($time->d/7)." week";
                    else if($time->d<7 & $time->d>1)    $st_time = $last->format("l h:i a");
                    else if($time->d == 1)              $st_time = "yesterday ".$last->format("h:i a");
                    else if($time->h>3)                 $st_time = $last->format("h:i a");
                    else if($time->h>0 & $time->h<3)    $st_time = $time->h." h";
                    else if($time->i > 0)               $st_time = $time->i." min";
                    else                                $st_time = $time->s." s";

                    //$st_time=$clientTimezone;
                
                }

                 
            } else $st_time = "";


        }      




        $last_mess = mysqli_fetch_assoc(mysqli_query($dbase,"select * from message where (ustrid='$_SESSION[ustrid]' or mtostrid='$_SESSION[ustrid]') and (ustrid='$friend[ustrid]' or mtostrid='$friend[ustrid]') ORDER BY mdate DESC LIMIT 1;"));
        if($last_mess){
            $who = "";
            if($last_mess["ustrid"] == $_SESSION["ustrid"]) $who ="you: ";
            $last_mess = $last_mess["mlabel"];
    
            if(strlen($last_mess)>=20) {
                if($last_mess[20]!=" "){
                    $i= 0;
                    foreach(str_split($last_mess) as $ch){
                        if($i > 15 & $ch==" ") break;
                        if($i > 20)            break;
                        $i+=1;
                    }
                    $last_mess = substr($last_mess,0,$i) . " ...";
    
                } else $last_mess = substr($last_mess,0,10);
    
            }
            $last_mess = $who . $last_mess;
        } else $last_mess = "";


        $friends[] = ['id' => $friend['ustrid'],'name'=>$friend['uname'],'profil_pic'=>$pic,"lmes"=>$last_mess,'stat'=>$stat,'from_last_log'=>$st_time];
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($friends);
    
    // Close the connection

    mysqli_close($dbase);
?>