<?php
$page_id = 2;
include_once("header.php");

?>
<div style="margin-top:70px;">
<center>
    <h2>Category List</h2>
    <a href="admin_addcategory.php">Add Category</a>
    <div style="margin-top:20px;">
            <table class="records">
                <tr>
                    <th>Cat ID</th>
                    <th>Cat Name</th>
                    <th>Cat Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $catqry = $con->CRUD("select * from tbl_category where cat_parent_id = 0");
                if($con->num_rows($catqry) > 0)
                {
                    while($row = $con->fetchAssoc($catqry))
                    {
                        extract($row);
                ?>
                        <tr>    
                            <td><?php echo $cat_id; ?></td>
                            <td><?php echo $cat_name; ?></td>
                            <td><img src="category/<?php echo $cat_image; ?>" height="80" width="80"/></td>
                            <td><a href="admin_addcategory.php?cat_id=<?php echo $cat_id; ?>">Edit</a></td>
                            <td><a href="deleteRecord.php?tbl_name=tbl_category&primary_key=cat_id&id=<?php echo $cat_id; ?>">Delete</a></td>
                        </tr>
                <?php 
                    }
                }
                else
                {
                ?>
                <tr>    
                    <td colspan="5">No Records Found..!</td>
                </tr>
                <?php } ?>
            </table>
    </div>
</center>
</div>

</body>
</html>