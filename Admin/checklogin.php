<?php
    session_start();
    include_once("../connect.php");
    $con = new connect();
    $con->connectdb();
   // if(isset($_POST['login']))
    //{
        $qry = $con->CRUD("select * from tbl_user where user_email = '".$_POST['username']."' and user_password = '".$_POST['password']."'");
        if($con->num_rows($qry) > 0)
        {
            $row = $con->fetchAssoc($qry);
            $_SESSION['username'] = $row['user_email'];
            $_SESSION['name'] = $row['username'];
            echo "0";
            
        }
        else
        {
            echo "1";
        }
    //}

?>