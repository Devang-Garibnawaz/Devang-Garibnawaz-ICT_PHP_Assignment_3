<?php
    session_start();
    include_once("../connect.php");
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
            header("Location:index.php");
            
        }
        else
        {
            header("Location:index.php?result=1"); 
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>MY SHOPPING APP | LOGIN</title>
    
    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" method="post">
                        <h3 class="text-center m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="username" id="username" required="" placeholder="Username"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" id="password" required="" placeholder="Password"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label id="results" style="color:red;"></label>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="button" name="login" id="login">Log In</button>
                            </div>
                        </div>
                        
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
    <script>
    $(document).ready(function(){

        $("#login").on("click",function(){
            $("#loginform").validate();
            
            $.ajax({
                url:"checklogin.php",
                method:"POST",
                data:$('#loginform').serialize(),
                success:function(data){
                    if(data == 0)
                        window.open("index.php",'_SELF');
                    else if(data == 1)
                        $("#results").html("Invalid Username or Password..!");
                    else
                    $("#results").html(data);
                }
            });
        });
    });
    </script>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        
    </script>
    
</body>

</html>