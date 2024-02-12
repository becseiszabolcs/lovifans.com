function apper(id,eye){
    var eye  = document.querySelector(eye);
    var pw = document.querySelector(id);
    
    if(eye.getAttribute("src") === "./image/eye.png") {
        eye.setAttribute("src","./image/eye-off.png");
        pw.setAttribute("type","text");
    }
    else {
        eye.setAttribute("src","./image/eye.png"); 
        pw.setAttribute("type","password");
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

function dsubmit(){
    var sub = document.getElementById("signup").disabled
    var p1 = document.getElementById("1").color == "green";
    var p2 = document.getElementById("2").color == "green";
    var p3 = document.getElementById("3").color == "green";
    var p4 = document.getElementById("4").color == "green";

    if(p1 & p2 & p3 & p4){
        sub = false;
    }
    else{
        sub = true;
    }
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
