<div class="main-content">

	<div class="modal" id="myModalDetail" style="margin-top: 100px;">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Detail Pelatihan</h4>

				</div>
				<div class="modal-body">
					<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
						<tr>
							<td>Nama Pelatihan</td>
							<td> <span id="nama_pelatihan"></span> </td>
						</tr>
						<tr>
							<td>Angkatan</td>
							<td> <span id="angkatan"></span> </td>
						</tr>
						<tr>
							<td>Tanggal Mulai</td>
							<td> <span id="tanggal_mulai"></span> </td>
						</tr>
						<tr>
							<td>Tanggal Selesai</td>
							<td> <span id="tanggal_selesai"></span></td>
						</tr>
						<tr>
							<td>Jumlah Peserta</td>
							<td> <span id="jumlah_peserta"></span></td>
						</tr>
						<tr>
							<td>Metode</td>
							<td> <span id="metode"></span></td>
						</tr>
						<tr>
							<td>Tempat</td>
							<td> <span id="tempat"></span></td>
						</tr>
						<tr>
							<td>Jumlah Jp</td>
							<td> <span id="jumlah_jp"></span></td>
						</tr>
						<tr>
							<td>Penanggung Jawab</td>
							<td> <span id="penanggung_jawab"></span></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
				</div>

			</div>
		</div>
	</div>

	<div class="modal" id="myModalUpload" style="margin-top: 100px;">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Upload Berkas</h4>

				</div>
				<form action="" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Lembar Konfirmasi <small style="color: red">Format : Pdf</small></label>
						<a class="btn btn-primary btn-sm" id="download" href=""><i class="ace-icon fa fa-download"></i> Download Lembar Konfirmasi</a>
						<input type="file" class="form-control " id="lembar_konfirmasi" name="lembar_konfirmasi" value="" required>
						
					</div>
					<div class="form-group">
						<label for="">Surat Tugas <small style="color: red">Format : Pdf</small></label>
						<a class="btn btn-primary btn-sm" id="download" href=""><i class="ace-icon fa fa-download"></i> Download Surat Tugas</a>
						<input type="file" class="form-control " id="lembar_konfirmasi" name="lembar_konfirmasi" value="" required>
						
					</div>
					<div class="form-group">
						<label for="">Pas Photo <small style="color: red">Format : Jpg/Png</small></label>
						<a class="btn btn-primary btn-sm" id="download" href=""><i class="ace-icon fa fa-download"></i> Download Pas Photo</a>
						<input type="file" class="form-control " id="lembar_konfirmasi" name="lembar_konfirmasi" value="" required>
						
					</div>
					<div class="form-group">
						<label for="">Surat Keterangan Dokter <small style="color: red">Format : Pdf</small></label>
						<a class="btn btn-primary btn-sm" id="download" href=""><i class="ace-icon fa fa-download"></i> Download SKD</a>
						<input type="file" class="form-control " id="lembar_konfirmasi" name="lembar_konfirmasi" value="" required>
						
					</div>
					<div class="form-group">
						<label for="">NPWP dan BPJS <small style="color: red">Format : Pdf</small></label>
						<a class="btn btn-primary btn-sm" id="download" href=""><i class="ace-icon fa fa-download"></i> Download NPWP & BPJS</a>
						<input type="file" class="form-control " id="lembar_konfirmasi" name="lembar_konfirmasi" value="" required>
						
					</div>
					<div class="form-group">
						<label for="">Tiket Datang <small style="color: red">Format : Pdf</small></label>
						<a class="btn btn-primary btn-sm" id="download" href=""><i class="ace-icon fa fa-download"></i> Download Tiket Datang</a>
						<input type="file" class="form-control " id="lembar_konfirmasi" name="lembar_konfirmasi" value="" required>
						
					</div>
					<div class="form-group">
						<label for="">Tiket Pulang <small style="color: red">Format : Pdf</small></label>
						<a class="btn btn-primary btn-sm" id="download" href=""><i class="ace-icon fa fa-download"></i> Download Tiket Pulang</a>
						<input type="file" class="form-control " id="lembar_konfirmasi" name="lembar_konfirmasi" value="" required>
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
					<button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Simpan</button>
				</div>
				</form>

			</div>
		</div>
	</div>


	<!-- Section: inner-header -->
	<section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="<?= base_url() ?>assets/front/img/head.png" style="background-image: url(&quot;images/bg/bg1.jpg&quot;);">
		<div class="container pt-120 pb-60">
			<!-- Section Content -->
			<div class="section-content">
				<div class="row">

					<div class="col-md-6">
						<h2 class="text-theme-colored2 font-36">Profile</h2>
						<ol class="breadcrumb text-left mt-10 white">
							<li><a href="#">Home</a></li>
							<li class="active">Profile Peserta</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Section: About -->
	<section>

		<?php
		$peserta_id_web = $this->session->userdata('peserta_id_web');
		$user = $this->db->query("SELECT * from peserta where peserta_id ='$peserta_id_web'")->row();
		?>

		<div class="container">
			<section>
				<div class="container">
					<div class="section-content">
						<div class="row">
							<div class="col-sx-12 col-sm-4 col-md-4">
								<div class="doctor-thumb">
									<?php if ($user->photo == '' || $user->photo == null) { ?>
										<img src="<?= base_url() ?>assets/img/peserta/default.png" width="100%" />
									<?php } else { ?>
										<img src="<?= base_url() ?>assets/img/peserta/<?php echo $user->photo ?>" width="100%" />
									<?php } ?>

								</div>
								<div class="info p-20 bg-black-333">
									<h4 class="text-uppercase text-white"><?= $user->nama_lengkap ?></h4>
									<ul class="list angle-double-right m-0">
										<li class="mt-0 text-gray-silver"><strong class="text-gray-lighter">Email</strong><br> <?= $user->email ?></li>
										<li class="text-gray-silver"><strong class="text-gray-lighter">No Hp</strong><br> <?= $user->no_hp ?></li>
									</ul>
								</div>
							</div>
							<div class="col-xs-12 col-sm-8 col-md-8">
								<div>
									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active"><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="true">Profile Peserta</a></li>
										<li role="presentation" class=""><a href="#free-orders" aria-controls="free-orders" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="false">Daftar Pelatihan </a></li>
									</ul>
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="orders">
											<form name="editprofile-form" action="<?= base_url() ?>web/updatePeserta" method="post" enctype="multipart/form-data">
												<div class="row">
													<div class="form-group col-md-6">
														<label>Photo</label>
														<input name="form_name" class="form-control" type="file">
														<small style="color: red">(Note :Pilih photo Jika Ingin Merubah photo)</small>
														<input type="hidden" name="photo_lama" value="<?= $user->photo ?>">
														<?php echo form_error('nama_lengkap') ?>
													</div>
													<div class="form-group col-md-6">
														<label>NIP</label>
														<input class="form-control" type="text" name="nip" value="<?= $user->nip ?>">
														<?php echo form_error('nip') ?>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<label>Nama Lengkap</label>
														<input class="form-control" type="text" name="nama_lengkap" value="<?= $user->nama_lengkap ?>">
														<?php echo form_error('nama_lengkap') ?>
													</div>
													<div class="form-group col-md-6">
														<label>Email</label>
														<input name="email" class="form-control" type="email" value="<?= $user->email ?>" name="email">
														<?php echo form_error('email') ?>
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-6">
														<label>No Hp</label>
														<input class="form-control" type="text" name="no_hp" value="<?= $user->no_hp ?>">
														<?php echo form_error('no_hp') ?>
													</div>
													<div class="form-group col-md-6">
														<label>Tempat Lahir</label>
														<input class="form-control" type="text" name="tempat_lahir" value="<?= $user->tempat_lahir ?>">
														<?php echo form_error('tempat_lahir') ?>
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-6">
														<label>Tanggal Lahir</label>
														<input class="form-control" type="date" name="tanggal_lahir" value="<?= $user->tanggal_lahir ?>">
														<?php echo form_error('tanggal_lahir') ?>
													</div>
													<div class="form-group col-md-6">
														<label>Jenis Kelamin</label>
														<select name="jenis_kelamin" class="form-control theSelect" value="<?= $jenis_kelamin ?>">
															<option value="">-- Pilih --</option>
															<option value="Laki Laki" <?php echo $user->jenis_kelamin == 'Laki Laki' ? 'selected' : 'null' ?>>Laki Laki</option>
															<option value="Perempuan" <?php echo $user->jenis_kelamin == 'Perempuan' ? 'selected' : 'null' ?>>Perempuan</option>
														</select>
														<?php echo form_error('jenis_kelamin') ?>
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-6">
														<label>Pangkat/Golongan</label>
														<select name="pangkat" class="form-control theSelect">
															<option value="">-- Pilih -- </option>
															<?php foreach ($data_pangkat as $key => $data) { ?>
																<?php if ($user->pangkat == $data->pangkat_id) { ?>
																	<option value="<?php echo $data->pangkat_id ?>" selected><?php echo $data->nama_pangkat ?> - <?php echo $data->golongan ?> - <?php echo $data->ruangan ?> </option>
																<?php } else { ?>
																	<option value="<?php echo $data->pangkat_id ?>"><?php echo $data->nama_pangkat ?> - <?php echo $data->golongan ?> - <?php echo $data->ruangan ?> </option>
																<?php } ?>
															<?php } ?>
														</select>
														<?php echo form_error('pangkat') ?>
													</div>
													<div class="form-group col-md-6">
														<label>Jabatan</label>
														<input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $user->jabatan; ?>" />
														<?php echo form_error('jabatan') ?>
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-6">
														<label>Kantor Wilayah</label>
														<select name="kantor_wilayah" class="form-control theSelect">
															<option value="">-- Pilih -- </option>
															<?php foreach ($kantor_wilayah_data as $key => $data) { ?>
																<?php if ($user->kantor_wilayah == $data->kantor_wilayah_id) { ?>
																	<option value="<?php echo $data->kantor_wilayah_id ?>" selected><?php echo $data->nama_kantor_wilayah ?></option>
																<?php } else { ?>
																	<option value="<?php echo $data->kantor_wilayah_id ?>"><?php echo $data->nama_kantor_wilayah ?></option>
																<?php } ?>
															<?php } ?>
														</select>
														<?php echo form_error('kantor_wilayah') ?>
													</div>
													<div class="form-group col-md-6">
														<label>UPT</label>
														<input type="text" class="form-control" name="upt" id="upt" placeholder="Upt" value="<?php echo $user->upt; ?>" />
														<?php echo form_error('upt') ?>
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-6">
														<label>Bank</label>
														<select name="bank_id" class="form-control theSelect">
															<option value="">-- Pilih -- </option>
															<?php foreach ($bank as $key => $data) { ?>
																<?php if ($user->bank_id == $data->bank_id) { ?>
																	<option value="<?php echo $data->bank_id ?>" selected><?php echo $data->nama_bank ?></option>
																<?php } else { ?>
																	<option value="<?php echo $data->bank_id ?>"><?php echo $data->nama_bank ?></option>
																<?php } ?>
															<?php } ?>
														</select>
														<?php echo form_error('bank_id') ?>
													</div>
													<div class="form-group col-md-6">
														<label>Norek</label>
														<input type="text" class="form-control" name="norek" id="norek" placeholder="Norek" value="<?php echo $user->norek; ?>" />
														<?php echo form_error('norek') ?>
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-6">
														<label>Password</label>
														<input name="password" class="form-control" type="text">
														<small style="color: red">(Biarkan kosong jika tidak diganti)</small>
														<?php echo form_error('password') ?>
													</div>
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-dark btn-lg mt-15" type="submit">Update</button>
												</div>
											</form>
										</div>
										<div role="tabpanel" class="tab-pane" id="free-orders">
											<div class="table-responsive">
												<table class="table table-hover">
													<thead>
														<tr>
															<th>No</th>
															<th>Nama Pelatihan</th>
															<th>Tgl Mulai</th>
															<th>Tgl Selesai</th>
															<th>Detail</th>
															<th>Upload Berkas</th>
															<th>Sertifikat</th>
														</tr>
													</thead>
													<?php
													$peserta_id_web = $this->session->userdata('peserta_id_web');
													$query = $this->db->query("SELECT *  from peserta_pelatihan join
												pelatihan on pelatihan.pelatihan_id = peserta_pelatihan.pelatihan_id
												 where peserta_pelatihan.peserta_id='$peserta_id_web'")->result();
													?>

													<tbody>
														<?php $no = 1;
														foreach ($query as $pelatihan) { ?>
															<tr>
																<td><?= $no++ ?></td>
																<td><?php echo $pelatihan->nama_pelatihan ?></td>
																<td><?php echo $pelatihan->tanggal_mulai ?></td>
																<td><?php echo $pelatihan->tanggal_selesai ?></td>
																<td><a id="view_sertifikat" class="btn btn-success btn-sm" data-nama_pelatihan="<?= $pelatihan->nama_pelatihan ?>" data-tanggal_mulai="<?= $pelatihan->tanggal_mulai ?>" data-tanggal_selesai="<?= $pelatihan->tanggal_selesai ?>" data-angkatan="<?= $pelatihan->angkatan ?>" data-jumlah_peserta="<?= $pelatihan->jumlah_peserta ?>" data-metode="<?= $pelatihan->metode ?>" data-jumlah_jp="<?= $pelatihan->jumlah_jp ?>" data-penanggung_jawab="<?= $pelatihan->penanggung_jawab ?>" data-tempat="<?= $pelatihan->tempat ?>" data-jumlah_peserta="<?= $pelatihan->jumlah_peserta ?>" data-toggle="modal" data-target="#myModalDetail" href="#"><i class="fa fa-eye" aria-hidden="true"></i> View Detail</a></td>
																<td><a target="" href="<?= base_url() ?>upload/<?= $pelatihan->peserta_pelatihan_id ?>" class="btn btn-info btn-sm"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a></td>
																<td>
																	<?php if ($pelatihan->sertifikat == null || $pelatihan->sertifikat == '') { ?>
																		<p>No File</p>
																	<?php } else { ?>
																		<a class="btn btn-warning btn-sm" href="<?php echo base_url() . 'web/sertifikat/' . $pelatihan->sertifikat ?>"><i class="ace-icon fa fa-download"></i> Download
																		<?php } ?></a>
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
				</div>
			</section>
		</div>
	</section>
</div>

<script type="text/javascript">
	$(document).on('click', '#view_sertifikat', function() {
		var nama_pelatihan = $(this).data('nama_pelatihan');
		var tempat = $(this).data('tempat');
		var tanggal_mulai = $(this).data('tanggal_mulai');
		var tanggal_selesai = $(this).data('tanggal_selesai');
		var angkatan = $(this).data('angkatan');
		var jumlah_peserta = $(this).data('jumlah_peserta');
		var metode = $(this).data('metode');
		var jumlah_jp = $(this).data('jumlah_jp');
		var penanggung_jawab = $(this).data('penanggung_jawab');
		$('#myModalDetail #nama_pelatihan').text(nama_pelatihan);
		$('#myModalDetail #tanggal_mulai').text(tanggal_mulai);
		$('#myModalDetail #tanggal_selesai').text(tanggal_selesai);
		$('#myModalDetail #angkatan').text(angkatan);
		$('#myModalDetail #metode').text(metode);
		$('#myModalDetail #jumlah_jp').text(jumlah_jp);
		$('#myModalDetail #penanggung_jawab').text(penanggung_jawab);
		$('#myModalDetail #jumlah_peserta').text(jumlah_peserta);
		$('#myModalDetail #tempat').text(tempat);
	})
</script>


<script type="text/javascript">
	$(document).on('click', '#view_upload', function() {
		var lembar_konfirmasi = $(this).data('lembar_konfirmasi');
		$('#modal-dialog #download').attr("href", "karyawan/download/"+photo);

	})
</script>
