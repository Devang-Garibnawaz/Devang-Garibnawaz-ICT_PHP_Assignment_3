<?php
    session_start();
    include_once("connect.php");
    $con = new connect();
    $con->connectdb();
    if(isset($_POST['submit']))
    {
        $qry = $con->CRUD("select * from tbl_user where user_email = '".$_POST['username']."' and user_password = '".$_POST['password']."'");
        if($con->num_rows($qry) > 0)
        {
            $row = $con->fetchAssoc($qry);
            $_SESSION['username'] = $row['user_email'];
            $_SESSION['name'] = $row['username'];
            if($row['user_type'] == "Admin")
            {
                header("Location:admin/admin_index.php");
            }
            else
            {
                header("Location:admin_index.php");
            }
               
        }
        else
        {
            header("Location:index.php?result=1"); 
        }
    }

?>

<html>
    <head>
        <title>My Shopping App | Login</title>
    </head>
    <body>
        <center>
            <h2>Login To My Shopping App</h2>
            <form method="post">
                <table>
                    <tr>
                        <td>Username :</td>
                        <td><input type="text" name="username" /></td>
                    </tr>
                    <tr>
                        <td>Password :</td>
                        <td><input type="password" name="password" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Login" /></td>
                        <td><a href="register.php?result=0">Sign Up Here -></a></td>
                    </tr>
                    <tr>
                    <td colspan="2">
                            <?php 
                        if(isset($_GET['result']) == 1)
                        {
                            echo "Invalid Username or Password..!";
                        }
                        
                        ?>
                        </td>
                        
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>