<?php
// echo "<pre>";
// var_dump($orderItems);
// echo "</pre>";
// if (isset($_SESSION['user'])) {
//     $user = $_SESSION['user'];
//     $cartId = isset(get_cartId($user['id'])[0]['id']) ? get_cartId($user['id'])[0]['id'] : '';

// }
// $cartItems = get_all_cartItem($cartId);
?>
<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Order History</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?act=account">Order History</a></li>
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

        
            <form action="index.php?act=cancelOrder" method="post">
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
                                        <!-- <th class="pro-remove">Remove</th> -->
                                    </tr>
                                </thead>
                                <tbody id="mycart">
                                    <?php
                                        foreach ($orderItems as $key => $item) {
                                            $product = loadone_sanpham($item['product_id']);
                                            ?>
                                            <tr>
                                                <td class="pro-thumbnail"><a href="#"><img
                                                            src="./upload/<?= $product['img'] ?>" alt="" /></a></td>
                                                <td class="pro-title">
                                                    <a href="index.php?act=detailProduct&id=<?= $product['id'] ?>">
                                                        <?= $product['name'] ?>
                                                    </a></td>
                                                <td class="pro-price"><span id="amount" class="amount">
                                                        <?php echo number_format(($product['price'] / 26000), 1) ?>
                                                    </span></td>
                                                <td class="pro-quantity">
                                                    <?=$item['quantity']?>
                                                </td>
                                                <td id="total" class="pro-subtotal">
                                                    <?= number_format($item['quantity'] * $product['price'] / 26000, 1) ?>
                                                </td>
                                            </tr>
                                            <input type="hidden" name="orderId" value="<?=$orderId?>">
                                        <?php }?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="" class="col-lg-4 col-md-5 col-12 mb-40">
                        <div style="text-align:left" class="cart-total fix">
                            <h3>Detail Order</h3>
                            <table style="float:left">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span>$<?=number_format($order['total_amount'],1)?></span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Shipping Fee</th>
                                        <td>
                                            <span >$<?=$order['shipping_fee']?></span>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong><span class="amount" id="">$<?=$order['total_amount'] + $order['shipping_fee']?></span></strong>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <?php
                                if($order['process'] == 0 || $order['process'] == 1){
                                    echo "
                                        <div class='proceed-to-checkout section mt-30'>
                                            <input type='submit' value='Cancel the order' name='submit'>
            
                                        </div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </form>

    </div>
</div>
<!-- Page Section End -->