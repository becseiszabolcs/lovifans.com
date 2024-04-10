<?php
include("../private/connect.php");
mysqli_query($dbase,"
INSERT INTO  note  ( nid , lid, nurl ,  ndate ,  nip ) 
VALUES ( NULL, '$_SESSION[lid]', '$_SERVER[REQUEST_URI]', current_timestamp(), '$_SERVER[REMOTE_ADDR]'
)");
