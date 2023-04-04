<div id="content" class="content">
	<div class="row">
		<center>

			<script type="text/javascript">
				//fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
				function tampilkanwaktu() {
					//buat object date berdasarkan waktu saat ini
					var waktu = new Date();
					//ambil nilai jam, 
					//tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
					var sh = waktu.getHours() + "";
					//ambil nilai menit
					var sm = waktu.getMinutes() + "";
					//ambil nilai detik
					var ss = waktu.getSeconds() + "";
					//tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
					document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
				}
			</script>

			<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
				<center>
					<h1>
						<span id="clock"></span>
					</h1>
				</center>
				<?php
				$hari = date('l');
				/*$new = date('l, F d, Y', strtotime($Today));*/
				if ($hari == "Sunday") {
					echo "Minggu";
				} elseif ($hari == "Monday") {
					echo "Senin";
				} elseif ($hari == "Tuesday") {
					echo "Selasa";
				} elseif ($hari == "Wednesday") {
					echo "Rabu";
				} elseif ($hari == "Thursday") {
					echo ("Kamis");
				} elseif ($hari == "Friday") {
					echo "Jum'at";
				} elseif ($hari == "Saturday") {
					echo "Sabtu";
				}
				?>,
				<?php
				$tgl = date('d');
				echo $tgl;
				$bulan = date('F');
				if ($bulan == "January") {
					echo " Januari ";
				} elseif ($bulan == "February") {
					echo " Februari ";
				} elseif ($bulan == "March") {
					echo " Maret ";
				} elseif ($bulan == "April") {
					echo " April ";
				} elseif ($bulan == "May") {
					echo " Mei ";
				} elseif ($bulan == "June") {
					echo " Juni ";
				} elseif ($bulan == "July") {
					echo " Juli ";
				} elseif ($bulan == "August") {
					echo " Agustus ";
				} elseif ($bulan == "September") {
					echo " September ";
				} elseif ($bulan == "October") {
					echo " Oktober ";
				} elseif ($bulan == "November") {
					echo " November ";
				} elseif ($bulan == "December") {
					echo " Desember ";
				}
				$tahun = date('Y');
				echo $tahun;
				?>
		</center>
		<br>

		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-green">
				<div class="stats-icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
				<div class="stats-info">
					<h4>JUMLAH PELATIHAN</h4>
					<?php
					$pelatihan = $this->db->get('pelatihan')->num_rows();
					?>
					<p><?= $pelatihan ?> Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>pelatihan">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-blue">
				<div class="stats-icon"><i class="fa fa-users"></i></div>
				<div class="stats-info">
					<h4>JUMLAH PESERTA</h4>
					<?php
					$peserta = $this->db->get('peserta')->num_rows();
					?>
					<p><?= $peserta ?> Data</p>
				</div>
				<div class="stats-link">

					<?php if ($this->session->userdata('level_id') == 1) { ?>
						<a href="<?= base_url() ?>peserta">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } else { ?>
						<a href="#">Access For Admin <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } ?>

				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-purple">
				<div class="stats-icon"><i class="fa fa-building-o" aria-hidden="true"></i></div>
				<div class="stats-info">
					<h4>JUMLAH KANTOR WILAYAH</h4>
					<?php
					$kantor_wilayah = $this->db->get('kantor_wilayah')->num_rows();
					?>
					<p><?= $kantor_wilayah ?> Data</p>
				</div>
				<div class="stats-link">

					<?php if ($this->session->userdata('level_id') == 1) { ?>
						<a href="<?= base_url() ?>kantor_wilayah">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } else { ?>
						<a href="#">Access For Admin <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-red">
				<div class="stats-icon"><i class="fa fa-user"></i></div>
				<div class="stats-info">
					<h4>USER APLIKASI</h4>
					<?php
					$users = $this->db->get('user')->num_rows();
					?>
					<p><?= $users ?> Data</p>
				</div>
				<div class="stats-link">
					<?php if ($this->session->userdata('level_id') == 1) { ?>
						<a href="<?= base_url() ?>user">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } else { ?>
						<a href="#">Access For Admin <i class="fa fa-arrow-circle-o-right"></i></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<center>
			<img src="<?= base_url() ?>assets/img/banner2.png" alt="" style="width: 50%;">
		</center>

	</div>
	<!-- <div class="row">
		<div class="col-md-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="index-1">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Total Penduduk</h4>
				</div>
				<div class="panel-body">
					<div id="container"></div>
				</div>
			</div>
		</div>
		<div class="col-md-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="index-2">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Total Penduduk</h4>
				</div>
				<div class="panel-body">
					<div id="container2"></div>
				</div>
			</div>
		</div>
	</div> -->
</div>