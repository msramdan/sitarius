<?php
date_default_timezone_set('Asia/Jakarta');

class Backup extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_login();
		check_admin();
	}

	public function index()
	{
		$this->template->load('template', 'admin/backup/view');
	}

	public function file()
	{
		// load database utility ci3
		$this->load->dbutil();

		// siapkan nama file
		$db_name = 'db_sitarius' . '.sql';

		$config = array(
			'format'            => 'txt', // txt, zip, gzip
			'filename'          => $db_name,
			'add_drop'          => TRUE,
			'add_insert'        => TRUE,
			'newline'           => "\n",
			'foreign_key_checks' => FALSE,
		);

		// siapkan variabel $backup tuk proses buat dan download file
		$backup = $this->dbutil->backup($config);

		// set lokasi buat dan download file
		// $save = FCPATH . 'backup_db/' . $db_name;

		// buat file
		$this->load->helper('file');
		// write_file($save, $backup);

		// download file
		$this->load->helper('download');
		force_download($db_name, $backup);
	}

	public function restoredb()
	{
		$this->template->load('template', 'admin/restoredb/view');
	}


	function store_restore()
	{
		$fupload = $_FILES['datafile'];
		$nama = $_FILES['datafile']['name'];
		if (isset($fupload)) {
			$lokasi_file = $fupload['tmp_name'];
			$direktori = 'backup_db/' . $nama;
			move_uploaded_file($lokasi_file, $direktori);
		}
		$isi_file = file_get_contents($direktori);
		$string_query = rtrim($isi_file, "\n;");
		$array_query = explode(";", $string_query);
		foreach ($array_query as $query) {
			$this->db->query($query);
		}
		$this->session->set_flashdata('message', 'Restore Database Success');
		redirect(site_url('backup/restoredb'));
	}
}
