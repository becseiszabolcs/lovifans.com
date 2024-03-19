<?php

if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");
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
                <img src=""  id="bcimage">
            </div>
            
            <div class="details">
            
                <img src="/lovifans.com/image/default.png" alt="profil image" id="profimg">
                <h1 class="profilname">
                    <?=$_SESSION['uname']?>
                    <p>110 Views</p>
                </h1>
                <button onclick="showset()">Options</button>
            </div>
            <hr style="border: 2px solid #ddd; width:100%; border-radius:2px;">

        </div>
        <div class="posts">
            <div class="post">
                <div class="header">
                    <img src="/lovifans.com/image/default.png" alt="profil image" id="profimg">
                    <h1 class="profilname_post">
                        Profil Name
                    </h1>
                </div>
                <hr style="border: 2px solid #ddd; width:100%; border-radius:2px;">
                <p id="postmess">
                        Hello, World!
                </p>
                <div class="postimg">
                    <img src="/lovifans.com/image/bc_background.jpg" alt="" class="postimg">
                </div>
                <hr style="border: 2px solid #ddd; width:100%; border-radius:2px;">
                <div class="footer">
                    <form>
                        <textarea id="message" name="message" rows="1" oninput="textheight()" placeholder="Type Comment..."></textarea>
                        <div class="button">
                            <button>like</button>
                            <hr style="border: 1px solid #ddd;">
                            <button>comments</button>
                            <hr style="border: 1px solid #ddd;">
                            <input hidden type="file" name="file" id="file" multiple>
                            <button id="photos">photo</button>
                            <hr style="border: 1px solid #ddd;">
                            <button>send</button>
                        </div>
                        

                    </form>

                </div>
            </div>
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
</script>
</div>




