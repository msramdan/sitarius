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
        $this->load->model('Anggotakk_model');
        $this->load->library('form_validation');
        $this->load->model('Pendidikan_model');
        $this->load->model('Pekerjaan_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $list_kk = $this->List_kk_model->get_all();
        $data = array(
            'list_kk_data' => $list_kk,
        );
        $this->template->load('template_admin', 'admin/list_kk/data_kk_list', $data);
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
        $this->template->load('template_admin', 'admin/list_kk/data_kk_form', $data);
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

            $this->List_kk_model->insert($data);

            $id_kk = $this->db->insert_id();

            foreach ($anggotakeluarga as $key => $value) {
                $data_anggota = array(
                    'personal_id' => $value['id_data_anggota'],
                    'kk_id' => $id_kk,
                    'nik' => $value['no_ktp_anggota_kk'],
                    'nama_lengkap' => $value['nama_anggota_kk'],
                    'jenis_kelamin' => $value['jeniskelamin_anggota_kk'],
                    'tempat_lahir' => $value['tempatlahir_anggota_kk'],
                    'tgl_lahir' => $value['tanggallahir_anggota_kk'],
                    'agama' => $value['agama_anggota_kk'],
                    'pendidikan_id' => $value['pendidikan_anggota_kk'],
                    'pekerjaan_id' => $value['pekerjaan_anggota_kk'],
                    'golongan_darah' => $value['golongandarah_anggota_kk'],
                    'hubungan_keluarga' => $value['hubungankeluarga_anggota_kk'],
                );

                $this->Anggotakk_model->insert($data_anggota);
                $anggotakkid = $this->db->insert_id();

                // get 4 last string of nik
                $last4id = substr($value['no_ktp_anggota_kk'], -4);
                $password = sha1(rand(100000, 999999));

                $akun = array(  
                    'username' => 'user'.$last4id.$id_kk,
                    'password' => $password,
                    'level_id' => 2,
                    'anggota_kk_id' => sha1($anggotakkid),
                );
                $this->User_model->insert($akun);
            }

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('list_kk'));
        }
    }

    public function update($id)
    {
        $row = $this->List_kk_model->get_by_id(decrypt_url($id));

        if ($row) {

            $dataanggotakk = $this->Anggotakk_model->get_by_kk_id($row->kk_id);

            $tempdataanggotakk = array();

            foreach ($dataanggotakk as $key => $value) {

                $tempdataanggotakk[$key]['id_data_anggota'] = $value['personal_id'];
                $tempdataanggotakk[$key]['no_ktp_anggota_kk'] = $value['nik'];
                $tempdataanggotakk[$key]['nama_anggota_kk'] = $value['nama_lengkap'];
                $tempdataanggotakk[$key]['jeniskelamin_anggota_kk'] = $value['jenis_kelamin'];
                $tempdataanggotakk[$key]['tempatlahir_anggota_kk'] = $value['tempat_lahir'];
                $tempdataanggotakk[$key]['tanggallahir_anggota_kk'] = $value['tgl_lahir'];
                $tempdataanggotakk[$key]['agama_anggota_kk'] = $value['agama'];
                $tempdataanggotakk[$key]['pendidikan_anggota_kk'] = $value['pendidikan_id'];
                $tempdataanggotakk[$key]['pekerjaan_anggota_kk'] = $value['pekerjaan_id'];
                $tempdataanggotakk[$key]['golongandarah_anggota_kk'] = $value['golongan_darah'];
                $tempdataanggotakk[$key]['hubungankeluarga_anggota_kk'] = $value['hubungan_keluarga'];
                
            }

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
                'anggotakeluarga' => json_encode($tempdataanggotakk),
                'pendidikanlist' => $this->Pendidikan_model->get_all(),
                'pekerjaanlist' => $this->Pekerjaan_model->get_all(),
            );
            // print_r($data);
            $this->template->load('template_admin', 'admin/list_kk/data_kk_form', $data);
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

            $kk_id = $this->input->post('kk_id', TRUE);
            $no_kk = $this->input->post('no_kk', TRUE);

            $data = array(
                'kepala_keluarga' => $this->input->post('kepala_keluarga', TRUE),
                'no_kk' => $no_kk,
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
            // echo '<pre>';
            $anggotakeluarga = json_decode($anggotakeluarga, TRUE);

            $personal_id_available = [];

            foreach ($anggotakeluarga as $key => $value) {

                
                $personal_id = $value['id_data_anggota'];
                
                // push personal_id to array as element without key
                $personal_id_available[] = $personal_id;


                $cek = detectanggotakk($kk_id, $personal_id);

                if($cek == true) {

                    $data_anggota = array(
                        'personal_id' => $personal_id,
                        'nik' => $value['no_ktp_anggota_kk'],
                        'nama_lengkap' => $value['nama_anggota_kk'],
                        'jenis_kelamin' => $value['jeniskelamin_anggota_kk'],
                        'tempat_lahir' => $value['tempatlahir_anggota_kk'],
                        'tgl_lahir' => $value['tanggallahir_anggota_kk'],
                        'agama' => $value['agama_anggota_kk'],
                        'pendidikan_id' => $value['pendidikan_anggota_kk'],
                        'pekerjaan_id' => $value['pekerjaan_anggota_kk'],
                        'golongan_darah' => $value['golongandarah_anggota_kk'],
                        'hubungan_keluarga' => $value['hubungankeluarga_anggota_kk'],
                    );
                    $this->Anggotakk_model->update_by_personalidandkkid($kk_id, $personal_id, $data_anggota);
                }
                
                if($cek == false){
                    
                    $data_anggota = array(
                        'personal_id' => $personal_id,
                        'kk_id' => $kk_id,
                        'nik' => $value['no_ktp_anggota_kk'],
                        'nama_lengkap' => $value['nama_anggota_kk'],
                        'jenis_kelamin' => $value['jeniskelamin_anggota_kk'],
                        'tempat_lahir' => $value['tempatlahir_anggota_kk'],
                        'tgl_lahir' => $value['tanggallahir_anggota_kk'],
                        'agama' => $value['agama_anggota_kk'],
                        'pendidikan_id' => $value['pendidikan_anggota_kk'],
                        'pekerjaan_id' => $value['pekerjaan_anggota_kk'],
                        'golongan_darah' => $value['golongandarah_anggota_kk'],
                        'hubungan_keluarga' => $value['hubungankeluarga_anggota_kk'],
                    );
                    $this->Anggotakk_model->insert($data_anggota);

                    $anggotakkid = $this->db->insert_id();

                    // get 4 last string of nik
                    $last4id = substr($value['no_ktp_anggota_kk'], -4);
                    $password = sha1(rand(100000, 999999));

                    $akun = array(  
                        'username' => 'user'.$last4id.$kk_id,
                        'password' => $password,
                        'level_id' => 2,
                        'anggota_kk_id' => sha1($anggotakkid),
                    );
                    $this->User_model->insert($akun);
                }

                // print_r($data_anggota);
            }
            

            $cekpersonalidisnotinpersonalidavailable = $this->Anggotakk_model->detectanggotakknotin($kk_id, $personal_id_available);

            if($cekpersonalidisnotinpersonalidavailable == true){

                foreach ($cekpersonalidisnotinpersonalidavailable as $key => $value) {
                    $this->User_model->deleteAkunanggotakk($value['anggota_kk_id']);
                    $this->Anggotakk_model->delete($value['anggota_kk_id']);
                }

            }

            // print_r($data);

            // echo '</pre>';

            $this->List_kk_model->update($kk_id, $data);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('list_kk'));
        }
    }

    public function delete($id)
    {
        $row = $this->List_kk_model->get_by_id(decrypt_url($id));

        if ($row) {

            // get each anggota_kk
            $anggotakk = $this->Anggotakk_model->get_by_kk_id(decrypt_url($id));

            foreach ($anggotakk as $key => $value) {
                $this->User_model->deleteAkunanggotakk($value['anggota_kk_id']);
            }

            $this->Anggotakk_model->delete_by_kkid(decrypt_url($id));
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