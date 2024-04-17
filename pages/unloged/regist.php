<div class="wrapper signup">
    <div class="form-box">
        <h1>Sign Up</h1>
        <form action=" <?=$_SESSION['R1']?>/pages/unloged/regin_ir.php" method="post">
            
            <input type="text" name="uname" class="text" placeholder="username" id="uname" ><br>
            <input type="email" name="umail" class="text" placeholder="email" id="email"><br>

            <div id="dpass">
                <input type="password" name="upass1" class="text" id="ptext1" placeholder=" password" onkeyup="passwordStrength(this.value);">
                <a class="aeye" id="eyea" onclick="apper('#ptext1','#eye1')">
                    <img class="eye" id="eye1"  src=" <?=$_SESSION['R1']?>/image/eye.png" alt="">
                </a><br>
                
                <div id="slidetext"></div>
                <div id="slide"></div>
                
            </div>

            <input type="password" name="upass2" class="text" id="ptext2" placeholder=" repeat password">
            <a class="aeye" id="eyeb" onclick="apper('#ptext2','#eye2')">
                <img class="eye" id="eye2"  src=" <?=$_SESSION['R1']?>/image/eye.png" alt="">
            </a><br>

            <input disabled type="submit" value="Sign Up" class="sub" id="signup"><br><br>
            <div id="conditions">
                <p id="1">The username must contains<br>letters and it had to be 8 characters.</p>
                <p id="2">The password must be at least 8 characters long.</p>
                <p id="3">Password must contains letters and numbers.</p>
                <p id="4">Passwords must match and all fields must be filled.</p>
                <p id="check"><span ><input type="checkbox" name="" id="accepted"> by checked this you accept our <br><a>Terms Services</a> and <a>Privacy Policy</a>.</span></p>
                
            </div>
            <div class="spanbox">
            <span>Have you registered yet? </span><a href="<?=$_SESSION['R1']?>">Log in</a><br>
            </div>
            
        </form>
    </div>
</div>

