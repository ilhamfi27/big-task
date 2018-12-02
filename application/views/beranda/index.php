<div class="col-sm-7">
	<div class="panel panel-default">
		<div class="panel-body">
			<center><h3>Mall Terdekat</h3></center>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>No Telp</th>
						<th>Fax</th>
						<th>Tahun Berdiri</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach($mall as $row): ?>
					<tr>
						<th scope="row"><?php echo $no; ?></th>
						<td><?php echo $row->nama; ?></td>
						<td><?php echo $row->no_telp; ?></td>
						<td><?php echo $row->fax; ?></td>
						<td><?php echo $row->tahun_berdiri; ?></td>
						<td>
							<a href="<?php echo site_url('beranda/detail_mall/') . $row->id; ?>">Detail</a>
						</td>
					</tr>
					<?php $no++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
