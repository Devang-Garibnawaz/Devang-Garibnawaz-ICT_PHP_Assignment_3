<?php
    include_once("connect.php");
    $con = new connect();
    $con->connectdb();
    if(isset($_POST['submit']))
    {
        $verif_box = $_REQUEST["verif_box"];
			
        if(md5($verif_box).'a4xn' == $_COOKIE['tntcon'])
        {
            $qry = $con->CRUD("select * from tbl_user where user_email = '".$_POST['email']."'");
            if($con->num_rows($qry) > 0)
            {
                header("Location:register.php?result=2");   
            }
            else
            {
                $sql = $con->CRUD("insert into tbl_user(username,user_email,user_mobile,user_password,user_type,status) values('".$_POST['username']."','".$_POST['email']."','".$_POST['mobile']."','".$_POST['password']."','User','On')");
                header("Location:register.php?result=1"); 
            }
        }
        else
        {
            header("Location:register.php?result=3");
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
                        <td>Name :</td>
                        <td><input type="text" name="username" /></td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td><input type="text" name="email" /></td>
                    </tr>
                    <tr>
                        <td>Mobile Number :</td>
                        <td><input type="text" name="mobile" /></td>
                    </tr>
                    <tr>
                        <td>Password :</td>
                        <td><input type="password" name="password" /></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" placeholder="Code" id="verif_box" name="verif_box">
                        </td>
                        <td>
                            <img src="verificationimage.php?<?php echo rand(0,9999);?>" alt="verification image, type it in the box" width="100" height="50" align="absbottom" />
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Register" /></td>
                        <td><a href="index.php">Login Here -></a></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php 
                        if($_GET['result'] == 1)
                        {
                            echo "User Registered Successfully.";
                        }
                        else if($_GET['result'] == 2)
                        {
                            echo "User Already Registered..!";
                        }
                        else if($_GET['result'] == 3)
                        {
                            echo "Captcha is incorrect..!";
                        }
                        ?>
                        </td>
                        
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>