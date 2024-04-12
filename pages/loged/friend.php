<?php  

if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");
include("note.php");
?>
<div id="chatsite" class="sites">
    <div id="flist">
        <form method="get" class="search">
            <input type="text" name="search" class="searchtxt">
            <input type="submit" onclick="fetchfriends('<?=url(2)?>','<?=isset($_GET['search']) ? $_GET['search'] : '' ?>')" value="search" id="but">

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
            <p>select someone to chat whit</p>

        </div>

        <div class="send form">
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
        </div>

        <script>
        //document.getElementById('file').click();
        window.selfiles = [];
        function waitfile(){
            return new Promise(function(resolve,reject){
                $("#file").on("change",function(){
                    var len= $("#file")[0].files.length
                    if(len>0) resolve($("#file"));
                });
            });
        } 

        $("#photos").click(function(){
            $("#file").click();
            waitfile().then(function(){
                filelist = $("#file")[0].files;
                for(var file of filelist){
                    window.selfiles.push(file);
                    
                }
                
            });

        });
        function sendMessage(){
            
            var sendr = r1 + 'pages/loged/send.php';

            var filein = document.getElementById('file');
            var formData = new FormData();
            var xhr = new XMLHttpRequest();
            if(window.selfiles) {
                var filelist = window.selfiles;
                if(filelist.length>0){
                    for(var file of filelist){
                        formData.append("files[]",file);

                    }
                }
            }
            if($("#message").val()!=""){
                formData.append("message",$("#message").val());             
                if(soup)      formData.append('soup', $("#soup").val());
                
            }
            xhr.open("post",sendr);
            xhr.send(formData);
            window.selfiles = [];
            $("#message").val('');

        }

            fetchfriends("<?=url(2)?>");
            setInterval(fetchfriends("<?=url(2)?>","<?=isset($_GET['search']) ? $_GET['search'] : '' ?>"), 1000);
            fetchMessages("<?=url(2)?>");
            setInterval(fetchMessages("<?=url(2)?>"), 1000);
        </script>
    </div>
</div>