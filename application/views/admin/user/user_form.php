<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="<?= base_url() ?>dashboard">Dashboard</a></li>
		<li class="active">User</li>
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
					<h4 class="panel-title">Data USER</h4>
				</div>
				<div class="panel-body">

					<form action="<?php echo $action; ?>" method="post">
						<thead>
							<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
								<tr>
									<td>Username <?php echo form_error('username') ?></td>
									<td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /></td>
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
								<input type="hidden" class="form-control" name="level_id_id" id="level_id_id" placeholder="level_id Id" value="1" /></td>

								<tr>
									<td>Level User <?php echo form_error('level_id') ?></td>
									<td><select name="level_id" class="form-control theSelect" value="<?= $level_id ?>">
											<option value="">-- Pilih --</option>
											<option value="1" <?php echo $level_id == '1' ? 'selected' : 'null' ?>>Admin Aplikasi</option>
											<option value="2" <?php echo $level_id == '2' ? 'selected' : 'null' ?>>Keuangan</option>
										</select>
									</td>
								</tr>

								<tr>
									<td></td>
									<td><input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
										<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('user') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
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