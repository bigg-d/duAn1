<?php 
    // session_start();
?>
<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="page-banner-content col">

                    <h1>Cart</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="cart.html">Cart</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div><!-- Page Banner Section End -->

    <!-- Page Section Start -->
    <div class="page-section section section-padding">
        <div class="container">

            <form action="#">				
                <div class="row mbn-40">
                    <div class="col-12 mb-40">
                        <div class="cart-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody id="mycart">
                                    <?php 
                                    
                                    foreach ($_SESSION['mycart'] as $key => $product) {
                                        echo '<pre>';
                                        // var_dump($_SESSION['mycart']);
                                        echo '</pre>';
                                        
                                    ?>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img src="./upload/<?=$product[2]?>" alt="" /></a></td>
                                        <td class="pro-title"><a href="#"><?=$product[1]?></a></td>
                                        <td class="pro-price"><span id="amount" class="amount"><?=$product[3]?></span></td>
                                        <td class="pro-quantity"><div class="pro-qty"><input onchange="updateTotal(this)" type="number" min='1' value="1"></div></td>
                                        <td id="total" class="pro-subtotal">$<?php echo number_format(($product[3] / 26000),1)?></td>
                                        <td class="pro-remove"><a href="index.php?act=deletecart&idcart=<?=$key?>">×</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12 mb-40">
                        <div class="cart-buttons mb-30">
                            <a style="color:white" href="index.php?act=deletecart">Delete All</a>
                            <a href="index.php?act=shop">Continue Shopping</a>
                        </div>
                        <div class="cart-coupon">
                            <h4>Coupon</h4>
                            <p>Enter your coupon code if you have one.</p>
                             <div class="cuppon-form">
                                <input type="text" placeholder="Coupon code" />
                                <input type="submit" value="Apply Coupon" />
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-12 mb-40">
                        <div class="cart-total fix">
                            <h3>Cart Totals</h3>
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span class="amount">$306.00</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong><span class="amount">$306.00</span></strong>
                                        </td>
                                    </tr>											
                                </tbody>
                            </table>
                            <div class="proceed-to-checkout section mt-30">
                                <a href="index.php?act=checkout">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div><!-- Page Section End -->