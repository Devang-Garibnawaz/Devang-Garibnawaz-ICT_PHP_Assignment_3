<?php

session_start();
include_once("connect.php");
$con = new connect();
$con->connectdb();
if(!isset($_SESSION['username']))
{
   header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Title -->
      <title>My Shopping App </title>
      <!-- Favicon -->
      <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <!-- Font awesome CSS -->
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <!-- Animate CSS -->
      <link rel="stylesheet" href="assets/css/animate.min.css">
      <!-- OwlCarousel CSS -->
      <link rel="stylesheet" href="assets/css/owl.carousel.css">
      <!-- SlickNav CSS -->
      <link rel="stylesheet" href="assets/css/slicknav.min.css">
      <!-- Magnific popup CSS -->
      <link rel="stylesheet" href="assets/css/magnific-popup.css">
      <!-- Select2 CSS -->
      <link rel="stylesheet" href="assets/css/select2.min.css">
      <!-- Main CSS -->
      <link rel="stylesheet" href="assets/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="assets/css/responsive.css">
   </head>
   <body>
       
       
      <!-- Header Area Start -->
      <header class="cryptobase-header-top-area">
         <div class="header-top-area">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 col-sm-5">
                     <div class="header-top-left">
                        <p><i class="fa fa-phone"></i> 012-3456-789</p>
                        <p><i class="fa fa-envelope-o"></i> myshopping@mail.com</p>
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
         <div class="mainheader-area">
            <div class="container">
               <div class="row">
                  <div class="col-md-3">
                     <div class="sitelogo">
                        <a href="index.php">
                        <img src="assets/img/logo.png" alt="site logo" />
                        </a>
                     </div>
                     <!-- Responsive Menu Start -->
                     <div class="cryptobase-responsive-menu"></div>
                     <!-- Responsive Menu End -->
                  </div>
                  <div class="col-md-7 col-sm-9">
                     <div class="mainmenu">
                        <nav>
                           <ul class="main_menu">
                              <li><a href="admin_index.php">Home</a></li>
                              <li>
                                 <a href="category.php">Products</a>
                              </li>
                              <li>
                                 <a href="cart.php?message=ok">Cart</a>
                              </li>
                              <li>
                                 <a href="logout.php">Logout</a>
                              </li>
                              <li>
                                 <h5>Welcome <? echo $_SESSION['name'] ?><h5>
                              </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                 
               </div>
            </div>
         </div>
      </header>