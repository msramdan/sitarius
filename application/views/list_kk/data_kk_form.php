<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Data_kk</li>
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
					<h4 class="panel-title">Data DATA_KK</h4>
				</div>
				<div class="panel-body">

					<form data-action="<?php echo $action; ?>">
						
							<div class="row">
								<div class="col-sm-6">
									<input type="text" name="anggotakeluarga" id="anggotakeluarga" value="[]">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form">
										<i class="fa fa-plus"></i>
										Tambah
									</button>
									<table class="table table-bordered table-hover table-td-valign-middle" id="tabellistanggotakk">
										<thead>
											<tr>
												<th colspan="3">Anggota Keluarga</th>
											</tr>
											<tr>
												<th>No.KTP</th>
												<th>Nama</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="tabel-anggota-keluarga-list">
											<tr>
												<td colspan="3" style="text-align: center;">
													<p>Tambah Anggota Keluarga pada tombol dibawah</p>
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form">
														<i class="fa fa-plus"></i>
														Tambah
													</button>

												</td>
											</tr>
										</tbody>
									</table>

								</div>
								<div class="col-sm-6">
									<table class="table  table-bordered table-hover table-td-valign-middle">
										<tr>
											<td>Kepala Keluarga <?php echo form_error('kepala_keluarga') ?></td>
											<td><input type="text" class="form-control" name="kepala_keluarga" id="kepala_keluarga" placeholder="Kepala Keluarga" value="<?php echo $kepala_keluarga; ?>" /></td>
										</tr>

										<tr>
											<td>No Kk <?php echo form_error('no_kk') ?></td>
											<td> <textarea class="form-control" rows="3" name="no_kk" id="no_kk" placeholder="No Kk"><?php echo $no_kk; ?></textarea></td>
										</tr>

										<tr>
											<td>Alamat <?php echo form_error('alamat') ?></td>
											<td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
										</tr>

										<tr>
											<td>Rt <?php echo form_error('rt') ?></td>
											<td> <textarea class="form-control" rows="3" name="rt" id="rt" placeholder="Rt"><?php echo $rt; ?></textarea></td>
										</tr>

										<tr>
											<td>Rw <?php echo form_error('rw') ?></td>
											<td> <textarea class="form-control" rows="3" name="rw" id="rw" placeholder="Rw"><?php echo $rw; ?></textarea></td>
										</tr>
										<tr>
											<td>Kode Pos <?php echo form_error('kode_pos') ?></td>
											<td><input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>" /></td>
										</tr>

										<tr>
											<td>Desa Kelurahan <?php echo form_error('desa_kelurahan') ?></td>
											<td> <textarea class="form-control" rows="3" name="desa_kelurahan" id="desa_kelurahan" placeholder="Desa Kelurahan"><?php echo $desa_kelurahan; ?></textarea></td>
										</tr>

										<tr>
											<td>Kecamatan <?php echo form_error('kecamatan') ?></td>
											<td> <textarea class="form-control" rows="3" name="kecamatan" id="kecamatan" placeholder="Kecamatan"><?php echo $kecamatan; ?></textarea></td>
										</tr>

										<tr>
											<td>Kabupaten Kota <?php echo form_error('kabupaten_kota') ?></td>
											<td> <textarea class="form-control" rows="3" name="kabupaten_kota" id="kabupaten_kota" placeholder="Kabupaten Kota"><?php echo $kabupaten_kota; ?></textarea></td>
										</tr>

										<tr>
											<td>Provinsi <?php echo form_error('provinsi') ?></td>
											<td> <textarea class="form-control" rows="3" name="provinsi" id="provinsi" placeholder="Provinsi"><?php echo $provinsi; ?></textarea></td>
										</tr>

										<tr>
											<td>Tgl Dikeluarkan <?php echo form_error('tgl_dikeluarkan') ?></td>
											<td> <textarea class="form-control" rows="3" name="tgl_dikeluarkan" id="tgl_dikeluarkan" placeholder="Tgl Dikeluarkan"><?php echo $tgl_dikeluarkan; ?></textarea></td>
										</tr>
										<tr>
											<td></td>
											<td><input type="hidden" name="kk_id" value="<?php echo $kk_id; ?>" />
												<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
												<a href="<?php echo site_url('list_kk') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
											</td>
										</tr>
									</table>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- create modal  -->
