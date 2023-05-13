<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Berkas</li>
	</ol>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Berkas</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="box-body">
									<div class='row'>
										<div class='col-md-9'>
											<div style="padding-bottom: 10px;">
												<?php echo anchor(site_url('pelatihan/daftar_peserta/' . $id), '<i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali', 'class="btn btn-warning btn-sm tambah_data"'); ?>
											</div>
										</div>
									</div>
									<div class="box-body" style="overflow-x: scroll; ">

										<?php $data = $this->db->query("SELECT peserta_pelatihan.*,pelatihan.metode from peserta_pelatihan join pelatihan on pelatihan.pelatihan_id = peserta_pelatihan.pelatihan_id
										where peserta_pelatihan_id='$peserta_pelatihan_id' ")->row() ?>
										<table id="data-table" class="table table-bordered table-hover table-td-valign-middle">
											<thead>
												<tr>
													<th>Nama Berkas</th>
													<th>File</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Lembar Konfirmasi</td>
													<td><?php if ($data->lembar_konfirmasi) { ?>
															<a href="<?= base_url() ?>web/download_berkas/<?= $data->lembar_konfirmasi ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
														<?php } else { ?>
															<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
														<?php } ?>
													</td>
												</tr>
												<tr>
													<td>Surat Tugas</td>
													<td><?php if ($data->surat_tugas) { ?>
															<a href="<?= base_url() ?>web/download_berkas/<?= $data->surat_tugas ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
														<?php } else { ?>
															<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
														<?php } ?>
													</td>
												</tr>
												<tr>
													<td>Pas Photo</td>
													<td><?php if ($data->pas_photo) { ?>
															<a href="<?= base_url() ?>web/download_berkas/<?= $data->pas_photo ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
														<?php } else { ?>
															<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
														<?php } ?>
													</td>
												</tr>
												<tr>
													<td>Surat Keterangan Dokter</td>
													<td><?php if ($data->surat_keterangan_dokter) { ?>
															<a href="<?= base_url() ?>web/download_berkas/<?= $data->surat_keterangan_dokter ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
														<?php } else { ?>
															<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
														<?php } ?>
													</td>
												</tr>
												<tr>
													<td>NPWP & BPJS</td>
													<td><?php if ($data->npwp_bpjs) { ?>
															<a href="<?= base_url() ?>web/download_berkas/<?= $data->npwp_bpjs ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
														<?php } else { ?>
															<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
														<?php } ?>
													</td>
												</tr>

												<?php if ($data->metode == "Klasikal") { ?>
													<?php if ($data->is_transfortasi == "1") { ?>
														<tr>
															<td>Tiket Transfortasi <b><?= $data->type_transfortasi ?></b>
															</td>
															<td><?php if ($data->tiket_transfortasi) { ?>
																	<a href="<?= base_url() ?>web/download_berkas/<?= $data->tiket_transfortasi ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
																<?php } else { ?>
																	<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
																<?php } ?>
															</td>
														</tr>
													<?php  } ?>
												<?php  } ?>


											</tbody>
										</table>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>