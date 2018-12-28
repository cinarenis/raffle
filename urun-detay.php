<?php 
include 'header.php';

$urunsor=$db->prepare("SELECT * FROM urun WHERE urun_id=:urun_id");
$urunsor->execute(array(
	'urun_id' => $_GET['urun_id']
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
$say=$urunsor->rowCount();

if ($say==0) {
	header("Location:index.php?durum=elleme");
}

?>

<section>
	<div class="container">
		<div class="row">
			<?php include 'sidebar.php'; ?>

			<div class="col-sm-9 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="col-sm-5">
						<div class="view-product">
							<img src="images/product-details/1.jpg" alt="" />
							<!-- <h3>Yakınlaştır</h3> -->
						</div>
						<div id="similar-product" class="carousel slide" data-ride="carousel">

							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active">
									<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
									<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
									<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
								</div>
								<div class="item">
									<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
									<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
									<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
								</div>
								<div class="item">
									<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
									<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
									<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
								</div>

							</div>

							<!-- Controls -->
							<a class="left item-control" href="#similar-product" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="right item-control" href="#similar-product" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>

					</div>
					<div class="col-sm-7">
						<div class="product-information"><!--/product-information-->
							<!-- <img src="images/product-details/new.jpg" class="newarrival" alt="" /> -->
							<h2><?php echo $uruncek['urun_ad']; ?></h2>
							<p>Cekiliş ID: <?php echo $uruncek['urun_id']; ?></p>
							<span>
								<span><?php echo $uruncek['urun_kalankisi']; ?> Kişi Kaldı</span><br>
								<button type="button" class="btn btn-default cart">
									<i class="fa fa-shopping-cart"></i>
									Çekilişe Katıl
								</button>
							</span>
							<p><b>Kategori:</b> <?php 
							$kategorisor=$db->prepare("SELECT * FROM kategori WHERE kategori_id=:kategori_id");
							$kategorisor->execute(array(
								'kategori_id' => $uruncek['kategori_id']
							));
							$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
							echo $kategoricek['kategori_ad'];
							?></p>
							<p><b>Çekilişe Katılan Kişi Sayısı:</b> <?php echo $uruncek['urun_kisi']-$uruncek['urun_kalankisi']; ?></p>
							<p><b>Maksimum Katılacak Kişi Sayısı:</b> <?php echo $uruncek['urun_kisi']; ?></p>
						</div><!--/product-information-->
					</div>
				</div><!--/product-details-->

				<div class="category-tab shop-details-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#aciklama" data-toggle="tab">Açıklama</a></li>
							<li><a href="#katilanlar" data-toggle="tab">Katılanlar </a></li>
							<li><a href="#reviews" data-toggle="tab">Yorumlar (0)</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="aciklama" >
							<div class="col-sm-12" align="center">
								<p><?php echo $uruncek['urun_detay']; ?></p>
							</div>
						</div>
						<div class="tab-pane fade" id="katilanlar" >
							<div class="col-sm-12" align="center">
								<p>Katılanlar Buraya Gelecek</p>
							</div>
						</div>

						<div class="tab-pane fade" id="reviews" >
							<div class="col-sm-12" align="center">
								<p><b>Yorum Yaz</b></p>

								<?php 
								if (isset($_SESSION['userkullanici_mail'])) { ?>
									<form action="#">
										<span>
											<input type="text" placeholder="Ad Soyad"/>
											<input type="email" placeholder="E-mail Adresi"/>
										</span>
										<textarea name="" ></textarea>
										<button type="button" class="btn btn-default pull-right">
											Yorum Gönder
										</button>
									</form>
									<?php
								}else { ?>
									Yorum yazabilmek için <a href="oturum.php">giriş</a> yapınız...
								<?php }
								?>
							</div>
						</div>

					</div>
				</div><!--/category-tab-->

				<div class="recommended_items"><!--recommended_items-->
					<h2 class="title text-center">İlginizi Çekebilecek Ürünler</h2>

					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php 
							$kategori_id=$uruncek['kategori_id'];
							$urunaltsor=$db->prepare("SELECT * FROM urun WHERE kategori_id=:kategori_id ORDER BY  rand() LIMIT 3");
							$urunaltsor->execute(array(
								'kategori_id' => $kategori_id
							));
							while($urunaltcek=$urunaltsor->fetch(PDO::FETCH_ASSOC)) {
								?>
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2><?php echo $urunaltcek['urun_kalankisi']; echo $ilgilisay; ?> Kişi Kaldı</h2>
													<p><?php echo $urunaltcek['urun_ad']; ?></p>
													<a href="urun-<?=seo($urunaltcek["urun_ad"]).'-'.$urunaltcek["urun_id"]?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Çekilişe Katıl</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<!-- <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
						-->	
					</div>
				</div><!--/recommended_items-->

			</div>
		</div>
	</div>
</section>

<?php 
include 'footer.php';
?>