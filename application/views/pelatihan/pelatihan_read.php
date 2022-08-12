<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Pelatihan</li>
	</ol>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Data Pelatihan</h4>
				</div>
				<div class="panel-body">
					<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
						<tr>
							<td>Nama Pelatihan</td>
							<td><?php echo $nama_pelatihan; ?></td>
						</tr>
						<tr>
							<td>Angkatan</td>
							<td><?php echo $angkatan; ?></td>
						</tr>
						<tr>
							<td>Tanggal Mulai</td>
							<td><?php echo $tanggal_mulai; ?></td>
						</tr>
						<tr>
							<td>Tanggal Selesai</td>
							<td><?php echo $tanggal_selesai; ?></td>
						</tr>
						<tr>
							<td>Jumlah Peserta</td>
							<td><?php echo $jumlah_peserta; ?></td>
						</tr>
						<tr>
							<td>Metode</td>
							<td><?php echo $metode; ?></td>
						</tr>
						<tr>
							<td>Tempat</td>
							<td><?php echo $tempat; ?></td>
						</tr>
						<tr>
							<td>Jumlah Jp</td>
							<td><?php echo $jumlah_jp; ?></td>
						</tr>
						<tr>
							<td>Penanggung Jawab</td>
							<td><?php echo $penanggung_jawab; ?></td>
						</tr>
						<tr>
							<td></td>
							<td><a href="<?php echo site_url('pelatihan') ?>" class="btn btn-default">Cancel</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
