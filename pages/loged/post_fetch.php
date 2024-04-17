<?php
session_start();
include("$_SESSION[priv]/connect.php");
if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");
$end = isset($_GET['end']) ? $_GET['end'] : 10;
$clientTimezone = isset($_GET['timezone']) ? $_GET['timezone'] : 'UTC';
    
// Fetch messages from the database
$query = "select * from post where pstat='A' order by pdate desc limit $end";
$result = mysqli_query($dbase,$query); //$dbase->query($query);
$posts=[];
if($result){
    while($post = $result->fetch_assoc()){
        $uid = $post["uid"];
        $user= mysqli_fetch_assoc(mysqli_query($dbase,"select uname,icid from users where uid=$uid"));
    
        $name="$user[uname]";
    
        if($user["icid"]!=NULL){
            $fiid = mysqli_fetch_assoc(mysqli_query($dbase,"select fiid from fconnect where $user[icid] = fcid"))["fiid"];
            $pi = mysqli_fetch_assoc(mysqli_query($dbase,"select finname,fidate from files where $fiid = fiid")); 
            $day = explode(" ",$pi["fidate"])[0];
            $profil_pic = "$_SESSION[files]type=$file[fitype]&date=$day&file=$file[finname]";
        }else  $profil_pic ="$_SESSION[R1]/image/default.png";
        
        $label = $post["plabel"];
        
        $photos_id = $post["fcid"]!=""&str_contains($post["fcid"],",")?explode(",",$post["fcid"]):array($post["fcid"]);
        if($photos_id){
            $files=[];
            //print_r($photos_id);
            foreach($photos_id as $id){
                if($id!=NULL){
                    //echo"$id ";
                    $fiid = mysqli_fetch_assoc(mysqli_query($dbase,"select fiid from fconnect where fcid=$id"))["fiid"];
                    $file = mysqli_fetch_assoc(mysqli_query($dbase,"select finname,fidate,fitype from files where fiid=$fiid and fistat='A'"));
                    $day  = explode(" ",$file["fidate"])[0];
                    $files[] = "$_SESSION[files]type=$file[fitype]&date=$day&file=$file[finname]";
                }
    
            }
            
        } else $files = [];
        //print_r($files);
    
    
        $eloz = $post["peloz"];
        $date = $post["pdate"];
        $posts[]=["name" => $name,"profil_picture"=>$profil_pic,"text"=>$label,'files'=>$files,'eloz'=>$eloz,'date'=>$date];
    }
    
        
        
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($posts);
        
    // Close the connection
    

}

mysqli_close($dbase);