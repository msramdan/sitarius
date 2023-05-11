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
				<h4 class="panel-title">Data Budget</h4>
			</div>
			<div class="panel-body">
<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
	    <tr><td>Budget Kategori Id</td><td><?php echo $budget_kategori_id; ?></td></tr>
	    <tr><td>Nama Budget</td><td><?php echo $nama_budget; ?></td></tr>
	    <tr><td>Nominal Budget</td><td><?php echo $nominal_budget; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('budget') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
			</div>
        </div>
    </div>
	</div>
</div>