<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SiswaModel');
		$this->load->library('session');

		if ($this->session->userdata('role') != 'siswa' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect(base_url("auth"));
		}
		
		if (!$this->session->has_userdata('id_kelas')) {
			redirect(base_url("siswa/kelassaya"));
		}
	}

	public function index()
	{
		$id_kelas = $this->session->userdata('id_kelas');
		$data['semuaforum'] = $this->SiswaModel->getForum($id_kelas);
		$this->load->view('siswa/view_forum', $data);
	}

	public function detail($id)
	{
		$data['id'] = $id;
		$data['forum'] = $this->SiswaModel->getForumById($id);
		$this->load->view('siswa/view_forum_detail', $data);
	}
}
