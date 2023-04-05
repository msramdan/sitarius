<?php $nama_pelatihan = $this->db->query("SELECT nama_pelatihan,jumlah_peserta,metode from pelatihan where pelatihan_id='$pelatihan_id'")->row(); ?>



<!-- #modal-dialog -->
<div class="modal fade" id="modal-dialog-bukti_honor">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Bukti Transfer Honor <span id="modal_nama_lengkap"></span> </h4>
			</div>
			<form action="<?= base_url() ?>pelatihan/uploadbukti_honor" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<center>
						<img src="" id="modalGambarbukti_honor" width="60%" />
						<p style="color: red">*Silahkan pilih Bukti Transfer Honor jika ingin merubahnya</p>
					</center>
					<input type="hidden" id="modal_pelatihan_pemateri_id" value="" name="pelatihan_pemateri_id">
					<input type="hidden" id="pelatihan_id" value="<?= $pelatihan_id ?>" name="pelatihan_id">
					<div class="form-group">
						<input type="file" class="form-control " id="photo" name="photo" value="" required>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
					<?php if ($this->session->userdata('level_id') == 2) { ?>
						<button type="submit" class="btn btn-success">Simpan</button>
					<?php } ?>
				</div>
			</form>
		</div>
	</div>
</div>


<div id="content" class="content">
	<div class="row">
		<div class="col-md-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="index-2">
				<div class="panel-heading">

					<h4 class="panel-title">Anggaran keuangan <b>"<?= $nama_pelatihan->nama_pelatihan ?> "</b> </h4>
				</div>
				<div class="panel-body">


					<?php if ($this->session->userdata('level_id') == 2) { ?>
						<button style="margin-bottom: 10px;" type="button" name="add_berkas" id="add_berkas" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add Budget</button>
					<?php } ?>

					<form action="<?= base_url() ?>pelatihan/store_budget" method="post">
						<input type="hidden" value="<?= $pelatihan_id ?>" name="pelatihan_id">
						<table class="table table-bordered " id="dynamic_field">
							<thead>
								<tr>
									<th>Keterangan </th>
									<th style="width: 25%;">Budget</th>
									<?php if ($this->session->userdata('level_id') == 2) { ?>
										<th style="width: 5%;">Action</th>
									<?php } ?>

								</tr>
							</thead>
							<?php $budget = $this->db->query("SELECT pelatihan_budget.*,budget.nama_budget from pelatihan_budget join budget on budget.budget_id = pelatihan_budget.budget_id  where pelatihan_id='$pelatihan_id'")->result(); ?>
							<tbody>
								<?php foreach ($budget as $value) { ?>
									<tr id="detail_file<?= $value->pelatihan_budget_id ?>">
										<td><input  required type="text" name="nama_budget[]" placeholder="" class="form-control " value="<?= $value->nama_budget ?>" readonly />
										<input  required type="hidden" name="budget_id[]" placeholder="" class="form-control" value="<?= $value->budget_id ?>"></td>
										<td><input required step="any" type="number" name="budget[]" placeholder="" value="<?= $value->budget ?>" class="form-control " /></td>
										<?php if ($this->session->userdata('level_id') == 2) { ?>
											<td><button type=" button" name="" id="" class="btn btn-danger btn-sm btn_remove_data"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
										<?php } ?>

									</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php if ($this->session->userdata('level_id') == 2) { ?>
							<a href="<?php echo site_url('pelatihan') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Back</a>
							<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Simpan</button>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>

		<!-- ===== -->
		<div class="col-md-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="index-2">
				<div class="panel-heading">

					<h4 class="panel-title">List Daftar Pemateri <b>"<?= $nama_pelatihan->nama_pelatihan ?> "</b> </h4>
				</div>
				<div class="panel-body">
					<table class="table table-bordered " id="dynamic_field">
						<thead>
							<tr>
								<th>Nama Pemateri </th>
								<th>Kontak Hp</th>
								<th>Status Trf</th>
								<th>Bukti Honor</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($pemateri as $key => $datas) { ?>
								<tr>
									<td><?= $datas->nama_pemateri ?></td>
									<td><?= $datas->no_hp ?></td>
									<?php if ($datas->bukti_honor == null ||  $datas->bukti_honor == '') { ?>
										<td> <span class="btn btn-danger btn-sm">Belum Transfer</span> </td>
									<?php } else { ?>
										<td> <span class="btn btn-success btn-sm">Sudah Transfer</span> </td>
									<?php } ?>
									<td>
										<a href="#modal-dialog-bukti_honor" class="btn btn-info btn-sm" id="view_bukti_honor" data-id="<?= $datas->pelatihan_pemateri_id ?>" data-nama_pemateri="<?= $datas->nama_pemateri ?>" data-bukti_honor="<?= $datas->bukti_honor ?>" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a>
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

<script>
	$(document).ready(function() {
		var i = 1;
		$('#add_berkas').click(function() {
			i++;
			$('#dynamic_field').append('<tr id="row' + i +
				'"><td style="width: 45%;"><select required  name="budget_id[]" id="select-' + i +'" class="form-control" style="width: 100%;"><option value="" style="color:black">-- Pilih --</option><?php foreach ($budget_list as $rows) { ?><option style="color: black;" value="<?php echo $rows->budget_id ?>"> <?php echo $rows->nama_budget ?></option><?php } ?></select></td><td><input required id="angka-' + i +'" step="any" type="number" name="budget[]" placeholder="" class="form-control " /></td><td><button type="button" name="remove" id="' +
				i + '" class="btn btn-danger btn_remove"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');
		});

		$(document).on('click', '.btn_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});
		$(document).on('click', '.btn_remove_data', function() {
			var bid = this.id;
			var trid = $(this).closest('tr').attr('id');
			$('#' + trid + '').remove();
		});

	});
</script>

<script type="text/javascript">
	$(document).on('click', '#view_bukti_honor', function() {
		var nama_lengkap = $(this).data('nama_pemateri');
		var id = $(this).data('id');
		var gambarbukti_honor = $(this).data('bukti_honor');
		if (gambarbukti_honor) {
			var source = "../../assets/img/bukti_honor/" + gambarbukti_honor;
		} else {
			var source = "../../assets/img/bukti_honor/default.png";
		}
		var photo = $(this).data('photo');
		$('#modal-dialog-bukti_honor #modal_nama_lengkap').text(nama_lengkap);
		$('#modal-dialog-bukti_honor #modal_pelatihan_pemateri_id').val(id);
		$('#modal-dialog-bukti_honor #modalGambarbukti_honor').attr("src", source);
	})
</script>
<script>
	$('select').live('change', function(){
		 var id = $(this).attr('id');
		 var result = id.replace("select-", "");
		 var value = this.value
		$.ajax({
			type: 'GET',
			data: {value:value},
			url: '<?php echo base_url(); ?>/pelatihan/getBudget',
			cache: false,
			success: function(data) {
				$("#angka-" + result).val(data);
			}
		});
	});

    
</script>
