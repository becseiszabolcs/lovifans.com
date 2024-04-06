var r1 = 'http://localhost/lovifans.com/';

//find site

function fetchMembers(sel,search) {
    var chatr = r1+'pages/loged/find_fetch.php';
    $.ajax({
        url: chatr,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            displayMembers(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching members:', errorThrown);
        }
    });
}

function displayMembers(members) {
    $('#profiles').empty();
    var id = 0; 
    members.forEach(function(member) {
        var profil = "";
        var img_root = "/lovifans.com/image/default.png";
        if(member.profil_pic != null) img_root = member.profil_pic;
        if(member.fstat==null | member.fstat =="I"){
            profil=`
            <div class="profile">
                <img src='${img_root}' alt='${member.pic_alt}'><a id='profile_name'>
                <p>${member.name}</p>
                <div class="buttons">
                    <form id="friendRequest${id}"  method="post">
                        <input disable hidden type="text" name="profile" id="profile${id}" value="${member.profile_id}">
                        <button onclick="addFriend(${id})" id="friendAdd${id}" class="button">send friend request</button>
                        <hr style="border: 1px solid #ddd;margin:10px 0 10px 0">
                        <button onclick="window.location.href = ${r1}profile/${member.name}/${member.profile_id}" class="button">Profile</button>
                    </form>
                </div>
            </div>
            `;
        } else if(member.fstat=="D1"){
            profil=`
            <div class="profile">
                <img src='${img_root}' alt='${member.pic_alt}'><a id='profile_name'>
                <p>${member.name}</p>
                <div class="buttons">
                    <form id="friendRequest${id}"  method="post">
                        <input disable hidden type="text" name="profile" id="profile${id}" value="${member.profile_id}">
                        <button onclick="addFriend(${id})" id="friendAdd${id}" class="button">cancel request</button>
                        <hr style="border: 1px solid #ddd;margin:10px 0 10px 0">
                        <button onclick="window.location.href = '${r1}profile/${member.name}/${member.profile_id}'" class="button">Profile</button>
                    </form>
                </div>
            </div>
            `;
        } else if(member.fstat=="D2"){
            profil=`
            <div class="profile">
                <img src='${img_root}' alt='${member.pic_alt}'><a id='profile_name'>
                <p>${member.name}</p>
                <div class="buttons">
                
                    <form id="friendRequest${id}"  method="post">
                        <input disable hidden type="text" name="profile" id="profile${id}" value="${member.profile_id}">
                        <button onclick="addFriend(${id})" id="friendAdd${id}" class="button">accept friend request</button>
                        <hr style="border: 1px solid #ddd;margin:10px 0 10px 0">
                        <button onclick="window.location.href = '${r1}profile/${member.name}/${member.profile_id}'" class="button">Profile</button>
                    </form>
                </div>
            </div>
            `;
        } else if(member.fstat=="A"){
            profil=`
            <div class="profile">
                <img src='${img_root}' alt='${member.pic_alt}'><a id='profile_name'>
                <p>${member.name}</p>
                <div class="buttons">
                    <form id="friendRequest${id}"  method="post">
                        <input disable hidden type="text" name="profile" id="profile${id}" value="${member.profile_id}">
                        <button onclick="addFriend(${id})" id="friendAdd${id}" class="button">Delete friend</button>
                        <hr style="border: 1px solid #ddd;margin:10px 0 10px 0">
                        <button onclick="window.location.href = '${r1}profile/${member.name}/${member.profile_id}'" class="button">Profile</button>
                    </form>
                </div>
            </div>
            `;

        }else profil="";


        
        $(`#profiles`).append(profil);
        id++;
    });

}


function addFriend(id) {

    var profil = $(`#profile${id}`).val();
    var reqr = r1+'pages/loged/friend_req.php';
    var reqData = new FormData();

    if(profil){
        reqData.append('profile', profil);

        $.ajax({
            url: reqr,
            method: 'POST',
            data: reqData,
            processData: false,
            contentType: false,
            success: function (data){},
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error in request process');
            }
        });
    }
}   

//friends site
function fetchfriends(soup){
    var chatr = r1+`pages/loged/friend_fetch.php?timezone=${encodeURIComponent(Intl.DateTimeFormat().resolvedOptions().timeZone)}`;
    $.ajax({
        url: chatr,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            displayfriends(data,soup);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching messages:', errorThrown);
        }
    });
}
function displayfriends(friends,soup) {
    $('#friendslist').empty();
    var head=`
        <img src=" /lovifans.com/image/default.png" alt="">
        <span></span>
    `;
    $('#header').html(head);
    friends.forEach(function(friend) {
        var fri = "";

        if(soup != "" & soup == friend.id) {
            head=`
                <img src="${friend.profil_pic}" alt="${friend.name} is picture">
                <span>${friend.name}<br><p>${friend.from_last_log}</p></span>
            `;
            $('#header').html(head);
        } 
        
        fri=`        
            <a href="${friend.url}" class='friprofile'>
                <div class="content">
                    <img src="${friend.profil_pic}" alt="${friend.name} is picture">
                    <div class="details">
                        <span>${friend.name}</span>
                        <p>${friend.lmes}</p>
                    </div>
                </div>

                <span>${friend.stat}</span>
            </a>`;
        
        $('#friendslist').append(fri);

    });
}


function fetchMessages(soup) {
    var chatr = r1+`pages/loged/chat.php?id=${soup}`;
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
    var soup = $('#soup').val();
    if(soup!=","){
        var message = $('#message').val();
        var fileInput = document.getElementById('file'); // get the file input element


        var sendr = r1 + 'pages/loged/send.php';

        if (message || fileInput) {
            var formData = new FormData();
            if(message)   formData.append('message', message);
            if(fileInput) formData.append('file', fileInput);
            if(soup)      formData.append('soup', soup);

            $.ajax({
                url: sendr,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function () {
                    fetchMessages();
                    $('#message').val('');
                    $('#file').val('');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error sending message:', errorThrown);
                }
            });
        }
        
    }
    
}
//post site
function post_fetch(){
    var chatr = r1+`pages/loged/post_fetch.php?timezone=${encodeURIComponent(Intl.DateTimeFormat().resolvedOptions().timeZone)}`;
    $.ajax({
        url: chatr,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            displaypost(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching messages:', errorThrown);
        }
    });
    
}
function displaypost(data){
    var h="/lovifans.com/image/default.png";
    

    var post =`
            <div class="post">
            <div class="header">
                <img src="${data.profil_picture}" alt="profil image" id="profimg">
                <h1 class="profilname_post">
                    ${data.name}
                </h1>
            </div>
            <hr style="border: 2px solid #ddd; width:100%; border-radius:2px;">
            <p id="postmess">
                    ${data.text}
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
    `;

}



 