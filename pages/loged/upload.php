<?php
include("./connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $supfiles = [["jpg","jpeg","png","svg","gif"],["mp4","mov","avi","wmv","AVCHD"],["mp3","aac","aiff","alac","m4a","dsd"],["pdf","txt","pptx","xlsx","docx"]]; 
    $ftypes = ["image","video","audio","docs"];
    $support = false;

    if(!empty($_FILES["fileInput"]["name"])){
        $fname = $_FILES["fileInput"]["name"];
        $ftype = $_FILES["fileInput"]["type"];
        $fext = explode(".",$fname)[1];
        $stype = "";
    
        for($i=0;$i<4;$i++){
            foreach($supfiles[$i] as $s) {
                if($s == $fext){
                    $support = true;
                    $stype = $ftypes[$i];
                    break;
                }
    
            }
        }

        if($support && $_FILES["fileInput"]["size"] <= 209715200){
             
            $path = "./uploads/" . $stype ."/". date("Y-m-d")."/";
            if(!is_dir($path)) mkdir($path); // Create the directory
    
            $message = $_POST["messageInput"];   
            $new_fname = date("His") .".".$fext;
            $uploadedFile = $path . $new_fname ;
            

            if(move_uploaded_file($_FILES['fileInput']['tmp_name'], $uploadedFile)){
                mysqli_query($dbase,"INSERT INTO  file  ( file_id ,  origin ,  nname ,  ftype ,  date ) VALUES (NULL, '$fname', '$new_fname', '$stype', current_timestamp())");
                $fid = mysqli_insert_id($dbase);
                mysqli_query($dbase,"INSERT INTO  file_connect  ( fcid ,  file_id ) VALUES (NULL, $fid)");
                $fcid = mysqli_insert_id($dbase);
    
                if($message =="") $message=NULL;
                mysqli_query($dbase,"INSERT INTO  post  ( pid ,  message ,  fcid, date ) VALUES (NULL, '$message', $fcid,current_timestamp())");

            } 
            else echo "uploading error";

            
            /*
            if (move_uploaded_file($_FILES['fileInput']['tmp_name'], $uploadedFile)) {
                $message = $_POST['messageInput'];
                if($_POST['messageInput'] !="") echo"<p>Message: $message </p>";
    
                if($stype=="image") echo "<img src='$uploadedFile' style='height: 40%; width: 40%'>";
    
                else if($stype=="video"){
                     print "
                        <video height= 300px width= 340px controls>
                            <source src='$uploadedFile'>
                        </video>
                    ";
                }
                else if($stype=="docs") echo "<a download herf='$uploadedFile'><img src='docs.png' style='height: 90px; width: 90px'></a>";
                else if($stype=="audio"){
                    print "
                        <audio width='300' height='30%' controls>
                            <source src='$uploadedFile'>
                        </audio>
                    ";
                }
                    
    
            } else echo"error uplaoding file";
            */
        }

    }
    mysqli_query($dbase,"INSERT INTO  post  ( pid,  message,  fcid, date ) VALUES (NULL, '$message', null,current_timestamp())");

}

mysqli_close($dbase);

?>
