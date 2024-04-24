var r1 = 'http://localhost/lovifans.com';

//find site

function fetchMembers(sel="",end=20,search) {

    var chatr = r1+`/pages/loged/find_fetch.php?sel=${sel}&end=${end}&search=${search}`;
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
        var img_root = r1 + "/image/default.png";
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
    var reqr = r1 + '/pages/loged/friend_req.php';
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
function fetchfriends(soup,end=10,search=""){
    if(search!="") var chatr = r1+`/pages/loged/friend_fetch.php?end=${end}&timezone=${encodeURIComponent(Intl.DateTimeFormat().resolvedOptions().timeZone)}&search=${search}`;
    else var chatr = r1+`/pages/loged/friend_fetch.php?end=${end}&timezone=${encodeURIComponent(Intl.DateTimeFormat().resolvedOptions().timeZone)}`;
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
    //if(soup!="") setTimeout(fetchfriends,1000,soup,search);
}
function displayfriends(friends,soup) {
    
    if($('#friendslist')=="") $('#friendslist').html(` <a href='${r1}/finding' class='friprofile'>Search for friends</a>`);
    else $('#friendslist').empty();
    var head=`
        <img src=" ${r1}/image/default.png" alt="">
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


function fetchMessages(soup,end=15) {
    var chatr = r1+`/pages/loged/chat.php?id=${soup}&end=${end}`;
    $.ajax({
        url: chatr,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            displayMessages(data,soup);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching messages:', errorThrown);
        }
    });
    //if(soup!="") setTimeout(fetchMessages,1000,soup,end);
}

function displayMessages(messages,soup) {
    if(soup==""){
        $('#privmessages').html('<p>select someone to chat whit</p>');
    } else $('#privmessages').html('');
    
    

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
                <img ${hide} src="${message.profpic}" alt="">
                <div class='details'>
                    <p>${message.message}</p>
                </div>
            </div>
            `;
        }
        else{
            mes=`
            <div class='mes ${direction}'>
                <img ${hide} src="${message.profpic}" alt="">
                <div class='details'>
                    <p>${message.message}</p>
                </div>
            </div>
            `;
        }
        
        $('#privmessages').append(mes);
        if(soup=="") $('#privmessages').append('<p>select someone to chat whit</p>');
        
        
    });
}
function textheight() {
    const rows = $("#message").val().split('\n').length;

    var formh = Math.min(rows, 5);

    $("#message").css("height", `${formh * 20}px`);
    $("#send_mes").css("height", `${formh * 20}px`);
}
function sendMessage(){
            
    var sendr = r1 + '/pages/loged/send.php';

    var filein = document.getElementById('file');
    var formData = new FormData();
    var xhr = new XMLHttpRequest();
    if(window.selfiles) {
        var filelist = window.selfiles;
        if(filelist.length>0){
            for(var file of filelist){
                formData.append("files[]",file);

            }
        }
    }
    if($("#message").val()!=""){
        formData.append("message",$("#message").val());             
        if(soup)      formData.append('soup', $("#soup").val());
        
    }
    xhr.open("post",sendr);
    xhr.send(formData);
    window.selfiles = [];
    $("#message").val('');

}



//post site
window.plist = [];


function fiprevius(post){

    
    for(var i = 0; i < window.plist.length; i++){

        if(post == window.plist[i][0]){
            
            if(window.plist[i][2] > 0){
                $(`#${post}fi${window.plist[i][2]}`).removeClass('sel');
                $(`#${post}fi${window.plist[i][2]-1}`).addClass('sel');
                window.plist[i][2] = window.plist[i][2] - 1;
                console.log(`#${post}fi${window.plist[i][2]}`);
               
            }
            break;
        }
    }
    
    
}

function finext(post){
    
    
    for(var i = 0; i < window.plist.length; i++){

        if(post == window.plist[i][0]){
            if(window.plist[i][1]-1 > window.plist[i][2]){
                $(`#${post}fi${window.plist[i][2]}`).removeClass('sel');
                $(`#${post}fi${window.plist[i][2]+1}`).addClass('sel');
                window.plist[i][2] = window.plist[i][2] + 1;
                console.log(`#${post}fi${window.plist[i][2]}`);
                
            }
            break;
        }
    }
    
}

function post_fetch(end=10,soup=""){
    var addsoup ="";
    if(soup!="") addsoup = "&soup="+soup;
    
    var chatr = r1+`/pages/loged/post_fetch.php?end=${end}&timezone=${encodeURIComponent(Intl.DateTimeFormat().resolvedOptions().timeZone)}`+addsoup;
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

    //setTimeout(post_fetch,2000,soup);

    
}


function displaypost(posts){
    var h= r1 + "/image/default.png";
    $("#posts").html("");



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
                            d = window.plist[i][2];
                        }
                    }
                }
                if(id == d) Files += `<img id='post${pid}fi${id}' src='${f}' class="sel">`;
                else Files += `<img id='post${pid}fi${id}' src='${f}'>`;
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
                if(bool) window.plist.push([`post${pid}`,post.files.length,0]);
            }else indexbtn = "";
        }
        
        var post_blueprint =`
            <div class="post" id="post${pid}">
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




 