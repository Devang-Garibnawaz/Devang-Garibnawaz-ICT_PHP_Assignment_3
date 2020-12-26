<?php

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
                     $sql = $con->CRUD("SELECT cat_id,cat_name,cat_image from tbl_category order by cat_id desc");
                     if($con->num_rows($sql) > 0)
                     {
                        while($row = $con->fetchAssoc($sql))
                        {?>
                        <div class="col-md-3 col-sm-3">
                           <div class="single-shop-product">
                              <div class="single-product-image">
                                 <a href="products.php?id=<? echo $row['cat_id'] ?>">
                                 <img src="Category/<? echo $row['cat_image'] ?>" alt="product" />
                                 </a>
                              </div>
                              <div class="single-product-text">
                                 <h3>
                                    <a href="products.php?id=<? echo $row['cat_id'] ?>"><? echo $row['cat_name'] ?></a>
                                 </h3>
                                 
                              </div>
                           </div>
                        </div>
                     <?
                        }
                     }
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