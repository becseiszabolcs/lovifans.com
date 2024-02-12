<?php
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $dbname="lovifansdb";
        $dbase = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;


        function mailing($mail){

        
                require '../../PHPMailer/src/Exception.php';
                require '../../PHPMailer/src/PHPMailer.php';
                require '../../PHPMailer/src/SMTP.php';
        
        
                $mail = new PHPMailer(true);
        
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Host = "smtp.mailersend.net";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->Username = "MS_ACZujt@lovifans.com";
                $mail->Password = "qZbPCsHrP9PA3o4r";
        
                $mail->isHTML(true);
        
                return $mail;

        }

        function randoms($len = 20){
                $c = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $rnd = "";
                for($i=1;$i<=$len;$i++) $rnd.= $c[rand(0,61)];
                return $rnd;
        }
        
?>