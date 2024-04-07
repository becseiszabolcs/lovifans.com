
<?
session_start();
if(!isset($_SESSION["uid"])) header("Location: http://localhost/lovifans.com");;
?>
<div class="settings">
    <div class="header">
        <nav class ='navigation'>
            <a class="setlink"  href='<?=$_SESSION['R1']?>/settings/'            >Account       </a>
            <a class="setlink"  href='<?=$_SESSION['R1']?>/settings/?p=security' >Security      </a>  
            <a class="setlink"  href='<?=$_SESSION['R1']?>/settings/?p=data'     >Data          </a> 
                            
        </nav>
    </div>
    <?php
        $p = isset($_GET['p']) ? $_GET['p'] : "";
        if($p=="")              include("./pages/loged/settings/details.php");
        else if($p=="data")     include("./pages/loged/settings/data.php");
        else if($p=="image")    include("./pages/loged/settings/images.php");
        else if($p=="security") include("./pages/loged/settings/secu.php");
    ?>
    <script>
        $("#first_header").remove();
    </script>
</div>



