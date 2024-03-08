<?php
    session_start();
    include("../../connect.php");
       
    // Fetch messages from the database
    if(isset($_GET["search"])) $query = "SELECT * FROM users where uid != $_SESSION[uid] and ustat like 'A%' and (uname like '%$_GET[search]%' or )";
    else $query = "SELECT * FROM users where uid != $_SESSION[uid] and ustat like 'A%' ";

    
    $result = mysqli_query($dbase,$query); //$dbase->query($query);

    $profil = [];
    while ($row = $result->fetch_assoc()) {
        if($row["icid"]){
            $image = mysqli_fetch_row(mysqli_query($dbase,"SELECT iid FROM `imgconnect` WHERE icid=$row[icid]"));
            $pic_image = mysqli_fetch_row(mysqli_query($dbase,"SELECT iid FROM `image` WHERE iid=$image[iid] istat = 'A' order by date desc"));
            if($pic){
                $pic = "./uploads/$pic_image[inname]";
            }
            else{
                $pic = NULL;
            }
        } $pic = $row["icid"];

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

        $profil[] = ["name"=>$name,"profile_id"=> $profil_id, "profil_pic"=>$pic,"pic_alt"=>"$name's image", "stat"=>$stat, "fstat"=>$fstat];
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($profil);
    
    // Close the connection

    mysqli_close($dbase);