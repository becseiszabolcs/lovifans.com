<?php
    session_start();
    include("$_SESSION[priv]/connect.php");
    if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");
       
    // Fetch messages from the database
    $sel = isset($_GET["sel"]) ? $_GET["sel"] : "";
    $end = isset($_GET["end"]) ? $_GET["end"] : 20;
    if(isset($_GET["search"]) ? $_GET["search"]!="" : false )   $query = "SELECT * FROM users where uid != $_SESSION[uid] and ustat like 'A%' and (uname like '%$_GET[search]%')";
    else                                                        $query = "SELECT * FROM users where uid != $_SESSION[uid] and ustat like 'A%' ";
    
    $result = mysqli_query($dbase,$query); //$dbase->query($query);

    $profil = [];
    if($result){
        while ($row = $result->fetch_assoc()) {
            if($row["icid"]){
                $fiid = mysqli_fetch_assoc(mysqli_query($dbase,"select fiid from fconnect where $row[icid] = fcid"))["fiid"];
                $pi = mysqli_fetch_assoc(mysqli_query($dbase,"select finname,fidate from files where $fiid = fiid")); 
                $day = explode(" ",$pi["fidate"])[0];
                $pic = "$_SESSION[priv]/uploads/image/$day/$pi[finname]";
            } else $pic = "$_SESSION[R1]/image/default.png";
    
            $name   = $row["uname"];
            $profil_id = $row["ustrid"];
            $stat   = $row["ustat"];
            $fstat = mysqli_fetch_assoc(mysqli_query($dbase,"select * from friends where ($_SESSION[uid] = uid and fuid = $row[uid]) or ($row[uid] = uid and fuid = $_SESSION[uid])"));
            if($fstat) {
                if($fstat["fstat"] == "D") {
                    if($fstat["uid"] == $_SESSION["uid"]) $fstat = "D1";
                    else                                  $fstat = "D2";
                } else $fstat = $fstat["fstat"];
            } 

            if($sel!=""){
                if($fstat){
                    if($sel=="request" && ($fstat=="D2"||$fstat=="D1")) $profil[] = ["name"=>$name,"profile_id"=> $profil_id, "profil_pic"=>$pic,"pic_alt"=>"$name's image", "stat"=>$stat, "fstat"=>$fstat];
                    else if($sel=="friends" && $fstat=="A") $profil[] = ["name"=>$name,"profile_id"=> $profil_id, "profil_pic"=>$pic,"pic_alt"=>"$name's image", "stat"=>$stat, "fstat"=>$fstat];
                    
                }else if($sel=="unknown") $profil[] = ["name"=>$name,"profile_id"=> $profil_id, "profil_pic"=>$pic,"pic_alt"=>"$name's image", "stat"=>$stat, "fstat"=>$fstat];
            } else $profil[] = ["name"=>$name,"profile_id"=> $profil_id, "profil_pic"=>$pic,"pic_alt"=>"$name's image", "stat"=>$stat, "fstat"=>$fstat];

            
        }
    }
    
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($profil);
    
    // Close the connection

    mysqli_close($dbase);