<?php  

if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");
include("note.php");
?>
<div id="finding" class="sites">
    <div id="options">
        <form method="get" class="search">
            <input type="text" name="search" class="searchtxt">
            <button id="but" onclick="fetchMembers('<?url(1)?>','<?=isset($_GET['search']) ? $_GET['search'] : '' ?>');">submit</button>
        </form>
        <div class="list">
            <a href=" /lovifans.com/finding/">
                <div class="content">
                    <div class="details">
                        <span>All</span>

                    </div>
                </div>
            </a>
            <a href=" /lovifans.com/finding/request">
                <div class="content">
                    <div class="details">
                        <span>Friend requests</span>
                    </div>
                </div>
            </a>   
            <a href=" /lovifans.com/finding/friendsof">
                <div class="content">
                    <div class="details">
                        <span>Friends of my Friends</span>
                    </div>
                </div>
            </a>
            <a href=" /lovifans.com/finding/unknown">
                <div class="content">
                    <div class="details">
                        <span>Are still unknown?</span>
                    </div>
                </div>
            </a>
            <a href=" /lovifans.com/finding/friends">
                <div class="content">
                    <div class="details">
                        <span>My friend's profiles</span>
                    </div>
                </div>
            </a>
       
        </div>
    </div>

    <div id="profiles">

        
    </div>

    <script>
        fetchMembers("<?url(1)?>","<?=isset($_GET['search']) ? $_GET['search'] : '' ?>");
        setInterval(fetchMembers("<?url(1)?>","<?=isset($_GET['search']) ? $_GET['search'] : '' ?>"), 1000);
    </script>
    </div>
</div>