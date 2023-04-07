<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="<?= base_url() ?>dashboard">Dashboard</a></li>
		<li class="active">Restre Database</li>
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
					<h4 class="panel-title">Restre Database</h4>
				</div>
				<div class="panel-body">

					<form action="<?php echo base_url(); ?>backup/store_restore" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="formGroupExampleInput">File Database</label>
							<input type="file" class="form-control" name="datafile" id="datafile" placeholder="" value="" required />
						</div>

						<button class="btn btn-primary btn-raised " type="button
						">Restore Database</button>
					</form>
				</div>

			</div>

		</div>
	</div>
</div>