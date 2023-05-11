<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_wa_model extends CI_Model
{

    public $table = 'setting_wa';
    public $id = 'setting_wa_id';

    function __construct()
    {
        parent::__construct();
    }

    public function findFirst()
    {
        return $this->db->get($this->table)->row();
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
}
