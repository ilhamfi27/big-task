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
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
	<div class="container">
		<div class="card card-container">
			<?php echo validation_errors(); ?>
			<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <form class="form-signin" action="<?php echo site_url('registrasi/tambah_data_mall'); ?>" method="post">
                <div class="">

                </div>
				<div class="form-group">
                    <label>Nama Mall</label>
                    <input type="text" name="" value="<?php echo set_value(''); ?>" class="form-control" placeholder="Nama Mall" required>
                </div>
				<div class="form-group">
                    <label>Provinsi</label>
                    <select name="" class="form-control" placeholder="Provinsi" required>
                        <option value="">-- Provinsi --</option>
                        <option value="x">X</option>
                    </select>
                </div>
				<div class="form-group">
                    <label>Kabupaten/Kota</label>
                    <select name="" class="form-control" placeholder="Kabupaten/Kota" required>
                        <option value="">-- Kabupaten/Kota --</option>
                        <option value="x">X</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select name="" class="form-control" placeholder="Kecamatan" required>
                        <option value="">-- Kecamatan --</option>
                        <option value="x">X</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kelurahan</label>
                    <select name="" class="form-control" placeholder="Kelurahan" required>
                        <option value="">-- Kelurahan --</option>
                        <option value="x">X</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat" required><?php echo set_value('alamat'); ?></textarea>
                </div>
				<div class="form-group">
                    <label>Kode Pos</label>
                    <input type="text" name="" value="<?php echo set_value(''); ?>" class="form-control" placeholder="Kode Pos" required>
                </div>
				<div class="form-group">
                    <label>Tahun Berdiri</label>
                    <input type="text" name="" value="<?php echo set_value(''); ?>" class="form-control" placeholder="Tahun Berdiri" required>
                </div>
				<div class="form-group">
                    <label>Nomor Telp</label>
                    <input type="text" name="" value="<?php echo set_value(''); ?>" class="form-control" placeholder="Nomor Telp" required>
                </div>
				<div class="form-group">
                    <label>Fax</label>
                    <input type="text" name="" value="<?php echo set_value(''); ?>" class="form-control" placeholder="Fax" required>
                </div>
				<input type="hidden" name="username" value="<?php echo $_SESSION['session_username']; ?>">
				<input type="hidden" name="status" value="<?php echo $_SESSION['session_status']; ?>">
				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Submit</button>
			</form><!-- /form -->
			Sudah Memiliki Akun ? <a href="<?php echo site_url('auth/index') ?>">Login</a>
		</div><!-- /card-container -->
	</div><!-- /container -->

	<script src="<?php echo base_url('vendor/jquery/jquery-3.3.1.js'); ?>"></script>
	<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

</body>
</html>