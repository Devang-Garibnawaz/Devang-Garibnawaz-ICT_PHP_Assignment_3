<?
$page_id = 3;
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
                        <h4 class="text-themecolor">Update Category</h4>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Update Category form</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name="catform" id="catform">
                                    <div class="form-body">
                                        <?
                                        $sql = $con->CRUD("SELECT cat_id,cat_name,cat_desc,cat_image from tbl_category where cat_id =".$_GET['cat_id']);
                                        $row = $con->fetchAssoc($sql);
                                        ?>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category Name</label>
                                                    <input type="text" id="catname" name="cat_name" class="form-control" placeholder="Category Name" value="<? echo $row['cat_name']; ?>" required>
                                                    <input type="hidden" name="cat_id" value="<? echo $row['cat_id']; ?>" /> 
                                                </div>   
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Category Image</label>
                                                    <input type="file" id="catimg" name="catimg" class="form-control" >
                                                    <input type="hidden" name="oldimg" value="<? echo $row['cat_image']; ?>" /> 
                                                </div>      
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                   <?
                                                   if($row['cat_image']!="")
                                                    {
                                                   ?>
                                                    <img src="../Category/<? echo $row['cat_image']; ?>" style="height:100px;"/> 
                                                    <? } ?>
                                                </div>      
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Description</label>
                                                    <textarea type="text" id="cat_desc" name="cat_desc" class="form-control " rows="10" ><? echo $row['cat_desc']; ?></textarea>
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
                $("#catform").on("submit",function(event){
                    event.preventDefault();
                    $("#catform").validate();
                    
                    var formData = new FormData($(this)[0]);
                    $.ajax({  
                        url:"processData.php?task=updateCategory",  
                        method:"POST",  
                        data: formData,  
                        enctype: 'multipart/form-data',
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(data){  
                            $("#status").html("Category Updates Successfully..");
                            $('#catform').find("input[type=text],input[type=file], textarea").val("");
                        }  
                    });
                });
            });
        </script>
        <?
include_once("footer.php");
?>