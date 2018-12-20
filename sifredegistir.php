<?php 
include 'header.php';
?>

<section id="form"><!--form-->
	<?php 
	if ($_GET['durum']=="ok") {?>
		<div class="alert alert-success" align="center">
			<strong>Ok!</strong> Bilgiler Başarıyla Düzenlendi.
		</div>
	<?php } 
	if ($_GET['durum']=="no") {?>
		<div class="alert alert-danger" align="center">
			<strong>Hata!</strong> Bilgiler Düzenlenemedi!
		</div>
	<?php } 
	if ($_GET['durum']=="eksiksifre") {?>
		<div class="alert alert-danger" align="center">
			<strong>Hata!</strong> Yeni Şifre 6 Karakterden Uzun Olmalı!
		</div>
	<?php } 
	if ($_GET['durum']=="farklisifre") {?>
		<div class="alert alert-danger" align="center">
			<strong>Hata!</strong> Şifreler Uyuşmuyor!
		</div>
	<?php } 
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="login-form">
					<h2><a href="hesabim.php">Kişisel Bilgilerim</a></h2>
					<h2><a href="iletisimbilgilerim.php">İletişim Bilgilerim</a></h2>
					<h2><a href="sifredegistir.php">Şifre Değiştir</a></h2>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="login-form">
					<form action="opadmin/raffle/islem.php" method="post">
						<input type="text" name="kullanici_password" placeholder="Şuanki Şifre"/>
						<input type="text" name="kullanici_yenisifre" placeholder="Yeni Şifre"/>
						<input type="text" name="kullanici_yenisifretekrar" placeholder="Yeni Şifre Tekrar"/>
						<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>" placeholder="Kullanıcı ID" />
						<button type="submit" name="sifredegistir" class="btn btn-default">Bilgilerimi Güncelle</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section><!--/form-->
<?php 
include 'footer.php';
?>