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
		redirect('dashboard_user');
	}
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
	$urlAPI = 'http://www.emsifa.com/api-wilayah-indonesia/api/regencies/'.$province.'.json';
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
	$urlAPI = 'http://www.emsifa.com/api-wilayah-indonesia/api/districts/'.$regencies.'.json';
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
	$urlAPI = 'http://www.emsifa.com/api-wilayah-indonesia/api/villages/'.$district.'.json';
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
