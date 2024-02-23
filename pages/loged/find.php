<div id="finding" class="sites">
    <div id="options">
        <form action="" method="post" class="search">
            <input type="text" name="" class="searchtxt">
            <input type="submit" value="search" id="but">
        </form>
        <div class="list">
            <a href="./finding/all">
                <div class="content">
                    <div class="details">
                        <span>all</span>

                    </div>
                </div>
            </a>
            <a href="./friendsof">
                <div class="content">
                    <div class="details">
                        <span>friends of my friends</span>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="content">
                    <div class="details">
                        <span>are still unknown</span>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="content">
                    <div class="details">
                        <span>my friends' profiles</span>

                    </div>
                </div>
            </a>

            
        </div>
    </div>

    <div id="profils">
        <div class="profile">
            <img src='./image/default.png' alt=''><a id='profile_name'>
            <p>Profile Name</p>
            <div class="buttons">

                <form method="post">
                    <input disabled hidden type="text" name="profile" id="profile" value="ustrid">
                    <button>Add to friends</button>
                </form>
                <button>profile</button>
            </div>

        </div>
    </div>
    

    <script>
        fetchMessages();
        setInterval(fetchMessages, 5000);
    </script>
    </div>
</div>