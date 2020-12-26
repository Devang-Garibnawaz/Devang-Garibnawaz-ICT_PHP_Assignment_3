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
                           <li>User Cart</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--Breadcromb Area End-->
       
       
      <!-- Cart Page Area Start -->
      <section class="cryptobase-cart-area section_100">
         <div class="container">
            <?
            if($_GET['message'] == "ok")
            {
            ?>
            <div class="row">
               <div class="col-md-8">
                  <div class="cart-table">
                     <table class="table table-striped table-responsive">
                        <thead>
                           <tr>
                              <th>Preview</th>
                              <th>Product</th>
                              <th>Price</th>
                             
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?
                           $sql = $con->CRUD("SELECT * from tbl_cart c,tbl_product p,tbl_user u where p.product_id = c.product_id and u.user_id=c.user_id and u.user_email = '".$_SESSION['username']."'");
                           if($con->num_rows($sql) > 0)
                           {
                              while($row = $con->fetchAssoc($sql))
                              {
                                 ?>
                                 
                           <tr class="shop-cart-item">
                              <td class="cryptobase-cart-preview">
                                 
                                 <img src="Products/<? echo $row['product_image'] ?>" alt="cart-1" />
                                 
                              </td>
                              <td class="cryptobase-cart-product">
                               
                                    <p><? echo $row['product_name']; ?></p>
                                 
                              </td>
                              <td class="cryptobase-cart-price">
                                 <p><? echo $row['price']; ?></p>
                              </td>
                             
                              <td class="cryptobase-cart-close">
                                 <a href="delItem.php?cart_id=<? echo $row['cart_id'] ?>"><i class="fa fa-trash"></i></a>
                              </td>
                           </tr>
                           <?
                              }
                           }
                           ?>
                           
                        </tbody>
                     </table>
                  </div>
                  
               </div>
               
            </div>
            <?
            }
            else 
               echo "<h2>".$_GET['message']."</h2>"
            ?>
         </div>
      </section>
      <!-- Cart Page Area End -->
       
          
   <?
   include_once("footer.php");
   ?>