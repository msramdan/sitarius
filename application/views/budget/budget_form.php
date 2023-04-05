<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Budget</li>
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
					<h4 class="panel-title">Data BUDGET</h4>
				</div>
				<div class="panel-body">

					<form action="<?php echo $action; ?>" method="post">
						<thead>
							<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
								<tr>
									<td>Budget Kategori<?php echo form_error('budget_kategori_id') ?></td>
									<td>
										<select name="budget_kategori_id" class="form-control theSelect">
											<option value="">-- Pilih -- </option>
											<?php foreach ($kategori as $key => $data) { ?>
												<?php if ($budget_kategori_id == $data->budget_kategori_id) { ?>
													<option value="<?php echo $data->budget_kategori_id ?>" selected><?php echo $data->nama_kategori ?> </option>
												<?php } else { ?>
													<option value="<?php echo $data->budget_kategori_id ?>"><?php echo $data->nama_kategori ?> </option>
												<?php } ?>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Nama Budget <?php echo form_error('nama_budget') ?></td>
									<td><input type="text" class="form-control" name="nama_budget" id="nama_budget" placeholder="Nama Budget" value="<?php echo $nama_budget; ?>" /></td>
								</tr>
								<tr>
									<td>Nominal Budget <?php echo form_error('nominal_budget') ?></td>
									<td><input type="text" class="form-control" name="nominal_budget" id="nominal_budget" placeholder="Nominal Budget" value="<?php echo $nominal_budget; ?>" /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="budget_id" value="<?php echo $budget_id; ?>" />
										<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('budget') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
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