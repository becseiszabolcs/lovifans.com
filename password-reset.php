<?php
/*
if(array_count_values($isvalid) > 1 ){
    echo"Choose a user<select name='username'>";
    for($i = 0;$i<array_count_values($isvalid);$i++)   print"   <option value='$isvalid[$i][ustrid]'>Volvo</option>";
}
*/
session_start();
$_SESSION['R1'] ="http://localhost/lovifans.com";

include("../private/connect.php");

if(isset($_GET["token"])){
    $token = hash("sha256",$_GET["token"]);
    $isvalid = mysqli_fetch_assoc(mysqli_query($dbase,"SELECT * FROM  pass_reset  where token='$token'"));
    
    if($isvalid == null)                                      die("<script>alert('The token is not found.');window.location.href='./password-reset.html'</script>");
    else if(strtotime("$isvalid[token_expires_at]")<=time())  die("<script>alert('The token is expired.');window.location.href='./password-reset.html'</script>");
    else if($isvalid["pwstat"] == "U")                        die("<script>alert('The token is used.');window.location.href='./password-reset.html'</script>");

} else echo"<script>window.location.href='./password-reset.html'</script>";

mysqli_close($dbase);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro">
        <link rel="icon" href="./image/logo.png" type="image/x-icon">
        <title>Reset Password > LoviFans</title>
        
        <link rel="stylesheet" href="./style.css">
        <script src="<?=$_SESSION['R1']?>/js/jquery.js"></script>
        <script src="<?=$_SESSION['R1']?>/js/script.js"></script>
        <script src="<?=$_SESSION['R1']?>/js/app.js"></script>

    </head>
    <body>
        <div class="container" id="un">
            <div class='wrapper password_reset1'>
                <div class='form-box'>
                    <h1>Password reset</h1>
                    <form action='./pages/unloged/password-reset_ir.php' method='post'>
                    <div id='conditions'>
                        <p id='1'>The password must be at least 8 characters long.</p>
                        <p id="2">Password must contains <br>letters and numbers.</p>
                        <p id="3">Passwords must match and <br>all fields must be filled.</p>

                    </div>
                        <div id="dpass">
                            <input type="password" name="upass1" class="text" id="ptext1" placeholder=" password" onkeyup="passwordStrength(this.value);">
                            <a class="aeye" id="eyea" onclick="apper('#ptext1','#eye1')">
                                <img class="eye" id="eye1"  src=" /lovifans.com/image/eye.png" alt="">
                            </a><br>
                            
                            <div id="slidetext"></div>
                            <div id="slide"></div>
                            
                        </div>

                        <input type='password' name='upass2' class='text' id='ptext2' placeholder=' repeat password'>
                        <a class='aeye' id='eyeb' onclick='apper("#ptext2","#eye2")'>
                            <img class='eye' id='eye2'  src='./image/eye.png' alt=''>
                        </a><br>

                        <input disabled type="submit" value="Submit" class="sub" id="reset">
                        
                    </form>
                </div>
            </div>
        </div>
        <script>
                $(document).ready(function(){
                    $("#ptext1").on('input', function(){
                        var regex = /[a-zA-Z]/;
                        var str = /[a-zA-Z]/;
                        var num = /\d/;

                        if($("#ptext1").val()!='' & $("#ptext1").val().length>7 ) {
                            $("#1").css("color","lightgreen");
                            $("#1").css("border-color","lightgreen");
                            $("#1").css("background-color","rgba(0, 140, 0, 0.75)");
                        }
                        else{
                            $("#1").css("color","red");
                            $("#1").css("border-color","red");
                            $("#1").css("background-color","rgba(140, 0, 0, 0.75)");
                        }

                        if($("#ptext1").val()!='' & str.test($("#ptext1").val()) & num.test($("#ptext1").val())) {
                            $("#2").css("color","lightgreen");
                            $("#2").css("border-color","lightgreen");
                            $("#2").css("background-color","rgba(0, 140, 0, 0.75)");
                        }
                        else{
                            $("#2").css("color","red");
                            $("#2").css("border-color","red");
                            $("#2").css("background-color","rgba(140, 0, 0, 0.75)");
                        }
                        if(($("#ptext1").val()!='' & $("#ptext2").val()!=''& $("#ptext2").val() == $("#ptext1").val()) & ($("#ptext1").val()!='' & str.test($("#ptext1").val()) & (num.test($("#ptext1").val()))&$("#ptext1").val()!='' & $("#ptext1").val().length>7 )){
                        $("#reset").prop('disabled',false);
                        } else $("#reset").prop('disabled',true);

                    });

                    $("#ptext2").on('input', function(){
                        var regex = /[a-zA-Z]/;
                        var str = /[a-zA-Z]/;
                        var num = /\d/;

                        if($("#ptext1").val()!='' & $("#ptext2").val()!=''& $("#ptext2").val() == $("#ptext1").val()) {
                            $("#3").css("color","lightgreen");
                            $("#3").css("border-color","lightgreen");
                            $("#3").css("background-color","rgba(0, 140, 0, 0.75)");
                        }
                        else{
                            $("#3").css("color","red");
                            $("#3").css("border-color","red");
                            $("#3").css("background-color","rgba(140, 0, 0, 0.75)");
                        }
                        if(($("#ptext1").val()!='' & $("#ptext2").val()!=''& $("#ptext2").val() == $("#ptext1").val()) & ($("#ptext1").val()!='' & str.test($("#ptext1").val()) & (num.test($("#ptext1").val()))&$("#ptext1").val()!='' & $("#ptext1").val().length>7 )){
                        $("#reset").prop('disabled',false);
                        } else $("#reset").prop('disabled',true);
                    });
  
                });
        </script>
    </body>
</html>





