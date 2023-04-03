<?php $nama_pelatihan = $this->db->query("SELECT nama_pelatihan,jumlah_peserta,metode from pelatihan where pelatihan_id='$pelatihan_id'")->row(); ?>

<div id="content" class="content">
	<div class="row">
		<div class="col-md-8 ui-sortable">
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
							<?php $budget = $this->db->query("SELECT * from pelatihan_budget where pelatihan_id='$pelatihan_id'")->result(); ?>
							<tbody>
								<?php foreach ($budget as $value) { ?>
									<tr id="detail_file<?= $value->pelatihan_budget_id ?>">
										<td><input required type="text" name="keterangan[]" placeholder="" class="form-control " value="<?= $value->keterangan ?>" /> </td>
										<td><input required step="any" type="number" name="budget[]" placeholder="" value="<?= $value->budget ?>" class="form-control " /></td>
										<?php if ($this->session->userdata('level_id') == 2) { ?>
											<td><button type=" button" name="" id="" class="btn btn-danger btn-sm btn_remove_data"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
										<?php } ?>

									</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php if ($this->session->userdata('level_id') == 2) { ?>
							<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Simpan</button>
						<?php } ?>

						<a href="<?php echo site_url('pelatihan') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Back</a>
					</form>
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
				'"><td><input required type="text" name="keterangan[]" placeholder="" class="form-control " /></td><td><input required step="any" type="number" name="budget[]" placeholder="" class="form-control " /></td><td><button type="button" name="remove" id="' +
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