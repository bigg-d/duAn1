<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
	<div class="container">
		<div class="row">
			<div class="page-banner-content col">
				<h1>Checkout</h1>
				<ul class="page-breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="checkout.html">Checkout</a></li>
				</ul>

			</div>
		</div>
	</div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
	<div class="container">

		<!-- Checkout Form s-->
		<form action="index.php?act=checkout" method="post" class="checkout-form" enctype="multipart/form-data">
			<div class="row row-50 mbn-40">

				<div class="col-lg-7">

					<!-- Billing Address -->
					<div id="billing-form" class="mb-20">
						<h4 class="checkout-title">Billing Address</h4>

						<div class="row">

							<div class="col-md-6 col-12 mb-5">
								<label>First Name*</label>
								<input type="text" name="firstName" id="first-name"
									value='<?= isset($recipient_name) ? $recipient_name : '' ?>' placeholder="First Name">
								<input type="hidden" name="currentFirstName" id="currentFirstName"
									value="<?= isset($_SESSION['user']['firstname']) ? $_SESSION['user']['firstname'] : '' ?>">
								<p id="first-name_err" style="color:red">
									<?= isset($firstname_err) ? $firstname_err : '' ?>
								</p>
							</div>

							<div class="col-md-6 col-12 mb-5">
								<label>Last Name*</label>
								<input type="text" name="lastName" id="last-name" placeholder="Last Name"
									value="<?= isset($recipient_lastname) ? $recipient_lastname : '' ?>">
								<input type="hidden" name="currentLastName" id="currentLastName"
									value="<?= $_SESSION['user']['lastname'] ? $_SESSION['user']['lastname'] : '' ?>">
								<p id="last-name_err" style="color:red">
									<?= isset($lastname_err) ? $lastname_err : '' ?>
								</p>
							</div>

							<div class="col-md-6 col-12 mb-5">
								<label>Email Address*</label>
								<input type="email" name="email" id="email" placeholder="Email Address"
									value='<?= isset($recipient_email) ? $recipient_email : '' ?>'>
								<input type="hidden" name="currentEmail" id="currentEmail"
									value="<?= $_SESSION['user']['email'] ? $_SESSION['user']['email'] : "" ?>">
								<p id="email_err" style="color:red">
									<?= isset($email_err) ? $email_err : '' ?>
								</p>

							</div>

							<div class="col-md-6 col-12 mb-5">
								<label>Phone no*</label>
								<input type="text" name="phone" id="phone" placeholder="Phone number"
									value='<?= isset($recipient_phone) ? $recipient_phone : '' ?>'>
								<input type="hidden" name="currentPhone" id="currentPhone"
									value="<?= $_SESSION['user']['phone'] ? $_SESSION['user']['phone'] : '' ?>">
								<p id="phone_err" style="color:red">
									<?= isset($phone_err) ? $phone_err : '' ?>
								</p>
							</div>


							<div class="col-12 mb-5">
								<label>Address*</label>
								<input type="text" id="address" name="address" placeholder="Address"
									value='<?= isset($recipient_address) ? $recipient_address : "" ?>'>
								<input type="hidden" name="currentAddress" id="currentAddress"
									value="<?= $_SESSION['user']['address'] ? $_SESSION['user']['address'] : '' ?>">
								<p id="address_err" style="color:red">
									<?= isset($address_err) ? $address_err : '' ?>
								</p>
							</div>

							<!-- <div class="col-12 mb-5">
								<div class="check-box mb-15">
									<input name="isUseCurrentAddress" type="checkbox" id="current_address">
									<label for="current_address">Use current address</label>
								</div>
								
							</div> -->

						</div>

					</div>
					<div class="col-12 mb-40">

						<h4 class="checkout-title">Payment Method</h4>

						<div class="checkout-payment-method">



							<div class="single-method">
								<input id="opener" type="radio" id="payment_bank" name="payment-method" value="bank">
								<label for="payment_bank">Direct Bank Transfer</label>
								<p data-method="bank">Please send a Check to Store name with Store Street, Store
									Town, Store State, Store Postcode, Store Country.</p>
							</div>

							<div class="single-method">
								<button name="redirect">VNPAY</button>
								<input type="radio" id="payment_cash" name="payment-method" value="cash">
								<label for="payment_cash">Cash on Delivery</label>
								<p data-method="cash">Please send a Check to Store name with Store Street, Store
									Town, Store State, Store Postcode, Store Country.</p>
							</div>
							<p id="payments_err" style="color:red">
								<?= isset($payments_err) ? $payments_err : " " ?>
							</p>


						</div>
						<input style="background-color:black; color:white" type="submit" class="place-order"
							value="Place order" name="submit">

					</div>

				</div>

				<div class="col-lg-5">
					<div class="row">

						<!-- Cart Total -->
						<div class="col-12 mb-40">

							<h4 class="checkout-title">Cart Total</h4>

							<div class="checkout-cart-total">

								<h4>Product <span>Total</span></h4>

								<ul>
									<?php
									$grandTotal = 0;
									foreach ($cartItems as $key => $item) {
										$grandTotal += ($item['product_price'] * $item['quantity']);
										$product = loadone_sanpham($item['product_id']);
										?>
										<li>
											<p style="width:350px">
												<?= $product['name'] ?> X
												<?= $item['quantity'] ?>
											</p>

											<span>$
												<?= number_format(($item["product_price"] * intval($item['quantity'])) / 26000, 1) ?>
											</span>
										</li>
									<?php } ?>
								</ul>

								<p>Sub Total
									<span>$
										<?= number_format($grandTotal / 26000, 1) ?>
									</span>
									<input type="hidden" name="grandTotal"
										value="<?= number_format($grandTotal / 26000, 1) ?>">
								</p>
								<p>Shipping Fee <span>$
										<?= ($grandTotal > 300000) ? 0.00 : 2.5 ?>
									</span></p>
								<input name="shippingFee" type="hidden" value="<?= ($grandTotal > 300000) ? 0 : 2.5 ?>">

								<h4>Grand Total <span>$
										<?= number_format($grandTotal / 26000, 1) ?>
									</span></h4>

							</div>

						</div>

						<!-- Payment Method -->
						<!-- <div class="col-12 mb-40">

							<h4 class="checkout-title">Payment Method</h4>

							<div class="checkout-payment-method">

								

								<div class="single-method">
									<input type="radio" id="payment_bank" name="payment-method" value="bank">
									<label for="payment_bank">Direct Bank Transfer</label>
									<p data-method="bank">Please send a Check to Store name with Store Street, Store
										Town, Store State, Store Postcode, Store Country.</p>
								</div>

								<div class="single-method">
									<input type="radio" id="payment_cash" name="payment-method" value="cash">
									<label for="payment_cash">Cash on Delivery</label>
									<p data-method="cash">Please send a Check to Store name with Store Street, Store
										Town, Store State, Store Postcode, Store Country.</p>
								</div>
								<p id="payments_err" style="color:red"><?= isset($payments_err) ? $payments_err : '' ?></p>

								
							</div>
							<input style="background-color:black; color:white" type="submit" class="place-order" value="Place order" name="submit">

						</div> -->

					</div>
				</div>

			</div>
		</form>

	</div>
