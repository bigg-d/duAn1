<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
	<div class="container">
		<div class="row">
			<div class="page-banner-content col">

				<h1>Single Product</h1>
				<ul class="page-breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="">Single Product</a></li>
				</ul>

			</div>
		</div>
	</div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
	<form class="container" action='index.php?act=addtocart' method="POST" >
		<div class="row row-30 mbn-50">

			<div class="col-12">
				<div class="row row-20 mb-10">

					<div class="col-lg-6 col-12 mb-40">

						<div class="pro-large-img mb-10 fix easyzoom easyzoom--overlay easyzoom--with-thumbnails">
							<a href="">
								<img src="upload/<?= $sanpham['img'] ?>" alt="" />
							</a>
							<input type="hidden" name="img" value="<?= $sanpham['img'] ?>">
						</div>
						<!-- Single Product Thumbnail Slider -->
						<ul id="pro-thumb-img" class="pro-thumb-img">
							<?php
							$images = explode(',', $sanpham['images']);
							foreach ($images as $key => $image) { ?>
								<li><a href="" data-standard="upload/<?= $image ?>"><img src="upload/<?= $image ?>"
											alt="" /></a></li>
							<?php } ?>
						</ul>
					</div>

					<div class="col-lg-6 col-12 mb-40">
						<div class="single-product-content">

							<div class="head">
								<div class="head-left">
									<input type="hidden" name="name" value="<?= $sanpham['name'] ?>">
									<input type="hidden" name="id" value="<?= $sanpham['id'] ?>">
									<h3 class="title">
										<?= $sanpham['name'] ?>
									</h3>

									<div class="ratting">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
										<i class="fa fa-star-o"></i>
									</div>

								</div>

								<div class="head-right">
									<span class="price">$
										<?= number_format(($sanpham['price'] / 26000), 1)?>
									</span>
									<input type="hidden" name="price" value="<?= $sanpham['price'] ?>">
								</div>
							</div>

							<div class="description">
								<p>
									<?= $sanpham['mota'] ?>
								</p>
							</div>

							<span class="availability">Availability: <span>
									<?= $sanpham['stock_quantity'] > 0 ? 'In Stock' : 'Out Of Stock' ?>
								</span></span>
							<input type="hidden" name="stock_quantity" value="<?=$sanpham['stock_quantity']?>">	

							<div class="quantity-colors">

								<div class="quantity">
									<h5>Quantity:</h5>
									<div class="pro-qty"><input type="number" name="quantity" min='1' value="1"></div>
								</div>

								<!-- <div class="colors">
									<h5>Color:</h5>
									<div class="color-options">
										<button style="background-color: #ff502e"></button>
										<button style="background-color: #fff600"></button>
										<button style="background-color: #1b2436"></button>
									</div>
								</div> -->

							</div>

							<div class="actions">
								<input type="hidden" name='addtocart' value="addtocart">
								<button><i class="ti-shopping-cart"></i><span>ADD TO CART</span></button>
								<button class="box" data-tooltip="Compare"><i class="ti-control-shuffle"></i></button>
								<button class="box" data-tooltip="Wishlist"><i class="ti-heart"></i></button>

							</div>

							<div class="tags">

								<h5>Tags:</h5>
								<a href="#">Electronic</a>
								<a href="#">Smartphone</a>
								<a href="#">Phone</a>
								<a href="#">Charger</a>
								<a href="#">Powerbank</a>

							</div>

							<div class="share">

								<h5>Share: </h5>
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>

							</div>

						</div>
					</div>

				</div>

				<div class="row mb-50">
					<!-- Nav tabs -->
					<div class="col-12">
						<ul class="pro-info-tab-list section nav">
							<li><a class="active" href="#more-info" data-bs-toggle="tab">More info</a></li>
							<li><a href="#data-sheet" data-bs-toggle="tab">Data sheet</a></li>
							<li><a href="#reviews" data-bs-toggle="tab">Reviews</a></li>
						</ul>
					</div>
					<!-- Tab panes -->
					<div class="tab-content col-12">
						<div class="pro-info-tab tab-pane active" id="more-info">
							<p>Fashion has been creating well-designed collections since 2010. The brand offers feminine
								designs delivering stylish separates and statement dresses which have since evolved into
								a full ready-to-wear collection in which every item is a vital part of a woman's
								wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable
								signature style. All the beautiful pieces are made in Italy and manufactured with the
								greatest attention. Now Fashion extends to a range of accessories including shoes, hats,
								belts and more!</p>
						</div>
						<div class="pro-info-tab tab-pane" id="data-sheet">
							<table class="table-data-sheet">
								<tbody>
									<tr class="odd">
										<td>Compositions</td>
										<td>Cotton</td>
									</tr>
									<tr class="even">
										<td>Styles</td>
										<td>Casual</td>
									</tr>
									<tr class="odd">
										<td>Properties</td>
										<td>Short Sleeve</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="pro-info-tab tab-pane" id="reviews">
							<a href="#">Be the first to write your review!</a>
						</div>
					</div>
				</div>

			</div>

		</div>
	</form>
</div><!-- Page Section End -->

<!-- Related Product Section Start -->
<div class="section section-padding pt-0">
	<div class="container" style="margin-bottom: 100px">

		<div class="section-title text-start mb-30">
			<h1>Related Product</h1>
		</div>

		<div class="related-product-slider related-product-slider-1 slick-space p-0">
			<?php foreach ($splienquan as $key => $sanpham) { ?>
				<div class="slick-slide">
	
					<div class="product-item">
						<div class="product-inner">
	
							<div class="image">
								<img src="upload/<?=$sanpham['img']?>" alt="">
	
								<div class="image-overlay">
									<div class="action-buttons">
										<?php if ($sanpham['stock_quantity'] > 0): ?>
											<input class="addtocartBtn" type="submit" name="addtocart" value="add to cart">
											<input class="addtocartBtn" type="hidden" name="stock_quantity"
												value="<?php echo $product['stock_quantity'] ?>">
											<input type="button" name="addtowishlist" value="add to wishlist">
										<?php else: ?>
											<div class="outofstock">Hết hàng</div>
										<?php endif; ?>
									</div>
	
								</div>
	
								<div class="content">
	
									<div class="content-left">
	
										<h4 class="title"><a href="single-product.html"><?=$sanpham['name']?></a></h4>
	
										<div class="ratting">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
	
										<!-- <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span>
										</h5>
										<h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span
												style="background-color: #0271bc"></span><span
												style="background-color: #efc87c"></span><span
												style="background-color: #00c183"></span></h5> -->
	
									</div>
	
									<div class="content-right">
										<span class="price">$<?= number_format(($sanpham['price'] / 26000), 1)?></span>
									</div>
	
								</div>
	
							</div>
						</div>
	
					</div>
	
	
	
	
	
				</div>
			<?php } ?>
		</div>
	</div><!-- Related Product Section End -->