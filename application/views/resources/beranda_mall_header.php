<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo ucwords(implode(" ", explode("_", $this->router->fetch_class()))) 
        ." - "
        .   ucwords(implode(" ", explode("_", $this->router->fetch_method()))); ?>
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo site_url(); ?>vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo site_url(); ?>vendor/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo site_url(); ?>vendor/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/AdminLTE.min.css">
    
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
                href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo site_url('beranda_mall/index') ?>" class="logo">
    <?php if($_SESSION['status'] == "M"): ?>
    <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Adm</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b></span>
    </a>
    <?php elseif($_SESSION['status'] == "G"): ?>
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Grb</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Gerbang</b></span>
    </a>
    <?php endif; ?>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu" >
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php if($_SESSION['status'] == "M"): ?>
                    <span class="hidden-xs"><?php echo $mall->nama; ?></span>
                    <?php elseif($_SESSION['status'] == "G"): ?>
                    <span class="hidden-xs"><?php echo $mall->nama_gerbang." - ".$mall->nama; ?></span>
                    <?php endif; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header" style="min-height:195px;">
                            <?php if($_SESSION['status'] == "M"): ?>
                            <span class="fa fa-building" style="font-size: 72px;"></span>
                            <?php elseif($_SESSION['status'] == "G"): ?>
                            <span class="fa fa-car" style="font-size: 72px;"></span>
                            <?php endif; ?>
                            <p>
                                <?php if($_SESSION['status'] == "M"): ?>
                                <?php echo $mall->nama; ?>
                                <?php elseif($_SESSION['status'] == "G"): ?>
                                <?php echo $mall->nama_gerbang." - ".$mall->nama; ?>
                                <?php endif; ?>
                                <small>Berdiri Sejak Tahun <?php echo $mall->tahun_berdiri; ?></small>
                                <small><?php echo $mall->alamat.' '.ucwords(strtolower($mall->detail_lokasi)).' '.$mall->kode_pos; ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?php if($_SESSION['status'] == "M"): ?>
                                <a href="<?php echo site_url('beranda_mall/profil') ?>" class="btn btn-default btn-flat">Profile</a>
                                <?php endif; ?>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
            <?php if($_SESSION['status'] == "M"): ?>
            <span class="fa fa-building" style="font-size: 30px; color:#FFFFFF;"></span>
            <?php elseif($_SESSION['status'] == "G"): ?>
            <span class="fa fa-car" style="font-size: 30px; color:#FFFFFF;"></span>
            <?php endif; ?>
            </div>
            <div class="pull-left info">
                <?php if($_SESSION['status'] == "M"): ?>
                <p><?php echo $mall->nama; ?></p>
                <?php elseif($_SESSION['status'] == "G"): ?>
                <p><?php echo $mall->nama_gerbang; ?></p>
                <?php endif; ?>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <?php if($_SESSION['status'] == "M"): ?>
            <li><a href="<?php echo site_url('beranda_mall/gerbang_mall') ?>"><i class="fa fa-link"></i> <span>Gerbang Parkir</span></a></li>
            <li><a href="<?php echo site_url('beranda_mall/report') ?>"><i class="fa fa-link"></i> <span>Report</span></a></li>
            <?php endif; ?>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>