<div id="finding" class="sites">
    <div id="options">
        <form method="get" class="search">
            <input type="text" name="search" class="searchtxt">
            <button id="but">submit</button>
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
        /*
        $(document).ready(function() {
            function requestSend(id) {
                $(`#requestForm${id}`).submit(function (event) {
                    event.preventDefault();

                    var profile = $(`#profile${id}`).val();
                    var sendr = r1 + 'pages/loged/friend_req.php';

                    if (profile) {
                        $.ajax({
                            url: sendr,
                            method: 'POST',
                            data: { profile: profile },
                            success: function () {
                                console.log('Successfully sent friend request');
                                fetchMembers();
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error('Error sending friend request:', errorThrown);
                            },
                            complete: function (jqXHR, textStatus) {
                                console.log('AJAX request complete with status:', textStatus);
                            }
                        });
                    }
                });
            }

            // Call requestSend with your desired id
            requestSend(1); // Replace 1 with the actual id
        });
        */


        fetchMembers();
        setInterval(fetchMembers, 10000);
    </script>
    </div>
</div>