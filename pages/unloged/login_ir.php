<?php
    include("../../connect.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $userid = $_POST["uname"];
        $pass = $_POST["upass"];

        if((!empty($userid)) & (!empty($pass)) & (!is_numeric($userid))){             
            $Udata = mysqli_fetch_assoc(mysqli_query($dbase, "select * from users where uname = '$userid' or umail = '$userid'"));
            if( (!empty($Udata)) & password_verify($pass,$Udata["upass"]) ){
                session_start();
                $_SESSION["uid"]    = $Udata["uid"]     ;
                $_SESSION["ustrid"] = $Udata["ustrid"]  ;
                $_SESSION["icid"]   = $Udata["icid"]    ;
                $_SESSION["uname"]  = $Udata["uname"]   ;
                $_SESSION["umail"]  = $Udata["umail"]   ;
                $_SESSION["upw"]    = $Udata["upass"]   ;
                $_SESSION["stat"]   = $Udata["ustat"]   ;
                

                mysqli_query($dbase,"
                    INSERT INTO  login  ( lid ,  uid ,  ldate ,  lip ) 
                    VALUES (NULL, '$Udata[uid]', current_timestamp(), '$_SERVER[REMOTE_ADDR]')
                ");
                $_SESSION["lid"] = mysqli_insert_id($dbase);

                mysqli_query($dbase,"
                    INSERT INTO  note  ( nid, lid,  nurl,  ndate,  nip  ) 
                    VALUES ( NULL, '$_SESSION[lid]', '$_SERVER[REQUEST_URI]', current_timestamp(), '$_SERVER[REMOTE_ADDR]')
                ");
                
                mysqli_close($dbase);
                header("Location: $_SESSION[R1]");
                die();

            }
            else{
                die("<script>
                    alert('email or username or password not valid');
                    window.location.href = '$_SESSION[R1]/';
                </script>");
            } 
        }
        else{
            if($userid=="")                 
            echo"<script>
                alert('please enter the email or username');
                window.location.href = '$_SESSION[R1]/';
            </script>";
            if($pass=="") 
            echo"<script>
                alert('please enter the password');
                window.location.href = '$_SESSION[R1]/';
            </script>";
        }



    }            

    mysqli_close($dbase);
?>
