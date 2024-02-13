<?php
    session_start();
    include("../../connect.php");
    
    if ($dbase->connect_error) {
        die("Connection failed: " . $dbase->connect_error);
    }
    
    // Fetch messages from the database
    $query = "SELECT * FROM message where (uid = $_SESSION[uid] and ustrid='$_SESSION[ustrid]' ) or (mtoid=$_SESSION[uid] and mtostrid='$_SESSION[ustrid]') ORDER BY mdate;";
    $result = mysqli_query($dbase,$query); //$dbase->query($query);

    
    $mes = [];
    while ($row = $result->fetch_assoc()) {
        $from = mysqli_fetch_array(mysqli_query($dbase,"SELECT uname FROM `users` WHERE uid=$row[uid]"));
        $to = mysqli_fetch_array(mysqli_query($dbase,"SELECT uname FROM `users` WHERE uid=$row[mtoid]"));
        //$image = mysqli_fetch_array(mysqli_query($dbase,"SELECT iid FROM `imgconnect` WHERE icid=$row[icid]"));

        $name = $from["uname"];
        $toname = $to["uname"];
        $pic = $row["icid"];
        $label = $row["mlabel"];
        $stat = $row["mstat"];
        $eloz = $row["meloz"];
        $date = $row["mdate"];


        $mes[] = ["from"=>$name, "to"=> $toname, "message"=>$label, "picture"=>$pic, "eloz"=>$eloz, "stat"=>$stat, "date"=>$date];
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($mes);
    
    // Close the connection

    mysqli_close($dbase);
?>