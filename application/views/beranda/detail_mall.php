<div class="col-sm-7">
	<div class="panel panel-default">
		<div class="panel-body">
			<center><h3><?php echo "Mall ".$mall->nama; ?></h3></center>
			<table class="table table-hover">
			<!-- `mall`.`id`,
            `nama`,
            `no_telp`,
            `fax`,
            `tahun_berdiri`,
            `mall`.`id_lokasi`,
            `id_user`,
            `lokasi`.`alamat`,
            `lokasi`.`kode_pos`,
            CONCAT('KELURAHAN ',`desa_kelurahan`.`name`,', KECAMATAN ',`kecamatan`.`name`,', ',`kabupaten_kota`.`name`,', PROVINSI ',`provinsi`.`name`) AS detail_lokasi -->
				<tr>
					<td class="col-md-5"><label>Nama Mall</label></td>
					<td class="col-md-7">
						<?php echo $mall->nama; ?>
					</td>
				</tr>
													
				<tr>
					<td class="col-md-5"><label>No Telp</label></td>
					<td class="col-md-7">
						<?php echo $mall->no_telp ?>
					</td>
				</tr>
													
				<tr>
					<td class="col-md-5"><label>Fax</label></td>
					<td class="col-md-7">
						<?php echo $mall->fax; ?>
					</td>
				</tr>
				<tr>
					<td class="col-md-5"><label>Tahun Berdiri</label></td>
					<td class="col-md-7">
						<?php echo $mall->tahun_berdiri; ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
