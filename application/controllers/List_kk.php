<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class List_kk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('List_kk_model');
        $this->load->library('form_validation');
        $this->load->model('Pendidikan_model');
        $this->load->model('Pekerjaan_model');
    }

    public function index()
    {
        $list_kk = $this->List_kk_model->get_all();
        $data = array(
            'list_kk_data' => $list_kk,
        );
        $this->template->load('template', 'list_kk/data_kk_list', $data);
    }

    public function read($id)
    {
        $row = $this->List_kk_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
                'kk_id' => $row->kk_id,
                'kepala_keluarga' => $row->kepala_keluarga,
                'no_kk' => $row->no_kk,
                'alamat' => $row->alamat,
                'rt' => $row->rt,
                'rw' => $row->rw,
                'kode_pos' => $row->kode_pos,
                'desa_kelurahan' => $row->desa_kelurahan,
                'kecamatan' => $row->kecamatan,
                'kabupaten_kota' => $row->kabupaten_kota,
                'provinsi' => $row->provinsi,
                'tgl_dikeluarkan' => $row->tgl_dikeluarkan,
            );
            $this->template->load('template', 'list_kk/data_kk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('list_kk'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('list_kk/create_action'),
            'kk_id' => set_value('kk_id'),
            'kepala_keluarga' => set_value('kepala_keluarga'),
            'no_kk' => set_value('no_kk'),
            'alamat' => set_value('alamat'),
            'rt' => set_value('rt'),
            'rw' => set_value('rw'),
            'kode_pos' => set_value('kode_pos'),
            'desa_kelurahan' => set_value('desa_kelurahan'),
            'kecamatan' => set_value('kecamatan'),
            'kabupaten_kota' => set_value('kabupaten_kota'),
            'provinsi' => set_value('provinsi'),
            'tgl_dikeluarkan' => set_value('tgl_dikeluarkan'),
            'pendidikanlist' => $this->Pendidikan_model->get_all(),
            'pekerjaanlist' => $this->Pekerjaan_model->get_all(),
            'anggotakeluarga' => set_value('anggotakeluarga'),
        );
        $this->template->load('template', 'list_kk/data_kk_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kepala_keluarga' => $this->input->post('kepala_keluarga', TRUE),
                'no_kk' => $this->input->post('no_kk', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'rt' => $this->input->post('rt', TRUE),
                'rw' => $this->input->post('rw', TRUE),
                'kode_pos' => $this->input->post('kode_pos', TRUE),
                'desa_kelurahan' => $this->input->post('desa_kelurahan', TRUE),
                'kecamatan' => $this->input->post('kecamatan', TRUE),
                'kabupaten_kota' => $this->input->post('kabupaten_kota', TRUE),
                'provinsi' => $this->input->post('provinsi', TRUE),
                'tgl_dikeluarkan' => $this->input->post('tgl_dikeluarkan', TRUE),
            );

            $anggotakeluarga = $this->input->post('anggotakeluarga', TRUE);

            $anggotakeluarga = json_decode($anggotakeluarga, TRUE);

            echo '<pre>';
            print_r($data);
            print_r($anggotakeluarga);
            echo '</pre>';

            // $this->List_kk_model->insert($data);
            // $this->session->set_flashdata('message', 'Create Record Success');
            // redirect(site_url('list_kk'));
        }
    }

    public function update($id)
    {
        $row = $this->List_kk_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('list_kk/update_action'),
                'kk_id' => set_value('kk_id', $row->kk_id),
                'kepala_keluarga' => set_value('kepala_keluarga', $row->kepala_keluarga),
                'no_kk' => set_value('no_kk', $row->no_kk),
                'alamat' => set_value('alamat', $row->alamat),
                'rt' => set_value('rt', $row->rt),
                'rw' => set_value('rw', $row->rw),
                'kode_pos' => set_value('kode_pos', $row->kode_pos),
                'desa_kelurahan' => set_value('desa_kelurahan', $row->desa_kelurahan),
                'kecamatan' => set_value('kecamatan', $row->kecamatan),
                'kabupaten_kota' => set_value('kabupaten_kota', $row->kabupaten_kota),
                'provinsi' => set_value('provinsi', $row->provinsi),
                'tgl_dikeluarkan' => set_value('tgl_dikeluarkan', $row->tgl_dikeluarkan),
            );
            $this->template->load('template', 'list_kk/data_kk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('list_kk'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kk_id', TRUE));
        } else {
            $data = array(
                'kepala_keluarga' => $this->input->post('kepala_keluarga', TRUE),
                'no_kk' => $this->input->post('no_kk', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'rt' => $this->input->post('rt', TRUE),
                'rw' => $this->input->post('rw', TRUE),
                'kode_pos' => $this->input->post('kode_pos', TRUE),
                'desa_kelurahan' => $this->input->post('desa_kelurahan', TRUE),
                'kecamatan' => $this->input->post('kecamatan', TRUE),
                'kabupaten_kota' => $this->input->post('kabupaten_kota', TRUE),
                'provinsi' => $this->input->post('provinsi', TRUE),
                'tgl_dikeluarkan' => $this->input->post('tgl_dikeluarkan', TRUE),
            );

            $this->List_kk_model->update($this->input->post('kk_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('list_kk'));
        }
    }

    public function delete($id)
    {
        $row = $this->List_kk_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->List_kk_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('list_kk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('list_kk'));
        }
    }

    public function _rules()
    {
        // detect anggotakeluarga array > 0
        
        // set custom rules for anggotakeluarga if array > 0
        $this->form_validation->set_rules('anggotakeluarga', 'Anggota Keluarga', 'trim|required');

        $this->form_validation->set_rules('kepala_keluarga', 'kepala keluarga', 'trim|required');
        $this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('rt', 'rt', 'trim|required');
        $this->form_validation->set_rules('rw', 'rw', 'trim|required');
        $this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required');
        $this->form_validation->set_rules('desa_kelurahan', 'desa kelurahan', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('kabupaten_kota', 'kabupaten kota', 'trim|required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
        $this->form_validation->set_rules('tgl_dikeluarkan', 'tgl dikeluarkan', 'trim|required');

        $this->form_validation->set_rules('kk_id', 'kk_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data_kk.xls";
        $judul = "data_kk";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Kepala Keluarga");
        xlsWriteLabel($tablehead, $kolomhead++, "No Kk");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Rt");
        xlsWriteLabel($tablehead, $kolomhead++, "Rw");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode Pos");
        xlsWriteLabel($tablehead, $kolomhead++, "Desa Kelurahan");
        xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
        xlsWriteLabel($tablehead, $kolomhead++, "Kabupaten Kota");
        xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl Dikeluarkan");

        foreach ($this->List_kk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->kepala_keluarga);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_kk);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteLabel($tablebody, $kolombody++, $data->rt);
            xlsWriteLabel($tablebody, $kolombody++, $data->rw);
            xlsWriteNumber($tablebody, $kolombody++, $data->kode_pos);
            xlsWriteLabel($tablebody, $kolombody++, $data->desa_kelurahan);
            xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan);
            xlsWriteLabel($tablebody, $kolombody++, $data->kabupaten_kota);
            xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl_dikeluarkan);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file List_kk.php */
/* Location: ./application/controllers/List_kk.php */
/* Please DO NOT modify this information : */