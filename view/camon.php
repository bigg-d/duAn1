<?php
    
?>
<div class="container">
        <div class="mg-t row">
            <div class="box-left">
                                        
                <svg viewBox="9 9 100 100" style="width: 110px;" >
                    <circle cx="50" cy="50" r="40" stroke="#33CC66" stroke-width="2" fill="none" />
                    <path d="M25 50 L40 65 L75 35" stroke="#33CC66" stroke-width="2" fill="none" />
                  </svg>
            
            
                <h3 class="section__title"><strong>Cảm Ơn Bạn Đã Đặt Hàng</strong></h3>
                
                <p class="section__text">
                    Một email xác nhận đã được gửi tới <?= $order['recipient_email']?>. <br/>
                    Xin vui lòng kiểm tra email của bạn
                </p>
            
                <div class="buil3">
                    <div class="thongtinmua1">
                        <h2>Thông tin mua hàng</h2>
                        <p><?=$order['recipient_name']?></p>
                        
                        <p><?=$order["recipient_email"]?></p>
                    
                        <p><?=$order['recipient_phone']?></p>                       
                    </div>
                    <div class="thongtinmua1">
                        <h2>Địa chỉ nhận hàng</h2>
                        
                        
                        
                        
                        <p><?=$order['recipient_address']?></p>
                        
                        
                        <p><?=$order['recipient_phone']?></p>
                    </div>
                    <div class="thongtinmua">
                        <h2>Phương thức thanh toán</h2>
                        <p><?=($order['payment_method'] == 1) ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng'?></p>
                    </div>
                    <div class="thongtinmua">
                        <h2>Phương thức vận chuyển</h2>
                        <p>Giao hàng tận nơi</p>
                    </div>
                </div>
                   
            </div>
            
                <div class="buil">
                    <div class="buil_sp"><strong >Mã</strong></div>
                    <?php foreach ($products as $key => $product) {
                        $detailProduct = loadone_sanpham($product['product_id']);    
                    ?>
                    
                    <div class="buil_sp">
                        <img src="upload/<?=$detailProduct['img']?>" width="70px" alt="">
                        <p><?=$detailProduct['name']?></p>
                        <p>x<?=$product['quantity']?></p>
                        <p><?=number_format($detailProduct['price'] / 26000, 1)?>$</p>
                    </div>
                    <?php }?>
                    <div style="border: none;" class="buil_sp" >
                        <p>Tạm tính </p>
                        <p><?=$order['total_amount']?>$</p>
                    </div>
                    <div class="buil_sp">
                        <p>Phí vận chuyển</p>
                        <p><?=$order['shipping_fee']?>$</p>
                    </div>
                    <div style="border: none;" class="buil_sp">
                        <p>Tổng</p>
                        <strong style="color:rgb(66, 107, 183);"><?=$order['total_amount'] + $order['shipping_fee']?>$</strong>
                    </div>
            </div>
            
        </div>
    </div>