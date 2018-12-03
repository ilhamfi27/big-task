<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header container">
        <h1>
            Mall
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tr>
                                        <td class="col-md-3">Nama</td>
                                        <td><?php echo $mall->nama; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td><?php echo $mall->no_telp; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fax</td>
                                        <td><?php echo $mall->fax; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tahun Berdiri</td>
                                        <td><?php echo $mall->tahun_berdiri; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?php echo ucwords(strtolower($mall->detail_lokasi))." ".$mall->alamat." ".$mall->kode_pos;; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
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
