<?php
?>
<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
	<div class="container">
		<div class="row">
			<div class="page-banner-content col">
				<h1>My Account</h1>
				<ul class="page-breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li><a href="my-account.html">My Account</a></li>
				</ul>

			</div>
		</div>
	</div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
	<div class="container">
		<div class="row mbn-30">

			<!-- My Account Tab Menu Start -->
			<div class="col-lg-3 col-12 mb-30">
				<div class="myaccount-tab-menu nav" role="tablist">
					<a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
						Dashboard</a>

					<a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>

					<a href="#download" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>

					<a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Payment
						Method</a>

					<a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> address</a>

					<a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>

					<a href="index.php?act=logout"><i class="fa fa-sign-out"></i> Logout</a>
				</div>
			</div>
			<!-- My Account Tab Menu End -->

			<!-- My Account Tab Content Start -->
			<div class="col-lg-9 col-12 mb-30">
				<div class="tab-content" id="myaccountContent">
					<!-- Single Tab Content Start -->
					<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
						<div class="myaccount-content">
							<h3>Dashboard</h3>

							<div class="welcome">
								<p>Hello, <strong>
										<?php
										if (isset($user)) {
											echo $user;
										}
										?>
									</strong></p>
							</div>

							<p class="mb-0">From your account dashboard. you can easily check &amp; view your
								recent orders, manage your shipping and billing addresses and edit your
								password and account details.</p>
							<?php
							if ($role === 1) {
								echo "<a style=\"background-Color:#ff708a;border: 1px solid #eeeeee;
										border-bottom: none;
										margin-top:40px;
										color: #333333;
										font-weight: 600;
										font-size: 12px;
										padding: 15px 15px 13px;
										text-transform: uppercase;\" href=\"admin/index.php\" >Go to admin</a>";
							}
							?>
						</div>
					</div>
					<!-- Single Tab Content End -->

					<!-- Single Tab Content Start -->
					<div class="tab-pane fade" id="orders" role="tabpanel">
						<div class="myaccount-content">
							<h3>Orders</h3>

							<div class="myaccount-table table-responsive text-center">
								<table class="table table-bordered">
									<thead class="thead-light">
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Date</th>
											<th>Status</th>
											<th>Total</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										<?php foreach ($orders as $key => $order) {
											extract($order);
											$trangthaidonhang = $process; // Giá trị của biến $process
										
											switch ($trangthaidonhang) {
												case 0:
													$status = "Tiếp nhận đơn hàng";
													break;
												case 1:
													$status = "Đang xử lí";
													break;
												case 2:
													$status = "Đang giao hàng";
													break;
												case 3:
													$status = "Giao hàng thành công";
													break;
												case 4:
													$status = "Đã hủy đơn (Admin)";
													break;
												case 5:
													$status = "Đã hủy đơn (KH)";
													break;
												default:
													$status = "Trạng thái không xác định";
											}
											?>
											<tr>
												<td>1</td>
												<td>
													<?= $recipient_name ?>
												</td>
												<td>
													<?= $order_date ?>
												</td>
												<td>
													<?= $status ?>
												</td>
												<td>$
													<?= $total_amount + $shipping_fee ?>
												</td>
												<td><a href="index.php?act=orderDetail&orderid=<?= $order_id ?>"
														class="btn btn-dark btn-round">View</a></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- Single Tab Content End -->

					<!-- Single Tab Content Start -->
					<div class="tab-pane fade" id="download" role="tabpanel">
						<div class="myaccount-content">
							<h3>Downloads</h3>

							<div class="myaccount-table table-responsive text-center">
								<table class="table table-bordered">
									<thead class="thead-light">
										<tr>
											<th>Product</th>
											<th>Date</th>
											<th>Expire</th>
											<th>Download</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td>Moisturizing Oil</td>
											<td>Aug 22, 2022</td>
											<td>Yes</td>
											<td><a href="#" class="btn btn-dark btn-round">Download File</a></td>
										</tr>
										<tr>
											<td>Katopeno Altuni</td>
											<td>Sep 12, 2022</td>
											<td>Never</td>
											<td><a href="#" class="btn btn-dark btn-round">Download File</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- Single Tab Content End -->

					<!-- Single Tab Content Start -->
					<div class="tab-pane fade" id="payment-method" role="tabpanel">
						<div class="myaccount-content">
							<h3>Payment Method</h3>

							<p class="saved-message">You Can't Saved Your Payment Method yet.</p>
						</div>
					</div>
					<!-- Single Tab Content End -->

					<!-- Single Tab Content Start -->
					<div class="tab-pane fade" id="address-edit" role="tabpanel">
						<div class="myaccount-content">
							<h3>Billing Address</h3>

							<div class="account-details-form">
								<form id="edit_address">
									<div class="row">
										<div class="col-lg-6 col-12 mb-30">
											Address
											<input id="address"value="<?php echo $user_info[0]['address'] ?>" type="text" name="address"  >
										</div>

										<div class="col-lg-6 col-12 mb-30">
												Phone
											<input id="phone" value="<?php echo $user_info[0]['phone'] ?>" type="text" name="phone" >
										</div>
										
										
										<div class="col-12">
											<span id="notify" style="color:red"></span><br>
											<button type="submit" class="btn btn-dark btn-round btn-lg">Save Changes</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- Single Tab Content End -->

					<!-- Single Tab Content Start -->
					<div class="tab-pane fade" id="account-info" role="tabpanel">
						<div class="myaccount-content">
							<h3>Account Details</h3>

							<div class="account-details-form">
								<form id="edit_pass">
									<div class="row">
										<div class="col-lg-6 col-12 mb-30">
											
											<input id="first-name"value="<?php echo $user_info[0]['firstname'] ?>" type="text" disabled >
										</div>

										<div class="col-lg-6 col-12 mb-30">
											<input id="last-name" value="<?php echo $user_info[0]['lastname'] ?>" type="text" disabled>
										</div>

										<div class="col-12 mb-30">
											<input id="display-name"  value="<?php echo $user_info[0]['username'] ?>" type="text" disabled>
										</div>

										<div class="col-12 mb-30">
											<input id="email" value="<?php echo $user_info[0]['email'] ?>" type="email" disabled>
										</div>

										<div class="col-12 mb-30">
											<h4>Password change</h4>
										</div>

										<div class="col-12 mb-30">
											<input id="currentpwd" placeholder="Current Password" name="current_pwd" type="password" >
										</div>

										<div class="col-lg-6 col-12 mb-30">
											<input id="new-pwd" placeholder="New Password"  name="new_pwd" type="password">
										</div>

										<div class="col-lg-6 col-12 mb-30">
											<input id="confirm-pwd" placeholder="Confirm Password" name="confirm_pwd" type="password">
											<span style="color: red;" id="noidung1" > </span>		
										</div>

										<div class="col-12">
											<button type="submit" class="btn btn-dark btn-round btn-lg">Save Changes</button>
										</div>

										<span style="color: red;" id="noidung" > </span>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- Single Tab Content End -->
				</div>
			</div>
			<!-- My Account Tab Content End -->

		</div>
	</div>
</div><!-- Page Section End -->
<script>
$(document).ready(function() {
		$("#edit_pass").submit(function(event) {
			event.preventDefault();
			
			
			var current_pwd = $('#currentpwd').val();
			var new_pwd = $('#new-pwd').val();
			var confirm_pwd = $('#confirm-pwd').val();							
					
					$.ajax({
					url: "view/account/xuly_pass.php", 
					method: "POST", 
					data: {
						currentpwd:current_pwd,
						new_pwd:new_pwd,
						confirm_pwd:confirm_pwd
					},
					dataType: 'html',
					success: function(response) {

						response = JSON.parse(response);
						if(new_pwd =='' &&  confirm_pwd == ''){
							$('#noidung1').html('Không bỏ trống');
						}
						else if(new_pwd != confirm_pwd){
							$('#noidung1').html('Mật khẩu không khớp');
						}else{
							$('#noidung1').html('');
							
						}
                        if(response.status == 0){
							// $('#noidung').html(response.message);
							if(new_pwd != '' &&  confirm_pwd !=''){
								if(new_pwd == confirm_pwd){
									$('#noidung').html('Đăng ký thành công');
								}
							}			
						}else{
							$('#noidung').html(response.message);
						}
					}
					});
            });
  });
$(document).ready(function() {
		$("#edit_address").submit(function(event) {
			event.preventDefault();
			
			
			var address = $('#address').val();
			var phone = $('#phone').val();					
					$.ajax({
					url: "view/account/xuly_address.php", 
					method: "POST", 
					data: {
						address:address,
						phone:phone,
					},
					dataType: 'html',
					success: function(response) {

						// response = JSON.parse(response);
						if(address =='' &&  phone == ''){
							$('#notify').html('Không bỏ trống');
						}else{
							$('#notify').html('Cập nhật thành công');
						}
                        
					}
					});
            });
  });
</script>