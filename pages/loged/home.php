<?php

if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");
?>
<div class="home sites">
    <div class="form">
        <div>
            <textarea id="message" name="message" rows="1" oninput="textheight()" placeholder="Type something..."></textarea>
        </div>
        <div class="buttons">
            <button id="photos">image</button>
            <input hidden type="file" name="file" id="file" multiple>
            <div id="sel"></div>

            <input onclick="post()" type="submit" value="send">
        </div>

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

        //document.getElementById('file').click();
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
                if(!window.selfiles) window.selfiles = [];
                filelist = $("#file")[0].files;
                for(var file of filelist){
                    window.selfiles.push(file);
                    
                }
                
            });

        });
        function post(){
            var sendr = r1 + 'pages/loged/post.php';

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
            }
            xhr.open("post",sendr);
            xhr.send(formData);
            window.selfiles = [];
            $("#message").val('');

        }

        
    </script>
</div>