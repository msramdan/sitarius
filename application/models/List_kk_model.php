<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class List_kk_model extends CI_Model
{

    public $table = 'data_kk';
    public $id = 'kk_id';
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
    function total_rows($q = NULL) {
        $this->db->like('kk_id', $q);
	$this->db->or_like('kepala_keluarga', $q);
	$this->db->or_like('no_kk', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('rt', $q);
	$this->db->or_like('rw', $q);
	$this->db->or_like('kode_pos', $q);
	$this->db->or_like('desa_kelurahan', $q);
	$this->db->or_like('kecamatan', $q);
	$this->db->or_like('kabupaten_kota', $q);
	$this->db->or_like('provinsi', $q);
	$this->db->or_like('tgl_dikeluarkan', $q);
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