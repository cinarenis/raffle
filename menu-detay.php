<?php 
include 'header.php';

$menusor=$db->prepare("Select * FROM menu WHERE menu_id=:id");
$menusor->execute(array(
  'id' => 0
));
$menucek=$menusor->fetch(PDO::FETCH_ASSOC);

?>

<div id="contact-page" class="container">
	<div class="bg">	
		<div class="row">  	
			<div class="col-sm-12">
				<div class="contact-form" align="center">
					<h2 class="title text-center">Tanıtım Videosu</h2>
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $menucek['menu_video'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br><br>
					<h2 class="title text-center">Menü</h2>
					<p><strong><?php echo $menucek['menu_baslik'] ?></strong></p>
					<?php echo $menucek['menu_icerik'] ?><br>
					<h2 class="title text-center">Misyon</h2>
					<?php echo $menucek['menu_misyon'] ?><br><br><br>
					<h2 class="title text-center">Vizyon</h2>
					<?php echo $menucek['menu_vizyon'] ?><br><br><br>
				</div>
			</div>  			
		</div>  
	</div>	
</div><!--/#contact-page-->

<?php 
include 'footer.php';
?>