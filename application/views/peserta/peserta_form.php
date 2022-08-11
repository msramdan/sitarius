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
					<h4 class="panel-title">Data PESERTA</h4>
				</div>
				<div class="panel-body">

					<form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
						<thead>
							<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
								<?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'create_action') { ?>
									<tr>
										<td>Photo <?php echo form_error('photo') ?></td>
										<td><input type="file" class="form-control" name="photo" id="photo" placeholder="photo" required="" value="" onchange="return validasiEkstensi()" />
											<!-- <div id="preview"></div> -->
										</td>
									</tr>
								<?php } else { ?>
									<div class="form-group">
										<tr>
											<td>Photo <?php echo form_error('photo') ?></td>
											<td>
												<a href="#modal-dialog" data-bs-toggle="modal"><img src="<?php echo base_url(); ?>assets/img/peserta/<?= $photo ?>" style="width: 150px;height: 150px;border-radius: 5%;"></img></a>
												<input type="hidden" name="photo_lama" value="<?= $photo ?>">
												<p style="color: red">Note :Pilih photo Jika Ingin Merubah photo</p>
												<input type="file" class="form-control" name="photo" id="photo" placeholder="photo" value="" onchange="return validasiEkstensi()" />
												<!-- <div id="preview"></div> -->
											</td>

										</tr>
									</div>
								<?php } ?>
								<tr>
									<td>Nip <?php echo form_error('nip') ?></td>
									<td><input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" /></td>
								</tr>
								<tr>
									<td>Nama Lengkap <?php echo form_error('nama_lengkap') ?></td>
									<td><input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" /></td>
								</tr>
								<tr>
									<td>Email <?php echo form_error('email') ?></td>
									<td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
								</tr>
								<tr>
									<td>No Hp <?php echo form_error('no_hp') ?></td>
									<td><input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" /></td>
								</tr>
								<tr>
									<td>Tempat Lahir <?php echo form_error('tempat_lahir') ?></td>
									<td><input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" /></td>
								</tr>
								<tr>
									<td>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td>
									<td><input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" /></td>
								</tr>
								<tr>
									<td>Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></td>
									<td><select name="jenis_kelamin" class="form-control theSelect" value="<?= $jenis_kelamin ?>">
											<option value="">-- Pilih --</option>
											<option value="Laki Laki" <?php echo $jenis_kelamin == 'Laki Laki' ? 'selected' : 'null' ?>>Laki Laki</option>
											<option value="Perempuan" <?php echo $jenis_kelamin == 'Perempuan' ? 'selected' : 'null' ?>>Perempuan</option>
										</select>
									</td>
								</tr>
								<tr>
								<td>Pangkat/Golongan<?php echo form_error('pangkat') ?></td>
								<td>
									<select name="pangkat" class="form-control theSelect">
										<option value="">-- Pilih -- </option>
										<?php foreach ($data_pangkat as $key => $data) { ?>
											<?php if ($pangkat == $data->pangkat_id) { ?>
												<option value="<?php echo $data->pangkat_id ?>" selected><?php echo $data->nama_pangkat ?> - <?php echo $data->golongan ?> - <?php echo $data->ruangan ?> </option>
											<?php } else { ?>
												<option value="<?php echo $data->pangkat_id ?>"><?php echo $data->nama_pangkat ?> - <?php echo $data->golongan ?> - <?php echo $data->ruangan ?> </option>
											<?php } ?>
										<?php } ?>
									</select>
								</td>
							</tr>
								<tr>
									<td>Jabatan <?php echo form_error('jabatan') ?></td>
									<td><input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" /></td>
								</tr>

								<tr>
									<td>kantor_wilayah<?php echo form_error('kantor_wilayah') ?></td>
									<td>
										<select name="kantor_wilayah" class="form-control theSelect">
											<option value="">-- Pilih -- </option>
											<?php foreach ($kantor_wilayah_data as $key => $data) { ?>
												<?php if ($kantor_wilayah == $data->kantor_wilayah_id) { ?>
													<option value="<?php echo $data->kantor_wilayah_id ?>" selected><?php echo $data->nama_kantor_wilayah ?></option>
												<?php } else { ?>
													<option value="<?php echo $data->kantor_wilayah_id ?>"><?php echo $data->nama_kantor_wilayah ?></option>
												<?php } ?>
											<?php } ?>
										</select>
									</td>
								</tr>


								<tr>
									<td>Upt <?php echo form_error('upt') ?></td>
									<td><input type="text" class="form-control" name="upt" id="upt" placeholder="Upt" value="<?php echo $upt; ?>" /></td>
								</tr>
								<tr>
									<td>Bank<?php echo form_error('bank_id') ?></td>
									<td>
										<select name="bank_id" class="form-control theSelect">
											<option value="">-- Pilih -- </option>
											<?php foreach ($bank as $key => $data) { ?>
												<?php if ($bank_id == $data->bank_id) { ?>
													<option value="<?php echo $data->bank_id ?>" selected><?php echo $data->nama_bank ?></option>
												<?php } else { ?>
													<option value="<?php echo $data->bank_id ?>"><?php echo $data->nama_bank ?></option>
												<?php } ?>
											<?php } ?>
										</select>
									</td>
								</tr>


								<tr>
									<td>Norek <?php echo form_error('norek') ?></td>
									<td><input type="text" class="form-control" name="norek" id="norek" placeholder="Norek" value="<?php echo $norek; ?>" /></td>
								</tr>
								<?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
									<tr>
										<td>Password <?php echo form_error('password') ?></td>
										<td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td>
									</tr>
								<?php } else { ?>
									<tr>
										<td>Password <?php echo form_error('password') ?></td>
										<td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
											<small style="color: red">(Biarkan kosong jika tidak diganti)</small>
										</td>
									</tr>
								<?php } ?>
								<tr>
									<td></td>
									<td><input type="hidden" name="peserta_id" value="<?php echo $peserta_id; ?>" />
										<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('peserta') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
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
