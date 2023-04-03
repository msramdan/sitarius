<?php $nama_pelatihan = $this->db->query("SELECT nama_pelatihan,jumlah_peserta,metode from pelatihan where pelatihan_id='$pelatihan_id'")->row();
$kuota = $nama_pelatihan->jumlah_peserta;


$daftarPesertaPelatihan = $this->db->query("SELECT * from peserta_pelatihan join peserta on peserta.peserta_id = peserta_pelatihan.peserta_id where pelatihan_id='$pelatihan_id'");
$daftarPeserta = $daftarPesertaPelatihan->result();
$kuotaSaatIni = $daftarPesertaPelatihan->num_rows();


?>

<!-- #modal-dialog -->
<div class="modal fade" id="modal-dialog-sertifikat">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Sertifikat <span id="modal_nama_lengkap"></span> </h4>
			</div>
			<form action="<?= base_url() ?>pelatihan/uploadSertifikat" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<center>
						<img src="" id="modalGambarSertifikat" width="60%" />
						<p style="color: red">*Silahkan pilih sertifikat jika ingin merubahnya</p>
					</center>
					<input type="hidden" id="modal_peserta_pelatihan_id" value="" name="peserta_pelatihan_id">
					<input type="hidden" id="pelatihan_id" value="<?= $pelatihan_id ?>" name="pelatihan_id">
					<div class="form-group">
						<input type="file" class="form-control " id="photo" name="photo" value="" required>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- TRF -->
