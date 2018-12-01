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
            <h2>Registrasi Sebagai?</h2>
            <a href="<?php echo site_url('registrasi/registrasi_mall') ?>" class="btn btn-primary btn-block">Mall Owner</a>
            <a href="<?php echo site_url('registrasi/registrasi_customer') ?>" class="btn btn-primary btn-block">Customer</a>
		</div><!-- /card-container -->
	</div><!-- /container -->

	<script src="<?php echo base_url('vendor/jquery/jquery-3.3.1.js'); ?>"></script>
	<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

</body>
</html>