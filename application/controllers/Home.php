<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->template->load('template_web', 'home/index');
	}
}
