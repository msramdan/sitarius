<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pelatihan_model extends CI_Model
{

	public $table = 'pelatihan';
	public $id = 'pelatihan_id';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all()
	{
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	// get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	// get total rows
	function total_rows($q = NULL)
	{
		$this->db->like('pelatihan_id', $q);
		$this->db->or_like('nama_pelatihan', $q);
		$this->db->or_like('angkatan', $q);
		$this->db->or_like('tanggal_mulai', $q);
		$this->db->or_like('tanggal_selesai', $q);
		$this->db->or_like('jumlah_peserta', $q);
		$this->db->or_like('metode', $q);
		$this->db->or_like('tempat', $q);
		$this->db->or_like('jumlah_jp', $q);
		$this->db->or_like('penanggung_jawab', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	// insert data
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	// update data
	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	// update data
	function updateSertifikat($id, $data)
	{
		$this->db->where('peserta_pelatihan_id', $id);
		$this->db->update('peserta_pelatihan', $data);
	}

	function updateBuktiTrf($id, $data)
	{
		$this->db->where('peserta_pelatihan_id', $id);
		$this->db->update('peserta_pelatihan', $data);
	}

	function updateBuktiHonor($id, $data)
	{
		$this->db->where('pelatihan_pemateri_id', $id);
		$this->db->update('pelatihan_pemateri', $data);
	}

	// delete data
	function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

	function deleteDaftarPeserta($id)
	{
		$this->db->where('peserta_pelatihan_id', $id);
		$this->db->delete('peserta_pelatihan');
	}

	function deleteDaftarPemateri($id)
	{
		$this->db->where('pelatihan_pemateri_id', $id);
		$this->db->delete('pelatihan_pemateri');
	}
}
