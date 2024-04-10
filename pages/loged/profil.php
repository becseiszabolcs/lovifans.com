<?php

if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");
include("note.php");
?>

<div class="prof sites" id="prof">
    <div class="bar">

        <h1>Friends</h1>
        <div class="friends">
        
            <a href=""><img src="/lovifans.com/image/default.png" alt="profil image" id="profimg"></a>
            <a href=""><img src="/lovifans.com/image/default.png" alt="profil image" id="profimg"></a>
            <a href=""><img src="/lovifans.com/image/default.png" alt="profil image" id="profimg"></a>
            <a href=""><img src="/lovifans.com/image/default.png" alt="profil image" id="profimg"></a>
            <a href=""><img src="/lovifans.com/image/default.png" alt="profil image" id="profimg"></a>
            <a href=""><img src="/lovifans.com/image/default.png" alt="profil image" id="profimg"></a>
            <a href=""><img src="/lovifans.com/image/default.png" alt="profil image" id="profimg"></a>
            <a href=""><img src="/lovifans.com/image/default.png" alt="profil image" id="profimg"></a>
            <a href=""><img src="/lovifans.com/image/default.png" alt="profil image" id="profimg"></a>

        </div>
        <button>More...</button>
        <hr style="margin: 10px; border:2px solid #eee; border-radius:2px">
        <h1>About me</h1>
        <div class="profildata">
            <h1>Age: </h1>
            <h1>Country: </h1>
            <h1>City: </h1>
            <h1>First horse race:</h1>
            <h1>My favorite horse: </h1>
            <h1>My favorite Jocky: </h1>

        </div>

    </div>
    <div class="sections">
        <div class="header">
            <div class="cont">
                <img src="<?=$_SESSION['profilbc']?>"  id="bcimage">
            </div>
            
            <div class="details">
                <div class="profimg">
                    <img src="<?=$_SESSION["profilimg"]?>" alt="profil image" id="profimg">
                </div>
                

                <h1 class="profilname">
                    <?=$_SESSION['uname']?>
                    <p>110 Views</p>
                </h1>
                <button onclick="showset()">Account Settings</button>
            </div>
            <hr style="border: 2px solid #ddd; width:100%; border-radius:2px;">

        </div>
        <div id="posts" class="posts">
        </div>
        <script>
                document.getElementById('photos').addEventListener('click', function() {
                    document.getElementById('file').click();
                });
        </script>
    </div>


  

<script>
    //profilload("<?=url(2)?>");
    //setInterval(profilload("<?=url(2)?>"),5000);
    post_fetch("<?=$_SESSION["ustrid"]?>");
    setInterval(post_fetch("<?=$_SESSION["ustrid"]?>"),1000);
</script>
</div>




