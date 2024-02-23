<?php
    if(!isset($_SESSION["uid"])) die("<script> alert('you didn\'t login'); window.location.herf='./index.php'</script>");
?>
<div class="prof sites">
    <a href="./pages/logout.php">Logout             </a> <br>
    <a href="./?page=passch">Change password        </a> <br>
    <a href="./?page=namech">Change name            </a> <br>
    <a href="./?page=profilch">Profil image Upload  </a> <br>
    
</div>



