<!DOCTYPE html>
<html lang="en">
<title>Pelatihan <?= $row->nama_pelatihan ?></title>

<head>
	<meta charset="utf-8">
	<style type="text/css">
		p {
			margin: 5px 0 0 0;
		}

		p.footer {
			text-align: right;
			font-size: 12px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
			display: block;
		}

		.bold {
			font-weight: bold;
		}

		#footer {
			clear: both;
			position: relative;
			height: 40px;
			margin-top: -40px;
		}
	</style>
</head>

<body style="font-size: 12px; margin-left:20px; margin-right:20px;">

	<table width="100%">
		<tr>
			<td width="50%"><img src="<?= base_url() ?>assets/img/logo.png" style="width: 170px;"></td>
			<td align="right" valign="top"> <span style="font-size: 12px"><?= date('Y-M-d') ?></span></td>
		</tr>
	</table>

	<p align="center">
		<span style="font-size: 18px"><b>BERITA ACARA <br> Pelatihan <?= $row->nama_pelatihan ?></b></span> <br>
	</p>

	<hr>
	<div style="width: 100%;">
		<table style="line-height: 20px;width:50%; float:left">
			<tr>
				<th align="left"> Nama Pelatihan </th>
				<td> : <?= $row->nama_pelatihan ?></td>
			</tr>
			<tr>
				<th align="left"> Angkatan </th>
				<td> : <?= $row->angkatan ?></td>
			</tr>
			<tr>
				<th align="left"> Tanggal Mulai </th>
				<td> : <?= $row->tanggal_mulai ?></td>
			</tr>
			<tr>
				<th align="left"> Tanggal Selesai </th>
				<td> : <?= $row->tanggal_selesai ?></td>
			</tr>
			<tr>
				<th align="left"> Jumlah Peserta </th>
				<td> : <?= $row->jumlah_peserta ?></td>
			</tr>
			<!-- <tr>
			<th align="left"> Jenis Pelatihan </th>
			<td> : <?= $row->metode ?></td>
		</tr>
		<tr>
			<th align="left"> Tempat </th>
			<td> : <?= $row->tempat ?></td>
		</tr>
		<tr>
			<th align="left"> Jumlah Jp </th>
			<td> : <?= $row->jumlah_jp ?></td>
		</tr>
		<tr>
			<th align="left"> Penanggung Jawab </th>
			<td> : <?= $row->penanggung_jawab ?></td>
		</tr> -->
		</table>

		<table style="line-height: 20px;width:50%; float :left">
			<!-- <tr>
			<th align="left"> Nama Pelatihan </th>
			<td> : <?= $row->nama_pelatihan ?></td>
		</tr>
		<tr>
			<th align="left"> Angkatan </th>
			<td> : <?= $row->angkatan ?></td>
		</tr>
		<tr>
			<th align="left"> Tanggal Mulai </th>
			<td> : <?= $row->tanggal_mulai ?></td>
		</tr>
		<tr>
			<th align="left"> Tanggal Selesai </th>
			<td> : <?= $row->tanggal_selesai ?></td>
		</tr>
		<tr>
			<th align="left"> Jumlah Peserta </th>
			<td> : <?= $row->jumlah_peserta ?></td>
		</tr> -->
			<tr>
				<th align="left"> Jenis Pelatihan </th>
				<td> : <?= $row->metode ?></td>
			</tr>
			<tr>
				<th align="left"> Tempat </th>
				<td> : <?= $row->tempat ?></td>
			</tr>
			<tr>
				<th align="left"> Jumlah Jp </th>
				<td> : <?= $row->jumlah_jp ?></td>
			</tr>
			<tr>
				<th align="left"> Penanggung Jawab </th>
				<td> : <?= $row->penanggung_jawab ?></td>
			</tr>
		</table>
	</div>

	<div style="margin-top:120px">
		<h4 style="width: 100%;">
			1. Daftar Budgeting :
		</h4>
		<table style="border: 1px solid black;border-collapse: collapse;font-size: 11px" width="100%">
			<tr style="margin: 5px">
				<th style="border: 1px solid black;width:5%">No</th>
				<th style="border: 1px solid black;width:35%">Nama Budget</th>
				<th style="border: 1px solid black;width:30%">Kategori</th>
				<th style="border: 1px solid black;width:30%">Nominal</th>

			</tr>
			<?php $z = 1;
			foreach ($list_budget as $key => $datas) { ?>
				<tr>
					<td style="border: 1px solid black;"> <?= $z++ ?></td>
					<td style="border: 1px solid black;"> <?= $datas->nama_budget ?></td>
					<td style="border: 1px solid black;"> <?= $datas->nama_kategori ?></td>
					<td style="border: 1px solid black;"> <?= rupiah($datas->budget)  ?></td>
				</tr>
			<?php } ?>
			<?php $budget = $this->db->query("SELECT SUM(budget) AS budget FROM pelatihan_budget where pelatihan_id='$id'")->row();
			$totalBudget = $budget->budget;
			?>

			<tr>
				<td colspan="3" style="border: 1px solid black;"> <b>Total</b></td>
				<td style="border: 1px solid black;"> <?= rupiah($totalBudget) ?></td>
			</tr>


		</table>

		<h4>
			2. Daftar Pemateri :
		</h4>
		<table style="border: 1px solid black;border-collapse: collapse;font-size: 11px;" width="100%">
			<tr>
				<th style="border: 1px solid black;width:5%">No</th>
				<th style="border: 1px solid black;width:55%">Nama Pemateri</th>
				<th style="border: 1px solid black;width:40%;">No Telpon</th>
			</tr>

			<?php $i = 1;
			foreach ($pemateri as $key => $datas) { ?>
				<tr>
					<td style="border: 1px solid black;"> <?= $i++ ?></td>
					<td style="border: 1px solid black;"> <?= $datas->nama_pemateri ?></td>
					<td style="border: 1px solid black;"> <?= $datas->no_hp ?></td>
				</tr>
			<?php } ?>



		</table>

		<h4>
			3. Daftar Peserta Pelatihan :
		</h4>
		<table style="border: 1px solid black;border-collapse: collapse;font-size: 11px" width="100%">
			<tr style="margin: 10px">
				<th style="border: 1px solid black;width:5%">No</th>
				<th style="border: 1px solid black;">NIP</th>
				<th style="border: 1px solid black;">Nama Peserta</th>
				<th style="border: 1px solid black;">Email</th>
				<th style="border: 1px solid black;">No Telpon</th>
			</tr>



			<?php $a = 1;
			foreach ($daftarPeserta as $key => $row) { ?>
				<tr>
					<td style="border: 1px solid black;"> <?= $a++ ?></td>
					<td style="border: 1px solid black;"> <?= $row->nip ?></td>
					<td style="border: 1px solid black;"> <?= $row->nama_lengkap ?></td>
					<td style="border: 1px solid black;"> <?= $row->email  ?></td>
					<td style="border: 1px solid black;"> <?= $row->no_hp ?></td>

				</tr>
			<?php } ?>


		</table>
	</div>



	<br>
	<p>
		Demikian Berita Acara inl dibuat dengan sebenar-benarnya, untuk diketahui dan digunakan dengan semestinya.
	</p>
</body>

</html>