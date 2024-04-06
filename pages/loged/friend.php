<?php  

if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");
?>
<div id="chatsite" class="sites">
    <div id="flist">
        <form method="get" class="search">
            <input type="text" name="" class="searchtxt">
            <input type="submit" value="search" id="but">
        </form>
        <div class="list" id="friendslist">

            
        </div>
    </div>
    <div id="chat">
        <div id="header">
            <img src=" /lovifans.com/image/default.png" alt="">
            <span id="sel_profil"></span>
            

        </div>
        
        <div id="privmessages">
            <!--<p>select someone to chat whit</p-->

        </div>

        <form method="post" class="send" enctype="multipart/form-data">
            <div class="flex-container ">
            <!-- Your content goes here -->
                <div class="flex-item">
                    <input hidden type="file" id="file" name="file" multiple>
                    <div class="file-list">
                    </div>
                    <input hidden type="text" name="soup" id="soup" value="<?=url(2)?>">
                    <textarea id="message" name="message" rows="1" oninput="textheight()" placeholder="Type something..."></textarea>
                </div>
                <input hidden type="file" name="file" id="file" multiple>
                <button id="photos"><img src="<?=$_SESSION["R1"]."/image/photo.png"?>" alt="photo"></button>
                <button onclick="sendMessage()">send</button>
                
                
            </div>
        </form>

        <script>
            document.getElementById('photos').addEventListener('click', function() {
                document.getElementById('file').click();
            });
            fetchfriends("<?=url(2)?>");
            setInterval(fetchfriends("<?=url(2)?>"), 1000);
            fetchMessages("<?=url(2)?>");
            setInterval(fetchMessages("<?=url(2)?>"), 1000);
        </script>
    </div>
</div>