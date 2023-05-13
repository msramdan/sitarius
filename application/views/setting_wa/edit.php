<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Setting Wa Notifikasi</li>
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
					<h4 class="panel-title">Setting WA Notifikasi</h4>
				</div>
				<div class="panel-body">

					<form action="<?php echo $action; ?>" method="post">
						<thead>
							<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
								<tr>
									<td>URL</td>
									<td>
										<input type="text" readonly class="form-control" name="url" id="url" placeholder="URL" value="<?= set_value('url') ? set_value('url') : $url ?>" />

										<small class="text-danger">
											<?php echo form_error('url') ?>
										</small>
									</td>
								</tr>
								<tr>
									<td>Session ID</td>
									<td>
										<input type="text" class="form-control is-invalid" name="session_id" id="session_id" placeholder="Session ID" value="<?= set_value('session_id') ? set_value('session_id') : $session_id ?>" />

										<small class="text-danger">
											<?php echo form_error('session_id') ?>
										</small>
									</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>
										<select required name="is_notif_wa" class="form-control theSelect" value="<?= $metode ?>">
											<option value="">-- Pilih --</option>
											<option value="1" <?php if (set_value('is_notif_wa')) { ?> <?= set_value('is_notif_wa') == '1' ? 'selected' : 'null' ?> <?php } else { ?> <?= $is_notif_wa == '1' ? 'selected' : 'null' ?> <?php } ?>>Aktif</option>
											<option value="0" <?php if (set_value('is_notif_wa')) { ?> <?= set_value('is_notif_wa') == '0' ? 'selected' : 'null' ?> <?php } else { ?> <?= $is_notif_wa == '0' ? 'selected' : 'null' ?> <?php } ?>>Tidak Aktif</option>
										</select>

										<small class="text-danger">
											<?php echo form_error('is_notif_wa') ?>
										</small>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
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