<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


require FCPATH . '/vendor/autoload.php';

use Dompdf\Dompdf;


class Pelatihan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Budget_model');
		$this->load->model('Pelatihan_model');
		$this->load->model('Pemateri_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$pelatihan = $this->Pelatihan_model->get_all();
		$data = array(
			'pelatihan_data' => $pelatihan,
		);
		$this->template->load('template', 'pelatihan/pelatihan_list', $data);
	}

	public function daftar_peserta($id)
	{
		$pelatihan_id = decrypt_url($id);
		$data = array(
			'pelatihan_id' => $pelatihan_id,
		);
		$this->template->load('template', 'pelatihan/daftar_peserta', $data);
	}

	public function add_peserta()
	{
		$pelatihan_id = encrypt_url($this->input->post('pelatihan_id'));
		$no_pelatihan_id = $this->input->post('pelatihan_id');
		$peserta_id =  $this->input->post('peserta_id');
		$query = $this->db->query("SELECT * from peserta_pelatihan where pelatihan_id='$no_pelatihan_id' and peserta_id='$peserta_id'")->num_rows();
		if ($query > 0) {
			$this->session->set_flashdata('error', 'Peserta Tidak bisa ditambahkan, sudah ada dalam list');
		} else {
			$data = array(
				'pelatihan_id' => $no_pelatihan_id,
				'peserta_id' => $peserta_id,
			);
			$this->db->insert('peserta_pelatihan', $data);
			// add notif ramdan
			sendWa('6283874731480', 'add_peserta');

			$this->session->set_flashdata('message', 'Peserta berhasil ditambahkan');
		}
		redirect(base_url('pelatihan/daftar_peserta/' . $pelatihan_id));
	}



	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('pelatihan/create_action'),
			'pelatihan_id' => set_value('pelatihan_id'),
			'nama_pelatihan' => set_value('nama_pelatihan'),
			'angkatan' => set_value('angkatan'),
			'pemateri' => $this->Pemateri_model->get_all(),
			'tanggal_mulai' => set_value('tanggal_mulai'),
			'tanggal_selesai' => set_value('tanggal_selesai'),
			'jumlah_peserta' => set_value('jumlah_peserta'),
			'pemateri_id' => set_value('pemateri_id'),
			'array' => [],
			'metode' => set_value('metode'),
			'tempat' => set_value('tempat'),
			'jumlah_jp' => set_value('jumlah_jp'),
			'penanggung_jawab' => set_value('penanggung_jawab'),
		);
		$this->template->load('template', 'pelatihan/pelatihan_form', $data);
	}

	public function create_action()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_pelatihan' => $this->input->post('nama_pelatihan', TRUE),
				'angkatan' => $this->input->post('angkatan', TRUE),
				'tanggal_mulai' => $this->input->post('tanggal_mulai', TRUE),
				'tanggal_selesai' => $this->input->post('tanggal_selesai', TRUE),
				'jumlah_peserta' => $this->input->post('jumlah_peserta', TRUE),
				'metode' => $this->input->post('metode', TRUE),
				'tempat' => $this->input->post('tempat', TRUE),
				'jumlah_jp' => $this->input->post('jumlah_jp', TRUE),
				'penanggung_jawab' => $this->input->post('penanggung_jawab', TRUE),
				// 'pemateri_id' => json_encode($this->input->post('pemateri_id', TRUE)),
			);
			$this->Pelatihan_model->insert($data);
			$lastInput = $this->db->insert_id();;

			foreach ($this->input->post('pemateri_id') as $value) {
				$dataPemateri = array(
					'pelatihan_id' => $lastInput,
					'pemateri_id' => $value,
				);
				$this->db->insert('pelatihan_pemateri', $dataPemateri);
				// add notif ramdan
				sendWa('6283874731480', 'add_pemateri');
			}
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('pelatihan'));
		}
	}

	public function update($id)
	{
		$row = $this->Pelatihan_model->get_by_id(decrypt_url($id));
		$pelatihan_id = decrypt_url($id);
		$sql = $this->db->query("SELECT * FROM pelatihan_pemateri where pelatihan_id='$pelatihan_id'")->result();
		$array = [];

		foreach ($sql as $key => $value) {
			array_push($array, $value->pemateri_id);
		}

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('pelatihan/update_action'),
				'pelatihan_id' => set_value('pelatihan_id', $row->pelatihan_id),
				'nama_pelatihan' => set_value('nama_pelatihan', $row->nama_pelatihan),
				'angkatan' => set_value('angkatan', $row->angkatan),
				'tanggal_mulai' => set_value('tanggal_mulai', $row->tanggal_mulai),
				'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
				'jumlah_peserta' => set_value('jumlah_peserta', $row->jumlah_peserta),
				'metode' => set_value('metode', $row->metode),
				'tempat' => set_value('tempat', $row->tempat),
				'array' => $array,
				'pemateri' => $this->Pemateri_model->get_all(),
				'jumlah_jp' => set_value('jumlah_jp', $row->jumlah_jp),
				'penanggung_jawab' => set_value('penanggung_jawab', $row->penanggung_jawab),
			);
			$this->template->load('template', 'pelatihan/pelatihan_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pelatihan'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('pelatihan_id', TRUE));
		} else {
			$data = array(
				'nama_pelatihan' => $this->input->post('nama_pelatihan', TRUE),
				'angkatan' => $this->input->post('angkatan', TRUE),
				'tanggal_mulai' => $this->input->post('tanggal_mulai', TRUE),
				'tanggal_selesai' => $this->input->post('tanggal_selesai', TRUE),
				'jumlah_peserta' => $this->input->post('jumlah_peserta', TRUE),
				'metode' => $this->input->post('metode', TRUE),
				'tempat' => $this->input->post('tempat', TRUE),
				'jumlah_jp' => $this->input->post('jumlah_jp', TRUE),
				'penanggung_jawab' => $this->input->post('penanggung_jawab', TRUE),
			);
			$this->Pelatihan_model->update($this->input->post('pelatihan_id', TRUE), $data);

			// delete
			$id = $this->input->post('pelatihan_id', TRUE);
			$this->db->query("DELETE FROM pelatihan_pemateri where pelatihan_id='$id'");

			foreach ($this->input->post('pemateri_id') as $value) {
				$dataPemateri = array(
					'pelatihan_id' => $this->input->post('pelatihan_id', TRUE),
					'pemateri_id' => $value,
				);
				$this->db->insert('pelatihan_pemateri', $dataPemateri);
			}

			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('pelatihan'));
		}
	}

	public function berkas($id, $pelatihan_id)
	{
		$pelatihan = $this->Pelatihan_model->get_all();
		$id_en =  encrypt_url($pelatihan_id);
		$data = array(
			'pelatihan_data' => $pelatihan,
			'id' => $id_en,
			'peserta_pelatihan_id' => $id
		);
		$this->template->load('template', 'pelatihan/berkas', $data);
	}

	public function delete($id)
	{
		$row = $this->Pelatihan_model->get_by_id(decrypt_url($id));
		$pelatihan_id = decrypt_url($id);


		if ($row) {
			$this->Pelatihan_model->delete(decrypt_url($id));
			$data = $this->db->query("SELECT * from peserta_pelatihan where pelatihan_id='$pelatihan_id'")->result();
			foreach ($data as $value) {
				$rows = $this->db->query("SELECT* from peserta_pelatihan where peserta_pelatihan_id='$value->peserta_pelatihan_id'")->row();
				if ($rows->sertifikat == null || $rows->sertifikat == '') {
				} else {
					$target_file = './assets/img/sertifikat/' . $rows->sertifikat;
					unlink($target_file);
				}

				if ($rows->trf == null || $rows->trf == '') {
				} else {
					$trfTarget = './assets/img/trf/' . $rows->trf;
					unlink($trfTarget);
				}
				$this->Pelatihan_model->deleteDaftarPeserta($value->peserta_pelatihan_id);
			}

			// delete pemateri dan nukti honor
			$pemateri = $this->db->query("SELECT * from pelatihan_pemateri where pelatihan_id='$pelatihan_id'")->result();
			foreach ($pemateri as $value) {
				$rows = $this->db->query("SELECT * from pelatihan_pemateri where pelatihan_pemateri_id='$value->pelatihan_pemateri_id'")->row();
				if ($rows->bukti_honor == null || $rows->bukti_honor == '') {
				} else {
					$target_file = './assets/img/bukti_honor/' . $rows->bukti_honor;
					unlink($target_file);
				}
				$this->Pelatihan_model->deleteDaftarPemateri($value->pelatihan_pemateri_id);
			}

			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('pelatihan'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pelatihan'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_pelatihan', 'nama pelatihan', 'trim|required');
		$this->form_validation->set_rules('angkatan', 'angkatan', 'trim|required');
		$this->form_validation->set_rules('tanggal_mulai', 'tanggal mulai', 'trim|required');
		$this->form_validation->set_rules('tanggal_selesai', 'tanggal selesai', 'trim|required');
		$this->form_validation->set_rules('jumlah_peserta', 'jumlah peserta', 'trim|required');
		$this->form_validation->set_rules('metode', 'metode', 'trim|required');
		$this->form_validation->set_rules('tempat', 'tempat', 'trim|required');
		$this->form_validation->set_rules('jumlah_jp', 'jumlah jp', 'trim|required');
		$this->form_validation->set_rules('penanggung_jawab', 'penanggung jawab', 'trim|required');
		// $this->form_validation->set_rules('pemateri_id', 'Pemateri', 'required');

		$this->form_validation->set_rules('pelatihan_id', 'pelatihan_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function uploadSertifikat()
	{
		$pelatihan_id = encrypt_url($this->input->post('pelatihan_id'));

		$config['upload_path']      = './assets/img/sertifikat';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']         = 10048;
		$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload("photo")) {
			$id = $this->input->post('peserta_pelatihan_id');
			$row = $this->db->query("SELECT* from peserta_pelatihan where peserta_pelatihan_id='$id'")->row();

			$data = $this->upload->data();
			$photo = $data['file_name'];
			if ($row->sertifikat == null || $row->sertifikat == '') {
			} else {
				$target_file = './assets/img/sertifikat/' . $row->sertifikat;
				unlink($target_file);
			}
		}

		$data = array(
			'sertifikat' => $photo,
		);
		$this->Pelatihan_model->updateSertifikat($this->input->post('peserta_pelatihan_id', TRUE), $data);
		// add notif ramdan
		sendWa('6283874731480', 'uploadSertifikat');
		$this->session->set_flashdata('message', 'Upload Sertifikat Success');
		redirect(base_url('pelatihan/daftar_peserta/' . $pelatihan_id));
	}


	public function uploadTrf()
	{
		$pelatihan_id = encrypt_url($this->input->post('pelatihan_id'));

		$config['upload_path']      = './assets/img/trf';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']         = 10048;
		$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload("photo")) {
			$id = $this->input->post('peserta_pelatihan_id');
			$row = $this->db->query("SELECT* from peserta_pelatihan where peserta_pelatihan_id='$id'")->row();

			$data = $this->upload->data();
			$photo = $data['file_name'];
			if ($row->trf == null || $row->trf == '') {
			} else {
				$target_file = './assets/img/trf/' . $row->trf;
				unlink($target_file);
			}
		}

		$data = array(
			'trf' => $photo,
		);
		$this->Pelatihan_model->updateBuktiTrf($this->input->post('peserta_pelatihan_id', TRUE), $data);
		// add notif ramdan
		sendWa('6283874731480', 'uploadTrf');
		$this->session->set_flashdata('message', 'Upload Bukti Transfer Success');
		redirect(base_url('pelatihan/daftar_peserta/' . $pelatihan_id));
	}


	public function uploadbukti_honor()
	{
		$pelatihan_id = encrypt_url($this->input->post('pelatihan_id'));

		$config['upload_path']      = './assets/img/bukti_honor';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']         = 10048;
		$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload("photo")) {
			$id = $this->input->post('pelatihan_pemateri_id');
			$row = $this->db->query("SELECT* from pelatihan_pemateri where pelatihan_pemateri_id='$id'")->row();

			$data = $this->upload->data();
			$photo = $data['file_name'];
			if ($row->bukti_honor == null || $row->bukti_honor == '') {
			} else {
				$target_file = './assets/img/bukti_honor/' . $row->bukti_honor;
				unlink($target_file);
			}
		}

		$data = array(
			'bukti_honor' => $photo,
		);
		$this->Pelatihan_model->updateBuktiHonor($this->input->post('pelatihan_pemateri_id', TRUE), $data);
		// add notif ramdan
		sendWa('6283874731480', 'uploadbukti_honor');
		$this->session->set_flashdata('message', 'Upload Bukti Transfer Success');
		redirect(base_url('pelatihan/budget/' . $pelatihan_id));
	}


	public function deletePeserta($id, $pelatihan_id)
	{
		$row = $this->db->query("SELECT* from peserta_pelatihan where peserta_pelatihan_id='$id'")->row();

		if ($row->sertifikat == null || $row->sertifikat == '') {
		} else {
			$target_file = './assets/img/sertifikat/' . $row->sertifikat;
			unlink($target_file);
		}

		if ($row->trf == null || $row->trf == '') {
		} else {
			$trfTarget = './assets/img/trf/' . $row->trf;
			unlink($trfTarget);
		}

		$this->Pelatihan_model->deleteDaftarPeserta($id);

		$this->session->set_flashdata('message', 'Peserta berhasil dihapus dari list');
		redirect(base_url('pelatihan/daftar_peserta/' . encrypt_url($pelatihan_id)));
	}

	public function budget($id)
	{
		$pelatihan_id = decrypt_url($id);
		$budget = $this->db->query("SELECT * FROM budget")->result();
		// var_dump($budget);
		// die();
		$data = array(
			'pelatihan_id' => $pelatihan_id,
			'budget_list' => $budget,
			'pemateri' => $this->db->query("SELECT pelatihan_pemateri.*, pemateri.nama_pemateri,pemateri.no_hp FROM pelatihan_pemateri join pemateri on pemateri.pemateri_id = pelatihan_pemateri.pemateri_id where pelatihan_pemateri.pelatihan_id='$pelatihan_id'")->result(),
		);
		$this->template->load('template', 'pelatihan/budget', $data);
	}

	public function store_budget()
	{
		$budget_id       		= $_POST['budget_id'];
		$pelatihan_id       	= $_POST['pelatihan_id'];
		$budget       	  = $_POST['budget'];

		// detele yg lama
		$this->db->query("DELETE FROM pelatihan_budget where pelatihan_id='$pelatihan_id'");
		if ($budget_id) {
			$jumlah_data = count($budget_id);
			for ($i = 0; $i < $jumlah_data; $i++) {
				$pelatihan_budget['pelatihan_id'] = $pelatihan_id;
				$pelatihan_budget['budget_id'] = $budget_id[$i];
				$pelatihan_budget['budget'] = $budget[$i];
				$this->db->insert('pelatihan_budget', $pelatihan_budget);
			}
		}
		$this->session->set_flashdata('message', 'Budget pelatihan berhasil disimpan');
		redirect(site_url('pelatihan'));
	}

	public function pdf($id)
	{
		$pelatihan_id = decrypt_url($id);
		$row = $this->Pelatihan_model->get_by_id(decrypt_url($id));
		$daftarPesertaPelatihan = $this->db->query("SELECT * from peserta_pelatihan join peserta on peserta.peserta_id = peserta_pelatihan.peserta_id where pelatihan_id='$pelatihan_id'");
		$daftarPeserta = $daftarPesertaPelatihan->result();


		$data = [
			'row' => $row,
			'id' => $pelatihan_id,
			'pemateri' => $this->db->query("SELECT pelatihan_pemateri.*, pemateri.nama_pemateri,pemateri.no_hp FROM pelatihan_pemateri join pemateri on pemateri.pemateri_id = pelatihan_pemateri.pemateri_id where pelatihan_pemateri.pelatihan_id='$pelatihan_id'")->result(),
			'daftarPeserta' => $daftarPeserta,
			'list_budget' => $this->db->query("SELECT pelatihan_budget.*,budget.nama_budget, budget_kategori.nama_kategori from pelatihan_budget
			join budget on budget.budget_id = pelatihan_budget.budget_id 
			join budget_kategori on budget_kategori.budget_kategori_id = budget.budget_kategori_id 
			where pelatihan_id='$pelatihan_id'")->result(),
		];
		$pdf = $this->load->view("pelatihan/pdf", $data, true);

		$dompdf = new Dompdf();
		$dompdf->set_option('isRemoteEnabled', TRUE);
		$dompdf->loadHtml($pdf);
		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'portrait');
		// Render the HTML as PDF
		$dompdf->render();
		// Output the generated PDF to Browser
		//$dompdf->stream();
		$dompdf->stream('my.pdf', array('Attachment' => 0));
	}

	public function getBudget()
	{
		$budget_id = $_GET['value'];
		$data = $this->db->query("SELECT budget.*,budget_kategori.nama_kategori FROM budget join budget_kategori on budget_kategori.budget_kategori_id = budget.budget_kategori_id
		where budget_id='$budget_id'")->row();
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}

/* End of file Pelatihan.php */
/* Location: ./application/controllers/Pelatihan.php */
/* Please DO NOT modify this information : */
