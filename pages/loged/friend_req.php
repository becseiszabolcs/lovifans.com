
<?php
    session_start();
    include("../../connect.php");
    $fustrid = $_POST["profile"];
    $fuid = mysqli_fetch_assoc(mysqli_query($dbase,"select uid from users where ustrid='$fustrid'"))["uid"];

    $friend = mysqli_fetch_assoc(mysqli_query($dbase,"select * from friends where ($_SESSION[uid] = uid and fuid = $fuid) or ($fuid = uid and fuid = $_SESSION[uid])"));

    if($friend){
        if($friend["fstat"] !='A'){
            if($friend["uid"] == $_SESSION["uid"]) mysqli_query($dbase,"DELETE FROM friends WHERE fid = $friend[uid]");
            else                                   mysqli_query($dbase,"UPDATE friends set fstat = 'A' WHERE fid = $friend[uid]");
        }


    } else{
        mysqli_query($dbase,"
            INSERT INTO  friends  ( fid ,  uid ,  fuid ,  fdate ,  fstat , fip) 
            VALUES (NULL, $_SESSION[uid], $fuid, current_timestamp(),'D', '$_SERVER[REMOTE_ADDR]')
        ");
    }
    mysqli_close($dbase);