</div><!-- Page Section End -->


<div id="dialog" class="contain-overlay-product-detail">
	<div class="contain-product-detail">

		<!-- ------------------------------ -->
		<div class="sideBar_pay" style="color:white">
			<div class="timePay blockPayment">
				<span style="margin-bottom:12px">Đơn hàng hết hạn sau</span>
				<span id="countdown" class="timeRestPay">10:00</span>
			</div>
			<div class="timePay blockPayment">
				<span><i class="fa-solid fa-shop"></i> Nhà cung cấp</span>
				<span>Shop</span>
			</div>
			<div class="timePay blockPayment">
				<span><i class="fa-solid fa-money-bill"></i> Số tiền</span>
				<span>
					<?= number_format($grandTotal) ?> đ
				</span>
			</div>
			<div class="timePay blockPayment">
				<span><i class="fa-solid fa-circle-info"></i> Thông tin</span>
				<span>Thanh toán bằng MBbank</span>
				<span>STK : 123456789</span>
			</div>
			<!-- <div class="timePay blockPayment">
					  <span><i class="fa-solid fa-id-card-clip"></i> Mã đơn hàng</span>
					  <span > <?= $orderId ?></span>
					</div> -->
			<div class="timePay blockPayment">
				<button class="button-back-pay">
					<i class="fa-solid fa-arrow-left"></i> Quay lại
				</button>
			</div>
		</div>
		<!-- ------------------------------ -->
		<div class="contain_QR_code">
			<div class="w-100 d-f jf-e">
				<div class="close_show">
					<i class="fa-solid fa-xmark"></i>
				</div>
			</div>

			<div class="contain_logo_MBbank">
				<div class="logo_MBbank">
					<img width="120px" src="img/logo/mbbank.png" alt="">
				</div>
				<div class="logo_MBbank">
					<img width="120px" src="img/logo/mbbank.png" alt="">
				</div>
			</div>
			<div id="opener" style="text-align:right; font-size:22px" id="closeQrBtn">x</div>
			<div class="line_pay"></div>
			<div class="qr_code w-100 d-f al-c f-d" style="text-align:center">
				<h4 class="m-t-b10" style="font-weight:700">Quét mã để thanh toán</h4>
				<div style="margin:0 auto; text-align:center" class="img_QR_code">
					<img src="upload/qrcode.jpg" width="230px" alt="">
				</div>
				<p>
					Sử dụng app MBBank để quét mã
				</p>
				<div style="display:flex; justify-content:center; gap:10px">
					<span class="loading-pay ">
						<div class="loader"></div>
					</span>
					<span class="processing-pay">
						Đang chờ quét mã
					</span>
				</div>
			</div>
			<div class="notePay">
				* Sau khi chuyển khoản hãy chờ để ngân hàng xác nhận
			</div>

		</div>
	</div>
</div>
<script>
	// Lấy phần tử đồng hồ đếm ngược
	var countdownElement = document.getElementById("countdown");

	// Thời gian bắt đầu (10 phút)
	var startTime = 10 * 60;

	// Định dạng thời gian MM:SS
	function formatTime(seconds) {
		var minutes = Math.floor(seconds / 60);
		var remainingSeconds = seconds % 60;

		return minutes.toString().padStart(2, '0') + ":" + remainingSeconds.toString().padStart(2, '0');
	}

	// Cập nhật đồng hồ đếm ngược
	function updateCountdown() {
		countdownElement.textContent = formatTime(startTime);

		if (startTime > 0) {
			startTime--;
			setTimeout(updateCountdown, 1000); // Cập nhật sau mỗi giây
		} else {
			countdownElement.textContent = "Hết giờ!";
		}
	}

	// Bắt đầu đồng hồ đếm ngược
	updateCountdown();




	$( function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
  } );
</script>