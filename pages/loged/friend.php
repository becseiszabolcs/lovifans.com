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
        $(document).ready(function(){
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

            var fend=15;
            var fworking=false;
            fetchfriends("<?=url(2)?>",fend,"<?=isset($_GET['search']) ? $_GET['search'] : '' ?>");
            $("#friendslist").hover(function(){
                setTimeout(fetchfriends,3000,"<?=url(2)?>",fend,"<?=isset($_GET['search']) ? $_GET['search'] : '' ?>");
            });
            $("#friendslist").scroll(function(){
                if($(this).scrollTop() + 1 >= $("#friendslist").height() - $(window).height()){
                    if(fworking==false){
                        fworking=true
                        fend+=5;
                        fetchfriends("<?=url(2)?>",fend,"<?=isset($_GET['search']) ? $_GET['search'] : '' ?>");
                        setTimeout(function(){
                            fworking=false;
                        },2000);
                    }

                }
            });

            
            var end=15;
            var working=false;
            fetchMessages("<?=url(2)?>",end);
            $("#privmessages").hover(function(){
                setTimeout(fetchMessages,3000,"<?=url(2)?>",end);
            });
            $("#privmessages").scroll(function(){
                if($(this).scrollTop() + 1 >= $("#privmessages").height() - $(window).height()){
                    if(working==false){
                        working=true
                        end+=5;
                        fetchMessages("<?=url(2)?>",end);
                        setTimeout(function(){
                            working=false;
                        },2000);
                    }

                }
            });


            
                //setTimeout(fetchMessages,1000,"<?=url(2)?>",end);
 

        
        });
        
        </script>
    </div>
</div>