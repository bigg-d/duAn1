<?php
// echo "<pre>";
// var_dump($_SESSION['mycart']);
// echo "</pre>";
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $cartId = isset(get_cartId($user['id'])[0]['id']) ? get_cartId($user['id'])[0]['id'] : '';

    $cartItems = get_all_cartItem($cartId);
    // var_dump($cartItems);
}
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
<?php
$emptyCart = '<h1 style="font-size: 36px;
    line-height: 1.25;
    margin-bottom: 0;
    font-weight: 600;">Your cart is empty</h1>'
    ?>
<!-- Page Section Start -->
<div class="page-section section section-padding">
    <div class="container">
        <?php if (!isset($cartItems) || empty($cartItems)) { ?>
            <h1 style="font-size: 36px;
    line-height: 1.25;
    margin-bottom: 24px;
    font-weight: 600;">Your cart is empty</h1>
            <a style="background-color: #1a161e;
    border: medium none;
    border-radius: 50px;
    color: #ffffff;
    display: block;
    float: left;
    font-size: 14px;
    font-weight: 600;
    height: 40px;
    line-height: 24px;
    margin-bottom: 10px;
    margin-right: 15px;
    padding: 8px 25px;
    text-transform: uppercase;" href="index.php?act=shop">Continue Shopping</a>

        <?php } else { ?>
            <form action="index.php?act=order" method="post">
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
                                    if (isset($cartItems)) {
                                        $total_price = 0;
                                        foreach ($cartItems as $key => $product) {
                                            $result= get_stock_quantity($product['product_id']);
                                            $stock_quantity = $result['stock_quantity'];
                                            $total_price += ($product['product_price'] * $product['quantity'] );
                                            ?>
                                            <tr>
                                                <td class="pro-thumbnail"><a href="#"><img
                                                            src="./upload/<?= $product['product_img'] ?>" alt="" /></a></td>
                                                <input type="hidden" name="id[]" value="<?= $product['product_id'] ?>">
                                                <td class="pro-title"><a
                                                        href="index.php?act=detailProduct&id=<?= $product['product_id'] ?>">
                                                        <?= $product['product_name'] ?>
                                                    </a></td>
                                                <td class="pro-price"><span id="amount" class="amount">
                                                        <?php echo number_format(($product['product_price'] / 26000), 1) ?>
                                                    </span></td>
                                                <input type="hidden" name="price[]"
                                                    value="<?php echo number_format(($product['product_price'] / 26000), 1) ?>">
                                                <td class="pro-quantity">
                                                    <div class="pro-qty"><input name="quantity[]" onchange="updateTotal(this)"
                                                            onload="updateTotal(this)" type="number" min='1'
                                                            value="<?= isset($product['quantity']) ? $product['quantity'] : 1 ?>">
                                                            <p style="display:none" class= "stock_quantity"><?=$stock_quantity?></p>
                                                    </div>
                                                    <strong class="textErr" style="color:red">Số lượng tối đa: <?=$stock_quantity?></strong>

                                                </td>
                                                <td id="total" class="pro-subtotal">
                                                    <?= number_format(($product['total_price'] / 26000), 1) ?>
                                                </td>
                                                <td class="pro-remove"><a
                                                        href="index.php?act=deletecart&id=<?= $product['product_id'] ?>">×</a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12 mb-40">
                        <div class="cart-buttons mb-30">
                            <a href="index.php?act=shop">Continue Shopping</a>
                            <input id="updateCartBtn" style="background-color:black" type="submit" name='submit'
                                value="update cart">

                            <a id="deleteAllBtn" style="color:white" href="index.php?act=deletecart">Delete All</a>
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
                                <tbody onload="updateGrandTotal()">
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span id="grand-subTotal" class="amount">$306.00</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong><span class="amount" id="grand-total">$0.00</span></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="proceed-to-checkout section mt-30">
                                <input type="submit" value="Proceed to Checkout" name="submit">

                            </div>
                        </div>
                    </div>
                </div>
            </form>

    </div>
</div>
<!-- Page Section End -->