var r1 = 'http://localhost/lovifans.com/';

//find site

function fetchMembers() {
    var chatr = r1+'pages/loged/find_fetch.php';
    $.ajax({
        url: chatr,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            displayMembers(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching messages:', errorThrown);
        }
    });
}

function displayMembers(members) {
    $('#profiles').empty();
    members.forEach(function(member) {
        var profil = "";
        var img_root = " /lovifans.com/image/default.png";
        if(member.profil_pic != null) img_root = member.profil_pic;
        
        profil=`
        <div class="profile">
            <img src='${img_root}' alt='${member.pic_alt}'><a id='profile_name'>
            <p>${member.name}</p>
            <div class="buttons">
                <form id="friendRequestForm" method="post">
                    <input disabled hidden type="text" name="profile" id="profile" value="${member.profil_id}">
                    <button id="friendAdd" class="button">Add friend</button>
                    <hr style="border: 1px solid #ddd;margin:10px 0 10px 0">
                    <button class="button">Profile</button>
                </form>
            </div>
        </div>
        `;
        
        $('#profiles').append(profil);

    });
}

$(document).ready(function() {

    $("#friendAdd").click(function(event) {
        event.preventDefault(); 

        var profileId = $("#profile").val();

        $.ajax({
            url: r1 + 'pages/loged/friend_req.php', 
            method: 'POST',
            data: { profile: profileId },
            success: function() {
                console.log('Friend request sent successfully');
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error sending friend request:', errorThrown);

            }
        });
    });
});



//friends site

function fetchMessages() {
    var chatr = r1+'pages/loged/chat.php';
    $.ajax({
        url: chatr,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            displayMessages(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching messages:', errorThrown);
        }
    });
}

function displayMessages(messages) {
    $('#privmessages').empty();
    messages.forEach(function(message) {
        var name = $("#profile_name").text();
        var mes = "";
        var direction = "outgoing";
        var hide="hidden";
        if(name!=message.from){
            direction = "incoming";
            var hide="";
        }
        
        if(message.message.length >=  30 && !message.message.includes(" ")){
            mes=`
            <div class='mes ${direction}' style='line-break: anywhere;'>
                <img ${hide} src=" /lovifans.com/image/default.png" alt="">
                <div class='details'>
                    <p>${message.message}</p>
                </div>
            </div>
            `;
        }
        else{
            mes=`
            <div class='mes ${direction}'>
                <img ${hide} src=" /lovifans.com/image/default.png" alt="">
                <div class='details'>
                    <p>${message.message}</p>
                </div>
            </div>
            `;
        }
        
        $('#privmessages').append(mes);

    });
}
function textheight() {
    const rows = $("#message").val().split('\n').length;

    var formh = Math.min(rows, 5);

    $("#message").css("height", `${formh * 20}px`);
    $("#send_mes").css("height", `${formh * 20}px`);
}


function sendMessage() {
    var message = $('#message').val();
    var fileInput = document.getElementById('file'); // get the file input element


    var sendr = r1 + 'pages/loged/send.php';

    if (message || fileInput) {
        var formData = new FormData();
        if(message) formData.append('message', message);
        if(fileInput)    formData.append('file', fileInput);

        $.ajax({
            url: sendr,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                fetchMessages();
                $('#message').val('');
                // Optionally, clear the file input if needed
                $('#file').val('');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error sending message:', errorThrown);
            }
        });
    }
}


 