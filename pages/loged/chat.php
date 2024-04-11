<?php
    session_start();
    if(!isset($_SESSION["uid"])) header("Location: $_SESSION[R1]");
    include("$_SESSION[priv]/connect.php");
    //    
    // Fetch messages from the database
    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    $query = "SELECT * FROM message where (ustrid='$_SESSION[ustrid]' or  mtostrid='$_SESSION[ustrid]') and (ustrid='$id' or  mtostrid='$id') ORDER BY  mdate DESC";
    $result = mysqli_query($dbase,$query); //$dbase->query($query);

    $mes = [];

    while ($row = $result->fetch_assoc()) {
        $from = mysqli_fetch_array(mysqli_query($dbase,"SELECT uname,icid FROM `users` WHERE uid=$row[uid]"));
        $to = mysqli_fetch_array(mysqli_query($dbase,"SELECT uname FROM `users` WHERE uid=$row[mtoid]"));
        if($from["icid"]){
        $fiid = mysqli_fetch_assoc(mysqli_query($dbase,"select fiid from fconnect where $from[icid] = fcid"))["fiid"];
        $pi = mysqli_fetch_assoc(mysqli_query($dbase,"select finname,fidate from files where $fiid = fiid")); 
        $day = explode(" ",$pi["fidate"])[0];
        $frompic = "$_SESSION[files]/uploads/image/$day/$pi[finname]";
        } else $frompic = "$_SESSION[R1]/image/default.png";
        if($row["fcid"]){
            $fiid = mysqli_fetch_assoc(mysqli_query($dbase,"select fiid from fconnect where $row[fcid] = fcid"))["fiid"];
            $pi = mysqli_fetch_assoc(mysqli_query($dbase,"select finname,fidate from files where $fiid = fiid")); 
            $day = explode(" ",$pi["fidate"])[0];
            $image = "$_SESSION[files]/uploads/image/$day/$pi[finname]";
        } else $image = NULL;

        //$image = mysqli_fetch_array(mysqli_query($dbase,"SELECT fiid FROM `fconnect` WHERE fcid=$row[icid]"));
        

        $name       = $from["uname"];
        $toname     = $to["uname"];
        $pic        = $image;
        $label      = $row["mlabel"];
        $stat       = $row["mstat"];
        $eloz       = $row["meloz"];
        $date       = $row["mdate"];


        $mes[] = ["from"=>$name, "to"=> $toname, "message"=>$label,"profpic"=> $frompic, "picture"=>$pic, "eloz"=>$eloz, "stat"=>$stat, "date"=>$date];
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($mes);
    
    // Close the connection

    mysqli_close($dbase);
