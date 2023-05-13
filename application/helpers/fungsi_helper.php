<?php
date_default_timezone_set('Asia/Jayapura');

function check_already_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if ($user_session) {
		redirect('dashboard');
	}
}

function rupiah($angka)
{

	$hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
	return $hasil_rupiah;
}

function is_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if (!$user_session) {
		redirect('auth');
	}
}

function check_admin()
{
	$ci = &get_instance();
	$ci->load->library('fungsi');
	if ($ci->fungsi->user_login()->level_id != 1) {
		// redirect('dashboard_user');
		$ci->session->set_flashdata('warning', 'Anda tidak memiliki akses');
		redirect('dashboard');
	}
}

function check_admin_state()
{
	$ci = &get_instance();
	$ci->load->library('fungsi');
	if ($ci->fungsi->user_login()->level_id != 1) {
		// redirect('dashboard_user');
		return 0;
	}
	return 1;
}

function getnamaanggotakk($kk_id, $personalid)
{
	$ci = &get_instance();
	$ci->load->model('Anggotakk_model');
	$anggotakk = $ci->Anggotakk_model->get_by_personalidandidkk($personalid, $kk_id);
	return $anggotakk->nama_lengkap;
}

function detectanggotakk($kk_id, $personalid)
{
	$ci = &get_instance();
	$ci->load->model('Anggotakk_model');
	$anggotakk = $ci->Anggotakk_model->get_by_personalidandidkk($personalid, $kk_id);
	if ($anggotakk) {
		return true;
	} else {
		return false;
	}
}


function getprovinsiAPI($id)
{
	$urlAPI = 'http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json';
	// get API from http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $urlAPI);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$output = curl_exec($ch);
	curl_close($ch);
	$data = json_decode($output, true);
	foreach ($data as $key => $value) {
		if ($value['id'] == $id) {
			return $value['name'];
		}
	}
}

function getkabupatenkotaAPI($regencies, $province)
{
	$urlAPI = 'http://www.emsifa.com/api-wilayah-indonesia/api/regencies/' . $province . '.json';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $urlAPI);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$output = curl_exec($ch);
	curl_close($ch);
	$data = json_decode($output, true);
	foreach ($data as $key => $value) {
		if ($value['id'] == $regencies) {
			return $value['name'];
		}
	}
}

function getkecamatanAPI($district, $regencies)
{
	$urlAPI = 'http://www.emsifa.com/api-wilayah-indonesia/api/districts/' . $regencies . '.json';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $urlAPI);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$output = curl_exec($ch);
	curl_close($ch);
	$data = json_decode($output, true);
	foreach ($data as $key => $value) {
		if ($value['id'] == $district) {
			return $value['name'];
		}
	}
}

function getkelurahanAPI($villages, $district)
{
	$urlAPI = 'http://www.emsifa.com/api-wilayah-indonesia/api/villages/' . $district . '.json';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $urlAPI);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$output = curl_exec($ch);
	curl_close($ch);
	$data = json_decode($output, true);
	foreach ($data as $key => $value) {
		if ($value['id'] == $villages) {
			return $value['name'];
		}
	}
}

function sendWa($noW, $type, $data = null)
{

	$ci = &get_instance();
	$ci->load->model('Setting_wa_model');

	$rowWaSetting = $ci->Setting_wa_model->findFirst();

	if ($rowWaSetting->is_notif_wa) {
		if ($type == 'add_peserta') {
			$message = 'Yth. Bapak/Ibu/Saudara/Saudari' . "\n\n";
			$message .= "Anda telah ditambahkan sebagai peserta pelatihan " . $data['nama_pelatihan'] . "\n\n";
			$message .= "Berikut detail informasinya :\n";
			$message .= "Nama Pelatihan : " . $data['nama_pelatihan'] . "\n";
			$message .= "Tanggal Mulai : " . $data['tanggal_mulai'] . "\n";
			$message .= "Tanggal Selesai : " . $data['tanggal_selesai'] . "\n";
			$message .= "Tempat Pelaksanaan : " . $data['tempat'] . "\n\n";
			$message .= "Berikut infomasi yang kami sampaikan, Terimakasih.";
		} else if ($type == 'add_pemateri') {
			$message = 'Yth. Bapak/Ibu/Saudara/Saudari' . "\n\n";
			$message .= "Anda telah ditambahkan sebagai pemateri pelatihan " . $data['nama_pelatihan'] . "\n\n";
			$message .= "Berikut detail informasinya :\n";
			$message .= "Nama Pelatihan : " . $data['nama_pelatihan'] . "\n";
			$message .= "Tanggal Mulai : " . $data['tanggal_mulai'] . "\n";
			$message .= "Tanggal Selesai : " . $data['tanggal_selesai'] . "\n";
			$message .= "Tempat Pelaksanaan : " . $data['tempat'] . "\n\n";
			$message .= "Berikut infomasi yang kami sampaikan, Terimakasih.";
		} else if ($type == 'uploadSertifikat') {
			$message = 'Yth. Bapak/Ibu/Saudara/Saudari' . "\n\n";
			$message .= "Sertifiat pelatihan " . $data['nama_pelatihan'] . " telah diupload oleh admin.\n";
			$message .= "Berikut infomasi yang kami sampaikan, Terimakasih.";
		} else if ($type == 'uploadTrf') {
			$message = 'Yth. Bapak/Ibu/Saudara/Saudari' . "\n\n";
			$message .= "Bukti transfer pelatihan " . $data['nama_pelatihan'] . " sudah di upload oleh admin.\n";
			$message .= "Berikut infomasi yang kami sampaikan, Terimakasih.";
		} else if ($type == 'uploadbukti_honor') {
			$message = 'Yth. Bapak/Ibu/Saudara/Saudari' . "\n\n";
			$message .= "Bukti honor pelatihan " . $data['nama_pelatihan'] . " sudah di upload oleh admin.\n";
			$message .= "Berikut infomasi yang kami sampaikan, Terimakasih.";
		}
		$data = array(
			'receiver'      => $noW,
			'message'         => [
				'text'      => $message,
			],
		);
		$data_string = json_encode($data);


		$curl = curl_init($rowWaSetting->url . '/chats/send?id=' . $rowWaSetting->session_id);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt(
			$curl,
			CURLOPT_HTTPHEADER,
			array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string)
			)
		);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data
		$result = curl_exec($curl);

		curl_close($curl);
	}
}
