<?php include './header.php'; ?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.php">Shop</a>
                    <span>Check Out</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
    <div class="container">
        <form action="./mail/SendMail.php" class="checkout-form" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="./login.php" class="content-btn">
                            <?php 
                                if($_SESSION['user']){
                                    echo "You are logged in as {$_SESSION['user']['username']} !";
                                } else {
                                    echo "Click Here To Login";
                                }   
                            ?>
                            
                        </a>
                    </div>
                    <h4>Billing Details</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="first">Name <span>*</span></label>
                            <input type="text" id="first" name="name" value="
                            <?php 
                                if(isset($_SESSION['user'])){
                                    echo trim($_SESSION['user']['username']);
                                } else {
                                    echo '';
                                }
                            ?>
                            ">
                        </div>
                        <div class="col-lg-12">
                            <label for="cun">Country <span>*</span></label>
                            <input type="text" id="cun" name="country">
                        </div>
                        <div class="col-lg-12">
                            <label for="street">Street Address <span>*</span></label>
                            <input type="text" id="street" name="street">
                        </div>
                        <div class="col-lg-12">
                            <label for="zip">Postcode / ZIP <span>*</span></label>
                            <input type="text" id="zip" name="postcode">
                        </div>
                        <div class="col-lg-12">
                            <label for="town">Town / City<span>*</span></label>
                            <input type="text" id="town" name="city">
                        </div>
                        <div class="col-lg-12">
                            <label for="email">Email Address<span>*</span></label>
                            <input type="text" id="email" name="email" value="
                            <?php 
                                if(isset($_SESSION['user'])){
                                    echo trim($_SESSION['user']['email']);
                                } else {
                                    echo '';
                                }
                            ?>
                            ">
                        </div>
                        <!-- <div class="col-lg-12">
                            <div class="create-item">
                                <label for="acc-create">
                                    Create an account?
                                    <input type="checkbox" id="acc-create">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <input type="text" placeholder="Enter Your Coupon Code">
                    </div>
                    <div class="place-order">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Product <span>Total</span></li>
                                <?php
                                foreach ($_SESSION['cart'] ?? [] as $item) :
                                    $cart = $product->getProductById($item);
                                    array_map(function ($item) {
                                ?>
                                        <li class="fw-normal"><?php echo $item['product_name'] ?> <span>$<?php echo $item['product_price'] ?></span></li>
                                <?php
                                    }, $cart);

                                endforeach;
                                ?>
                                <li class="fw-normal">Subtotal <span>$<?php echo $_SESSION['subtotal'] ?? 0; ?></span></li>
                                <li class="total-price">Total <span>$<?php echo  $_SESSION['subtotal'] ?? 0; ?></span></li>
                            </ul>
                            <div class="payment-check">
                                <div class="pc-item">
                                    <label for="pc-check">
                                        Cheque Payment
                                        <input type="checkbox" id="pc-check">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="pc-item">
                                    <label for="pc-paypal">
                                        Paypal
                                        <input type="checkbox" id="pc-paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Shopping Cart Section End -->
<?php include './footer.php'; ?>