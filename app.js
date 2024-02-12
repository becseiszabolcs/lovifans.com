$(function(){

  
});

var r1 = 'http://localhost/lovifans.com/'
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
        $('#privmessages').append(`
        <div class='mes outgoing'>
            <div class='details'>${message.message}</div>
        </div>
        `);
    });
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
 