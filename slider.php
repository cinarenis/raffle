<?php 
$slidersor=$db->prepare("SELECT * FROM slider");
$slidersor->execute();
$say = 0;
?><section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<?php 
						while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {
							?>
							<div class="item <?php if($say == 0){echo 'active';} $say++ ?>">
								<div class="col-sm-6">
									<h1><span><?php echo $slidercek['slider_ad']; ?></span></h1>
									<p><?php echo $slidercek['slider_aciklama']; ?> </p>
									<a href="<?php echo $slidercek['slider_link']; ?>"><button type="button" class="btn btn-default get">Çekilişe Katıl</button></a>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo $slidercek['slider_resimyol']; ?>" class="img-responsive" alt="<?php echo $slidercek['slider_ad']; ?>" />
								</div>
							</div>
						<?php } ?>
					</div>
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/slider-->