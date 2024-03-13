<?php
    session_start();
    include("../../connect.php");
    
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
        if($stat) $stat="Online";
        else      $stat="Offline";

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


        $friends[] = ['id' => $friend['ustrid'],'name'=>$friend['uname'],'profil_pic'=>$pic,"lmes"=>$last_mess,'stat'=>$stat];
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($friends);
    
    // Close the connection

    mysqli_close($dbase);
?>