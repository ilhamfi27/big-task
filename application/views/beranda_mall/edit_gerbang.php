<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Atur Gerbang Parkir Mall
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
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Akun Gerbang Parkir</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="<?php echo site_url('gerbang/update'); ?>" method="post">
                            <input type="hidden" name="id_gerbang" value="<?php echo $gerbang->id; ?>">
                            <input type="hidden" name="id_user" value="<?php echo $gerbang->id; ?>">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama Gerbang</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $gerbang->nama; ?>" placeholder="Gerbang Utara 1">
                            </div>
                            <div class="form-group">
                                <label>Peruntukan</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="peruntukan" value="M" <?php echo $gerbang->peruntukan == "M" ? "checked" : "" ?>> Masuk
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="peruntukan" value="K" <?php echo $gerbang->peruntukan == "K" ? "checked" : "" ?>> Keluar
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" value="<?php echo $gerbang->username; ?>" class="form-control" placeholder="gerbang_utara_1">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
