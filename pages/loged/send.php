<?php
    session_start();
    include("../../connect.php");
    /*
    print_r($_POST);
    print_r($_SESSION);
    */
    $text = $_POST["text"];
    $bool = str_replace(" ","",$text);
    if($bool){
        mysqli_query($dbase,"
        INSERT INTO  message  ( mid ,  uid ,  ustrid ,  mtoid ,  mtostrid ,  mlabel ,  icid ,  meloz ,  mstat ,  mdate ,  mip ) 
        VALUES (NULL, $_SESSION[uid], '$_SESSION[ustrid]', 11, '6qkRHd5Wv3OiEqqSJXyP', '$text', NULL, NULL, 'A', current_timestamp(), '$_SERVER[REMOTE_ADDR]')
        ");
    }



    mysqli_close($dbase);

    header("location: $_SESSION[R1]/friends");
?>