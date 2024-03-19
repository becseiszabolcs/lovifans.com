<?php
/*
    $_SESSION["Uid"]
    $_SESSION["Uname"] 
    $_SESSION["Umail"]  
    $_SESSION["Upw"]    
    $_SESSION["stat"]   
    $_SESSION["Ujog"]  
    $_SESSION["lid"] 
*/
session_start();
include("$_SESSION[priv]/connect.php");
if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");

if(isset($_SESSION["uid"])) {
    $date = date("Y-m-d H:i:s");
    mysqli_query($dbase,"UPDATE  users  SET  ustat  = 'A,$date' WHERE  users . uid  = $_SESSION[uid]");
    unset($_SESSION["uid"]    );
    unset($_SESSION["ustrid"] );
    unset($_SESSION["icid"]   );
    unset($_SESSION["uname"]  );
    unset($_SESSION["umail"]  );
    unset($_SESSION["upw"]    );
    unset($_SESSION["stat"]   );
    unset($_SESSION["key"]    );
    unset($_SESSION["sid"]    );

    mysqli_query($dbase,"
        INSERT INTO  note  ( nid , lid, nurl ,  ndate ,  nip ) 
        VALUES ( NULL, '$_SESSION[lid]', '$_SERVER[REQUEST_URI]', current_timestamp(), '$_SERVER[REMOTE_ADDR]')
    ");
    unset($_SESSION["lid"]);
}


mysqli_close($dbase);

header("location: $_SESSION[R1]");



