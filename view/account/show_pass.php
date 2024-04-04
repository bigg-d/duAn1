<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Shop</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Reset Password</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <div class="login-register-form-wrap page-section section section-padding" style="width: 510px;border-radius:5px; padding:60px ;
    margin:80px 32%;box-shadow:0 3px 10px 0px rgba(0,0,0,.14);
    ">  
        
        <h3 style="text-align:center; margin:0 0 20px 0;">My Password</h3>
            <input type="text" placeholder="<?php echo isset($my_pass)? $my_pass : '' ?>" disabled id="">
            <style>
                .back_show{
                    width: auto;
                    background-color: #1a161e;
                    color: #ffffff;
                    text-transform: uppercase;
                    padding: 10px 30px;
                    margin-top:10px;
                    font-weight: 600;height: 44px;
                    line-height: 22px;border-radius:25px;border:none;

                }.back_show:hover{
                    background-color: #DF4993;
                    color: #ffffff;
                }
            </style>
            <button class="back_show"><a style="color: #ffffff;" href="index.php?act=login">Back</a></button>
    </div>