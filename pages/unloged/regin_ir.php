<?php
    session_start();
    include("$_SESSION[priv]/connect.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usern = $_POST["uname"];
        $umail = $_POST["umail"];
        $options = ["cost" => 12];
        $pass = password_hash($_POST["upass1"],PASSWORD_BCRYPT,$options);
        $uids = mysqli_fetch_array(mysqli_query($dbase,"select ustrid from users"));
        if($uids){
            while(true){
                $bool = false;
                $usrtid = randoms();
                
                foreach($uids as $id){
                    if($id == $usrtid){
                        $bool = true;
                        break;
                    }
                }
                if(!$bool) break;
            }
        } else $usrtid = randoms();

        $yes = mysqli_fetch_array(mysqli_query($dbase,"select * from users where  umail='$umail'"));
        if($yes!=NULL) die("<script>alert('Sorry, someone already registered with this email address.');window.location.href='$_SESSION[R1]/signup'</script>");
        if(!empty($usern) && !empty($pass) && !is_numeric($usern)){
            if($_POST["upass1"] == $_POST["upass2"]){
                mysqli_query($dbase, "
                INSERT INTO  users  ( uid ,  icid, bicid ,  ustrid ,  uname ,  umail ,  upass ,  ustat ,  udate ,  ucom ,  uip )
                VALUES (NULL, NULL, NULL, '$usrtid', '$usern', '$umail', '$pass', 'A, NLI', current_timestamp(), NULL, '$_SERVER[REMOTE_ADDR]')
                ");
    

                mysqli_close($dbase);

                print"
                <script>
                    alert('Thank you for the registration.');
                    parent.location.href='$_SESSION[R1]/';
                </script>
                ";
                
            }
            else{
                print"
                <script>
                    alert('The passwords not equal.');
                    parent.location.href='$_SESSION[R1]/signup';
                </script>
                ";
            } 

        }
        else{
            print"
            <script>
                alert('Please enter some valid information.');
                parent.location.href='$_SESSION[R1]/signup';
            </script>
            ";
        }
    }
?>


