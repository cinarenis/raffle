<?php 
include 'header.php';
?>
<?php 
include 'slider.php';
?>
<section>
	<div class="container">
		<div class="row">
			<?php include 'sidebar.php'; ?>
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Öne Çıkan Ürünler</h2>
					<?php 
					// Bu Sorgu Anasayfada katılankişi/toplamkişi*100 işlemi yapılarak en fazla yüzde kaç katılım olduysa onu ilk gösterir
					$urunanasayfasor=$db->prepare("SELECT * FROM urun ORDER BY ((urun_kisi-urun_kalankisi)/urun_kisi)*100 DESC LIMIT 15");
					$urunanasayfasor->execute();
					while($urunanasayfacek=$urunanasayfasor->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/shop/product12.jpg" alt="" />
										<h2><?php echo $urunanasayfacek['urun_kalankisi']; ?> Kişi Kaldı</h2>
										<p><?php echo $urunanasayfacek['urun_ad']; ?></p>
										<a href="urun-<?=seo($urunanasayfacek["urun_ad"]).'-'.$urunanasayfacek["urun_id"]?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Çekilişe Katıl</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<p><?php echo $urunanasayfacek['urun_detay']; ?></p>
											<h2><?php echo $urunanasayfacek['urun_kisi']-$urunanasayfacek['urun_kalankisi']; ?> Kişi Katıldı</h2>
											<p><?php echo $urunanasayfacek['urun_ad']; ?></p>
											<a href="urun-<?=seo($urunanasayfacek["urun_ad"]).'-'.$urunanasayfacek["urun_id"]?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Çekilişe Katıl</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div><!--features_items-->
			</div>
		</div>
	</div>
	</section>
	<?php 
	include 'footer.php';
	?>