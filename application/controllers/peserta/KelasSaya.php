<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelasSaya extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('PesertaModel');
	}

	public function index()
	{
		$data['KelasSaya'] = $this->PesertaModel->get('tb_kelas_user');
		$this->load->view('peserta/view_kelassaya');	
}
