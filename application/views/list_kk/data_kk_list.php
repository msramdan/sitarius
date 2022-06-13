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
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">        
                                <div class="box-body">
                                    <div class='row'>
                                        <div class='col-md-9'>
                                            <div style="padding-bottom: 10px;">
        <?php echo anchor(site_url('list_kk/create'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
		<?php echo anchor(site_url('list_kk/excel'), '<i class="far fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm export_data"'); ?>
                </div>
            </div>
        </div>    
        <div class="box-body" style="overflow-x: scroll; ">
        <table id="data-table" class="table table-bordered table-hover table-td-valign-middle">
         <thead>
            <tr>
                <th>No</th>
		<th>Kepala Keluarga</th>
		<th>No Kk</th>
		<th>Alamat</th>
		<th>Rt</th>
		<th>Rw</th>
		<th>Kode Pos</th>
		<th>Desa Kelurahan</th>
		<th>Kecamatan</th>
		<th>Kabupaten Kota</th>
		<th>Provinsi</th>
		<th>Tgl Dikeluarkan</th>
		<th>Action</th>
            </tr></thead><tbody><?php $no = 1;
            foreach ($list_kk_data as $list_kk)
            {
                ?>
                <tr>
			<td><?= $no++?></td>
			<td><?php echo $list_kk->kepala_keluarga ?></td>
			<td><?php echo $list_kk->no_kk ?></td>
			<td><?php echo $list_kk->alamat ?></td>
			<td><?php echo $list_kk->rt ?></td>
			<td><?php echo $list_kk->rw ?></td>
			<td><?php echo $list_kk->kode_pos ?></td>
			<td><?php echo $list_kk->desa_kelurahan ?></td>
			<td><?php echo $list_kk->kecamatan ?></td>
			<td><?php echo $list_kk->kabupaten_kota ?></td>
			<td><?php echo $list_kk->provinsi ?></td>
			<td><?php echo $list_kk->tgl_dikeluarkan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('list_kk/read/'.encrypt_url($list_kk->kk_id)),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-success btn-sm read_data"'); 
				echo '  '; 
				echo anchor(site_url('list_kk/update/'.encrypt_url($list_kk->kk_id)),'<i class="fa fa-pencil" aria-hidden="true"></i>','class="btn btn-primary btn-sm update_data"'); 
				echo '  '; 
				echo anchor(site_url('list_kk/delete/'.encrypt_url($list_kk->kk_id)),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm delete_data" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
        </div>
        </div>