<?php
include("$_SESSION[priv]/connect.php");

$options = ["cost" => 12];
$pass = password_hash($_POST["upass1"],PASSWORD_BCRYPT,$options);
$str = $_POST["str"];


mysqli_query($dbase,"
    UPDATE users 
    set upass='$pass'
    where ustrid=2
");
mysqli_query($dbase,"
    UPDATE pass_reset 
    set pwstat='U'
    where ustrid='$str'
");


echo"<script>alert('password is successfully changed');window.location.href='http://localhost/lovifans.com';</script>";
mysqli_close($dbase);
?>
<script>window.location.href='http://localhost/lovifans.com'</script>

