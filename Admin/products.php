<?
$page_id = 4;
include_once("header.php");
?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Add Product</h4>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Add Product form</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name="prodform" id="prodform">
                                    <div class="form-body">
                                        
                                        <div class="row p-t-20">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Select Category</label>
                                                    <select id="catid" name="cat_id" class="form-control">
                                                        <?
                                                        $sql = $con->CRUD("select * from tbl_category");
                                                        while($row = $con->fetchAssoc($sql))
                                                        {
                                                        ?>
                                                        <option value="<? echo $row['cat_id']; ?>"><? echo $row['cat_name']; ?></option>
                                                        <? } ?>
                                                    </select>
                                                </div>   
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product Name</label>
                                                    <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Product Name" required>
                                                </div>   
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product Image</label>
                                                    <input type="file" id="productimg" name="productimg" class="form-control" required="">
                                                    </div>            
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product Price</label>
                                                    <input type="number" id="productprice" name="productprice" class="form-control" required="">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Description</label>
                                                    <textarea type="text" id="product_desc" name="product_desc" class="form-control " rows="10" ></textarea>
                                                    </div>      
                                            </div>
                                            <!--/span-->
                                            <label id="status" style="color:red;font-weight:bold;"></label>
                                        </div>
                                        
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="submit" id="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <script>
            $(document).ready(function(){
                $("#prodform").on("submit",function(event){
                    event.preventDefault();
                    $("#prodform").validate();
                    
                    var formData = new FormData($(this)[0]);
                    $.ajax({  
                        url:"processData.php?task=addProduct",  
                        method:"POST",  
                        data: formData,  
                        enctype: 'multipart/form-data',
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(data){  
                            $("#status").html("Product Added Successfully..");
                            $('#prodform').find("input[type=text],input[type=file], textarea").val("");
                        }  
                    });
                });
            });
        </script>
        <?
include_once("footer.php");
?>