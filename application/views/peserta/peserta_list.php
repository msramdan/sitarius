<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Peserta</li>
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
					<h4 class="panel-title">Data Peserta</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="box-body">
									<div class='row'>
										<div class='col-md-9'>
											<div style="padding-bottom: 10px;">
												<?php echo anchor(site_url('peserta/create'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
											</div>
										</div>
									</div>
									<div class="box-body" style="overflow-x: scroll; ">
										<table id="data-table" class="table table-bordered table-hover table-td-valign-middle">
											<thead>
												<tr>
													<th>No</th>
													<th>Photo</th>
													<th>Nip</th>
													<th>Nama Lengkap</th>
													<th>Email</th>
													<th>No Hp</th>
													<th>Tempat Lahir</th>
													<th>Tanggal Lahir</th>
													<th>Jenis Kelamin</th>
													<th>Pangkat</th>
													<th>Jabatan</th>
													<th>Kantor Wilayah</th>
													<th>Upt</th>
													<th>Bank</th>
													<th>Norek</th>

													<th>Action</th>
												</tr>
											</thead>
											<tbody><?php $no = 1;
													foreach ($peserta_data as $peserta) {
													?>
													<tr>
														<td><?= $no++ ?></td>
														<td>
															<?php if ($peserta->photo == '' || $peserta->photo == null) { ?>
																<img src="<?= base_url() ?>assets/img/peserta/default.png" width="60px" height="auto"  />
															<?php } else { ?>
																<img src="<?= base_url() ?>assets/img/peserta/<?php echo $peserta->photo ?>" width="60px" height="auto"  />
															<?php } ?>
															</a>
														</td>
														<td><?php echo $peserta->nip ?></td>
														<td><?php echo $peserta->nama_lengkap ?></td>
														<td><?php echo $peserta->email ?></td>
														<td><?php echo $peserta->no_hp ?></td>
														<td><?php echo $peserta->tempat_lahir ?></td>
														<td><?php echo $peserta->tanggal_lahir ?></td>
														<td><?php echo $peserta->jenis_kelamin ?></td>
														<td><?php echo $peserta->nama_pangkat ?> - <?php echo $peserta->golongan ?> - <?php echo $peserta->ruangan ?></td>
														<td><?php echo $peserta->jabatan ?></td>
														<td><?php echo $peserta->nama_kantor_wilayah ?></td>
														<td><?php echo $peserta->upt ?></td>
														<td><?php echo $peserta->nama_bank ?></td>
														<td><?php echo $peserta->norek ?></td>
														<td style="text-align:center" width="200px">
															<?php
															echo anchor(site_url('peserta/update/' . encrypt_url($peserta->peserta_id)), '<i class="fa fa-pencil" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
															echo '  ';
															echo anchor(site_url('peserta/delete/' . encrypt_url($peserta->peserta_id)), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
