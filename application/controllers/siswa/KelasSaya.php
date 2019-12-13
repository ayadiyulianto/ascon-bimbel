<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelasSaya extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('SiswaModel');
		$this->load->model('AdminModel');
		$this->load->library('session');

		if ($this->session->userdata('role') != 'siswa' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}

	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data['kelassaya'] = $this->SiswaModel->getKelasSaya($id_user);
		$this->load->view('siswa/view_kelas_saya', $data);
	}

	
}