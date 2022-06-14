<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggotakk_model extends CI_Model
{

    public $table = 'anggota_kk';
    public $id = 'anggota_kk_id';
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

    function insertbatch($data)
    {
        $this->db->insert_batch($this->table, $data);
    }

    function get_by_kk_id($kk_id)
    {
        $this->db->where('kk_id', $kk_id);
        return $this->db->get($this->table)->result_array();
    }

    function update_by_personalidandkkid($kk_id, $personalid, $data)
    {
        $this->db->where('personal_id', $personalid);
        $this->db->where('kk_id', $kk_id);
        $this->db->update($this->table, $data);
    }

    function get_by_personalidandnokk($personalid, $no_kk)
    {
        $this->db->where('personal_id', $personalid);
        $this->db->where('kk_id', $no_kk);
        return $this->db->get($this->table)->row();
    }

    function delete_by_kkid($kk_id)
    {
        $this->db->where('kk_id', $kk_id);
        $this->db->delete($this->table);
    }

}