<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('vendor/login-form/style.css'); ?>">
</head>
<body>
	<div class="container">
		<div class="card card-container">
			<?php echo validation_errors(); ?>
			<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
			<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
			<p id="profile-name" class="profile-name-card"></p>
			<form class="form-signin" action="<?php echo site_url('auth/tambah_user'); ?>" method="post">
				<span id="reauth-email" class="reauth-email"></span>
				<input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Username" required>
				<input type="password" name="password" class="form-control" placeholder="Password" required>
				<input type="password" name="password_confirm" class="form-control" placeholder="Konfirmasi Password" required>
				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Submit</button>
			</form><!-- /form -->
			Sudah Memiliki Akun ? <a href="<?php echo site_url('auth/index') ?>">Login</a>
		</div><!-- /card-container -->
	</div><!-- /container -->

	<script src="<?php echo base_url('vendor/jquery/jquery-3.3.1.js'); ?>"></script>
	<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

</body>
</html>