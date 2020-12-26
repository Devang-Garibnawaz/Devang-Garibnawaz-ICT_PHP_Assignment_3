<?
include_once("../connect.php");
$con = new connect();
$con->connectdb();
$table_name = $_GET['table_name'];
$primary_key = $_GET['primary_key'];
$id = $_GET['id'];
$con->CRUD("DELETE from ".$table_name." where ".$primary_key."=".$id);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>