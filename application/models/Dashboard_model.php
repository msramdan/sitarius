<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_pekerjaan()
    {
        $this->db->select('*');
        $this->db->from('pekerjaan');
        $this->db->order_by('pekerjaan_id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function countpendudukbypekerjaan($pekerjaan)
    {
        $this->db->where('pekerjaan_id', $pekerjaan);
        $this->db->from('anggota_kk');
        return $this->db->count_all_results();
    }

}