<script>

    $(document).ready(function(){
        $("#uname").on('input', function(){
            var regex = /[a-zA-Z]/;
            var str = /[a-zA-Z]/;
            var num = /\d/;

            if($("#uname").val()!='' & $("#uname").val().length>7 & regex.test($("#uname").val())) {
                $("#1").css("color","lightgreen");
                $("#1").css("border-color","lightgreen");
                $("#1").css("background-color","rgba(0, 140, 0, 0.75)");

            }
            else{
                $("#1").css("color","red");
                $("#1").css("border-color","red");
                $("#1").css("background-color","rgba(140, 0, 0, 0.75)");
            }
            if((($('#accepted').is(':checked') & $("#ptext1").val()!='' & $("#ptext2").val()!='' & $("#uname").val()!='' & $("#email").val()!='') & $("#ptext2").val() == $("#ptext1").val()) & (str.test($("#ptext1").val()) & num.test($("#ptext1").val())) & ($("#ptext1").val().length>7 ) & ($("#uname").val().length>7 & regex.test($("#uname").val()))){
            $("#signup").prop('disabled',false);
            } else $("#signup").prop('disabled',true);
        });
        $("#ptext1").on('input', function(){
            var regex = /[a-zA-Z]/;
            var str = /[a-zA-Z]/;
            var num = /\d/;

            if($("#ptext1").val()!='' & $("#ptext1").val().length>7 ) {
                $("#2").css("color","lightgreen");
                $("#2").css("border-color","lightgreen");
                $("#2").css("background-color","rgba(0, 140, 0, 0.75)");
            }
            else{
                $("#2").css("color","red");
                $("#2").css("border-color","red");
                $("#2").css("background-color","rgba(140, 0, 0, 0.75)");
            }

            if($("#ptext1").val()!='' & str.test($("#ptext1").val()) & num.test($("#ptext1").val())) {
                $("#3").css("color","lightgreen");
                $("#3").css("border-color","lightgreen");
                $("#3").css("background-color","rgba(0, 140, 0, 0.75)");
            }
            else{
                $("#3").css("color","red");
                $("#3").css("border-color","red");
                $("#3").css("background-color","rgba(140, 0, 0, 0.75)");
            }
            if(($("#ptext1").val()!='' & $("#ptext2").val()!='' & $("#uname").val()!='' & $("#email").val()!='') & $("#ptext2").val() == $("#ptext1").val()) {
                $("#4").css("color","lightgreen");
                $("#4").css("border-color","lightgreen");
                $("#4").css("background-color","rgba(0, 140, 0, 0.75)");
            }
            else{
                $("#4").css("color","red");
                $("#4").css("border-color","red");
                $("#4").css("background-color","rgba(140, 0, 0, 0.75)");
            }
            if((($('#accepted').is(':checked') & $("#ptext1").val()!='' & $("#ptext2").val()!='' & $("#uname").val()!='' & $("#email").val()!='') & $("#ptext2").val() == $("#ptext1").val()) & (str.test($("#ptext1").val()) & num.test($("#ptext1").val())) & ($("#ptext1").val().length>7 ) & ($("#uname").val().length>7 & regex.test($("#uname").val()))){
            $("#signup").prop('disabled',false);
            } else $("#signup").prop('disabled',true);
        });
        $("#email").on('input', function(){
            var regex = /[a-zA-Z]/;
            var str = /[a-zA-Z]/;
            var num = /\d/;

            if(($("#ptext1").val()!='' & $("#ptext2").val()!='' & $("#uname").val()!='' & $("#email").val()!='') & $("#ptext2").val() == $("#ptext1").val()) {
                $("#4").css("color","lightgreen");
                $("#4").css("border-color","lightgreen");
                $("#4").css("background-color","rgba(0, 140, 0, 0.75)");
            }
            else{
                $("#4").css("color","red");
                $("#4").css("border-color","red");
                $("#4").css("background-color","rgba(140, 0, 0, 0.75)");
            }
            if((($('#accepted').is(':checked') & $("#ptext1").val()!='' & $("#ptext2").val()!='' & $("#uname").val()!='' & $("#email").val()!='') & $("#ptext2").val() == $("#ptext1").val()) & (str.test($("#ptext1").val()) & num.test($("#ptext1").val())) & ($("#ptext1").val().length>7 ) & ($("#uname").val().length>7 & regex.test($("#uname").val()))){
            $("#signup").prop('disabled',false);
            } else $("#signup").prop('disabled',true);
        });
        $("#ptext2").on('input', function(){
            var regex = /[a-zA-Z]/;
            var str = /[a-zA-Z]/;
            var num = /\d/;

            if(($("#ptext1").val()!='' & $("#ptext2").val()!='' & $("#uname").val()!='' & $("#email").val()!='') & $("#ptext2").val() == $("#ptext1").val()) {
                $("#4").css("color","lightgreen");
                $("#4").css("border-color","lightgreen");
                $("#4").css("background-color","rgba(0, 140, 0, 0.75)");
            }
            else{
                $("#4").css("color","red");
                $("#4").css("border-color","red");
                $("#4").css("background-color","rgba(140, 0, 0, 0.75)");
            }
            if((($('#accepted').is(':checked') & $("#ptext1").val()!='' & $("#ptext2").val()!='' & $("#uname").val()!='' & $("#email").val()!='') & $("#ptext2").val() == $("#ptext1").val()) & (str.test($("#ptext1").val()) & num.test($("#ptext1").val())) & ($("#ptext1").val().length>7 ) & ($("#uname").val().length>7 & regex.test($("#uname").val()))){
            $("#signup").prop('disabled',false);
            } else $("#signup").prop('disabled',true);
        });
        $("#accepted").on('input',function(){
            var regex = /[a-zA-Z]/;
            var str = /[a-zA-Z]/;
            var num = /\d/;

            if($('#accepted').is(':checked')) $('#check').css('border-color','lightgreen');
            else                              $('#check').css('border-color','red');

            if((($('#accepted').is(':checked') & $("#ptext1").val()!='' & $("#ptext2").val()!='' & $("#uname").val()!='' & $("#email").val()!='') & $("#ptext2").val() == $("#ptext1").val()) & (str.test($("#ptext1").val()) & num.test($("#ptext1").val())) & ($("#ptext1").val().length>7 ) & ($("#uname").val().length>7 & regex.test($("#uname").val()))){
            $("#signup").prop('disabled',false);
            } else $("#signup").prop('disabled',true);
        })
        




    });



    

</script>


