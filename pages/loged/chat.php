<?php
    session_start();
    if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");
    include("../../connect.php");
    //    
    // Fetch messages from the database
    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    $query = "SELECT * FROM message where (ustrid='$_SESSION[ustrid]' or  mtostrid='$_SESSION[ustrid]') and (ustrid='$id' or  mtostrid='$id') ORDER BY  mdate DESC";
    $result = mysqli_query($dbase,$query); //$dbase->query($query);

    
    
    $mes = [];

    while ($row = $result->fetch_assoc()) {
        $from = mysqli_fetch_array(mysqli_query($dbase,"SELECT uname FROM `users` WHERE uid=$row[uid]"));
        $to = mysqli_fetch_array(mysqli_query($dbase,"SELECT uname FROM `users` WHERE uid=$row[mtoid]"));
        //$image = mysqli_fetch_array(mysqli_query($dbase,"SELECT iid FROM `imgconnect` WHERE icid=$row[icid]"));
        

        $name   = $from["uname"];
        $toname = $to["uname"];
        $pic    = $row["icid"];
        $label  = $row["mlabel"];
        $stat   = $row["mstat"];
        $eloz   = $row["meloz"];
        $date   = $row["mdate"];


        $mes[] = ["from"=>$name, "to"=> $toname, "message"=>$label, "picture"=>$pic, "eloz"=>$eloz, "stat"=>$stat, "date"=>$date];
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($mes);
    
    // Close the connection

    mysqli_close($dbase);
