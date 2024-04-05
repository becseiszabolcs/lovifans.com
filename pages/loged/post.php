<?php
session_start();
include("$_SESSION[priv]/connect.php");

if(isset($_FILES["files"])){
    $len = count($_FILES["files"]["name"]);
    for($i=0;$i<$len;$i+=1) file_upload($dbase,$_FILES["files"],$i);
}




?>