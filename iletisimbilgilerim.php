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
						<input type="text" name="kullanici_il" value="<?php echo $kullanicicek['kullanici_il']; ?>" placeholder="İl"/>
						<input type="text" name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce']; ?>" placeholder="İlçe"/>
						<input type="text" name="kullanici_adres" value="<?php echo $kullanicicek['kullanici_adres']; ?>" placeholder="Adres"/>
						<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>" placeholder="Kullanıcı ID" />
						<button type="submit" name="iletisimbilgilerimkaydet" class="btn btn-default">Bilgilerimi Güncelle</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section><!--/form-->
<?php 
include 'footer.php';
?>