var r1 = 'http://localhost/lovifans.com/';

//find site

function fetchMembers(sel,search) {

    if(search!="") var chatr = r1+`pages/loged/find_fetch.php?search=${search}`;
    else var chatr = r1+`pages/loged/find_fetch.php`;
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
function fetchfriends(soup,search=""){
    if(search!="") var chatr = r1+`pages/loged/friend_fetch.php?timezone=${encodeURIComponent(Intl.DateTimeFormat().resolvedOptions().timeZone)}&search=${search}`;
    else var chatr = r1+`pages/loged/friend_fetch.php?timezone=${encodeURIComponent(Intl.DateTimeFormat().resolvedOptions().timeZone)}`;
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



//post site
window.plist = [];


function fiprevius(post){
    
    for(var i = 0; i < window.plist.length; i++){

        if(post == window.plist[i][0] && window.plist[i][0] != 0){
            $(`#${post}fi${window.plist[i][1]}`).removeClass('sel');
            $(`#${post}fi${window.plist[i][1]-1}`).addClass('sel');
            window.plist[i][1] = window.plist[i][1] - 1;
            break;

        }
    }
    
}

function finext(post){

    for(var i = 0; i < window.plist.length; i++){
        if(post == window.plist[i][0] && window.plist[i][0] != window.plist.length-1){
            $(`#${post}fi${window.plist[i][1]}`).removeClass('sel');
            $(`#${post}fi${window.plist[i][1]+1}`).addClass('sel');
            window.plist[i][1] = window.plist[i][1] + 1;
            break;

        }
    }
    
}

function post_fetch(soup=""){
    var addsoup ="";
    if(soup!="") addsoup = "&soup="+soup;
    
    var chatr = r1+`pages/loged/post_fetch.php?timezone=${encodeURIComponent(Intl.DateTimeFormat().resolvedOptions().timeZone)}`+addsoup;
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


function displaypost(posts){
    var h="/lovifans.com/image/default.png";
    $("#posts").html('');
    indexbtn ="";
    var bool =true;
    //if(typeof window.plist === 'undefined') 
    
    pid = 0;
    posts.forEach(function(post){
        fi="";
        
        

        if(post.files!=[]){
            var Files = "";
            pname = `#post${pid}`;
            var id = 0;
            var d=0;
            post.files.forEach(function(f){
                
                
                if(window.plist.length>0){
                    for(var i = 0; i < window.plist.length; i++){
                        if(pname == window.plist[i][0] && window.plist[i][0] != window.plist.length-1){
                            d = window.plist[i][1];
                        }
                    }
                }
                if(id == d) Files += `<img id='#post${pid}fi${id}' src='${f}' class="sel">`;
                else Files += `<img id='#post${pid}fi${id}' src='${f}'>`;
                d=0;
                id++;
            });
            fi=`            
            <div class="postimg">
                
                ${Files}

            </div>
            <hr style="border: 2px solid #ddd; width:100%; border-radius:2px;">`;
            if(id==0){
                fi="";

            }
            if(id>1){
                indexbtn = `
                <button onclick="fiprevius('post${pid}');" class="indexbtn">\<</button>
                
                <button onclick="finext('post${pid}');" class="indexbtn">\></button>
                `;
                
                window.plist.forEach(function(p){
                    if(p[0] == `post${id}`) {
                        bool=false;
                        return false;
                    }
                });
                if(bool) window.plist.push([`post${id}`,0]);
            }else indexbtn = "";
        }
        
        var post_blueprint =`
            <div class="post">
            <div class="header">
                <img src="${post.profil_picture}" alt="profil image" id="profimg">
                <h1 class="profilname_post">
                    ${post.name}
                </h1>
            </div>
            ${indexbtn}
            <hr style="border: 2px solid #ddd; width:100%; border-radius:2px;">
            <p id="postmess">
                    ${post.text}
            </p>
            ${fi}
            
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
    $("#posts").append(post_blueprint);
    pid++;
    
    });

    
    
}




 