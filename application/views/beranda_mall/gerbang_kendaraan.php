<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mall Dashboard
            <small>Dashboard Mall</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Gerbang Masuk/Keluar</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="<?php echo site_url('transaksi/kendaraan_lewat'); ?>" method="post">
                            <input type="hidden" name="id_mall" value="<?php echo $mall->id; ?>">
                            <input type="hidden" name="id_gerbang" value="<?php echo $_SESSION['id_user']; ?>">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
