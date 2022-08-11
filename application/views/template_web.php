<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- Mirrored from html.kodesolution.live/j/learnpro/v4.0/demo/index-sp-layout5.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Mar 2021 06:49:27 GMT -->

<head>

	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Learnpro - Education University School Kindergarten Learning HTML Template" />
	<meta name="keywords" content="education,school,university,educational,learn,learning,teaching,workshop" />
	<meta name="author" content="ThemeMascot" />

	<!-- Page Title -->
	<title><?= $bimbel->nama_bimbel ?></title>

	<!-- Favicon and Touch Icons -->
	<link href="<?= base_url() ?>assets/front/img/baner.png" rel="shortcut icon" type="image/png">
	<link href="<?= base_url() ?>assets/front/images/apple-touch-icon.png" rel="apple-touch-icon">
	<link href="<?= base_url() ?>assets/front/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
	<link href="<?= base_url() ?>assets/front/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
	<link href="<?= base_url() ?>assets/front/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
	<link href="<?= base_url() ?>assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/front/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/front/css/animate.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/front/css/css-plugin-collections.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/front/css/menuzord-megamenu.css" rel="stylesheet" />
	<link id="menuzord-menu-skins" href="<?= base_url() ?>assets/front/css/menuzord-skins/menuzord-boxed.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/front/css/style-main.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/front/css/preloader.css" rel="stylesheet" type="text/css">
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
	<script src="<?= base_url() ?>assets/front/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
</head>

