 <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['delete-item-submit'])) {
            // Function doesn't work so i decided to do it right here
            // And it's working!
            //
            // We search in session 'cart' array index of product what we want to delete
            // and delete it from session 'cart' array using unset()
            // after that redirect
            unset($_SESSION['cart'][array_search($_POST['product_id'], $_SESSION['cart'])]);
            header('Location: ' . $_SERVER['PHP_SELF']);
        }
    }
    ?>
 <!-- Shopping Cart Section Begin -->
 <section class="shopping-cart spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="cart-table">
                     <table>
                         <thead>
                             <tr>
                                 <th>Image</th>
                                 <th class="p-name" style="padding-left: 1em;">Product Name</th>
                                 <th>Price</th>
                                 
                                 <th><i class="ti-close"></i></th>
                             </tr>
                         </thead>
                         <tbody>
                             <!-- cart item -->
                             <?php
                                foreach ($_SESSION['cart'] ?? [] as $item) :
                                    $cart = $product->getProductById($item);
                                    $subtotal[] = array_map(function ($product) {
                                ?>
                                     <tr>
                                         <td class="cart-pic first-row"><img src="<?php echo $product['product_image']; ?>" alt=""></td>
                                         <td class="cart-title first-row">
                                             <h5 style="margin-left: 1em;"><?php echo $product['product_name']; ?></h5>
                                         </td>
                                         <td class="p-price first-row">$<?php echo $product['product_price']; ?></td>
                                         <td class="close-td first-row">
                                             <form method="post">
                                                 <input type="hidden" value="<?php echo $product['product_id']; ?>" name="product_id">
                                                 <button type="submit" class="bg-transparent border-0" name="delete-item-submit"><i class="ti-close"></i></button> </form>
                                         </td>
                                     </tr>
                             <?php
                                        return $product['product_price'];
                                    }, $cart);
                                endforeach; ?>
                         </tbody>
                     </table>
                 </div>
                 <div class="row">
                     <div class="col-lg-4">
                         <div class="cart-buttons">
                             <a href="./shop.php" class="primary-btn continue-shop">Continue shopping</a>
                             <a href="./cart.php" class="primary-btn up-cart">Update cart</a>
                         </div>
                         <div class="discount-coupon">
                             <h6>Discount Codes</h6>
                             <form action="#" class="coupon-form">
                                 <input type="text" placeholder="Enter your codes">
                                 <button type="submit" class="site-btn coupon-btn">Apply</button>
                             </form>
                         </div>
                     </div>
                     <div class="col-lg-4 offset-lg-4">
                         <div class="proceed-checkout">
                             <ul>
                                 <li class="subtotal">
                                     Subtotal (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?> items)
                                     <span>$
                                         <span class="deal-price">
                                             <?php echo $_SESSION['subtotal'] ?? 0; ?>
                                         </span>
                                     </span>
                                 </li>
                                 <li class="cart-total">
                                     Total
                                     <span>$
                                         <span class="deal-price">
                                             <?php echo $_SESSION['subtotal'] ?? 0; ?>
                                         </span>
                                     </span>
                                 </li>
                             </ul>
                             <a href="./checkout.php" class="proceed-btn">PROCEED TO CHECK OUT</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Shopping Cart Section End -->