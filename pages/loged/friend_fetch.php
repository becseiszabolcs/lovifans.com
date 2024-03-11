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
        $stat = str_contains($friend["ustat"],"Online");
        if($stat) $stat="Online";
        else      $stat="Offline";

        $last_mess = mysqli_fetch_assoc(mysqli_query($dbase,"select mlabel from message where (ustrid='$_SESSION[ustrid]' or mtostrid='$_SESSION[ustrid]') and (ustrid='$friend[ustrid]' or mtostrid='$friend[ustrid]') ORDER BY mdate DESC LIMIT 1;"))["mlabel"];

        if(strlen($lasst_mess)>30){
            if(substr($lasst_mess,0,31)!=" "){

            } else substr($lasst_mess,0,30);

        }
        $friends[] = ['id' => $friend['ustrid'],'name'=>$friend['uname'],'profil_pic'=>$pic,'stat'=>$stat];
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($friends);
    
    // Close the connection

    mysqli_close($dbase);
?>