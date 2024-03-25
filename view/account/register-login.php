 <!-- Page Banner Section Start -->
 <style>

    .form_register span{
        color: red; 
        margin-left: 20px;
    }
   
 </style>
 <div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="page-banner-content col">

                    <h1>Login & Register</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="wishlist.php">Wishlist</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div><!-- Page Banner Section End -->

    <!-- Page Section Start -->
    <div class="page-section section section-padding">
        <div class="container">
            <div class="row mbn-40">

                <div class="col-lg-4 col-12 mb-40">
                    <div class="login-register-form-wrap">
                        <h3>Login</h3>
                        
                        <form  action="index.php?act=login" class="mb-30 form_register" method="post">
                            <div class="row">
                                <div class="col-12 mb-15"><input name="email" value="<?php echo isset($email) ? $email : "" ?>" type="text" placeholder="Email">
                                <span><?php echo isset($loi_dn) ? $loi_dn : ""; ?></span>
                                </div>
                                <div class="col-12 mb-15"><input name="password" type="password" placeholder="Password"></div>
                                <div class="col-12"><input name="submit" type="submit" value="Login"></div>
                            </div>
                        </form>
                        <h4>You can also login with...</h4>
                        <div class="social-login">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-12 mb-40 text-center d-none d-lg-block">
                    <span class="login-register-separator"></span>
                </div>

                <div class="col-lg-6 col-12 mb-40 ms-auto">
                    <div class="login-register-form-wrap" >
                        <h3>Register</h3>
                        <form class="form_register" action="index.php?act=register" method="post">
                            <div class="row">
                                <div class="col-md-6 col-12 mb-15"><input name="firstname" value="<?php echo isset($firstname) ? $firstname : "" ?>" type="text" placeholder="Your First Name">
                                <span ><?php echo isset($loiten1) ? $loiten1 : ""; ?></span>
                                </div>
                                <div class="col-md-6 col-12 mb-15"><input name="lastname" value="<?php echo isset($lastname) ? $lastname : "" ?>" type="text" placeholder="Your Last Name">
                                <span><?php echo isset($loiten2) ? $loiten2 : ""; ?></span>
                                </div>
                                <div class="col-md-6 col-12 mb-15"><input name="username" type="text" value="<?php echo isset($username) ? $username : "" ?>" placeholder="Your Display Name"> 
                                <span><?php echo isset($loiten3) ? $loiten3 : ""; ?></span>
                                </div>
                                <div class="col-md-6 col-12 mb-15"><input name="email" type="email"  value="<?php echo isset($email) ? $email : "" ?>" placeholder="Email">
                                <span><?php echo isset($loiemail) ? $loiemail : ""; ?></span>

                                </div>
                                <div class="col-md-6 col-12 mb-15"><input name="password" type="password" value="<?php echo isset($password) ? $password : "" ?>" placeholder="Password">
                                <span><?php echo isset($loimk1) ? $loimk1 : ""; ?></span>
                                </div>
                                <div class="col-md-6 col-12 mb-15"><input type="password" name="confirm" placeholder="Confirm Password"><span><?php echo isset($loimk2) ? $loimk2 : ""; ?></span>
                                </div>
                                <div class="col-md-6 col-12"><input name="submit" type="submit" value="Register"></div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div><!-- Page Section End -->

   