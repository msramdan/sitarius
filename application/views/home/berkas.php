<div class="main-content">
	<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="<?= base_url() ?>assets/front/img/head.png" style="background-image: url(&quot;images/bg/bg1.jpg&quot;);">
		<div class="container pt-120 pb-60">
			<div class="section-content">
				<div class="row">
					<div class="col-md-6">
						<h2 class="text-theme-colored2 font-36">Upload Berkas</h2>
						<ol class="breadcrumb text-left mt-10 white">
							<li><a href="#">Home</a></li>
							<li class="active">Upload Berkas</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>

		<div class="container">
			<div class="row" style="padding: 15px;">
				<a href="<?= base_url() ?>web/profile" class="btn btn-warning"> <i class="fa fa-arrow-left"></i> Kembali</a>
				<h2 class="text-uppercase title">Upload <span class="text-theme-colored2">Berkas</span></h2>
				<p>Pelatihan : <?= $data->nama_pelatihan ?> </p>
				<div class="panel-body">
					<form action="<?php base_url() ?>../web/upload_file" method="post" enctype="multipart/form-data">
						<thead>
							<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
								<div class="form-group">
									<input type="hidden" readonly value="<?= $data->peserta_pelatihan_id ?>" name="peserta_pelatihan_id" id="peserta_pelatihan_id">
									<tr>
										<td>Pas Photo <br>
											<?php if ($data->pas_photo) { ?>
												<a href="<?= base_url() ?>web/download_berkas/<?= $data->pas_photo ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
											<?php } else { ?>
												<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
											<?php } ?>

										</td>
										<td>
											<input type="file" class="form-control" name="pas_photo" id="pas_photo" placeholder="" value="" />
											<small style="color: red">Pilih pas photo Jika Ingin Merubah Nya (Format File : jpg/png)</small>
										</td>

									</tr>
									<tr>
										<td>Lembar Konfirmasi <br>

											<?php if ($data->lembar_konfirmasi) { ?>
												<a href="<?= base_url() ?>web/download_berkas/<?= $data->lembar_konfirmasi ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
											<?php } else { ?>
												<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
											<?php } ?>

										</td>
										<td>
											<input type="file" class="form-control" name="lembar_konfirmasi" id="lembar_konfirmasi" placeholder="" value="" />
											<small style="color: red">Pilih lembar konfirmasi Jika Ingin Merubah Nya (Format File : pdf)</small>
										</td>

									</tr>
									<tr>
										<td>Surat Tugas <br>
											<?php if ($data->surat_tugas) { ?>
												<a href="<?= base_url() ?>web/download_berkas/<?= $data->surat_tugas ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
											<?php } else { ?>
												<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
											<?php } ?>

										</td>
										<td>
											<input type="file" class="form-control" name="surat_tugas" id="surat_tugas" placeholder="" value="" />
											<small style="color: red">Pilih surat tugas Jika Ingin Merubah Nya (Format File : pdf)</small>
										</td>

									</tr>
									
									<tr>
										<td>Surat Keterangan Dokter <br>
											<?php if ($data->surat_keterangan_dokter) { ?>
												<a href="<?= base_url() ?>web/download_berkas/<?= $data->surat_keterangan_dokter ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
											<?php } else { ?>
												<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
											<?php } ?>

										</td>
										<td>
											<input type="file" class="form-control" name="surat_keterangan_dokter" id="surat_keterangan_dokter" placeholder="" value="" />
											<small style="color: red">Pilih SKD Jika Ingin Merubah Nya (Format File : pdf)</small>
										</td>

									</tr>
									<tr>
										<td>NPWP & BPJS <br>
											<?php if ($data->npwp_bpjs) { ?>
												<a href="<?= base_url() ?>web/download_berkas/<?= $data->npwp_bpjs ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
											<?php } else { ?>
												<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
											<?php } ?>

										</td>
										<td>
											<input type="file" class="form-control" name="npwp_bpjs" id="npwp_bpjs" placeholder="" value="" />
											<small style="color: red">Pilih npwp bpjs Jika Ingin Merubah Nya (Format File : pdf)</small>
										</td>

									</tr>

									<?php

								
									
									if ($data->metode == "Klasikal") { ?>
										<tr>
											<td>Tiket Datang <br>
												<?php if ($data->tiket_datang) { ?>
													<a href="<?= base_url() ?>web/download_berkas/<?= $data->tiket_datang ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
												<?php } else { ?>
													<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
												<?php } ?>

											</td>
											<td>
												<input type="file" class="form-control" name="tiket_datang" id="tiket_datang" placeholder="" value="" />
												<small style="color: red">Pilih tiket datang Jika Ingin Merubah Nya (Format File : pdf)</small>
											</td>

										</tr>
										<tr>
											<td>Tiket Pulang <br>
												<?php if ($data->tiket_pulang) { ?>
													<a href="<?= base_url() ?>web/download_berkas/<?= $data->tiket_datang ?>" style="color: green;"> <i class="fa fa-download"></i> Download </a>
												<?php } else { ?>
													<a href="#" style="color: red;"> <i class="fa fa-times"></i> Belum ada upload </a>
												<?php } ?>

											</td>
											<td>
												<input type="file" class="form-control" name="tiket_pulang" id="tiket_pulang" placeholder="" value="" />
												<small style="color: red">Pilih tiket pulamg Jika Ingin Merubah Nya (Format File : pdf)</small>
											</td>

										</tr>
									<?php } ?>

								</div>

							</table><button style="float: right;" class="btn btn-primary"> <i class="fa fa-save"></i> Simpan </button>
					</form>
				</div>
			</div>
	</section>
</div>
