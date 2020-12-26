<?php
$page_id = 1;
include_once("header.php");
$userqry = $con->CRUD("select user_id from tbl_user");
$usercount = $con->num_rows($userqry);
$catqry = $con->CRUD("select cat_id from tbl_category");
$catcount = $con->num_rows($catqry);
$prodqry = $con->CRUD("select product_id from tbl_product");
$prodcount = $con->num_rows($prodqry);
?>
<div style="margin-top:70px;">
<center>
    
<table>
    <tr>    
        <td>Number of Users :</td>
        <td><?php echo $usercount; ?></td>
    </tr>
    <tr>
        <td>Number of Categories :</td>
        <td><?php echo $catcount; ?></td>
    </tr>
    <tr>
        <td>Number of Products :</td>
        <td><?php echo $prodcount; ?></td>
    </tr>

</table>
</center>
</div>
</body>
</html>