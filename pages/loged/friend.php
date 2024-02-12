<?   ?>

<div id="chatsite" class="sites">
    <div id="flist">
        <form action="" method="post" class="search">
            <input type="text" name="" class="searchtxt">
            <input type="submit" value="search" id="but">
        </form>
        <div class="list">
            <a href="">
                <div class="content">
                    <img src="./image/default_user.png" alt="">
                    <div class="details">
                        <span>Enrique-Núñez-García Ramírez-Vasquez-Rodriguez-Hernandez-Cortés Martínez-Roberto Smith</span>
                        <p>this is a test message.</p>
                    </div>
                </div>
                

                <span>Online</span>
            </a>
            <a href="">
                <div class="content">
                    <img src="./image/default_user.png" alt="">
                    <div class="details">
                        <span>Frank Friend</span>
                        <p>this is a test message.</p>
                    </div>
                </div>
                

                <span>Online</span>
            </a>
            <a href="">
                <div class="content">
                    <img src="./image/default_user.png" alt="">
                    <div class="details">
                        <span>Frank Friend</span>
                        <p>this is a test message.</p>
                    </div>
                </div>
                

                <span>Online</span>
            </a>
            <a href="">
                <div class="content">
                    <img src="./image/default_user.png" alt="">
                    <div class="details">
                        <span>Frank Friend</span>
                        <p>this is a test message.</p>
                    </div>
                </div>
                

                <span>Online</span>
            </a>
            <a href="">
                <div class="content">
                    <img src="./image/default_user.png" alt="">
                    <div class="details">
                        <span>Frank Friend</span>
                        <p>this is a test message.</p>
                    </div>
                </div>
                

                <span>Online</span>
            </a>
            <a href="">
                <div class="content">
                    <img src="./image/default_user.png" alt="">
                    <div class="details">
                        <span>Frank Friend</span>
                        <p>this is a test message.</p>
                    </div>
                </div>
                

                <span>Online</span>
            </a>
            <a href="">
                <div class="content">
                    <img src="./image/default_user.png" alt="">
                    <div class="details">
                        <span>Frank Friend</span>
                        <p>this is a test message.</p>
                    </div>
                </div>
                

                <span>Online</span>
            </a>
            <a href="">
                <div class="content">
                    <img src="./image/default_user.png" alt="">
                    <div class="details">
                        <span>Frank Friend</span>
                        <p>this is a test message.</p>
                    </div>
                </div>
                

                <span>Online</span>
            </a>
        </div>
    </div>
    <div id="chat">
        <div id="header">
            <img src="./image/default_user.png" alt="">
            <span>Frank Friend <br> <p>Online</p></span>
            

        </div>
        
        <div id="privmessages">


        </div>

        <form action="pages/loged/send.php" method="post" class="send" enctype="multipart/form-data">
            <label for="">
                <input type="text" class="text"  name="text" id="text" placeholder="Your message ">
                
                <button onclick="sendMessage()">Send</button>
            </label>
            <input type="file" name="file" id="file" multiple>
            <!--<input type="submit" value="send">-->
        </form>

        <script>
            fetchMessages();
            setInterval(fetchMessages, 5000);
        </script>
    </div>
</div>