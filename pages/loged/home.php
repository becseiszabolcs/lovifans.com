<?php

if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");
include("note.php");
?>
<div class="home sites">
    <div class="form">
        <div class="textarea">
            <textarea id="message" name="message" rows="1" oninput="textheight()" placeholder="Type something..."></textarea>
        </div>
        <div class="buttons">
            <button id="photos">image</button>
            <input hidden type="file" name="file" id="file" multiple>
            <div id="sel"></div>

            <button onclick="post()">send</button>
        </div>

    </div>
    <div id="posts" class="posts">
 
    </div>
</div>
    <script>
        window.selfiles = [];
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
        post_fetch();
        setInterval(post_fetch,6000);


        
    </script>
