
<div class="wrapper login">
    <div class="form-box">
        <h1>Login</h1>
        <form id="loginForm">
            <span  class="error d-done" id="error"></span>
            <input type="text" name="uname" placeholder=" email or username" class="text"><br>

            <input type="password" name="upass" placeholder=" password"class="text" id="ptext">
            <a class="aeye" onclick="apper('#ptext','#eye')">
                <img class="eye" id="eye"  src=" <?=$_SESSION['R1']?>/image/eye.png" alt="">
            </a><br>
    
            <input type="submit" value="Login" class="sub" ><br><br><br>
            <div class="spanbox">
                <span>Don't have an account? </span><a href=" <?=$_SESSION['R1']?>/signup">Sign Up</a>
                <a href=" <?=$_SESSION['R1']?>/send-password-reset">Forgot password?</a>
            </div>
            
        </form>
        
    </div>
</div>

<script>
$(document).ready(function(){
    $("#loginForm").on("submit", function(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "<?=$_SESSION['R1']?>/pages/unloged/login_ir.php",
            data: $(this).serialize()
        }).done(function(res){
            let data = JSON.parse(res);

            if("error" in data){
                $("#error").removeClass('d-done').html(data.error);
            }
            else if("token" in data){
                localStorage.setItem('token', data.token);
                $("#successMessage").removeClass('d-done').html("Login successful. Redirecting...");
                setTimeout(function(){
                    window.location.href = "<?$_SESSION['R1']?>/";
                }, 10); 
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            $("#error").removeClass('d-done').html("There was an error in login: " + errorThrown);ű
        });
    });
});

</script>