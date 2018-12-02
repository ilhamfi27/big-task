<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
		<meta charset="utf-8">
		<title>Facebook Theme Demo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/css/facebook-theme.css'); ?>" rel="stylesheet" type="text/css">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	
	<body>
		<div class="wrapper">
			<div class="box">
				<div class="row row-offcanvas row-offcanvas-left">
					<!-- main right col -->
					<div class="column col-sm-12 col-xs-12" id="main">
						<!-- top nav -->
						<div class="navbar navbar-blue navbar-static-top">  
							<div class="navbar-header">
							  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
							  <a href="<?php echo site_url('beranda/index'); ?>" class="navbar-brand logo">b</a>
							</div>
							<nav class="collapse navbar-collapse" role="navigation">
							<form class="navbar-form navbar-left">
								<div class="input-group input-group-sm" style="max-width:360px;">
								</div>
							</form>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#"><?php echo $_SESSION['username'];?></a></li>
							  <li class="dropdown" style="margin-right: 12px;">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="glyphicon glyphicon-user"></i>
								</a>
								<ul class="dropdown-menu">
								  <li><a href="<?php echo site_url('auth/logout'); ?>"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
								</ul>
							</nav>
						</div>
						<!-- /top nav -->
					  
						<div class="padding">
							<div class="full col-sm-12">
								<div class="panel panel-default">
									<div class="panel-body">
										<center><h3>Profil Anda</h3></center>
										<table class="table">
											<tr>
												<td class="col-md-4"><label>Nama</label></td>
												<td class="col-md-8">
													<input type="text" name="nama" class="form-control" value="<?php echo $customer->nama; ?>">
												</td>
											</tr>
											
											<tr>
												<td class="col-md-4"><label>No KTP</label></td>
												<td class="col-md-8">
													<input type="text" name="no_ktp" class="form-control" value="<?php echo $customer->no_ktp;?>">
												</td>
											</tr>
											
											<tr>
												<td class="col-md-4"><label>Tanggal Lahir</label></td>
												<td class="col-md-8">
													<input type="text" name="tanggal_lahir" class="form-control" value="<?php echo $customer->tanggal_lahir ?>">
												</td>
											</tr>
											
											<tr>
												<td class="col-md-4"><label>Jenis Kelamin</label></td>
												<td class="col-md-8">
													<input type="text" name="jenis_kelamin"  class="form-control"value="<?php echo $customer->jenis_kelamin ?>">
												</td>
											</tr>
											
											<tr>
												<td class="col-md-4"><label>No Tlp</label></td>
												<td class="col-md-8">
													<input type="text" name="nomor_telepon" class="form-control" value="<?php echo $customer->nomor_telepon ?>">
												</td>
											</tr>
											
											<tr>
												<td class="col-md-4"><label>Detail Lokasi</label></td>
												<td class="col-md-8">
													<select>
														<option>
															
														</option>
													</select>
												</td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td>
													<input type="submit" name="submit" value="submit">
												</td>
											</tr>
										</table>
									</div>
									