<?php 
include 'header.php';

$menusor=$db->prepare("Select * FROM menu WHERE menu_seourl=:seourl");
$menusor->execute(array(
  'seourl' => $_GET['sef']
));
$menucek=$menusor->fetch(PDO::FETCH_ASSOC);

?>

<div id="contact-page" class="container">
	<div class="bg">	
		<div class="row">  	
			<div class="col-sm-12">
				<div class="contact-form" align="center">
					<h2 class="title text-center"><?php echo $menucek['menu_ad']; ?></h2>
					<p><?php echo $menucek['menu_detay'] ?></p>
					<br>
				</div>
			</div>  			
		</div>  
	</div>	
</div><!--/#contact-page-->

<?php 
include 'footer.php';
?>