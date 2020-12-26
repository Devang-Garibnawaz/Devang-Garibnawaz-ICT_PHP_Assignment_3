<?
session_start();
include_once("../connect.php");
    $con = new connect();
    $con->connectdb();
$sql = $con->CRUD("select user_id from tbl_user where user_email = '".$_SESSION['username']."'");
$row = $con->fetch_assoc($sql);
$sql = $con->CRUD("INSERT into tbl_cart(product_id,cart_id) VALUES(".$_GET['id'].",".$row['user_id'].")");
header("Location:cart.php");
?>