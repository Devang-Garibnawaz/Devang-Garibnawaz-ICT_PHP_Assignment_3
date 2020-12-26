<?
session_start();
include_once("connect.php");
    $con = new connect();
    $con->connectdb();
if(isset($_SESSION['username']))
{
$sql = $con->CRUD("select user_id from tbl_user where user_email = '".$_SESSION['username']."'");
$row = $con->fetchAssoc($sql);
 $sql = $con->CRUD("DELETE from tbl_cart where `cart_id`=".$_GET['cart_id']);
    header("Location:cart.php?message=ok");

}
else
header("Location:cart.php?message=Please Login");
?>