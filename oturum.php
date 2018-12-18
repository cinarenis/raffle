<?php 
include 'header.php';
?>

<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Hesabınıza Giriş Yapın</h2>
					<form action="#">
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
					<form action="#">
						<input type="text" placeholder="Ad Soyad"/>
						<input type="email" placeholder="Email Adresi"/>
						<input type="password" placeholder="Şifre"/>
						<input type="password" placeholder="Şifre Tekrar"/>
						<button type="submit" class="btn btn-default">Kayıt Ol</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->
<?php 
include 'footer.php';
?>