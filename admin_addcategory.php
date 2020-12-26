<?php
$page_id = 2;
include_once("header.php");
if(isset($_POST['addcategory']))
{
    if($_FILES['cat_image']['name'] != "")
    {
        
        $filename = $_FILES['cat_image']['name'];
        $dir = "Category/" . $filename;
        move_uploaded_file($_FILES["cat_image"]["tmp_name"], $dir);
        $con->CRUD("insert into tbl_category(cat_name,cat_desc,cat_image) values('".$_POST['cat_name']."','".$_POST['cat_desc']."','".$filename."')");
    }
    else
    {
        $con->CRUD("insert into tbl_category(cat_name,cat_desc) values('".$_POST['cat_name']."','".$_POST['cat_desc']."')");
    }
    
}
if(isset($_POST['updatecategory']))
{
    if($_FILES['cat_image']['name'] != "")
    {
        
        $filename = $_FILES['cat_image']['name'];
        $dir = "Category/" . $filename;
        move_uploaded_file($_FILES["cat_image"]["tmp_name"], $dir);
        $con->CRUD("insert into tbl_category(cat_name,cat_desc,cat_image) values('".$_POST['cat_name']."','".$_POST['cat_desc']."','".$filename."')");
    }
    else
    {
        $con->CRUD("insert into tbl_category(cat_name,cat_desc,cat_image) values('".$_POST['cat_name']."','".$_POST['cat_desc']."','".$_POST['imgname']."')");
    }
    
}
if(isset($_GET['cat_id']))
{
    $sql = $con->CRUD("select * from tbl_category where cat_id = ".$_GET['cat_id']);
    if($con->num_rows($sql) > 0)
    {
        $row = $con->fetchAssoc($sql);
      
    }
}
?>
<div style="margin-top:70px;">
    <center>
        <h2>Add Category Form</h2>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Category Name :</td>
                    <td><input type="text" name="cat_name" value="<?php if(isset($_GET['cat_id'])){ echo $row['cat_name']; } ?>" required/></td>
                </tr>
                <tr>
                    <td>Category Image :</td>
                    <td><input type="file" name="cat_image" required/></td>
                </tr>
                <?php if(isset($_GET['cat_id'])){  ?>
                <tr>
                    <td>
                    <input type="hidden" name="imgname" value="<?php echo $row['cat_image']; ?>" />
                    <img src="category/<?php echo $row['cat_image']; ?>" height="80" width="80"/></td>
                    <td><a href="deleteImg.php?tbl_name=tbl_category&primary_key=cat_id&id=<?php echo $_GET['cat_id']; ?>">Delete</a></td>
                </tr>
                <? } ?>
                <tr>
                    <td>Description :</td>
                    <td><textarea name="cat_desc" rows="5" cols="30"><?php if(isset($_GET['cat_id'])){ echo $row['cat_desc']; } ?></textarea></td>
                </tr>
                <tr>
                <?php if(isset($_GET['cat_id'])){  ?>
                    <td colspan="2"><input type="submit" name="updatecategory" value="Update Category"/></td> 
                    <? }else{ ?>
                    <td colspan="2"><input type="submit" name="addcategory" value="Add Category"/></td>
                    <? } ?>
                </tr>
            </table>
        </form>
    </center>
</div>
</body>
</html>