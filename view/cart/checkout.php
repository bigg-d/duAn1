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
		<form action="index.php?act=checkout" method="post" class="checkout-form">
			<div class="row row-50 mbn-40">

				<div class="col-lg-7">

					<!-- Billing Address -->
					<div id="billing-form" class="mb-20">
						<h4 class="checkout-title">Billing Address</h4>

						<div class="row">

							<div class="col-md-6 col-12 mb-5">
								<label>First Name*</label>
								<input type="text" name="firstName" id="first-name" placeholder="First Name">
								<input type="hidden" name="currentFirstName" id="currentFirstName" value="<?=$user['firstname'] ? $user['firstname']: ''?>">
							</div>

							<div class="col-md-6 col-12 mb-5">
								<label>Last Name*</label>
								<input type="text" name="lastName" id="last-name" placeholder="Last Name">
								<input type="hidden" name="currentLastName" id="currentLastName" value="<?=$user['lastname'] ? $user['lastname'] : ''?>">
							</div>

							<div class="col-md-6 col-12 mb-5">
								<label>Email Address*</label>
								<input type="email" name="email" id="email" placeholder="Email Address">
								<input type="hidden" name="currentEmail" id="currentEmail" value="<?=$user['email'] ? $user['email'] : ""?>">
							</div>

							<div class="col-md-6 col-12 mb-5">
								<label>Phone no*</label>
								<input type="text" name="phone" id="phone" placeholder="Phone number">
								<input type="hidden" name="currentPhone" id="currentPhone" value="<?=$user['phone'] ? $user['phone'] : "Vui lòng bổ sung số điện thoại"?>">
							</div>


							<div class="col-12 mb-5">
								<label>Address*</label>
								<input type="text" id="address" name="address" placeholder="Address">
								<input type="hidden" name="currentAddress" id="currentAddress" value="<?=$user['address'] ? $user['address']: 'Vui lòng bổ sung địa chỉ'?>">
							</div>

							<div class="col-md-6 col-12 mb-5">
								<label>Country*</label>
								<select class="nice-select">
									<option>Bangladesh</option>
									<option>China</option>
									<option>country</option>
									<option>India</option>
									<option>Japan</option>
								</select>
							</div>

							<div class="col-md-6 col-12 mb-5">
								<label>Town/City*</label>
								<input type="text" placeholder="Town/City">
							</div>

							<div class="col-12 mb-5">
								<div class="check-box mb-15">
									<input name="isUseCurrentAddress" type="checkbox" id="current_address">
									<label for="current_address">Use current address</label>
								</div>
								<div class="check-box mb-15">
									<input type="checkbox" id="shiping_address" data-shipping>
									<label for="shiping_address">Ship to Different Address</label>
								</div>
							</div>

						</div>

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
									<?php foreach ($ids as $key => $id) {
										$product = loadone_sanpham($id);
										?>
										<li>
											<p style="width:350px">
												<?= $product['name'] ?> X <?= $quantities[$key] ?>
											</p>

											<span>$
												<?= ($quantities[$key] * $prices[$key]) ?>
											</span>
										</li>
									<?php } ?>
								</ul>

								<p>Sub Total
									<span>$
										<?php echo $grandTotal;
										?>
									</span>
									<input type="hidden" name="grandTotal" value="<?=$grandTotal?>">
								</p>
								<p>Shipping Fee <span>$00.00</span></p>

								<h4>Grand Total <span>$
										<?php echo $grandTotal?>
									</span></h4>

							</div>

						</div>

						<!-- Payment Method -->
						<div class="col-12 mb-40">

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
							</div>
							<input style="background-color:black; color:white" type="submit" class="place-order" value="Place order" name="submit">

						</div>

					</div>
				</div>

			</div>
		</form>

	</div>
</div><!-- Page Section End -->
<script>
    // Lấy các phần tử DOM
    const firstNameInput = document.getElementById('first-name');
    const lastNameInput = document.getElementById('last-name');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const addressInput = document.getElementById('address');
    const useCurrentAddressCheckbox = document.getElementById('current_address');

    // Lưu dữ liệu cũ của form
    let previousFirstName = document.getElementById('currentFirstName').value;
    let previousLastName = document.getElementById('currentLastName').value;
    let previousEmail = document.getElementById('currentEmail').value;
    let previousPhone = document.getElementById('currentPhone').value;
    let previousAddress = document.getElementById('currentAddress').value;
    // let previousLastName = 'látnam';

    // Xử lý sự kiện khi checkbox thay đổi trạng thái
    useCurrentAddressCheckbox.addEventListener('change', function() {
        if (this.checked) {
            // Nếu được chọn, lưu dữ liệu cũ và gán giá trị vào các ô input
            // previousFirstName = firstNameInput.value;
            // previousLastName = lastNameInput.value;
            firstNameInput.value = previousFirstName;
            lastNameInput.value = previousLastName;
            emailInput.value = previousEmail;
            phoneInput.value = previousPhone;
            addressInput.value = previousAddress;
        } else {
            // Nếu không được chọn, xóa dữ liệu cũ và xóa giá trị của các ô input
            // previousFirstName = firstNameInput.value;
            // previousLastName = lastNameInput.value;
            firstNameInput.value = '';
            lastNameInput.value = '';
			emailInput.value = '';
            phoneInput.value = '';
            addressInput.value = '';
        }
    });
</script>