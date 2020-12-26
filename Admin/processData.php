<?
include_once("../connect.php");
$con = new connect();
$con->connectdb();
if($_GET['task'] == "addCategory")
{
    $filename = $_FILES['catimg']['name'];
    $dir = "../Category/" . $filename;
    move_uploaded_file($_FILES['catimg']['tmp_name'],$dir);
    $con->CRUD("INSERT into tbl_category(cat_name,cat_desc,cat_image) VALUES('".$_POST['cat_name']."','".$_POST['cat_desc']."','".$filename."')");
    
}
if($_GET['task'] == "updateCategory")
{
    if($_FILES['catimg']['name'] != "")
    {
        $filename = $_FILES['catimg']['name'];
        $dir = "../Category/" . $filename;
        move_uploaded_file($_FILES['catimg']['tmp_name'],$dir);
    }
    else
    {
        $filename = $_POST['oldimg'];
    }
    $con->CRUD("UPDATE tbl_category SET cat_name='".$_POST['cat_name']."',cat_desc='".$_POST['cat_desc']."',cat_image='".$filename."' where cat_id = ".$_POST['cat_id']);
    
}

if($_GET['task'] == "addProduct")
{
    $filename = $_FILES['productimg']['name'];
    $dir = "../Products/" . $filename;
    move_uploaded_file($_FILES['productimg']['tmp_name'],$dir);
    $con->CRUD("INSERT into tbl_product(product_name,product_desc,product_image,cat_id,price) VALUES('".$_POST['product_name']."','".$_POST['product_desc']."','".$filename."','".$_POST['cat_id']."','".$_POST['productprice']."')");
}

if($_GET['task'] == "updateProduct")
{
    if($_FILES['productimg']['name'] != "")
    {
        $filename = $_FILES['productimg']['name'];
        $dir = "../Product/" . $filename;
        move_uploaded_file($_FILES['productimg']['tmp_name'],$dir);
    }
    else
    {
        $filename = $_POST['oldimg'];
    }
    $con->CRUD("UPDATE tbl_product SET product_name='".$_POST['product_name']."',product_desc='".$_POST['product_desc']."',product_image='".$filename."',price='".$_POST['productprice']."',cat_id='".$_POST['cat_id']."' where product_id = ".$_POST['product_id']);
    
}
?>