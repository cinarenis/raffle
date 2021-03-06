<?php 
ob_start();
session_start();
include '../raffle/baglan.php';
include 'fonksiyon.php';

$ayarsor=$db->prepare("Select * FROM ayar WHERE ayar_id=:id");
$ayarsor->execute(array(
	'id' => 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$kullanicisor=$db->prepare("Select * FROM kullanici WHERE kullanici_mail=:mail");
$kullanicisor->execute(array(
	'mail' => $_SESSION['kullanici_mail']
));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if ($say==0) {
	header('Location:login.php?durum=izinsiz');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>">
	<meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']; ?>">
	<meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>">
	<title><?php echo $ayarcek['ayar_title']; ?> | Admin Panel</title>

	<!-- Bootstrap -->
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- Datatables -->
	<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
	<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
	<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
	<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	<!-- CK Editör -->
	<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="images/img.jpg" alt="<?php echo $kullanicicek['kullanici_adsoyad']; ?>" class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Hoşgeldiniz,</span>
							<h2><?php echo $kullanicicek['kullanici_adsoyad']; ?></h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Genel</h3>
							<ul class="nav side-menu">
								<li><a href="index.php"><i class="fa fa-home"></i> Anasayfa </a></li>
								<li><a><i class="fa fa-cogs"></i> Site Ayarları <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="genel-ayar.php"> Genel Ayarlar </a></li>
										<li><a href="iletisim-ayar.php"> İletişim Ayarlar </a></li>
										<li><a href="api-ayar.php"> Api Ayarlar </a></li>
										<li><a href="sosyal-ayar.php"> Sosyal Ayarlar </a></li>
										<li><a href="mail-ayar.php"> Mail Ayarlar </a></li>
									</ul>
								</li>
								<li><a href="urun.php"><i class="fa fa-gift"></i> Ürünler </a></li>
								<li><a href="kategori.php"><i class="fa fa-server"></i> Kategoriler </a></li>
								<li><a href="slider.php"><i class="fa fa-image"></i> Slider </a></li>
								<li><a href="menu.php"><i class="fa fa-list"></i> Menüler </a></li>
								<li><a href="kullanici.php"><i class="fa fa-user"></i> Kullanıcılar </a></li>
								<li><a href="hakkimizda.php"><i class="fa fa-info"></i> Hakkımızda </a></li>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a href="logout.php" data-toggle="tooltip" data-placement="top" title="Logout">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<img src="images/img.jpg" alt="<?php echo $kullanicicek['kullanici_adsoyad']; ?>"><?php echo $kullanicicek['kullanici_adsoyad']; ?>
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="kullanici-duzenle.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>"> Profil Bilgilerim</a></li>
									<li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Çıkış Yap</a></li>
								</ul>
							</li>

							<li role="presentation" class="dropdown">
								<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-gift"></i>
									<span class="badge bg-green">5</span>
								</a>
								<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
									<li>
										<a>
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>Çekilişe Katılan</span>
											</span>
											<span class="message">
												Çekilişe Katıldığı ürün ismi...
											</span>
										</a>
									</li>
									<li>
										<div class="text-center">
											<a>
												<strong>Tüm Katılanları Göster</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
        <!-- /top navigation -->