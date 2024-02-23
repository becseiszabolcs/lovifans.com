var r1 = 'http://localhost/lovifans.com/';

//find site

function fetchMembers() {
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
                <img ${hide} src="./image/default.png" alt="">
                <div class='details'>
                    <p>${message.message}</p>
                </div>
            </div>
            `;
        }
        else{
            mes=`
            <div class='mes ${direction}'>
                <img ${hide} src="./image/default.png" alt="">
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
    var file = $("#file").val();
    var sendr = r1+'pages/loged/send.php';
    if ( message) {
        $.ajax({
            url: sendr, // Create this file to handle message sending
            method: 'POST',
            data: { message: message , file: file},
            success: function() {
                fetchMessages(); // Refresh messages after sending
                $('#message').val(''); // Clear the input field
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error sending message:', errorThrown);
            }
        });
    }
}

 