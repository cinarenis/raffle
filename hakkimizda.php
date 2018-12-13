<?php 
include 'header.php';

$hakkimizdasor=$db->prepare("Select * FROM hakkimizda WHERE hakkimizda_id=:id");
$hakkimizdasor->execute(array(
  'id' => 0
));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>

<div id="contact-page" class="container">
	<div class="bg">	
		<div class="row">  	
			<div class="col-sm-12">
				<div class="contact-form" align="center">
					<h2 class="title text-center">Tanıtım Videosu</h2>
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek['hakkimizda_video'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br><br>
					<h2 class="title text-center">Hakkımızda</h2>
					<?php echo $hakkimizdacek['hakkimizda_icerik'] ?><br>
					<h2 class="title text-center">Misyon</h2>
					<?php echo $hakkimizdacek['hakkimizda_misyon'] ?><br><br><br>
					<h2 class="title text-center">Vizyon</h2>
					<?php echo $hakkimizdacek['hakkimizda_vizyon'] ?><br><br><br>
				</div>
			</div>  			
		</div>  
	</div>	
</div><!--/#contact-page-->

<?php 
include 'footer.php';
?>