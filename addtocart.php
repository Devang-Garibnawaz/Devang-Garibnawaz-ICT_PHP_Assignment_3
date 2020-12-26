<?
session_start();
include_once("connect.php");
    $con = new connect();
    $con->connectdb();
if(isset($_SESSION['username']))
{
$sql = $con->CRUD("select user_id from tbl_user where user_email = '".$_SESSION['username']."'");
$row = $con->fetchAssoc($sql);
$sql = $con->CRUD("select cart_id from tbl_cart where user_id = ".$row['user_id']." and product_id = ".$_GET['id']);
if($con->num_rows($sql) > 0)
{
    header("Location:cart.php?message=ok");
}
else
{
    $sql = $con->CRUD("INSERT into tbl_cart(`product_id`,`user_id`) VALUES(".$_GET['id'].",".$row['user_id'].")");
    header("Location:cart.php?message=ok");
}
}
else
header("Location:cart.php?message=Please Login");
?>