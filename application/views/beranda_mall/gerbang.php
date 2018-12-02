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
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">List Gerbang Parkir</h3>
                    </div>
                    <div class="box-body">
                        
                        <table id="list-prodi" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th>Nama</th>
                                <th>Peruntukan</th>
                                <th class="col-md-2">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($gerbang as $row): ?>
                            <tr>
                                <td class="col-md-1"><?php echo $no; ?></td>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo $row->peruntukan == "M" ? "Masuk" : "Keluar"; ?></td>
                                <td class="col-md-2">
                                    <a class="btn btn-primary" href="<?php echo site_url('beranda_mall/edit_gerbang/').$row->id; ?>"><span class="fa fa-edit"></span></a>
                                    <a class="btn btn-danger" href="<?php echo site_url('gerbang/delete/').$row->id; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Input Akun Gerbang Parkir</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="<?php echo site_url('gerbang/tambah_gerbang'); ?>" method="post">
                            <input type="hidden" name="id_mall" value="<?php echo $mall->id; ?>">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama Gerbang</label>
                                <input type="text" name="nama"class="form-control" placeholder="Gerbang Utara 1">
                            </div>
                            <div class="form-group">
                                <label>Peruntukan</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="peruntukan" value="M"> Masuk
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="peruntukan" value="K"> Keluar
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="gerbang_utara_1">
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
