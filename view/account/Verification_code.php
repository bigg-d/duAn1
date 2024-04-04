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
        
        <h3 style="text-align:center; margin:0 0 0 0;">Verification Code</h3><br>
        <p style="text-align:center;margin:0;">Get the code in the email</p>
        <img style="margin:0 43% 10px 43%;" src="./assets/images/hop_thu.png" width="50px" alt="">
        <form style="line-height: 60px;" action="index.php?act=verification_code" method="post">
            <input type="number" name="code" placeholder="Code" id="">
            
            <span><?php echo isset($error)? $error : '' ?></span>
            <input  style="width:100%;" type="submit" name="submit" value="Submit" id="">
            
        </form>
    </div>