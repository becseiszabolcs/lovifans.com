<?php
    session_start();
    function url($key = null){
        if(isset($_SESSION["uid"])) $array =  explode("/", trim($_GET["url"] ?? 'home',"/"));
        else                        $array =  explode("/", trim($_GET["url"] ?? 'login',"/"));
         
        
        if(!is_numeric($key)) return $array;
        else return $array[$key] ?? '';
    }
    $_SESSION['R1'] ="http://localhost/lovifans.com";
    if(!isset($_SESSION["uid"])){
        //loged out
        $pages = ["login","signup","about","services","contact","send-password-reset",];
    }
    else{
        //loged in
        $pages = ["home","post","friends","finding","profile","about","services","contact",];
    }
    
    $percent=[0,""];
    $bool = true;
    foreach($pages as $page){
        if(str_contains(strtoupper($page),strtoupper(url(0)))){
            $p = $page;
            $bool = false;
            break;
        }
        else {
            similar_text(strtoupper($page),strtoupper(url(0)),$n);
            if($percent[0]<$n) $percent = [$n,$page];
        } 
    }
    if($percent[0]>70){
        $p = $percent[1];
    }
    else if($bool){
        $p= "404 error";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="app.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro">
    
    <link rel="icon" href="./image/logo.png" type="image/x-icon">
    <title><?=ucfirst($p)?> > LoviFans</title>
    <link rel="stylesheet" href="style.css">
    <script src="./script.js"></script>

</head>
<body>


    <?php

        if(!isset($_SESSION["uid"])){
            print"
                <div class ='container' id=un>
                    <header>
                        <img class='plogo' src='./image/logo.png'>
                        <h1 class='logo'>LoviFans</h1>
                        <nav class ='navigation'>
                            <a class='link' href='about'>About</a>
                            <a class='link' href='services'>Services</a>
                            <a class='link' href='contact'>Contact</a>
                            <button onclick='window.location.href=\"./\"' class='btnLogin-pop'>Login</button>
                        </nav>
                    </header>
            ";
            
            

            
            if    ($p == "login")               include("./pages/unloged/login.html");
            elseif($p == "password-reset")      header("Location: ./password-reset.php");
            elseif($p == "send-password-reset") header("Location: ./send-password-reset.html");
            elseif($p == "signup")              include("./pages/unloged/regist.html");
            elseif($p == "about")               include("./pages/about.html");
            elseif($p == "services")            include("./pages/services.html");
            elseif($p == "contact")             include("./pages/contact.html");
            else                                    include("./pages/404.php");
            
            
            
        }
        else {
            $prof_img = "./image/default_user.png";
            if($_SESSION["icid"]){
                $pfimgid = mysqli_fetch_row($dbase,"select iid from imgconnect where icid = $_SESSION[icid]")["iid"];
                $pfimg =  mysqli_fetch_row($dbase,"select fnname from image where iid=$pfimgid")["fnname"];
                $prof_img = "./uploads/" . $pfimg;
            }
            print"
                <div class='container' id='loged'>
                    <header>
                        <img class='plogo' src='./image/logo.png'>
                        <nav class ='navigation'>
                            <a class='link' href='./'>Home</a>
                            <a class='link' href='./post'>Post</a>
                            <a class='link' href='./friends'>Friends</a>
                            <a class='link' href='./finding'>Finding</a>
                            <a class='link' href='./'>Groups</a>
                            <div class='menu'>
                                <button onclick='window.location.href=\"./profile\"' class='btnprof'><img src='$prof_img' alt=''><a>$_SESSION[uname]</a></button>
                                <div class='dropdown'>
                                    <a href='./profile'><img src='$prof_img' class='profimg' alt=''>Profile Page              </a>
                                    <a href=''><img src='./image/settings.png' alt=''>Profile Edit                            </a>
                                    <a href=''><img src='./image/connect.png' alt=''>Help Question                            </a>
                                    <a href='./pages/loged/logout.php'><img src='./image/logout.png' alt=''> Logout           </a>
                                </div>
                                
                            </div>
                        </nav>

                    </header>
            ";
            if($p == "home")            include("./pages/loged/home.php");
            else if($p == "post")       include("./pages/loged/post.php");
            else if($p == "friends")    include("./pages/loged/friend.php");
            else if($p == "finding")    include("./pages/loged/find.php");
            else if($p == "profile")    include("./pages/loged/profil.php");
            else                        include("./pages/404.php");
            
        }
        print"</div>";




    ?>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>



