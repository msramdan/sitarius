<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Pemateri</li>
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
					<h4 class="panel-title">Data PEMATERI</h4>
				</div>
				<div class="panel-body">

					<form action="<?php echo $action; ?>" method="post">
						<thead>
							<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
								<tr>
									<td>Nama Pemateri <?php echo form_error('nama_pemateri') ?></td>
									<td><input type="text" class="form-control" name="nama_pemateri" id="nama_pemateri" placeholder="Nama Pemateri" value="<?php echo $nama_pemateri; ?>" /></td>
								</tr>

								<tr>
									<td>No Hp <?php echo form_error('no_hp') ?></td>
									<td> <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Nama Pemateri" value="<?php echo $no_hp; ?>" /></td>
								</tr>
								<tr>
									<td>Pangkat/Golongan<?php echo form_error('pangkat_id') ?></td>
									<td>
										<select name="pangkat_id" class="form-control theSelect">
											<option value="">-- Pilih -- </option>
											<?php foreach ($data_pangkat as $key => $data) { ?>
												<?php if ($pangkat_id == $data->pangkat_id) { ?>
													<option value="<?php echo $data->pangkat_id ?>" selected>
														<?php echo $data->nama_pangkat ?> - <?php echo $data->golongan ?> -
														<?php echo $data->ruangan ?> </option>
												<?php } else { ?>
													<option value="<?php echo $data->pangkat_id ?>">
														<?php echo $data->nama_pangkat ?> - <?php echo $data->golongan ?> -
														<?php echo $data->ruangan ?> </option>
												<?php } ?>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="pemateri_id" value="<?php echo $pemateri_id; ?>" />
										<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i>
											<?php echo $button ?></button>
										<a href="<?php echo site_url('pemateri') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>

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