<body class="">
	<div id="wrapper" class="clearfix">
		<!-- Header -->
		<header id="header" class="header header-floating header-floating-text-dark">
			<div class="header-nav navbar-sticky navbar-sticky-animated">
				<div class="header-nav-wrapper">
					<div class="container">
						<nav id="menuzord-right" class="menuzord default no-bg">
							<a class="menuzord-brand switchable-logo pull-left flip mb-15" href="">
								<img class="logo-default" src="<?= base_url() ?>assets/front/img/logo.png" alt="">
								<img class="logo-scrolled-to-fixed" src="<?= base_url() ?>assets/front/img/logo.png" alt="">
							</a>
							<ul class="menuzord-menu onepage-nav">
								<li class="active"><a href="#home">Home</a></li>
								<li><a href="#courses">Register</a></li>
								<li><a href="#courses">Login</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>

		<!-- Start main-content -->
		<div class="main-content">
			<!-- Section: home -->
			<section id="home" class="divider parallax layer-overlay overlay-theme-colored-6" data-stellar-background-ratio="0.3" data-bg-img="<?= base_url() ?>assets/front/img/3.jpg">
				<div class="display-table">
					<div class="display-table-cell">
						<div class="container pt-200 pb-200">
							<div class="row">
								<div class="col-md-12 text-center">
									<div class="pt-90 pb-30">
										<img style="opacity: 0.6; width:30%" src="<?= base_url() ?>assets/front/img/baner.png" alt="">
										<p class="text-white font-20 mt-15 mb-0">Profesional, Akuntabel, Sinergi Transparan dan Inovatif</p>
										<h1 class="text-white text-uppercase font-44 font-weight-800 mt-0 mb-0">Badiklat <span class="text-theme-colored2">Kumham Sulut </span>Learning Center</h1>


										<script type="text/javascript">
											$('#mailchimp-subscription-form-footer').ajaxChimp({
												callback: mailChimpCallBack,
												url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;amp;amp;id=49d6d30e1e'
											});

											function mailChimpCallBack(resp) {
												// Hide any previous response text
												var $mailchimpform = $('#mailchimp-subscription-form-footer'),
													$response = '';
												$mailchimpform.children(".alert").remove();
												if (resp.result === 'success') {
													$response = '&amp;lt;div class="alert alert-success"&amp;gt;&amp;lt;button type="button" class="close" data-dismiss="alert" aria-label="Close"&amp;gt;&amp;lt;span aria-hidden="true"&amp;gt;&amp;amp;times;&amp;lt;/span&amp;gt;&amp;lt;/button&amp;gt;' + resp.msg + '&amp;lt;/div&amp;gt;';
												} else if (resp.result === 'error') {
													$response = '&amp;lt;div class="alert alert-danger"&amp;gt;&amp;lt;button type="button" class="close" data-dismiss="alert" aria-label="Close"&amp;gt;&amp;lt;span aria-hidden="true"&amp;gt;&amp;amp;times;&amp;lt;/span&amp;gt;&amp;lt;/button&amp;gt;' + resp.msg + '&amp;lt;/div&amp;gt;';
												}
												$mailchimpform.prepend($response);
											}
										</script>
										<!-- Mailchimp Subscription Form Ends Here -->
										<!--                <a class="btn btn-transparent btn-default btn-circled btn-lg mt-15 mr-15 pr-40 pl-40" href="#">Start a Free Trail Now</a> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="about">
				<div class="container">
					<div class="section-content">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="single-course-thumb mb-sm-30">
											<img class="border-radius-8px img-fullwidth" src="<?= base_url() ?>assets/front/img/4.jpg" alt="" style="height: 170px;">
											<div class="overlay-shade"></div>
											<div class="course-info">
												<a href="#">
													<h5 class="text-white font-16 font-weight-600 mb-5">Gambar1</h5>
												</a>
												<p>Gambar1</p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="single-course-thumb">
											<img class="border-radius-8px img-fullwidth" src="<?= base_url() ?>assets/front/img/2.jpg" alt="" style="height: 170px;">
											<div class="overlay-shade"></div>
											<div class="course-info">
												<a href="#">
													<h5 class="text-white font-16 font-weight-600 mb-5">Gambar 2</h5>
												</a>
												<p>Gambar 2</p>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-20">
									<div class="col-md-6">
										<div class="single-course-thumb mb-sm-30">
											<img class="border-radius-8px img-fullwidth" src="<?= base_url() ?>assets/front/img/5.jpg" alt="" style="height: 170px;">
											<div class="overlay-shade"></div>
											<div class="course-info">
												<a href="#">
													<h5 class="text-white font-16 font-weight-600 mb-5">Gambar 3</h5>
												</a>
												<p>Gambar 3</p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="single-course-thumb">
											<img class="border-radius-8px img-fullwidth" src="<?= base_url() ?>assets/front/img/6.jpg" alt="" style="height: 170px;">
											<div class="overlay-shade"></div>
											<div class="course-info">
												<a href="#">
													<h5 class="text-white font-16 font-weight-600 mb-5">Gambar 4</h5>
												</a>
												<p>Gambar 4</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="single-course-thumb mt-sm-30">
									<img class="border-radius-8px img-fullwidth" src="<?= base_url() ?>assets/front/img/1.jpg" alt="" style="height: 360px;">
									<div class="overlay-shade"></div>
									<div class="course-info">
										<a href="#">
											<h5 class="text-white font-16 font-weight-600 mb-5">Gambar 5</h5>
										</a>
										<p>Gambar 5</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Divider: Why Choose Us -->
			<section class="parallax layer-overlay overlay-theme-colored-9" data-bg-img="" data-parallax-ratio="0.4">
				<div class="container pt-30 pb-0">
					<div class="row">
						<div class="col-md-5">
							<img src="<?= base_url() ?>assets/front/img/logos.png" alt="" style="width: 90%;">
						</div>
						<div class="col-md-7 pt-20">
							<div class="row mtli-row-clearfix">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<h3 class="text-white">" Masyarakat Memperoleh Kepastian Hukum "</h3>
									<div class="double-line-bottom-theme-colored-2 mb-30"></div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="icon-box left media p-0 mb-40">
										<a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-check text-theme-colored2 font-weight-600"></i></a>
										<div class="media-body">
											<h5 class="media-heading text-white heading mb-10">Mewujudkan peraturan perundang-undangan yang berkualitas</h5>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="icon-box left media p-0 mb-40">
										<a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-check text-theme-colored2 font-weight-600"></i></a>
										<div class="media-body">
											<h4 class="media-heading text-white heading mb-10">Mewujudkan pelayanan hukum yang berkualitas</h4>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="icon-box left media p-0 mb-40">
										<a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-check text-theme-colored2 font-weight-600"></i></a>
										<div class="media-body">
											<h5 class="media-heading text-white heading mb-10">Mewujudkan penegakan hukum yang berkualitas</h4>

										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="icon-box left media p-0 mb-40">
										<a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-check text-theme-colored2 font-weight-600"></i></a>
										<div class="media-body">
											<h5 class="media-heading text-white heading mb-10">Mewujudkan penghormatan, pemenuhan, dan perlindungan HAM</h5>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="icon-box left media p-0 mb-40">
										<a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-check text-theme-colored2 font-weight-600"></i></a>
										<div class="media-body">
											<h5 class="media-heading text-white heading mb-10">Mewujudkan layanan manajemen administrasi Kementerian Hukum dan HAM</h5>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="icon-box left media p-0 mb-40">
										<a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-check text-theme-colored2 font-weight-600"></i></a>
										<div class="media-body">
											<h5 class="media-heading text-white heading mb-10">Mewujudkan aparatur Kementerian Hukum dan HAM yang profesional dan berintegritas</h5>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


			
		</div>
		<!-- Footer -->
		<footer id="footer" class="footer" data-bg-color="#212331" style="background: rgb(33, 35, 49) !important;">
			<div class="container pt-70 pb-40">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="widget dark">
							<img class="mt-5 mb-20" alt="" src="<?= base_url() ?>assets/front/img/logo-badiklat-sulut-white.png">
							<p>Jl. Diponegoro No. 87, Mahakeret Timur, Kec. Wenang, Kota Manado, 95112</p>
							<ul class="list-inline mt-5">
								<li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a class="text-gray" href="#">(0431) 870359</a> </li>
								<li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored2 mr-5"></i> <a class="text-gray" href="#">kanwilsulut@kemenkumham.go.id</a> </li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="widget dark">
							<h4 class="widget-title line-bottom-theme-colored-2">Link Terkait</h4>
							<ul class="angle-double-right list-border">
								<li><a href="#home">Home</a></li>
								<li><a href="#about">Register</a></li>
								<li><a href="#courses">Login</a></li>

							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="widget dark">
							<h4 class="widget-title line-bottom-theme-colored-2">Pelatihan</h4>
							<div class="latest-posts">
								<article class="post media-post clearfix pb-0 mb-10">
									<div class="post-right">
										<h5 class="post-title mt-0 mb-5"><a href="#">Jadwal Pendaftaran dan Tahapan Seleksi Anggota Polri 2021-2022</a></h5>
										<p class="post-date mb-0 font-12">2021-03-18</p>
										<p class="post-date mb-0 font-12">By Muhammad Saeful Ramdan</p>
									</div>
								</article>

								<article class="post media-post clearfix pb-0 mb-10">
									<div class="post-right">
										<h5 class="post-title mt-0 mb-5"><a href="#">Siap-siap Penerimaan Polri 2021: dari Tamtama, Bintara hingga Akpol</a></h5>
										<p class="post-date mb-0 font-12">2021-03-17</p>
										<p class="post-date mb-0 font-12">By Muhammad Saeful Ramdan</p>
									</div>
								</article>

							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-3">
						<div class="widget dark">
							<h4 class="widget-title line-bottom-theme-colored-2">Sosial Media</h4>
							<div class="opening-hours">
								<ul class="styled-icons icon-sm icon-bordered icon-circled clearfix mt-10">
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-youtube"></i></a></li>
									<li><a href=""><i class="fa fa-instagram"></i></a></li>
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
	<script type="text/javascript" src="<?= base_url() ?>assets/front/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/front/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/front/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/front/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/front/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/front/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/front/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/front/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/front/js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

</body>

</html>
