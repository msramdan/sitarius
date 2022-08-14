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
					<h4 class="panel-title">Data PELATIHAN</h4>
				</div>
				<div class="panel-body">

					<form action="<?php echo $action; ?>" method="post">
						<thead>
							<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
								<tr>
									<td>Nama Pelatihan <?php echo form_error('nama_pelatihan') ?></td>
									<td><input type="text" class="form-control" name="nama_pelatihan" id="nama_pelatihan" placeholder="Nama Pelatihan" value="<?php echo $nama_pelatihan; ?>" /></td>
								</tr>
								<tr>
									<td>Angkatan <?php echo form_error('angkatan') ?></td>
									<td><input type="text" class="form-control" name="angkatan" id="angkatan" placeholder="Angkatan" value="<?php echo $angkatan; ?>" /></td>
								</tr>
								<tr>
									<td>Tanggal Mulai <?php echo form_error('tanggal_mulai') ?></td>
									<td><input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Tanggal Mulai" value="<?php echo $tanggal_mulai; ?>" /></td>
								</tr>
								<tr>
									<td>Tanggal Selesai <?php echo form_error('tanggal_selesai') ?></td>
									<td><input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo $tanggal_selesai; ?>" /></td>
								</tr>
								<tr>
									<td>Jumlah Peserta <?php echo form_error('jumlah_peserta') ?></td>
									<td><input type="number" class="form-control" name="jumlah_peserta" id="jumlah_peserta" placeholder="Jumlah Peserta" value="<?php echo $jumlah_peserta; ?>" /></td>
								</tr>

								<tr>
									<td>Jenis Pelatihan <?php echo form_error('metode') ?></td>
									<td><select name="metode" class="form-control theSelect" value="<?= $metode ?>">
											<option value="">-- Pilih --</option>
											<option value="Klasikal" <?php echo $metode == 'Klasikal' ? 'selected' : 'null' ?>>Klasikal</option>
											<option value="PJJ" <?php echo $metode == 'PJJ' ? 'selected' : 'null' ?>>PJJ</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Tempat <?php echo form_error('tempat') ?></td>
									<td><input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat" value="<?php echo $tempat; ?>" /></td>
								</tr>
								<tr>
									<td>Jumlah Jp <?php echo form_error('jumlah_jp') ?></td>
									<td><input type="number" class="form-control" name="jumlah_jp" id="jumlah_jp" placeholder="Jumlah Jp" value="<?php echo $jumlah_jp; ?>" /></td>
								</tr>
								<tr>
									<td>Penanggung Jawab <?php echo form_error('penanggung_jawab') ?></td>
									<td><input type="text" class="form-control" name="penanggung_jawab" id="penanggung_jawab" placeholder="Penanggung Jawab" value="<?php echo $penanggung_jawab; ?>" /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="pelatihan_id" value="<?php echo $pelatihan_id; ?>" />
										<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('pelatihan') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
									</td>
								</tr>
						</thead>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