<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close_modal_form" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Form Data KK</h3>
			</div>
			<div class="modal-body form">
				<form id="formdataanggotakk" class="form-horizontal"> 
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">No KTP</label>
							<div class="col-md-9">
								<input name="no_ktp_anggota_kk" placeholder="Masukan Nomor KTP" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Nama Lengkap</label>
							<div class="col-md-9">
								<input name="nama_anggota_kk" placeholder="Masukan Nama Lengkap" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Jenis Kelamin</label>
							<div class="col-md-9">
								<!-- combobox jenis kelamin -->
								<select name="jenis_kelamin_anggota_kk" id="jenis_kelamin_anggota_kk" class="form-control">
									<option value="">-Pilih-</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Tempat/Tanggal Lahir</label>
							<div class="col-md-9">
								<table style="width: 100%;">
									<tr>
										<td style="padding: 5px;">
											<input name="tempat_lahir" id="tempat_lahir_anggota_kk" placeholder="Masukan Tempat Lahir" class="form-control" type="text"/>
										</td>
										<td>
											<input name="tanggal_lahir" id="tanggal_lahir_anggota_kk" placeholder="Masukan Tanggal Lahir" class="form-control" type="date"/>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Agama</label>
							<div class="col-md-9">
								<!-- combobox jenis kelamin -->
								<select name="agama_anggota_kk" id="agama_anggota_kk" class="form-control">
									<option value="">-Pilih-</option>
									<option value="Islam">Islam</option>
									<option value="Kristen">Kristen</option>
									<option value="Katolik">Katolik</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>
									<option value="Konghucu">Konghucu</option>
									<option value="Lainnya">lainnya</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Pendidikan</label>
							<div class="col-md-9">
								<!-- combobox jenis kelamin -->
								<select name="pendidikan_anggota_kk" id="pendidikan_anggota_kk" class="form-control">
									<option value="">-Pilih-</option>
									<?php
									
									foreach ($pendidikanlist as $key => $value) {
										echo '<option value="'.$value->pendidikan_id.'">'.$value->nama_pendidikan.'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Pekerjaan</label>
							<div class="col-md-9">
								<!-- combobox jenis kelamin -->
								<select name="pekerjaan_anggota_kk" id="pekerjaan_anggota_kk" class="form-control">
									<option value="">-Pilih-</option>
									<?php
									
									foreach ($pekerjaanlist as $key => $value) {
										echo '<option value="'.$value->pekerjaan_id.'">'.$value->nama_pekerjaan.'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Golongan Darah</label>
							<div class="col-md-9">
								<!-- combobox jenis kelamin -->
								<select name="golongandarah_anggota_kk" id="golongandarah_anggota_kk" class="form-control">
									<option value="">-Pilih-</option>
									<?php
									// array of golongan darah
									$golongan_darah = array('A', 'B', 'AB', 'O');
									foreach ($golongan_darah as $key => $value) {
										echo '<option value="'.$value.'">'.$value.'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Hubungan Keluarga</label>
							<div class="col-md-9">
								<input name="hubungankeluarga_anggota_kk" placeholder="Hubungan Keluarga" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="btnSave"class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).on('ready', function() {

		
		function getDataListanggotakk() {
			var data = $('#anggotakeluarga').val()

			// parse to JSON
			var data = JSON.parse(data);

			return data
		}

		function addDataAnggota(data_baru) {
			var data = getDataListanggotakk()

			data.push(data_baru)

			// parse to JSON
			var data = JSON.stringify(data)

			$('#anggotakeluarga').val(data)
		}

		function refreshDataListAnggotakk(){

			console.log('refreshed!')

			var temp = getDataListanggotakk()


			var lengthdata = temp.length

			if(lengthdata <= 0){
				$('#tabellistanggotakk').find('tbody#tabel-anggota-keluarga-list').html(`
				<tr>
					<td colspan="3" style="text-align: center;">
						<p>Tambah Anggota Keluarga pada tombol dibawah</p>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form">
							<i class="fa fa-plus"></i>
							Tambah
						</button>

					</td>
				</tr>
				`)
				$('#anggotakeluarga').val('[]')
			} else {

				
				$('#tabellistanggotakk').find('tbody#tabel-anggota-keluarga-list').html('');

				$.each(temp,function(index) {
					createElement(temp[index])
				});
				
			}
		}

		function createElement(data){

			var s = JSON.stringify(data)

			var html = `<tr class='item' id='${data.id}'>
				<td>${data.no_ktp_anggota_kk}</td>
				<td>${data.nama_anggota_kk}</td>
				<td><input type="text" class="detailny" value='${s}'/><button class="btn-edit"><i class="fa fa-edit"></i></button><button class="btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
			</tr>`

			$('#tabellistanggotakk').find('tbody#tabel-anggota-keluarga-list').append(html);

			// refreshDataListAnggotakk()
		}

		function removeElement(data){
			$('#tabellistanggotakk').find('tr').each(function(index, el) {
				if($(this).find('td:first-child').text() == data.no_ktp_anggota_kk){
					$(this).remove();
				}
			});
		}

		

		function delete_anggota_kk(id){

			var datas = getDataListanggotakk()

			// find index by datas.id
			var index = datas.findIndex(function(item, i){
				if(item.id == id) {
					// remove datas[i]
					datas.splice(i, 1);
				}
			});

			// parse to JSON
			var data = JSON.stringify(datas);
			$('#anggotakeluarga').val(data);

		}

		$(document).on('click', '.deleteAnggota', function() {
			var id = $(this).data('id');
			var nama = $(this).data('nama');
			$('#delete_anggota_kk').data('id', id);
			
		})

		$(document).on('submit', '#formdataanggotakk', function(e) {
			// serialize data
			e.preventDefault()

			var datas = getDataListanggotakk()

			var lengthdatas = datas.length

			// convert this form value to json as data_new
			var data_new = $(this).serializeArray()

			let data_new_temp = {
				"id" : lengthdatas + 1,
			}

			// looping data_new to convert to json
			$.each(data_new, function(i, field) {

				if(field.value == ''){
					alert('Data tidak boleh kosong!')
					return false
				}

				data_new_temp[field.name] = field.value
			})
			addDataAnggota(data_new_temp)

			// createElement(data_new_temp)
			refreshDataListAnggotakk()

			// dismiss modal
			$('.close_modal_form').click()
		})
	})
</script>