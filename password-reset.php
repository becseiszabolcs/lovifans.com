<?php
/*
if(array_count_values($isvalid) > 1 ){
    echo"Choose a user<select name='username'>";
    for($i = 0;$i<array_count_values($isvalid);$i++)   print"   <option value='$isvalid[$i][ustrid]'>Volvo</option>";
}
*/


include("../private/connect.php");

if(isset($_GET["token"])){
    $token = hash("sha256",$_GET["token"]);
    $isvalid = mysqli_fetch_assoc(mysqli_query($dbase,"SELECT * FROM  pass_reset  where token='$token'"));
    if($isvalid == null)   die("<script>alert('The token is not found.');window.location.href='./password-reset.html'</script>");
    else if(strtotime("$isvalid[token_expires_at]")<=time()) die("<script>alert('The token is expired.');window.location.href='./password-reset.html'</script>");
    else if($isvalid["pwstat"] == "U") die("<script>alert('The token is used.');window.location.href='./password-reset.html'</script>");
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
        <script src="./script.js"></script>

    </head>
    <body>
        <div class="container" id="un">
            <div class='wrapper password_reset1'>
                <div class='form-box'>
                    <h1>Password reset</h1>
                    <form action='./pages/unloged/password-reset_ir.php' method='post'>
                    <div id='conditions'>
                        <p id='1'>The password must be at least 8 characters long.</p>
                        <p id='2'>Password must contain letters.</p>
                        <p id='3'>Password must contain numbers.</p>

                        


                    </div>
                        <div id='dpass'>
                            <input hidden type="text" name="str" value='<?php echo"$isvalid[ustrid]";?>'>
                            <input type='password' name='upass1' class='text' id='ptext1' placeholder=' password' onkeyup='passwordStrength(this.value);'>
                            <a class='aeye' id='eyea' onclick='apper("#ptext1","#eye1")'>
                                <img class='eye' id='eye1'  src='./image/eye.png' alt=''>
                            </a><br>
                            
                            <div id='slidetext'></div>
                            <div id='slide'></div>
                        
                        </div>

                        <input type='password' name='upass2' class='text' id='ptext2' placeholder=' repeat password'>
                        <a class='aeye' id='eyeb' onclick='apper("#ptext2","#eye2")'>
                            <img class='eye' id='eye2'  src='./image/eye.png' alt=''>
                        </a><br>

                        <input type="submit" value="Submit" class="sub" id="signup">
                        
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>





