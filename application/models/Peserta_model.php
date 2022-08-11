<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peserta_model extends CI_Model
{

    public $table = 'peserta';
    public $id = 'peserta_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
		$this->db->join('bank', 'bank.bank_id = peserta.bank_id', 'left');
		$this->db->join('pangkat', 'pangkat.pangkat_id = peserta.pangkat', 'left');
		$this->db->join('kantor_wilayah', 'kantor_wilayah.kantor_wilayah_id = peserta.kantor_wilayah', 'left');
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
    function total_rows($q = NULL) {
        $this->db->like('peserta_id', $q);
	$this->db->or_like('photo', $q);
	$this->db->or_like('nip', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('pangkat', $q);
	$this->db->or_like('jabatan', $q);
	$this->db->or_like('kantor_wilayah', $q);
	$this->db->or_like('upt', $q);
	$this->db->or_like('bank_id', $q);
	$this->db->or_like('norek', $q);
	$this->db->or_like('password', $q);
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

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
