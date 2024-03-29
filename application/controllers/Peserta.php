<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Peserta extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Peserta_model');
		$this->load->model('Kantor_wilayah_model');
		$this->load->model('Pangkat_model');
		$this->load->model('Bank_model');
		$this->load->library('form_validation');
		$this->load->model('Pelatihan_model');
	}

	public function index()
	{
		$peserta = $this->Peserta_model->get_all();
		$data = array(
			'peserta_data' => $peserta,
		);
		$this->template->load('template', 'peserta/peserta_list', $data);
	}

	public function read($id)
	{
		$row = $this->Peserta_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'peserta_id' => $row->peserta_id,
				'photo' => $row->photo,
				'nip' => $row->nip,
				'nama_lengkap' => $row->nama_lengkap,
				'email' => $row->email,
				'no_hp' => $row->no_hp,
				'tempat_lahir' => $row->tempat_lahir,
				'tanggal_lahir' => $row->tanggal_lahir,
				'jenis_kelamin' => $row->jenis_kelamin,
				'pangkat' => $row->pangkat,
				'jabatan' => $row->jabatan,
				'kantor_wilayah' => $row->kantor_wilayah,
				'upt' => $row->upt,
				'bank_id' => $row->bank_id,
				'norek' => $row->norek,
				'password' => $row->password,
			);
			$this->template->load('template', 'peserta/peserta_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('peserta'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('peserta/create_action'),
			'peserta_id' => set_value('peserta_id'),
			'photo' => set_value('photo'),
			'nip' => set_value('nip'),
			'nip_lama' => set_value('nip'),
			'bank' => $this->Bank_model->get_all(),
			'kantor_wilayah_data' => $this->Kantor_wilayah_model->get_all(),
			'data_pangkat' => $this->Pangkat_model->get_all(),
			'nama_lengkap' => set_value('nama_lengkap'),
			'email' => set_value('email'),
			'no_hp' => set_value('no_hp'),
			'tempat_lahir' => set_value('tempat_lahir'),
			'tanggal_lahir' => set_value('tanggal_lahir'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'pangkat' => set_value('pangkat'),
			'jabatan' => set_value('jabatan'),
			'kantor_wilayah' => set_value('kantor_wilayah'),
			'upt' => set_value('upt'),
			'bank_id' => set_value('bank_id'),
			'norek' => set_value('norek'),
			'password' => set_value('password'),
		);
		$this->template->load('template', 'peserta/peserta_form', $data);
	}

	public function create_action()
	{
		$this->_rules(null, null, null);
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {

			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './assets/'; //string, the default is application/cache/
			$config['errorlog']     = './assets/'; //string, the default is application/logs/
			$config['imagedir']     = './assets/img/qr/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name = $this->input->post('nip') . '_' . $this->input->post('nama_lengkap') . '.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = $this->input->post('nip'); //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE


			$config['upload_path']      = './assets/img/peserta';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload("photo");
			$data = $this->upload->data();
			$photo = $data['file_name'];

			$data = array(
				'photo' => $photo,
				'nip' => $this->input->post('nip', TRUE),
				'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
				'email' => $this->input->post('email', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'pangkat' => $this->input->post('pangkat', TRUE),
				'jabatan' => $this->input->post('jabatan', TRUE),
				'kantor_wilayah' => $this->input->post('kantor_wilayah', TRUE),
				'upt' => $this->input->post('upt', TRUE),
				'bank_id' => $this->input->post('bank_id', TRUE),
				'norek' => $this->input->post('norek', TRUE),
				'password' => sha1($this->input->post('password', TRUE)),
				'qr_code' => $image_name,
			);

			$this->Peserta_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('peserta'));
		}
	}

	public function update($id)
	{
		$row = $this->Peserta_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'kantor_wilayah_data' => $this->Kantor_wilayah_model->get_all(),
				'bank' => $this->Bank_model->get_all(),
				'data_pangkat' => $this->Pangkat_model->get_all(),
				'action' => site_url('peserta/update_action'),
				'peserta_id' => set_value('peserta_id', $row->peserta_id),
				'photo' => set_value('photo', $row->photo),
				'nip' => set_value('nip', $row->nip),
				'nip_lama' => $row->nip,
				'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
				'email' => set_value('email', $row->email),
				'no_hp' => set_value('no_hp', $row->no_hp),
				'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
				'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'pangkat' => set_value('pangkat', $row->pangkat),
				'jabatan' => set_value('jabatan', $row->jabatan),
				'kantor_wilayah' => set_value('kantor_wilayah', $row->kantor_wilayah),
				'upt' => set_value('upt', $row->upt),
				'bank_id' => set_value('bank_id', $row->bank_id),
				'norek' => set_value('norek', $row->norek),
				'password' => set_value('password', $row->password),
			);
			$this->template->load('template', 'peserta/peserta_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('peserta'));
		}
	}

	public function update_action()
	{
		$this->_rules('update', $this->input->post('nip'), $this->input->post('nip_lama'));

		if ($this->form_validation->run() == FALSE) {
			$this->update(encrypt_url($this->input->post('peserta_id')));
		} else {


			// hapus qr code
			$id = $this->input->post('peserta_id');
			$row = $this->Peserta_model->get_by_id($id);

			if ($row->qr_code == null || $row->qr_code == '') {
			} else {
				$target_file = './assets/img/qr/' . $row->qr_code;
				unlink($target_file);
			}

			// buat qr code baru
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './assets/'; //string, the default is application/cache/
			$config['errorlog']     = './assets/'; //string, the default is application/logs/
			$config['imagedir']     = './assets/img/qr/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$image_name = $this->input->post('nip') . '_' . $this->input->post('nama_lengkap') . '.png'; //buat name dari qr code sesuai dengan nim
			$params['data'] = $this->input->post('nip');

			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name;
			$this->ciqrcode->generate($params);



			$config['upload_path']      = './assets/img/peserta';
			$config['allowed_types']    = 'jpg|png|jpeg';
			$config['max_size']         = 10048;
			$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload("photo")) {
				$row = $this->Peserta_model->get_by_id($id);
				$data = $this->upload->data();
				$photo = $data['file_name'];
				if ($row->photo == null || $row->photo == '') {
				} else {
					$target_file = './assets/img/peserta/' . $row->photo;
					unlink($target_file);
				}
			} else {
				$photo = $this->input->post('photo_lama');
			}


			if ($this->input->post('password') == '' || $this->input->post('password') == null) {
				$data = array(
					'photo' => $photo,
					'qr_code' => $image_name,
					'nip' => $this->input->post('nip', TRUE),
					'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
					'email' => $this->input->post('email', TRUE),
					'no_hp' => $this->input->post('no_hp', TRUE),
					'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
					'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
					'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
					'pangkat' => $this->input->post('pangkat', TRUE),
					'jabatan' => $this->input->post('jabatan', TRUE),
					'kantor_wilayah' => $this->input->post('kantor_wilayah', TRUE),
					'upt' => $this->input->post('upt', TRUE),
					'bank_id' => $this->input->post('bank_id', TRUE),
					'norek' => $this->input->post('norek', TRUE),
				);
			} else {
				$data = array(
					'photo' => $photo,
					'qr_code' => $image_name,
					'nip' => $this->input->post('nip', TRUE),
					'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
					'email' => $this->input->post('email', TRUE),
					'no_hp' => $this->input->post('no_hp', TRUE),
					'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
					'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
					'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
					'pangkat' => $this->input->post('pangkat', TRUE),
					'jabatan' => $this->input->post('jabatan', TRUE),
					'kantor_wilayah' => $this->input->post('kantor_wilayah', TRUE),
					'upt' => $this->input->post('upt', TRUE),
					'bank_id' => $this->input->post('bank_id', TRUE),
					'norek' => $this->input->post('norek', TRUE),
					'password' => sha1($this->input->post('password', TRUE)),
				);
			}

			$this->Peserta_model->update($this->input->post('peserta_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('peserta'));
		}
	}

	public function delete($id)
	{
		$row = $this->Peserta_model->get_by_id(decrypt_url($id));
		$peserta_id = decrypt_url($id);
		if ($row) {
			if ($row->photo == null || $row->photo == '') {
			} else {
				$target_file = './assets/img/peserta/' . $row->photo;
				unlink($target_file);
			}

			if ($row->qr_code == null || $row->qr_code == '') {
			} else {
				$target_file = './assets/img/qr/' . $row->qr_code;
				unlink($target_file);
			}


			$this->Peserta_model->delete(decrypt_url($id));
			$data = $this->db->query("SELECT * from peserta_pelatihan where peserta_id='$peserta_id'")->result();
			foreach ($data as $value) {
				$rows = $this->db->query("SELECT* from peserta_pelatihan where peserta_pelatihan_id='$value->peserta_pelatihan_id'")->row();
				if ($rows->sertifikat == null || $rows->sertifikat == '') {
				} else {
					$target_file = './assets/img/sertifikat/' . $rows->sertifikat;
					unlink($target_file);
				}
				$this->Pelatihan_model->deleteDaftarPeserta($value->peserta_pelatihan_id);
			}

			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('peserta'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('peserta'));
		}
	}

	public function _rules($type, $new, $original_value)
	{
		// $this->form_validation->set_rules('photo', 'photo', 'trim|required');
		if ($type != null) {
			if ($new == $original_value) {
				$is_unique =  '';
			} else {
				$is_unique =  '|is_unique[peserta.nip]';
			}
		} else {
			$is_unique =  '|is_unique[peserta.nip]';
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
		}
		$this->form_validation->set_rules('nip', 'nip', 'trim|required|max_length[18]' . $is_unique);
		$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required|callback_validate_must_be_expected_number_phone');
		$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('pangkat', 'pangkat', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('kantor_wilayah', 'kantor wilayah', 'trim|required');
		$this->form_validation->set_rules('upt', 'upt', 'trim|required');
		$this->form_validation->set_rules('bank_id', 'bank id', 'trim|required');
		$this->form_validation->set_rules('norek', 'norek', 'trim|required');
		$this->form_validation->set_rules('peserta_id', 'peserta_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function validate_must_be_expected_number_phone($str)
	{
		if (!preg_match("/^(628)([0-9\s\-\+\(\)]*)$/", $str)) {
			$this->form_validation->set_message('validate_must_be_expected_number_phone', 'Nomor HP harus berawalan 628');
			return false;
		} else {
			return true;
		}
	}
}

/* End of file Peserta.php */
/* Location: ./application/controllers/Peserta.php */
/* Please DO NOT modify this information : */