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
				<h4 class="panel-title">Data Data_kk</h4>
			</div>
			<div class="panel-body">
<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
	    <tr><td>Kepala Keluarga</td><td><?php echo $kepala_keluarga; ?></td></tr>
	    <tr><td>No Kk</td><td><?php echo $no_kk; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Rt</td><td><?php echo $rt; ?></td></tr>
	    <tr><td>Rw</td><td><?php echo $rw; ?></td></tr>
	    <tr><td>Kode Pos</td><td><?php echo $kode_pos; ?></td></tr>
	    <tr><td>Desa Kelurahan</td><td><?php echo $desa_kelurahan; ?></td></tr>
	    <tr><td>Kecamatan</td><td><?php echo $kecamatan; ?></td></tr>
	    <tr><td>Kabupaten Kota</td><td><?php echo $kabupaten_kota; ?></td></tr>
	    <tr><td>Provinsi</td><td><?php echo $provinsi; ?></td></tr>
	    <tr><td>Tgl Dikeluarkan</td><td><?php echo $tgl_dikeluarkan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('list_kk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
			</div>
        </div>
    </div>
	</div>
</div>