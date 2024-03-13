<?php
    session_start();
    include("../../connect.php");
    
    if(isset($_GET["soup"])){
        $friend =  mysqli_fetch_assoc(mysqli_query($dbase,"select * from users where ustrid = '$_GET[soup]' limit 1"));
    } else{
        $find =  mysqli_fetch_assoc(mysqli_query($dbase,"select * from message where (ustrid='$_SESSION[ustrid]' or mtostrid='$_SESSION[ustrid]') ORDER BY mdate DESC LIMIT 1;"));
        if($find){
            if($find["ustrid"] == $_SESSION["ustrid"]) $strid = $find["mtostrid"];
            else                                       $strid = $find["ustrid"];
            $friend =  mysqli_fetch_assoc(mysqli_query($dbase,"select * from users where ustrid = '$strid' limit 1"));
        }
        else{
            $find =  mysqli_fetch_assoc(mysqli_query($dbase,"select * from friends where (fuid = $_SESSION[uid] or uid = $_SESSION[uid]) and fstat='A' ORDER BY fdate DESC LIMIT 1;"));
            if($find){
                if($find["uid"] == $_SESSION["uid"]) $id = $find["fuid"];
                else                                 $id = $find["uid"];
                $friend =  mysqli_fetch_assoc(mysqli_query($dbase,"select * from users where uid = '$id' limit 1"));
            }
        }
    }
    if(isset($friend)){
        $fri = ["link"=>"$_SESSION[R1]/friends/$friend[uname]/$friend[ustrid]"];
    }


