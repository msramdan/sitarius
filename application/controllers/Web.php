<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Web extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Kantor_wilayah_model');
		$this->load->model('Pangkat_model');
		$this->load->model('Bank_model');
		$this->load->model('Peserta_model');
	}

	public function profile()
	{
		$data = array(
			'bank' => $this->Bank_model->get_all(),
			'kantor_wilayah_data' => $this->Kantor_wilayah_model->get_all(),
			'data_pangkat' => $this->Pangkat_model->get_all(),
		);

		$this->template->load('template_web', 'home/profile', $data);
	}

	public function berkas($id)
	{
		$query = $this->db->query("SELECT * from peserta_pelatihan join pelatihan on pelatihan.pelatihan_id = peserta_pelatihan.pelatihan_id where peserta_pelatihan.peserta_pelatihan_id='$id'")->row();
		$data = array(
			'data' => $query,

		);
		$this->template->load('template_web', 'home/berkas', $data);
	}

	public function upload_file()
	{
		$id = $this->input->post('peserta_pelatihan_id');
		$config['upload_path']      = './assets/img/berkas';
		$config['allowed_types']    = 'jpg|png|jpeg|pdf';
		$config['max_size']         = 10048;
		$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$row = $this->db->query("SELECT * from peserta_pelatihan where peserta_pelatihan_id='$id'")->row();
		if ($this->upload->do_upload("lembar_konfirmasi")) {

			$data = $this->upload->data();
			$lembar_konfirmasi = $data['file_name'];
			if ($row->lembar_konfirmasi == null || $row->lembar_konfirmasi == '') {
			} else {
				$target_file = './assets/img/berkas/' . $row->lembar_konfirmasi;
				unlink($target_file);
			}

			$data = array(
				'lembar_konfirmasi' => $lembar_konfirmasi,
			);

			$this->Peserta_model->updateBerkas($id, $data);
		}

		if ($this->upload->do_upload("surat_tugas")) {

			$data = $this->upload->data();
			$surat_tugas = $data['file_name'];
			if ($row->surat_tugas == null || $row->surat_tugas == '') {
			} else {
				$target_file = './assets/img/berkas/' . $row->surat_tugas;
				unlink($target_file);
			}

			$data = array(
				'surat_tugas' => $surat_tugas,
			);

			$this->Peserta_model->updateBerkas($id, $data);
		}

		if ($this->upload->do_upload("pas_photo")) {

			$data = $this->upload->data();
			$pas_photo = $data['file_name'];
			if ($row->pas_photo == null || $row->pas_photo == '') {
			} else {
				$target_file = './assets/img/berkas/' . $row->pas_photo;
				unlink($target_file);
			}
			$data = array(
				'pas_photo' => $pas_photo,
			);

			$this->Peserta_model->updateBerkas($id, $data);
		}

		if ($this->upload->do_upload("surat_keterangan_dokter")) {
			$data = $this->upload->data();
			$surat_keterangan_dokter = $data['file_name'];
			if ($row->surat_keterangan_dokter == null || $row->surat_keterangan_dokter == '') {
			} else {
				$target_file = './assets/img/berkas/' . $row->surat_keterangan_dokter;
				unlink($target_file);
			}

			$data = array(
				'surat_keterangan_dokter' => $surat_keterangan_dokter,
			);

			$this->Peserta_model->updateBerkas($id, $data);
		}

		if ($this->upload->do_upload("npwp_bpjs")) {
			$data = $this->upload->data();
			$npwp_bpjs = $data['file_name'];
			if ($row->npwp_bpjs == null || $row->npwp_bpjs == '') {
			} else {
				$target_file = './assets/img/berkas/' . $row->npwp_bpjs;
				unlink($target_file);
			}

			$data = array(
				'npwp_bpjs' => $npwp_bpjs,
			);

			$this->Peserta_model->updateBerkas($id, $data);
		}

		if ($this->upload->do_upload("tiket_datang")) {
			$data = $this->upload->data();
			$tiket_datang = $data['file_name'];
			if ($row->tiket_datang == null || $row->tiket_datang == '') {
			} else {
				$target_file = './assets/img/berkas/' . $row->tiket_datang;
				unlink($target_file);
			}

			$data = array(
				'tiket_datang' => $tiket_datang,
			);

			$this->Peserta_model->updateBerkas($id, $data);
		}

		if ($this->upload->do_upload("tiket_pulang")) {
			$data = $this->upload->data();
			$tiket_pulang = $data['file_name'];
			if ($row->tiket_pulang == null || $row->tiket_pulang == '') {
			} else {
				$target_file = './assets/img/berkas/' . $row->tiket_pulang;
				unlink($target_file);
			}
			$data = array(
				'tiket_pulang' => $tiket_pulang,
			);

			$this->Peserta_model->updateBerkas($id, $data);
		}


		$this->session->set_flashdata('message', 'Upload Berkas Berhasil');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function register()
	{
		$data = array(
			'action' => site_url('web/create_action'),
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

		$this->template->load('template_web', 'home/register', $data);
	}

	public function updatePeserta()
	{
		$id = $this->session->userdata('peserta_id_web');
		$this->_rules('update', $this->input->post('nip'), $this->input->post('nip_lama'));

		if ($this->form_validation->run() == FALSE) {
			$this->profile();
		} else {

			// hapus qr code
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


			$this->Peserta_model->update($id, $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('web/profile'));
		}
	}

	public function create_action()
	{

		$this->_rules(null, null, null);
		if ($this->form_validation->run() == FALSE) {
			$this->register();
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

			$this->Peserta_model->insert($data);
			$this->session->set_flashdata('message', 'Registrasi berhasil, Silahkan login !!!');
			redirect(site_url(''));
		}
	}


	public function login()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->Peserta_model->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'user_web' => $row->nama_lengkap,
					'peserta_id_web' => $row->peserta_id,
				);
				$this->session->set_userdata($params);
				$this->session->set_flashdata('message', 'Berhasil Login');
				redirect(site_url(''));
			} else {
				$this->session->set_flashdata('error', 'Login gagal, username atau password salah');
				redirect(site_url(''));
			}
		}
	}

	public function logout()
	{
		$params = array('user_web', 'peserta_id_web');
		$this->session->unset_userdata($params);
		$this->session->set_flashdata('message', 'Berhasil Logout');
		redirect('');
	}

	public function _rules($type, $new, $original_value)
	{
		$this->form_validation->set_rules('nip', 'nip', 'trim|required');

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

		$this->form_validation->set_rules('nip', 'nip', 'trim|required' . $is_unique);
		$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
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

	public function sertifikat($gambar)
	{
		force_download('assets/img/sertifikat/' . $gambar, NULL);
	}

	public function trf($gambar)
	{
		force_download('assets/img/trf/' . $gambar, NULL);
	}

	public function download_berkas($gambar)
	{
		force_download('assets/img/berkas/' . $gambar, NULL);
	}
}
