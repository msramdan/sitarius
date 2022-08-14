<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="description" content="aplikasi daiklat" />
	<meta name="keywords" content="badiklat sulut" />
	<meta name="author" content="Muhamad Saeful ramdan - 083874731480" />
	<title>Aplikasi Sitarsius | Balai Diklat Kementerian Hukum & HAM Sulawesi Utara</title>
	<link href="<?= base_url() ?>assets/front/img/baner.png" rel="shortcut icon" type="image/png">
	<link href="<?= base_url() ?>assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/front/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/front/css/animate.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/front/css/css-plugin-collections.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/front/css/menuzord-megamenu.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/front/css/menuzord-skins/menuzord-boxed.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/front/css/style-main.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/front/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/front/css/responsive.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/front/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/front/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/front/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/front/css/colors/theme-skin-color-set1.css" rel="stylesheet" type="text/css">
	<script src="<?= base_url() ?>assets/front/js/jquery-2.2.4.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/jquery-ui.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/jquery-plugin-collection.js"></script>
</head>


<body class="">
	<div class="modal" id="myModal" style="margin-top: 150px;">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Login Akun</h4>

				</div>
				<form method="POST" action="<?= base_url() ?>web/login">
					<div class="modal-body">
						<div class="form-group">
							<label for="nip">NIP</label>
							<input type="text" name="nip" class="form-control" id="nip" aria-describedby="emailHelp" placeholder="NIP" required>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
						<button type="submit" name="login" class="btn btn-primary"> <i class="fa fa-arrow-right"></i> Login </button>
					</div>
				</form>

			</div>
		</div>
	</div>

	<div id="wrapper" class="clearfix">
		<!-- Header -->
		<header id="header" class="header header-floating header-floating-text-dark">
			<div class="header-nav navbar-sticky navbar-sticky-animated">
				<div class="header-nav-wrapper">
					<div class="container">
						<nav id="menuzord-right" class="menuzord default no-bg">
							<a class="menuzord-brand switchable-logo pull-left flip mb-15" href="<?= base_url() ?>">
								<img class="logo-default" src="<?= base_url() ?>assets/front/img/logo-badiklat-sulut-white.png" alt="">
								<img class="logo-scrolled-to-fixed" src="<?= base_url() ?>assets/front/img/logo.png" alt="">
							</a>

							<?php
							$peserta_id_web = $this->session->userdata('peserta_id_web');
							?>
							<ul class="menuzord-menu onepage-nav">
								<li class="active"><a href="<?= base_url() ?>">Home</a></li>
								<?php if ($peserta_id_web) { ?>
									<li><a href="<?= base_url() ?>web/profile">Profile</a></li>
									<li><a href="<?= base_url() ?>web/logout">Logout || <?= $this->session->userdata('user_web')  ?></a></li>
								<?php } else { ?>
									<li><a href="<?= base_url() ?>web/register">Register</a></li>
									<li><a data-toggle="modal" data-target="#myModal" href="#exampleModal">Login</a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>

		<!-- Start main-content -->
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
		<?php if ($this->session->flashdata('message')) : ?>
		<?php endif; ?>

		<div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('error'); ?>"></div>
		<?php if ($this->session->flashdata('error')) : ?>
		<?php endif; ?>


		<?php echo $contents ?>
		<!-- Footer -->
		<footer id="footer" class="footer" data-bg-color="#212331" style="background: rgb(33, 35, 49) !important;">
			<div class="container pt-70 pb-40">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="widget dark">
							<img class="mt-5 mb-20" alt="" src="<?= base_url() ?>assets/front/img/logo-badiklat-sulut-white.png">
							<p>Jl. H. Tumundo, Pinokalan, Kec. Ranowulu, Kota Bitung, Sulawesi Utara</p>
							<ul class="list-inline mt-5">
								<li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a class="text-gray" href="#">0852-4000-2163</a> </li>
								<li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored2 mr-5"></i> <a class="text-gray" href="#">info@sitarius.com</a> </li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="widget dark">
							<h4 class="widget-title line-bottom-theme-colored-2">Link Terkait</h4>
							<ul class="angle-double-right list-border">
								<li><a href="https://sulut.kemenkumham.go.id/" target="_blank">Website Kanwil Sulut</a></li>
								<li><a href="https://kemenkumham.go.id/" target="_blank">Website Kumenkumham RI</a></li>
								<li><a href="https://badiklat-sulut.kemenkumham.go.id/" target="_blank">Website Badiklat Sulut</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="widget dark">
							<h4 class="widget-title line-bottom-theme-colored-2">Pelatihan</h4>
							<div class="latest-posts">
								<?php $query = $this->db->query("SELECT * from pelatihan  order by pelatihan_id desc limit 2")->result() ?>

								<?php foreach ($query as $value) { ?>
									<article class="post media-post clearfix pb-0 mb-10">
										<div class="post-right">
											<h5 class="post-title mt-0 mb-5"><a href="#"><?= $value->nama_pelatihan ?></a></h5>
											<p class="post-date mb-0 font-12">Tanggal : <?= $value->tanggal_mulai ?> s.d <?= $value->tanggal_selesai ?> </p>
											<p class="post-date mb-0 font-12">Lokasi : <?= $value->tempat ?> </p>
										</div>
									</article>
								<?php } ?>


							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-3">
						<div class="widget dark">
							<h4 class="widget-title line-bottom-theme-colored-2">Sosial Media</h4>
							<div class="opening-hours">
								<ul class="styled-icons icon-sm icon-bordered icon-circled clearfix mt-10">
									<li><a href="https://www.facebook.com/KemenkumhamRIofficial" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://www.youtube.com/c/KemenkumhamRI" target="_blank"><i class="fa fa-youtube"></i></a></li>
									<li><a href="https://www.instagram.com/kemenkumhamri/" target="_blank"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
	</div>
	<script src="<?= base_url() ?>assets/front/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="<?= base_url(); ?>assets/js/dataflash.js"></script>

</body>

</html>
