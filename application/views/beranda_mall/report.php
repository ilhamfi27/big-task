<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Report
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
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pengunjung Per Hari</h3>
                    </div>
                    <div class="box-body">
                        <table id="list-prodi" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th>Nama Gerbang</th>
                                <th>Tanggal</th>
                                <th>Jumlah Pengunjung</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($report_pengunjung as $row): ?>
                            <tr>
                                <td class="col-md-1">No</td>
                                <td><?php echo $row->nama_gerbang; ?></td>
                                <td><?php echo $row->tanggal_transaksi; ?></td>
                                <td><?php echo $row->jumlah_aksi; ?></td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