<div class="modal fade" id="modal-dialog-trf">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Bukri Transfer <span id="modal_nama_lengkap_trf"></span> </h4>
			</div>
			<form action="<?= base_url() ?>pelatihan/uploadTrf" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<center>
						<img src="" id="modalGambarTrf" width="60%" />
						<p style="color: red">*Silahkan pilih bukti trf jika ingin merubahnya</p>
					</center>
					<input type="hidden" id="modal_peserta_pelatihan_id_trf" value="" name="peserta_pelatihan_id">
					<input type="hidden" id="pelatihan_id" value="<?= $pelatihan_id ?>" name="pelatihan_id">
					<div class="form-group">
						<input type="file" class="form-control " id="photo" name="photo" value="" required>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div id="content" class="content">
	<div class="row">
		<div class="col-md-3 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="index-1">
				<div class="panel-heading">
					<h4 class="panel-title">Cari Daftar Peserta</h4>
				</div>
				<div class="panel-body">
					<form style="margin: 5px;" method="post" action="<?= base_url() ?>pelatihan/add_peserta">
						<div class="row">
							<div class="input-group" style="margin-bottom: 5px;">
								<input type="hidden" value="<?= $pelatihan_id ?>" name="pelatihan_id">
								<select name="peserta_id" id="peserta_id" class="form-control select2" autocomplete="off" autofocus required <?php if ($kuota <= $kuotaSaatIni) {
																																					echo "Disabled";
																																				} ?>>
									<?php $list = $this->db->query("SELECT * From peserta")->result(); ?>
									<option value="" selected disabled>-- Pilih --</option>
									<?php foreach ($list as $key => $row) { ?>
										<option value="<?= $row->peserta_id ?>"><?= $row->nip ?> - <?= $row->nama_lengkap ?></option>
									<?php } ?>
								</select>
								<div class="input-group-btn">
									<button class="btn btn-primary" type="submit" <?php if ($kuota <= $kuotaSaatIni) {
																						echo "Disabled";
																					} ?>>
										<i class="fa fa-plus"></i> Add
									</button>
								</div>
							</div>
							<?php if ($kuota <= $kuotaSaatIni) { ?>
								<span style="color: red;"> <i> * Pelatihan sudah penuh</i> </span>
							<?php } else { ?>
								<span style="color: red;"> <i> * Total Kuota Peserta : <?= $kuota ?> </i> </span><br>
								<span style="color: red;"> <i> * Peserta Terdaftar : <?= $kuotaSaatIni ?> </i> </span><br>
								<span style="color: red;"> <i> * Sisa Kuota Peserta : <?= $kuota - $kuotaSaatIni ?> </i> </span><br>
							<?php } ?>


						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-9 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="index-2">
				<div class="panel-heading">

					<h4 class="panel-title">List Peserta Pelatihan <b>"<?= $nama_pelatihan->nama_pelatihan ?> "</b> - Motede : <?= $nama_pelatihan->metode ?> </h4>
				</div>
				<div class="panel-body">


					<table id="data-table" class="table table-bordered table-hover table-td-valign-middle">
						<thead>
							<tr>
								<th>No</th>
								<th>Photo</th>
								<th>Nip</th>
								<th>Nama Lengkap</th>
								<th>Sertifikat</th>
								<th>Upload</th>
								<th>Berkas</th>
								<th>Bukti Trf</th>
								<th>Hapus</th>
							</tr>
						</thead>

						<tbody>
							<?php $no = 1;
							foreach ($daftarPeserta as $peserta) {
							?>
								<tr>
									<td><?= $no++ ?></td>
									<td>
										<?php if ($peserta->photo == '' || $peserta->photo == null) { ?>
											<img src="<?= base_url() ?>assets/img/peserta/default.png" width="40px" height="auto" />
										<?php } else { ?>
											<img src="<?= base_url() ?>assets/img/peserta/<?php echo $peserta->photo ?>" width="40px" height="auto" />
										<?php } ?>
										</a>
									</td>
									<td><?php echo $peserta->nip ?></td>
									<td><?php echo $peserta->nama_lengkap ?></td>

									<?php if ($peserta->sertifikat == '' || $peserta->sertifikat == null) { ?>
										<td style="color: red;"><i class="fa fa-times" aria-hidden="true"></i> Certificate Not Available</td>
									<?php } else { ?>
										<td style="color: green;"><i class="fa fa-check" aria-hidden="true"></i> Certificate Available </td>
									<?php } ?>
									<td>
										<a href="#modal-dialog-sertifikat" class="btn btn-info btn-sm" id="view_sertifikat" data-id="<?= $peserta->peserta_pelatihan_id ?>" data-nama_lenglap="<?= $peserta->nama_lengkap ?>" data-gambar_sert="<?= $peserta->sertifikat ?>" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a>
									</td>
									<td> <a href="<?= base_url() ?>pelatihan/berkas/<?= $peserta->peserta_pelatihan_id ?>/<?= $peserta->pelatihan_id ?>" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> View </a> </td>
									<td>
										<a href="#modal-dialog-trf" class="btn btn-warning btn-sm" id="view_trf" data-id="<?= $peserta->peserta_pelatihan_id ?>" data-nama_lengkap="<?= $peserta->nama_lengkap ?>" data-gambar_trf="<?= $peserta->trf ?>" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a>
									</td>

									<td>
										<?php
										echo anchor(site_url('pelatihan/deletePeserta/' . $peserta->peserta_pelatihan_id . '/' . $pelatihan_id), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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

<script>
	$(document).ready(function() {
		$('.select2').select2();
	});
</script>

<script type="text/javascript">
	$(document).on('click', '#view_sertifikat', function() {
		var nama_lengkap = $(this).data('nama_lenglap');
		var id = $(this).data('id');
		var gambarSertifikat = $(this).data('gambar_sert');
		if (gambarSertifikat) {
			var source = "../../assets/img/sertifikat/" + gambarSertifikat;
		} else {
			var source = "../../assets/img/sertifikat/default.png";
		}
		var photo = $(this).data('photo');
		$('#modal-dialog-sertifikat #modal_nama_lengkap').text(nama_lengkap);
		$('#modal-dialog-sertifikat #modal_peserta_pelatihan_id').val(id);
		$('#modal-dialog-sertifikat #modalGambarSertifikat').attr("src", source);
	})
</script>

<script type="text/javascript">
	$(document).on('click', '#view_trf', function() {
		var nama_lengkap = $(this).data('nama_lengkap');
		var id = $(this).data('id');
		var picTrf = $(this).data('gambar_trf');
		if (picTrf) {
			var source = "../../assets/img/trf/" + picTrf;
		} else {
			var source = "../../assets/img/trf/default.png";
		}
		var photo = $(this).data('photo');
		$('#modal-dialog-trf #modal_nama_lengkap_trf').text(nama_lengkap);
		$('#modal-dialog-trf #modal_peserta_pelatihan_id_trf').val(id);
		$('#modal-dialog-trf #modalGambarTrf').attr("src", source);
	})
</script>