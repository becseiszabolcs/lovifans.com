


<?php
    session_start();
    include("../../connect.php");
    

    //header('Content-Type: application/json');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $userid = $_POST["uname"];
        $pass = $_POST["upass"];
        $bool = true;
        
        if((!empty($userid)) & (!empty($pass))){             
            $Udata = mysqli_fetch_assoc(mysqli_query($dbase, "select * from users where uname = '$userid' or umail = '$userid'"));
            if(!empty($Udata)){
                if(password_verify($pass,$Udata["upass"])){
   
                    $_SESSION["uid"]    = $Udata["uid"]     ;
                    $_SESSION["ustrid"] = $Udata["ustrid"]  ;
                    $_SESSION["icid"]   = $Udata["icid"]    ;
                    $_SESSION["bicid"]   = $Udata["bicid"]  ;
                    $_SESSION["uname"]  = $Udata["uname"]   ;
                    $_SESSION["umail"]  = $Udata["umail"]   ;
                    $_SESSION["upw"]    = $Udata["upass"]   ;
                    $_SESSION["key"]    = randoms(60)       ;
                    $_SESSION["sid"]    = session_id()      ;
                    mysqli_query($dbase,"UPDATE  users  SET  ustat  = 'A,Online' WHERE  users . uid  = $_SESSION[uid]");
                    if(!str_contains($Udata["ustat"],"D") && !str_contains($Udata["ustat"],"S")){
                        $_SESSION["stat"]   = "A, Online";
                        $bool = false;
                    } 
                    
                    mysqli_query($dbase,"
                        INSERT INTO  login  ( lid ,  uid ,  ldate ,  lip ) 
                        VALUES (NULL, '$Udata[uid]', current_timestamp(), '$_SERVER[REMOTE_ADDR]')
                    ");
                    $_SESSION["lid"] = mysqli_insert_id($dbase);

                    mysqli_query($dbase,"
                        INSERT INTO  note  ( nid, lid,  nurl,  ndate,  nip  ) 
                        VALUES ( NULL, '$_SESSION[lid]', '$_SERVER[REQUEST_URI]', current_timestamp(), '$_SERVER[REMOTE_ADDR]')
                    ");
                    //$_SERVER[REMOTE_ADDR]

                    /*
                    $before_log = mysqli_fetch_array(mysqli_query($dbase,"select * from login where '0.0.0.0' == lip"));
                    if(empty($before_log)) {

                            $stmt = mysqli_query($dbase,$query);
                        
                            $mail = mailing($_SESSION["umail"]);
                        
                            $mail->setFrom("support@lovifans.com");
                            $mail->addAddress($_SESSION["umail"]);
                            $mail->Subject = "Password Reset";
                            $mail->Body = <<<END
                            
                            We have detected a new login from this place if you were not then asked to notify us
                        
                            END;
                        
                            echo"<script>window.location.href='http://localhost/lovifans.com/'</script>";
                            $mail->send();
                    }
                    */

                    
                    mysqli_close($dbase);
                    //if(!$bool) include("./logout.php");
                     
                    $jsonEncoded = json_encode(['token' => $_SESSION['key']]);
                    if ($jsonEncoded === false) {
                        echo json_encode(['error' => 'JSON encoding error: ' . json_last_error_msg()]);
                    } else {
                        echo $jsonEncoded;
                    }

                } else echo json_encode(['error' => 'Incorrect password and/or email.']);
            } else echo json_encode(['error' => 'Incorrect password and/or email.']);
        } else{
            if($userid==""& $pass=="") echo json_encode(['error' => 'Please enter the email or username and the password.']);
            else if($userid=="") echo json_encode(['error' => 'Please enter the email or username.']);    
            else if($pass=="") echo json_encode(['error' => 'Please enter the password.']);
        }
    }            

    mysqli_close($dbase);

?>

