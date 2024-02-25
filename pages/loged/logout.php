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
include("../../connect.php");


if(isset($_SESSION["lid"])){

}


session_start();
if(isset($_SESSION["uid"])) {
    unset($_SESSION["uid"]    );
    unset($_SESSION["ustrid"] );
    unset($_SESSION["icid"]   );
    unset($_SESSION["uname"]  );
    unset($_SESSION["umail"]  );
    unset($_SESSION["upw"]    );
    unset($_SESSION["stat"]   );

    mysqli_query($dbase,"
        INSERT INTO  note  ( nid , lid, nurl ,  ndate ,  nip ) 
        VALUES ( NULL, '$_SESSION[lid]', '$_SERVER[REQUEST_URI]', current_timestamp(), '$_SERVER[REMOTE_ADDR]')
    ");
    unset($_SESSION["lid"]);
}


mysqli_close($dbase);

header("location: $_SESSION[R1]");

?>

