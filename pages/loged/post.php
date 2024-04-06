<?php
session_start();
include("$_SESSION[priv]/connect.php");

if(isset($_FILES["files"])){
    $len = count($_FILES["files"]["name"]);
    for($i=0;$i<$len;$i+=1) $fcid[] = file_upload($dbase,$_FILES["files"],$i);
}
$mes = isset($_POST['message']) ? $_POST['message'] : '';

$files = isset($fcid) ? implode(",",$fcid) : '';

if($files!='' | $mes!='') mysqli_query($dbase,"
    INSERT INTO post (pid, uid, plabel, fcid, peloz, pstat, pdate, pip) 
    VALUES (NULL, $_SESSION[uid], '$mes', '$files', '', 'A', current_timestamp(), '$_SERVER[REMOTE_ADDR]')
");

mysqli_close($dbase);