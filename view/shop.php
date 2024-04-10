<?php
$popular_products = loadall_sanpham_popular();
?>
<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Shop</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Shop</a></li>
                </ul>

            </div>
        </div>
    </div>
</div><!-- Page Banner Section End -->
<!-- Page Section Start -->
<div class="page-section section section-padding">
    <div class="container">
        <div class="row row-30 mbn-40">

            <div class="col-xl-9 col-lg-8 col-12 order-1 order-lg-1 mb-40">
                <div class="row">

                    <div class="col-12">
                        <!-- <div class="product-show">
                                <h4>Show:</h4>
                                <select class="nice-select">
                                    <option>8</option>
                                    <option>12</option>
                                    <option>16</option>
                                    <option>20</option>
                                </select>
                            </div> -->
                        <!-- <div class="product-short">
                                <h4>Short by:</h4>
                                <select class="nice-select">
                                    <option>Name Ascending</option>
                                    <option>Name Descending</option>
                                    <option>Date Ascending</option>
                                    <option>Date Descending</option>
                                    <option>Price Ascending</option>
                                    <option>Price Descending</option>
                                </select>
                            </div> -->
                    </div>
                    <?php foreach ($listsanpham as $key => $product) { ?>
                        <form action="index.php?act=addtocart" method="post" enctype="multipart/form-data"
                            class="item col-xl-4 col-md-6 col-12 mb-40">

                            <div class="product-item">
                                <div class="product-inner">

                                    <div class="image">
                                        <img src="upload/<?= $product['img'] ?>" alt="">
                                        <input name="img" type="hidden" value="<?php echo $product['img'] ?>">
                                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                                        <div class="image-overlay">
                                            <div class="action-buttons">
                                                <?php if ($product['stock_quantity'] > 0): ?>
                                                    <input class="addtocartBtn" type="submit" name="addtocart"
                                                        value="add to cart">
                                                    <input class="addtocartBtn" type="hidden" name="stock_quantity"
                                                        value="<?php echo $product['stock_quantity'] ?>">
                                                    <input type="button" name="addtowishlist" value="add to wishlist">
                                                <?php else: ?>
                                                    <div class="outofstock">Hết hàng</div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="content">

                                        <div class="content-left">

                                            <h4 class="title"><a onclick="()=>{ alert('Đã thêm sản phẩm vào giỏ hàng')}"
                                                    href="index.php?act=detailProduct&id=<?= $product['id'] ?>">
                                                    <?= $product['name'] ?>
                                                </a></h4>
                                            <input name="name" type="hidden" value="<?php echo $product['name'] ?>">


                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>

                                            <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span>
                                            </h5>
                                            <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span
                                                    style="background-color: #0271bc"></span><span
                                                    style="background-color: #efc87c"></span><span
                                                    style="background-color: #00c183"></span></h5>

                                        </div>

                                        <div class="content-right">
                                            <span class="price">$
                                                <?= number_format(($product['price'] / 26000), 1) ?>
                                            </span>
                                        </div>
                                        <input name="price" type="hidden" value="<?php echo $product['price'] ?>">


                                    </div>

                                </div>
                            </div>

                        </form>
                    <?php } ?>
                    <div class="col-12">
                        <ul class="page-pagination" id="pagination-numbers">
                            <!-- <li><a href="#"><i class="fa fa-angle-left"></i></a></li> -->

                            <!-- <li><a href="#"><i class="fa fa-angle-right"></i></a></li> -->
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-12 order-2 order-lg-2 mb-40">

                <div class="sidebar">
                    <h4 class="sidebar-title">Category</h4>
                    <ul class="sidebar-list">
                        <li><a href="index.php?act=shop">Tất cả</a></li>
                        <?php foreach ($listdanhmuc as $key => $danhmuc) {

                            $total_product = tong_sanpham($danhmuc['iddm']);
                            if ($danhmuc['trangthai'] !== 0) {
                                echo '
    <li><a href="index.php?act=shop&iddm=' . $danhmuc['iddm'] . '">
        ' . $danhmuc['tendanhmuc'] . ' <span class="num">' . $total_product[0][0] . '</span>
    </a></li>
';
                            }
                        }
                        ?>

                    </ul>
                </div>

                <form action="index.php?act=shop" method="post" class="sidebar">
                    <h4 class="sidebar-title">Price</h4>
                    <div style="display:flex; gap:14px; margin-bottom:12px">
                        <input style="padding:4px 8px; width:35%;" name='min_price' type="number" placeholder="Từ">
                        <input style="padding:4px 8px; width:35%;" name='max_price' type="number" placeholder="Đến">
                    </div>
                    <button
                        style="color:white;font-weight: 500;width:100%;background-color:#94B7EC; border:none; padding:4px 6px; border-radius:12px">Tìm
                        kiếm</button>
                </form>
                <div class="sidebar">
                    <h4 class="sidebar-title">Popular Product</h4>
                    <div class="sidebar-product-wrap">
                        <?php
                        foreach ($popular_products as $key => $product) { ?>
                            <div class="sidebar-product">
                                <a href="single-product.html" class="image"><img src="upload/<?= $product['img'] ?>"
                                        alt=""></a>
                                <div class="content">
                                    <a href="index.php?act=detailProduct&id=<?= $product['id'] ?>" class="title">
                                        <?= $product['name'] ?>
                                    </a>
                                    <span class="price">$
                                        <?= number_format(($product['price'] / 26000), 1) ?>
                                    </span>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div><!-- Page Section End -->
<script src="./assets/js/admin/shopPagination.js"></script>