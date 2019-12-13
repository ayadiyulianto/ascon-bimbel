<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if ($this->session->userdata('role') != 'siswa' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}

		$this->load->model('PesertaModel');
	}

	public function index()
	{
		$data['Forum'] = $this->PesertaModel->get('tb_forum');
		$this->load->view('peserta/view_forum');
	}
}
