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
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="box-body">
									<div class='row'>
										<div class='col-md-9'>
											<div style="padding-bottom: 10px;">
												<?php echo anchor(site_url('pelatihan/create'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
											</div>
										</div>
									</div>
									<div class="box-body" style="overflow-x: scroll; ">
										<table id="data-table" class="table table-bordered table-hover table-td-valign-middle">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Pelatihan</th>
													<th>Angkatan</th>
													<th>Status</th>
													<th>Tanggal Mulai</th>
													<th>Tanggal Selesai</th>
													<th>Jumlah Peserta</th>
													<th>Metode</th>
													<th>Tempat</th>
													<th>JP</th>
													<th>Penanggung Jawab</th>
													<!-- <th>Sertifikat</th> -->
													<th>Action</th>
												</tr>
											</thead>
											<tbody><?php $no = 1;
													$dateNow = date("Y-m-d");
													foreach ($pelatihan_data as $pelatihan) {
													?>
													<tr>
														<td><?= $no++ ?></td>
														<td><?php echo $pelatihan->nama_pelatihan ?></td>
														<td><?php echo $pelatihan->angkatan ?></td>
														<?php if ($dateNow < $pelatihan->tanggal_mulai) { ?>
															<td style="color: grey;">Akan Datang</td>
														<?php } else if ($dateNow >= $pelatihan->tanggal_mulai && $dateNow <= $pelatihan->tanggal_selesai) { ?>
															<td style="color: green;"> Berlangsung</td>
														<?php } else if ($dateNow > $pelatihan->tanggal_selesai) { ?>
															<td style="color: red;">Selesai</td>
														<?php } ?>

														<td><?php echo $pelatihan->tanggal_mulai ?></td>
														<td><?php echo $pelatihan->tanggal_selesai ?></td>
														<td><?php echo $pelatihan->jumlah_peserta ?></td>
														<td><?php echo $pelatihan->metode ?></td>
														<td><?php echo $pelatihan->tempat ?></td>
														<td><?php echo $pelatihan->jumlah_jp ?></td>
														<td><?php echo $pelatihan->penanggung_jawab ?></td>
														<!-- <td> <a href="" class="btn btn-info btn-sm"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a> </td> -->
														<td style="text-align:center" width="200px">
															<?php
															echo anchor(site_url('pelatihan/daftar_peserta/' . encrypt_url($pelatihan->pelatihan_id)), '<i class="fa fa-users" aria-hidden="true"></i> List Peserta', 'class="btn btn-success btn-sm read_data"');
															echo '  ';
															echo anchor(site_url('pelatihan/update/' . encrypt_url($pelatihan->pelatihan_id)), '<i class="fa fa-pencil" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
															echo '  ';
															echo anchor(site_url('pelatihan/delete/' . encrypt_url($pelatihan->pelatihan_id)), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
															?>
														</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
