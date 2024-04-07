<?php
    session_start();
    function url($key = null){
        if(isset($_SESSION["uid"])) $array =  explode("/", trim($_GET["url"] ?? 'home',"/"));
        else                        $array =  explode("/", trim($_GET["url"] ?? 'login',"/"));
         
        
        if(!is_numeric($key)) return $array;
        else return $array[$key] ?? '';
    }
    $_SESSION['R1'] ="http://localhost/lovifans.com";
    $_SESSION["priv"]="../../../private";
    $_SESSION["files"]="get_files.php?";
    if(!isset($_SESSION["uid"])){
        //loged out
        $pages = ["login","signup","about","services","contact","send-password-reset"];
    }
    else{
        //loged in
        $pages = ["settings","home","friends","finding","profile","about","services","contact"];
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro">
    <link rel="icon" href="/lovifans.com/image/logo.png" type="image/x-icon">
    
    <title><?=ucfirst($p)?> > LoviFans</title>

    <link rel="stylesheet" href="/lovifans.com/style.css">
    <script src="<?=$_SESSION['R1']?>/js/jquery.js"></script>
    <script src="<?=$_SESSION['R1']?>/js/script.js"></script>
    <script src="<?=$_SESSION['R1']?>/js/app.js"></script>

</head>
<body>


    <?php

        if(!isset($_SESSION["uid"])){
            print"
                <div class ='container' id=un>
                    <header>
                        <img class='plogo' src='/lovifans.com/image/logo.png'>
                        <h1 class='logo'>LoviFans</h1>
                        <nav class ='navigation'>
                            <a class='link' href='$_SESSION[R1]/about'>About</a>
                            <a class='link' href='$_SESSION[R1]/services'>Services</a>
                            <a class='link' href='$_SESSION[R1]/contact'>Contact</a>
                            <button onclick='window.location.href=\"$_SESSION[R1]/\"' class='btnLogin-pop'>Login</button>
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
            else                                include("./pages/404.php");
            
        }
        else {
            $prof_img = "$_SESSION[profilimg]";
            print"
                <div class='container' id='loged'>
                    <header id='first_header'>
                        <img class='plogo' src=' /lovifans.com/image/logo.png'>
                        <nav class ='navigation'>
                            <a class='link' href=' /lovifans.com/'>Home              </a>
                            <a class='link' href=' /lovifans.com/friends'>Friends    </a>
                            <a class='link' href=' /lovifans.com/finding'>Finding    </a>
                            <a class='link' href=' /lovifans.com/groups'>Groups      </a>
                            <div class='menu'>
                                <button onclick='window.location.href=\" /lovifans.com/profile\"' class='btnprof'><div class='profimg'><img src='$prof_img' alt='Profil image'></div><a id='profile_name'>$_SESSION[uname]</a></button>
                                <div class='dropdown'>
                                    <a href='$_SESSION[R1]/profile/'>               <div class='profimg'><img src='$prof_img' alt='Profil image'></div>     Profile Page            </a>
                                    <a href='$_SESSION[R1]/contact/'>               <img class='icon' src='$_SESSION[R1]/image/connect.png' alt='connect icon'>          Help & Question         </a>
                                    <a href='$_SESSION[R1]/pages/loged/logout.php'> <img class='icon' src='$_SESSION[R1]/image/logout.png' alt='logout icon'>            Logout                  </a>
                                </div>
                                
                            </div>
                        </nav>

                    </header>
            ";
            if($p == "home")            include("./pages/loged/home.php");
            else if($p == "friends")    include("./pages/loged/friend.php");
            else if($p == "finding")    include("./pages/loged/find.php");
            else if($p == "profile")    include("./pages/loged/profil.php");
            else if($p == "contact")    include("./pages/loged/contact.html");
            else if($p == "settings")   include("./pages/loged/settings.php");
            else                        include("./pages/404.php");
            
        }
        print"</div>";




    ?>
</body>
</html>




