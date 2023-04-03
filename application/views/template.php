<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<title>Aplikasi Sitarsius | Balai Diklat Kementerian Hukum & HAM Sulawesi Utara</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="<?= base_url() ?>assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/css/style.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?= base_url() ?>assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->

	<script src="<?= base_url() ?>assets/plugins/pace/pace.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
	<!-- #modal-dialog -->
	<div class="modal fade" id="modal-dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Update Password</h4>
				</div>
				<form action="<?= base_url() ?>user/ganti_password/<?= $this->fungsi->user_login()->user_id  ?>" method="post" class="form">
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label>
							<input id="password" class="form-control" name="password" type="password" pattern="^\S{5,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.passcon.pattern = this.value;" required value="<?= set_value('password') ?>">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Confirmasi Password</label>
							<input class="form-control" id="passcon" name="passcon" type="password" pattern="^\S{5,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" required value="<?= set_value('passcon') ?>">
						</div>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
						<button type="submit" class="btn btn-sm btn-success">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- begin #page-loader -->
	<!-- <div id="page-loader" class="fade in"><span class="spinner"></span></div> -->
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<!-- <a href="<?= base_url() ?>dashboard" class="navbar-brand"><span class="navbar-logo"></span> SITARSIUS</a> -->
					<img src="<?= base_url() ?>assets/img/logo.png" alt="" style="width: 70%;padding:5px">
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>


				</div>
				<!-- end mobile sidebar expand / collapse button -->

				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?= base_url() ?>assets/img/user/admin.png" alt="" />
							<span class="hidden-xs"><?= ucfirst($this->fungsi->user_login()->username) ?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="#modal-dialog" data-toggle="modal">Ganti Password</a></li>
							<li><a href="<?= base_url() ?>auth/logout">Log Out</a></li>
						</ul>
					</li>
				</ul>




				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->

		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="<?= base_url() ?>assets/img/user/admin.png" alt="" /></a>
						</div>
						<div class="info">
							<?= ucfirst($this->fungsi->user_login()->username) ?>
							<small></small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Main Menu</li>
					<li><a href="<?= base_url() ?>dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret pull-right"></b>
							<i class="fa fa-list"></i>
							<span>Master Data</span>
						</a>
						<ul class="sub-menu">
							<li><a href="<?= base_url() ?>pangkat">Data Pangkat</a></li>
							<li><a href="<?= base_url() ?>kantor_wilayah">Data Kantor Wilayah</a></li>
							<li><a href="<?= base_url() ?>bank">Data Bank</a></li>
						</ul>
					</li>
					<li><a href="<?= base_url() ?>peserta"><i class="fa fa-users"></i> <span>Daftar Pegawai</span></a></li>
					<li><a href="<?= base_url() ?>pelatihan"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Daftar Pelatihan</span></a></li>
					<?php if ($this->session->userdata('level_id') == 1) { ?>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret pull-right"></b>
								<i class="fa fa-cogs"></i>
								<span>Setting</span>
							</a>
							<ul class="sub-menu">
								<li><a href="<?= base_url() ?>user">Data User</a></li>
								<li><a href="<?= base_url() ?>history_login">History Login</a></li>
								<li><a href="<?= base_url() ?>backup">Backup Database</a></li>
							</ul>
						</li>

					<?php } ?>


					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
					<!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->

		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
		<?php if ($this->session->flashdata('message')) : ?>
		<?php endif; ?>

		<div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('error'); ?>"></div>
		<?php if ($this->session->flashdata('error')) : ?>
		<?php endif; ?>

		<!-- begin #content -->
		<?php echo $contents ?>
		<!-- end #content -->

		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>


	</div>
	<!-- end page container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url() ?>assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="<?= base_url(); ?>assets/js/dataflash.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= base_url() ?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?= base_url() ?>assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url() ?>assets/js/table-manage-default.demo.min.js"></script>
	<script src="<?= base_url() ?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script>
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();
		});
	</script>
</body>

</html>