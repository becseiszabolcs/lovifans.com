<?php
    session_start();
    include("../../connect.php");
    $profil = explode(",",$_POST["soup"]);
    $text = $_POST["message"];
    $bool = str_replace(" ", "", $text);
    $bool = str_replace("\r\n", "", $bool);
    $arr = [];
    
    for ($i = 0; $i < strlen($text); $i += 1) {
        if ($text[$i] == "\r" && $text[$i + 1] == "\n") {
            $arr[] = $i;
        }
    }
    
    $text = htmlspecialchars($text);
    
    if ($arr) {
        $n = 0;
        $str = "";
        for ($i = 0; $i < count($arr); $i += 1) {
            $str .= substr($text, $n, $arr[$i] - $n) . "<br>";
            $n = $arr[$i] + 2; // Skip the "\r\n" characters
        }
        // Add the last part of the string after the last "\r\n"
        $str .= substr($text, $n) . "<br>";
        $text = $str;
    }
    $friend = mysqli_fetch_array(mysqli_query($dbase,"select * from users where '$profil[1]'=ustrid and '$profil[0]'=uname"));
 
    if($bool){
        mysqli_query($dbase,"
        INSERT INTO  message  ( mid ,  uid ,  ustrid ,  mtoid ,  mtostrid ,  mlabel ,  icid ,  meloz ,  mstat ,  mdate ,  mip ) 
        VALUES (NULL, $_SESSION[uid], '$_SESSION[ustrid]', $friend[uid], '$friend[ustrid]', '$text', NULL, NULL, 'A', current_timestamp(), '$_SERVER[REMOTE_ADDR]')
        ");
    }



    mysqli_close($dbase);

    //header("location: $_SESSION[R1]/friends");
?>