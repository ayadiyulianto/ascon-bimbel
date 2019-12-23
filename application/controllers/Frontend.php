<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('FrontendModel');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('frontend/view_index');
	}

	public function kelas()
	{
		$data['semuakelas'] = $this->FrontendModel->getSemuaKelas();
		$id_user = $this->session->userdata('id_user');
		if($this->session->userdata('oasse-bimbel') == TRUE){
			$kelas = $this->FrontendModel->getKelasByUser($id_user);
			$data['id_kelassaya'] = array_column($kelas->result_array(),'id_kelas');
		}
		$this->load->view('frontend/view_semua_kelas', $data);
	}
}
