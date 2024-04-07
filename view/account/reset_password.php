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
        
        <h3 style="text-align:center; margin:0 0 20px 0;">Forgot Password</h3>
        <form style="line-height: 60px;" action="index.php?act=reset" method="post">
            <input type="email" name="user_name" placeholder="Email" id="" value="<?php echo isset($name_reset)? $name_reset : '' ?>">
            <span><?php echo isset($error)? $error : '' ?></span>
            <input  style="width:100%; margin-top:10px;" type="submit" name="submit" value="Reset" id="">
            
        </form>
    </div>