var r1 = 'http://localhost/lovifans.com/';

function apper(id,eye){
    var eye  = document.querySelector(eye);
    var pw = document.querySelector(id);
    
    if(eye.getAttribute("src") === " /lovifans.com/image/eye.png") {
        eye.setAttribute("src"," /lovifans.com/image/eye-off.png");
        pw.setAttribute("type","text");
    }
    else {
        eye.setAttribute("src"," /lovifans.com/image/eye.png"); 
        pw.setAttribute("type","password");
    }
    
}
var bool = false;
function showset(){
    if(!bool){
        $("#prof").append(`
            <div id="settings" onclick="showset()">
                <iframe src="${r1+"/settings/"}" frameborder="2"></iframe>
            </div>
        `);
        bool = true;
    }
    else{
        $("#settings").remove();
        bool = false;
    }

}

function passwordStrength( pw )
{
sp = lower = upper = num = something = 0;
for( i=0; i<pw.length; i++ )
{
    c = pw.charCodeAt(i)
    if( c>=48 && c<=57  )   num         =1 ;  else
    if( c>=65 && c<=90  )   upper       =1 ;  else
    if( c>=97 && c<=122 )   lower       =1 ;  else
                            something   =1 ;
}

if(num>0)       sp += 3;
if(upper>0)     sp += 3;
if(lower>0)     sp += 3;
if(something>0) sp += 3;
if(sp==2) sp=0;


result = Math.max( 0 , -6 + pw.length + lower + upper + num + something + sp);
//slide.innerHTML = linewidth( result );
linewidth( result );
}

function linewidth(n){
    var w = (n*(1/28*100))*2.5;
    var divall = document.getElementById("dpass").style;
    var divlin = document.getElementById("slide").style;
    var stext = document.getElementById("slidetext")
    var pw = document.getElementById("ptext1").value.length;
    

    cl='';
    if(pw>0) {
        cl='#A00';
        divall.backgroundColor = "rgba(0,0,0,0.75)"
        stext.innerHTML="weak password";
    }
    if(n>4) cl='#C00';
    if(n>8){
        cl='#FA0';
        stext.innerHTML="medium password"
    } 
    if(n>12) cl='#FF0';
    if(n>16) {
        cl='#8F0';
        stext.innerHTML="strong password";
    }
    if(n>20) cl='#0F0';
    if(n>24) cl='#0C0';
    if(n>28) cl='#0A0';
    if(w>250) w=250;
    if(pw<9 & n<3) w = 40; 
    
    if(pw==0) {
        w=250;
        divall.backgroundColor = "rgba(0,0,0,0)"
        stext.innerHTML="";
        
    }
    stext.style.color = cl;
    divlin.backgroundColor = cl;
    divlin.width = w+"px";
}

function isNotNumeric(str){
    var num = ['0','1','2','3','4','5','6','7','8','9']
    var yes = false;
    for(var i=0;i<str.length;i++){
        if(num.includes(str[i])) var yes = true;
    }
}

function greened(str){
    var p1 = document.getElementById("1").color
    if(isNotNumeric(str)) p1 = "green";
    dsubmit();
};
