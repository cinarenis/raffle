<?php 
include 'header.php';
?>

<section id="form"><!--form-->
	<?php 
				if ($_GET['durum']=="farklisifre") {?>
				<div class="alert alert-danger" align="center">
					<strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
				</div>
				<?php } elseif ($_GET['durum']=="eksiksifre") {?>
				<div class="alert alert-danger" align="center">
					<strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
				</div>
				<?php } elseif ($_GET['durum']=="kullanicivar") {?>
				<div class="alert alert-danger" align="center">
					<strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
				</div>
				<?php } elseif ($_GET['durum']=="basarisiz") {?>
				<div class="alert alert-danger" align="center">
					<strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
				</div>
				<?php }
				 ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Hesabınıza Giriş Yapın</h2>
					<form action="opadmin/raffle/islem.php" method="post">
						<input type="email" placeholder="Email Adresi" />
						<input type="password" placeholder="Şifre" />
						<button type="submit" class="btn btn-default">Giriş Yap</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-2" align="center">
				<h2 class="or">veya</h2>
			</div>
			<div class="col-sm-4 ">
				<div class="signup-form"><!--sign up form-->
					<h2>Kayıt Olun!</h2>
					<form action="opadmin/raffle/islem.php" method="post">
						<input type="text" name="kullanici_adsoyad" placeholder="Ad Soyad"/>
						<input type="email" name="kullanici_mail" placeholder="Email Adresi"/>
						<input type="password" name="kullanici_passwordone" placeholder="Şifre"/>
						<input type="password" name="kullanici_passwordtwo" placeholder="Şifre Tekrar"/>
						<button type="submit" name="kullanicikaydet" class="btn btn-default">Kayıt Ol</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->
<?php 
include 'footer.php';
?>