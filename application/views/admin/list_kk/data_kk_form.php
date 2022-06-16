<style>

table.scroll > tbody {
	display: block;
    height: 124px;
    overflow-y: scroll;
}
table.scroll > thead,table.scroll >  tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
}
table.scroll > thead {
    width:calc(100% - 1.40em); 
}
table.scroll {
    width:100%;
}


</style>


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

					<form action="<?php echo $action; ?>" method="POST">
						
							<div class="row">
								<div class="col-sm-6">
									<input type="hidden" name="anggotakeluarga" id="anggotakeluarga" value='<?= $anggotakeluarga == null ? '[]' : $anggotakeluarga; ?>'>
									<table class="table table-bordered table-hover table-td-valign-middle scroll" id="tabellistanggotakk">
										<thead>
											<tr>
												<th colspan="3" style="line-height: 2;padding: 4px 12px;">
													<span style="font-size: 14px; font-weight: bold;">Anggota Keluarga</span>
													<br>
													<span id="jumlahAnggotaKeluarga">Jumlah: 0</span>
													<button type="button" class="btn btn-primary btnAddAnggota" style="float: right;transform: scale(0.6);margin-top: -17px;">
														<i class="fa fa-plus"></i>
													</button>
												</th>
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
													<button type="button" class="btn btn-primary btnAddAnggota">
														<i class="fa fa-plus"></i>
														Tambah
													</button>

												</td>
											</tr>
										</tbody>
									</table>

								</div>
								<div class="col-sm-6">
									<table class="table table-bordered table-hover table-td-valign-middle">
										<tr>
											<td>Kepala Keluarga <?php echo form_error('kepala_keluarga'); ?></td>
											<td>
												<select class="form-control" name="kepala_keluarga" id="kepala_keluarga" placeholder="Kepala Keluarga">
													<option value="">Mengambil data...</option>
												</select>
											</td>
										</tr>

										<tr>
											<td colspan="2" style="text-align: center;">
												<p>No Kk</p>
												<?php echo form_error('no_kk') ?>
												<input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kk" value="<?php echo $no_kk; ?>" style="font-size: 19px;font-weight: bold;height: 50px;" /></td>
										</tr>

										<tr>
											<td>Tgl Dikeluarkan <?php echo form_error('tgl_dikeluarkan') ?></td>
											<td> <input class="form-control" type="date" name="tgl_dikeluarkan" id="tgl_dikeluarkan" placeholder="Tgl Dikeluarkan" value="<?php echo $tgl_dikeluarkan; ?>">
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<table class="table table-bordered table-hover table-td-valign-middle">
										<tr>
											<td rowspan="3" width="50%">Alamat <?php echo form_error('alamat') ?><textarea class="form-control" rows="10" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
											<td>
												Rt <?php echo form_error('rt') ?><input type="number" class="form-control" name="rt" id="rt" placeholder="Rt" value="<?php echo $rt; ?>"/>
											</td>
											<td>
												Rw <?php echo form_error('rw') ?><input type="number" class="form-control" name="rw" id="rw" placeholder="Rw" value="<?php echo $rw; ?>">
											</td>
											<td>
												Desa/Kelurahan <?php echo form_error('desa_kelurahan') ?>
												<select class="form-control" name="desa_kelurahan" id="desa_kelurahan" placeholder="Desa Kelurahan">
													<option value="">Harap Pilih Kecamatan</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												Kecamatan <?php echo form_error('kecamatan') ?>
												<select class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan">
													<option value="">Harap Pilih Kabupaten/Kota</option>
												</select>
											</td>
											<td>
												Kabupaten/Kota <?php echo form_error('kabupaten_kota') ?>
												<select class="form-control"  name="kabupaten_kota" id="kabupaten_kota" placeholder="Kabupaten Kota">
													<option value="">Harap Pilih Provinsi</option>
												</select>
											</td>
											<td>
												Provinsi <?php echo form_error('provinsi') ?>
												<select class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi">
													<option value="">Mengambil data provinsi...</option>
												</select>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												Kode Pos <?php echo form_error('kode_pos') ?><input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>" />
											</td>
										</tr>
										<tr>
											<td colspan="4">
												<input type="hidden" name="kk_id" value="<?php echo $kk_id; ?>" />
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
<div class="modal fade" id="modal_form_anggotakk" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close_modal_form" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Form Data Anggota KK</h3>
			</div>
			<div class="modal-body form">
				<form id="formdataanggotakk" class="form-horizontal"> 
					<input type="text" value="" name="id_data_anggota" id="id_data_anggota" />
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">No KTP</label>
							<div class="col-md-9">
								<input required name="no_ktp_anggota_kk" id="no_ktp_anggota_kk" placeholder="Masukan Nomor KTP" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Nama Lengkap</label>
							<div class="col-md-9">
								<input required name="nama_anggota_kk" id="nama_anggota_kk" placeholder="Masukan Nama Lengkap" class="form-control" type="text">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Jenis Kelamin</label>
							<div class="col-md-9">
								<!-- combobox jenis kelamin -->
								<select required name="jeniskelamin_anggota_kk" id="jeniskelamin_anggota_kk" class="form-control">
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
											<input required name="tempatlahir_anggota_kk" id="tempatlahir_anggota_kk" placeholder="Masukan Tempat Lahir" class="form-control" type="text"/>
										</td>
										<td>
											<input required name="tanggallahir_anggota_kk" id="tanggallahir_anggota_kk" placeholder="Masukan Tanggal Lahir" class="form-control" type="date"/>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Agama</label>
							<div class="col-md-9">
								<!-- combobox jenis kelamin -->
								<select required name="agama_anggota_kk" id="agama_anggota_kk" class="form-control">
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
								<select required name="pendidikan_anggota_kk" id="pendidikan_anggota_kk" class="form-control">
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
								<select required name="pekerjaan_anggota_kk" id="pekerjaan_anggota_kk" class="form-control">
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
								<select required name="golongandarah_anggota_kk" id="golongandarah_anggota_kk" class="form-control">
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
								<select name="hubungankeluarga_anggota_kk" id="hubungankeluarga_anggota_kk" class="form-control">
									<option value="">-Pilih-</option>
									<?php
										$hubungan_keluarga = array('Istri', 'Suami','Anak', 'Mertua', 'Menantu', 'Cucu', 'Orang Tua', 'Kakek', 'Nenek', 'Keponakan', 'Lainnya');
										
										foreach ($hubungan_keluarga as $key => $value) {
											echo '<option value="'.$value.'">'.$value.'</option>';
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="btnSave" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).on('ready', function() {

		function getListProvince() {
			let provinsi_editdata = '<?php echo $provinsi ?>'

			if(provinsi_editdata != '') {
				$.getJSON(`http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`, function(data) {
					let html = '<option value="">-Pilih-</option>';
					
					$.each(data, function(key, val) {

						if(val.id == provinsi_editdata) {
							html += `<option value="${val.id}" selected>${val.name}</option>`;
						} else {
							html += `<option value="${val.id}">${val.name}</option>`;
						}
					});

					$('#provinsi').html(html);
				});
				getListKabupaten();
			} else {
				$.getJSON(`http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`, function(data) {
					let html = '<option value="">-Pilih-</option>';
					
					$.each(data, function(key, val) {
						html += `<option value="${val.id}">${val.name}</option>`;
					});

					$('#provinsi').html(html);
				});
			}
		}
		getListProvince()

		function getListKabupaten() {
			let provinsi_id = $('#provinsi').val();

			$('#kabupaten_kota').html('<option>Mengambil data...</option>')

			let provinsi_editdata = '<?php echo $provinsi ?>'
			let kabupatenKota_editdata = '<?php echo $kabupaten_kota ?>'

			if(provinsi_editdata != '' || kabupatenKota_editdata != '') {
				$.getJSON(`http://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsi_editdata}.json`, function(data) {
					let html = '<option value="">-Pilih-</option>';
					
					$.each(data, function(key, val) {
						if(kabupatenKota_editdata == val.id) {
							html += `<option value="${val.id}" selected>${val.name}</option>`;
						} else {
							html += `<option value="${val.id}">${val.name}</option>`;
						}
					});

					$('#kabupaten_kota').html(html);
				})
			} else {
				if(provinsi_id != '') {
					$.getJSON(`http://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsi_id}.json`, function(data) {
						let html = '<option value="">-Pilih-</option>';
						
						$.each(data, function(key, val) {
							html += `<option value="${val.id}">${val.name}</option>`;
						});
	
						$('#kabupaten_kota').html(html);
					})
				} else {
					$('#kabupaten_kota').html('<option value="">Harap pilih provinsi</option>');
				}

			}
		}

		function getListKecamatan() {
			let kabupaten_id = $('#kabupaten_kota').val();

			$('#kecamatan').html('<option value="">Mengambil Data...</option>');

			let kabupaten_editdata = '<?php echo $kabupaten_kota ?>'
			let kecamatan_editdata = '<?php echo $kecamatan ?>'

			if(kabupaten_editdata != '' || kecamatan_editdata != '') {
				$.getJSON(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupaten_editdata}.json`, function(data) {
					let html = '<option value="">-Pilih-</option>';
					
					$.each(data, function(key, val) {
						if(kecamatan_editdata == val.id) {
							html += `<option value="${val.id}" selected>${val.name}</option>`;
						} else {
							html += `<option value="${val.id}">${val.name}</option>`;
						}
					});

					$('#kecamatan').html(html);
				})
			} else {
				if(kabupaten_id != ''){
					$.getJSON(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupaten_id}.json`, function(data) {
						let html = '<option value="">-Pilih-</option>';
						
						$.each(data, function(key, val) {
							html += `<option value="${val.id}">${val.name}</option>`;
						});
	
						$('#kecamatan').html(html);
					})
				} else {
					$('#kecamatan').html('<option value="">Harap pilih kabupaten/kota</option>');
				}
			}
		}
		
		function getListKelurahan() {
			let kecamatan_id = $('#kecamatan').val();

			$('#desa_kelurahan').html('<option value="">Mengambil Data...</option>');

			let kecamatan_editdata = '<?php echo $kecamatan ?>'
			let kelurahan_editdata = '<?php echo $desa_kelurahan ?>'

			if(kecamatan_editdata != '' || kelurahan_editdata != '') {
				$.getJSON(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatan_editdata}.json`, function(data) {
					let html = '<option value="">-Pilih-</option>';
					
					$.each(data, function(key, val) {
						if(kelurahan_editdata == val.id) {
							html += `<option value="${val.id}" selected>${val.name}</option>`;
						} else {
							html += `<option value="${val.id}">${val.name}</option>`;
						}
					});

					$('#desa_kelurahan').html(html);
				})
			} else {
				if(kecamatan_id != '') {
					$.getJSON(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatan_id}.json`, function(data) {
						let html = '<option value="">-Pilih-</option>';
						
						$.each(data, function(key, val) {
							html += `<option value="${val.id}">${val.name}</option>`;
						});

						$('#desa_kelurahan').html(html);
					})
				} else {
					$('#desa_kelurahan').html('<option value="">Harap pilih kecamatan</option>');
				}
			}

		}


		getListKecamatan()
		getListKelurahan()
		
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

		function updateDataAnggota(data_baru) {
			var data = getDataListanggotakk()

			data[data_baru.id] = data_baru

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
						<button type="button" class="btn btn-primary btnAddAnggota">
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

			$('#jumlahAnggotaKeluarga').text('Jumlah: '+ lengthdata)
		}

		function createElement(data){

			var s = JSON.stringify(data)

			var html = `<tr class='item' id='${data.id_data_anggota}'>
				<td>${data.no_ktp_anggota_kk}</td>
				<td>${data.nama_anggota_kk}</td>
				<td style="text-align: center;">
					<input type="hidden" class="detailny" value='${s}'/><button class="btn-edit editAnggota"><i class="fa fa-edit"></i></button><button class="btn-delete deleteAnggota"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				</td>
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

		function cleanForms(elementForm) {
			$(elementForm).find('input').each(function(index, el) {
				$(this).val('')
			});
			$(elementForm).find('select').each(function(index, el) {
				$(this).val('')
			});
		}

		function delete_anggota_kk(id){

			var datas = getDataListanggotakk()
			console.log(datas)
			// find index by datas.id
			var index = datas.findIndex(function(item, i){
				return item.id_data_anggota == id
			});

			datas.splice(index, 1);

			// resort datas.id_data_anggota from 1 to n
			datas.forEach(function(item, i){
				item.id_data_anggota = i+1
			});
			console.log(datas)
			// parse to JSON
			var data = JSON.stringify(datas);
			$('#anggotakeluarga').val(data);

		}

		function refreshComboboxKepalaKeluarga() {
			var datas = getDataListanggotakk()

			let kepala_keluarga = '<?= $kepala_keluarga ?>'
			console.log(datas.length)
			if(datas.length > 0) {
				let html = '<option value="">-Pilih Kepala Keluarga-</option>'
	
				$.each(datas,function(index) {
					if(datas[index].id_data_anggota == kepala_keluarga){
						html += `<option value="${datas[index].id_data_anggota}" selected>(${datas[index].hubungankeluarga_anggota_kk}) ${datas[index].nama_anggota_kk}</option>`
					} else {
						html += `<option value="${datas[index].id_data_anggota}">(${datas[index].hubungankeluarga_anggota_kk}) ${datas[index].nama_anggota_kk}</option>`
					}	
				});
	
				$('#kepala_keluarga').html(html)
			} else {
				$('#kepala_keluarga').html(`<option value="">Tidak ada anggota keluarga</option>`)
			}

		}

		$(document).on('click', '.deleteAnggota', function(e) {
			e.preventDefault()

			var data = $(this).parents('tr').find('input.detailny').val();
			data = JSON.parse(data)

			Swal.fire({
				title: "Apakah anda yakin?",
				text: "Data anggota keluarga ini akan dihapus!",
				type: "warning",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Ya, hapus!",
				cancelButtonText: "Tidak, batalkan!",
				closeOnConfirm: false,
				closeOnCancel: false
			}).then((result) => {
  				if (result.isConfirmed) {
					delete_anggota_kk(data.id_data_anggota)
					$(this).parents('tr').remove()
		
					refreshDataListAnggotakk()
					refreshComboboxKepalaKeluarga()
					// sweetalert success with timer 1 second
					Swal.fire({
						title: "Berhasil!",
						icon: "success",
						text: "Data anggota keluarga berhasil dihapus!",
						timer: 1000,
						type: "success",
						showConfirmButton: false
					});
				}
			})
		})

		$(document).on('click', '.btnAddAnggota', function() {

			// show modal
			cleanForms($('#modal_form_anggotakk'))
			$('#modal_form_anggotakk').modal({
				backdrop: 'static',
				keyboard: false,
				show: true
			})

			var datas = getDataListanggotakk()

			$('#id_data_anggota').val(datas.length + 1)
			$('#no_ktp_anggota_kk').val('')
			$('#nama_anggota_kk').val('')
			$('#hubungankeluarga_anggota_kk').val('')

			$('#modal_form_anggotakk').find('#btnSave').attr('data-action', 'create').text('Tambah');


		})

		function composeObject(object) {
			// looping data_new to convert to json
			let data_new_temp = {}
			$.each(object, function(i, field) {

				if(field.value == ''){
					alert('Data ' + field.name +' tidak boleh kosong!')
					return false
				}

				data_new_temp[field.name] = field.value
			})
			
			return data_new_temp
		}
		
		$(document).on('click', '.editAnggota', function(e) {
			
			e.preventDefault()
			cleanForms($('#modal_form_anggotakk'))

			var data = $(this).parents('tr').find('input.detailny').val();

			$('#modal_form_anggotakk').modal({
				backdrop: 'static',
				keyboard: false,
				show: true
			})

			data = JSON.parse(data);

			$('#id_data_anggota').val(data.id_data_anggota)
			$('#no_ktp_anggota_kk').val(data.no_ktp_anggota_kk)
			$('#nama_anggota_kk').val(data.nama_anggota_kk)

			$('#jeniskelamin_anggota_kk').val(data.jeniskelamin_anggota_kk)
			$('#tempatlahir_anggota_kk').val(data.tempatlahir_anggota_kk)
			$('#tanggallahir_anggota_kk').val(data.tanggallahir_anggota_kk)
			$('#agama_anggota_kk').val(data.agama_anggota_kk)
			$('#pendidikan_anggota_kk').val(data.pendidikan_anggota_kk)
			$('#pekerjaan_anggota_kk').val(data.pekerjaan_anggota_kk)
			$('#alamat_anggota_kk').val(data.alamat_anggota_kk)
			$('#golongandarah_anggota_kk').val(data.golongandarah_anggota_kk)
			$('#hubungankeluarga_anggota_kk').val(data.hubungankeluarga_anggota_kk)

			$('#modal_form_anggotakk').find('#btnSave').attr('data-action', 'edit').text('Update');

		})

		$(document).on('submit', '#formdataanggotakk', function(e) {
			// serialize data
			e.preventDefault()

			// get this active submit button
			var action = $(this).find('#btnSave').attr('data-action');

			// get data from form
			var data_new = $(this).serializeArray();

			// if data_new[0].value is not number, return alert
			if(isNaN(data_new[0].value)) {
				alert('Data tidak valid! [Error 31 : ID is not created using number, are you trying to autofill it?]')
				return false
			}

			if(action == 'edit') {

				var datas = getDataListanggotakk()

				var id_data_anggota = data_new[0].value

				data_new = composeObject(data_new)

				
				// find index of object by datas.id_data_anggota
				var index = datas.findIndex(function(item, i){
					return item.id_data_anggota == id_data_anggota
				});
				
				console.log(datas[index])
				
				datas[index] = data_new;

				console.log(datas[index])

				// parse to JSON
				var data = JSON.stringify(datas);
				$('#anggotakeluarga').val(data);
			}

			if(action == 'create') {
				var datas = getDataListanggotakk()

				var lengthdatas = datas.length

				// convert this form value to json as data_new

				data_new = composeObject(data_new)
				
				addDataAnggota(data_new)
			}

			// createElement(data_new_temp)
			refreshDataListAnggotakk()
			refreshComboboxKepalaKeluarga()

			cleanForms($(this))

			Swal.fire({
				title: "Berhasil!",
				icon: "success",
				text: "Data anggota keluarga berhasil di " + action + "!",
				timer: 1000,
				type: "success",
				showConfirmButton: false
			});

			// dismiss modal
			$('.close_modal_form').click()
		})

		$(document).on('change', '#provinsi', function() {
			getListKabupaten()
			$('#kabupaten_kota').html('<option value="">Harap Pilih Provinsi</option>')
			$('#kecamatan').html('<option value="">Harap Pilih Kabupaten/Kota</option>')
			$('#desa_kelurahan').html('<option value="">Harap Pilih Kecamatan</option>')
		})
		
		$(document).on('change', '#kabupaten_kota', function(){
			getListKecamatan()
			$('#desa_kelurahan').html('<option value="">Harap Pilih Kecamatan</option>')
		})

		$(document).on('change', '#kecamatan', function() {
			getListKelurahan()
		})

		refreshDataListAnggotakk()

		refreshComboboxKepalaKeluarga()
	})
</script>