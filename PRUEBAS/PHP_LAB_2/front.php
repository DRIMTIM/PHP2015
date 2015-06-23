<?php

session_start ();

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="E-Shopper">
<meta name="author" content="DRIMTIM">
<link href="<?php echo __ROOT_CSS . 'bootstrap.min.css'?>" rel="stylesheet">
<link href="<?php echo __ROOT_CSS . 'font-awesome.min.css'?>" rel="stylesheet">
<link href="<?php echo __ROOT_CSS . 'prettyPhoto.css'?>" rel="stylesheet">
<link href="<?php echo __ROOT_CSS . 'price-range.css'?>" rel="stylesheet">
<link href="<?php echo __ROOT_CSS . 'animate.css'?>" rel="stylesheet">
<link href="<?php echo __ROOT_CSS . 'main.css'?>" rel="stylesheet">
<link href="<?php echo __ROOT_CSS . 'responsive.css'?>" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo __ROOT_IMG . 'ico/favicon.ico'?>">
<style type="text/css">
	.search_box input {
	  background: #F0F0E9;
	  border: medium none;
	  color: #B2B2B2;
	  font-family: 'roboto';
	  font-size: 12px;
	  font-weight: 300;
	  height: 35px;
	  outline: medium none;
	  padding-left: 10px;
	  width: 155px;
	  background-image: <?php echo 'url(' . __ROOT_IMG . 'home/searchicon.png)';?>;
	  background-repeat: no-repeat;
	  background-position: 130px;
	}
</style>
<link href="<?php echo __ROOT_CSS . 'style.css'?>" rel="stylesheet">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo __ROOT_IMG . 'ico/apple-touch-icon-144-precomposed.png'?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo __ROOT_IMG . 'ico/apple-touch-icon-114-precomposed.png'?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo __ROOT_IMG . 'ico/apple-touch-icon-72-precomposed.png'?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo __ROOT_IMG . 'ico/apple-touch-icon-57-precomposed.png'?>">
<script src="<?php echo __ROOT_JS . 'jquery-2.1.3.js'?>"></script>
<script src="<?php echo __ROOT_JS . 'bootstrap.js'?>"></script>
<script src="<?php echo __ROOT_JS . 'jquery.scrollUp.min.js'?>"></script>
<script src="<?php echo __ROOT_JS . 'price-range.js'?>"></script>
<script src="<?php echo __ROOT_JS . 'jquery.prettyPhoto.js'?>"></script>
<script src="<?php echo __ROOT_JS . 'main.js'?>"></script>
<script src="<?php echo __ROOT_JS . 'jquery.easyModal.js'?>"></script>
<script src="<?php echo __ROOT_JS . 'jquery.mCustomScrollbar.concat.min.js'?>"></script>
<title>Inicio | E-Shopper</title>
</head>
<body>	
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="<?php echo __ROOT_IMG . 'home/logo.png'?>" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php 
									if($_SESSION[__USER] !== null){?>
									<li><a href="#"><i class="fa fa-star"></i> Lista de deseos</a></li>
									<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
									<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Carro</a></li>
									<li class="dropdown">
							          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> Cuenta</a></a>
							          <ul class="dropdown-menu" role="menu">
							            <li><a href="<?php echo __ROOT . "/user/account"?>">Modificar Datos</a></li>
							            <li><a href="<?php echo __ROOT . "/user/logout"?>">Cerrar Sesión</a></li>
							          </ul>
							        </li>
								<?php }else{?>
								<li><a href="<?php echo __ROOT . "/user/login"?>"><i class="fa fa-lock"></i> Login</a></li>
								<li><a href="<?php echo __ROOT . "/user/signin"?>"><i class="fa fa-user"></i> Registro</a></li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->	
	<?php $registry->router->loader();?>
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php echo __ROOT_IMG . 'home/iframe1.png'?>" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php echo __ROOT_IMG . 'home/iframe2.png'?>" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php echo __ROOT_IMG . 'home/iframe3.png'?>" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php echo __ROOT_IMG . 'home/iframe4.png'?>" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="<?php echo __ROOT_IMG . 'home/map.png'?>" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->
</body>
</html>
