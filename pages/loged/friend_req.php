
<?php
    session_start();
    include("../../connect.php");
    $fustrid = $_POST["profile"];
    $fuid = mysqli_fetch_assoc(mysqli_query($dbase,"select uid from users where ustrid='$fustrid'"))["uid"];

    
    mysqli_query($dbase,"
        INSERT INTO  friends  ( fid ,  uid ,  fuid ,  fdate ,  fstat , fip) 
        VALUES (NULL, $_SESSION[uid], $fuid, current_timestamp(),'D', '$_SERVER[REMOTE_ADDR]')
    ");
    

?>
