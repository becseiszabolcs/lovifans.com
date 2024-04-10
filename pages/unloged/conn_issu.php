<?php
session_start();
include("$_SESSION[priv]/connect.php");

$name   = $_POST["name"];
$email  = $_POST["email"];
$mes    = $_POST["mes"];


    $mail = mailing("support.team@lovifans.com");

    $mail->setFrom("problem@lovifans.com");
    $mail->addAddress("becsei.szabi@gmail.com");
    $mail->Subject = "$name";
    $mail->Body = <<<END
    
    message:<br>
    <p>$mes</p>

    email: $email
    

    
    END;

    try{
        $mail->send();
        $_SESSION["send"] = true;
        
    } 
    catch(Exception $e){
        //echo"<script>Message could not be sent. Mailer error:{$mail->ErrorInfo}</script>";
    }

    header("Location: http://localhost/lovifans.com/contact");


