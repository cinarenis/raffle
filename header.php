<?php 
include 'opadmin/raffle/baglan.php';

$ayarsor=$db->prepare("Select * FROM ayar WHERE ayar_id=:id");
$ayarsor->execute(array(
	'id' => 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>">
	<meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']; ?>">
	<meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>">
	<title><?php echo $ayarcek['ayar_title']; ?></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->       
<link rel="shortcut icon" href="images/ico/favicon.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a><i class="fa fa-phone"></i> <?php echo $ayarcek['ayar_tel']; ?></a></li>
								<li><a href="mailto:<?php echo $ayarcek['ayar_mail']; ?>"><i class="fa fa-envelope"></i> <?php echo $ayarcek['ayar_mail']; ?></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="http://<?php echo $ayarcek['ayar_facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
								<li><a href="http://<?php echo $ayarcek['ayar_twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
								<li><a href="http://<?php echo $ayarcek['ayar_google']; ?>"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="http://<?php echo $ayarcek['ayar_youtube']; ?>"><i class="fa fa-youtube"></i></a></li>
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
							<a href="index.php"><img src="images/home/logo.png" alt="<?php echo $ayarcek['ayar_title']; ?>" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
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
								<li><a href="index.php" class="active">Anasayfa</a></li>
								<?php 
								$menusor=$db->prepare("SELECT * FROM menu order by menu_sira ASC");
								$menusor->execute();
								while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {
									?>
									<li><a href="contact-us.html"><?php echo $menucek['menu_ad']; ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Çekiliş Ara"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->