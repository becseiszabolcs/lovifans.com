<?php
session_start();
include("$_SESSION[priv]/connect.php");

$email = $_POST["email"];
$any = mysqli_fetch_array(mysqli_query($dbase,"select ustrid,upass from users where umail='$email'"));



if($any){
    $rnd = bin2hex(random_bytes(16));
    $token_hash = hash("sha256",$rnd);

    $expiry = date("y-m-d H:i:s",time() + 60 * 15);

    $query = "
    INSERT INTO  pass_reset  ( pwid, umail, ustrid, previous_pw, token, token_expires_at, pwstat, pwip ) 
    VALUES (NULL,'$email','$any[ustrid]','$any[upass]','$token_hash','$expiry','A','$_SERVER[REMOTE_ADDR]')
    ";
    
    $stmt = mysqli_query($dbase,$query);

    $mail = mailing($email);

    $mail->setFrom("support.team@lovifans.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END
    
    Click <a href="http://localhost/lovifans.com/password-reset.php?token=$rnd">here</a> to reset your password

    END;

    try{
        $mail->send();
        $_SESSION["send"] = true;
        
    } 
    catch(Exception $e){
        echo"<script>Message could not be sent. Mailer error:{$mail->ErrorInfo}</script>";
    }
    echo"<script>alert('Message sent, please check your inbox')</script>";
    


    echo"<script>window.location.href='http://localhost/lovifans.com/'</script>";
    die();


} else echo"<script>window.location.href='http://localhost/lovifans.com/?page=reset'</script>";

mysqli_close($dbase);
?>
