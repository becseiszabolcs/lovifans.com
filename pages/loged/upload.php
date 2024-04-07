<?php
session_start();
if(isset($_GET['type'])){
    $type = $_GET['type'];
    include("$_SESSION[priv]/connect.php");

    //print_r($_FILES['file']);
    $fcid = file_upload($dbase,$_FILES['file']);
    echo"$fcid";

    if($type=="pf") mysqli_query($dbase,"UPDATE users SET icid = '$fcid' WHERE users.uid = $_SESSION[uid]");
    else            mysqli_query($dbase,"UPDATE users SET bicid = '$fcid' WHERE users.uid = $_SESSION[uid]");

    
}


