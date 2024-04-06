<?php
session_start();
include("$_SESSION[priv]/connect.php");
if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");

$clientTimezone = isset($_GET['timezone']) ? $_GET['timezone'] : 'UTC';
    
// Fetch messages from the database
$query = "select * from post where pstat='A'";
$result = mysqli_query($dbase,$query); //$dbase->query($query);
$posts=[];
while($post = $result->fetch_assoc()){
    $uid = $post["uid"];
    $user= mysqli_fetch_assoc(mysqli_query($dbase,"select uname,icid from users where uid=$uid"));

    $name="$user[uname]";

    if($user["icid"]!=NULL){
        $fiid = mysqli_fetch_assoc(mysqli_query($dbase,"select fiid from fconnect where fcid=$user[icid]"))["fiid"];
        $file = mysqli_fetch_assoc(mysqli_query($dbase,"select finname,fidate from files where fiid=$fiid and fistat='A' and fitype='image'"));
        if($file) $profil_pic = "$_SESSION[priv]/uploads/image/".explode(" ",$file["fidate"])[1] ."/$file[finname]";
        else      $profil_pic = "/lovifans.com/image/default.png";

    }else  $profil_pic =NULL;
    
    $label = $post["plabel"];

    $photos_id = $post["fcid"]!=""?explode(",",$post["fcid"]):NULL;
    if($photos_id){
        $files=[];
        foreach($photos_id as $id){
            $fiid = mysqli_fetch_assoc(mysqli_query($dbase,"select fiid from fconnect where fcid=$id"))["fiid"];
            $file = mysqli_fetch_assoc(mysqli_query($dbase,"select finname,fidate from files where fiid=$fiid and fistat='A' and fitype='image'"));
            if($file) $files[] = "$_SESSION[priv]/uploads/image/".explode(" ",$file["fidate"])[0] ."/$file[finname]";
        }
    } else $files = NULL;


    $eloz = $post["peloz"];
    $date = $post["pdate"];
    $posts[]=["name" => $name,"profil_picture"=>$profil_pic,"text"=>$label,'files'=>$files,'eloz'=>$eloz,'date'=>$date];
}

    
    
// Return JSON response
header('Content-Type: application/json');
echo json_encode($posts);
    
// Close the connection

mysqli_close($dbase);