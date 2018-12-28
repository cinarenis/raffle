<?php 
include 'header.php';

if (isset($_GET['sef'])) {
	$kategorisor=$db->prepare("SELECT * FROM kategori WHERE kategori_seourl=:seourl");
	$kategorisor->execute(array(
		'seourl' => $_GET['sef']
	));
	$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
	$kategori_id=$kategoricek['kategori_id'];
	$urunsor=$db->prepare("SELECT * FROM urun WHERE kategori_id=:kategori_id ORDER BY urun_id DESC");
	$urunsor->execute(array(
		'kategori_id' => $kategori_id
	));
	$say=$urunsor->rowCount();
} else {
	$urunsor=$db->prepare("SELECT * FROM urun ORDER BY urun_id DESC");
	$urunsor->execute();
	$say=$urunsor->rowCount();
}

?>
<!-- Reklam Ekleme Alanı
<section id="advertisement">
	<div class="container">
		<img src="images/shop/advertisement.jpg" alt="" />
	</div>
</section>
Reklam Ekleme Alanı Bitiş-->

<section>
	<div class="container">
		<div class="row">
			<?php 
			include 'sidebar.php';
			?>

			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Çekilişler</h2>
					<?php
					if ($say==0) {
						echo "<center>Bu kategoride ürün bulunamadı</center>";
					}
					while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/shop/product12.jpg" alt="" />
										<h2><?php echo $uruncek['urun_kalankisi']; ?> Kişi Kaldı</h2>
										<p><?php echo $uruncek['urun_ad']; ?></p>
										<a href="urun-<?=seo($uruncek["urun_ad"]).'-'.$uruncek["urun_id"]?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Çekilişe Katıl</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<p><?php echo $uruncek['urun_detay']; ?></p>
											<h2><?php echo $uruncek['urun_kisi']-$uruncek['urun_kalankisi']; ?> Kişi Katıldı</h2>
											<p><?php echo $uruncek['urun_ad']; ?></p>
											<a href="urun-<?=seo($uruncek["urun_ad"]).'-'.$uruncek["urun_id"]?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Çekilişe Katıl</a>
										</div>
									</div>
								</div>
							<!-- Ek Özellik Başlangıç
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
							Ek Özellik Sonu-->
						</div>
					</div>
				<?php } ?>
				<!-- Sayfalama Alanı Başlangıç
				<ul class="pagination">
					<li class="active"><a href="">1</a></li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">&raquo;</a></li>
				</ul>
				Sayfalama Alanı Bitiş-->
			</div><!--features_items-->
		</div>
	</div>
</div>
</section>

<?php 
include 'footer.php'; ?>