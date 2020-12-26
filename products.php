<?

include_once("header.php");
?>
      <!-- Header Area End -->
       
       
      <!--Breadcromb Area Start-->
      <section class="cryptobase-breadcromb-area">
        
         <div class="breadcromb-bottom">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="breadcromb-bottom-text">
                        <ul>
                           <li><a href="index.php">home</a></li>
                           <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                           <li>Category</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--Breadcromb Area End-->
       
       
      <!-- Blog Page Area Start -->
      <section class="cryptobase-blog-page-area section_100">
         <div class="container">
            <div class="row">
               
               <div class="col-md-12">
                  <div class="cryptobase-shop-left margin-top">
                     
                     <div class="row">
                     <?
                     $sql = $con->CRUD("SELECT product_id,product_name,product_image,price from tbl_product where cat_id = ".$_GET['id']." order by product_id desc");
                     if($con->num_rows($sql) > 0)
                     {
                        while($row = $con->fetchAssoc($sql))
                        {?>
                        <div class="col-md-3 col-sm-3">
                           <div class="single-shop-product">
                              <div class="single-product-image">
                                 
                                 <img src="Products/<? echo $row['product_image'] ?>" alt="product" />
                                
                              </div>
                              <div class="single-product-text">
                                 <h3>
                                   <? echo $row['product_name'] ?>
                                 </h3>
                                 <h4 style="display:inline">
                                   price: <? echo $row['price'] ?>
                                 </h4>
                                 <div class="product-button">
                                    <a href="addtocart.php?id=<? echo $row['product_id'] ?>">add to cart</a>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?
                        }
                     }
                     else
                        echo "<h2>Products Not Found..</h2>";
                     ?> 
                     </div>
                    
                  </div>
                  
               </div>
            </div>
         </div>
      </section>
      <!-- Blog Page Area End -->
       
   <?
   include_once("footer.php");
   ?>