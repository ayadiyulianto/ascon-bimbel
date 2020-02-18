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

	public function buatDiskusi()
	{
		$data['id_user_pembuat'] = $this->session->userdata('id_user');
		$data['id_kelas'] = $this->session->userdata('id_kelas');
		$data['judul'] = $this->input->post('judul');
		$data['isi'] = $this->input->post('isi');
		$insert = $this->SiswaModel->insert('tb_forum', $data);
		if($insert){
			$this->session->set_flashdata('info','Berhasil membuat diskusi baru');
			redirect(base_url('siswa/forum'));
		}else{
			$this->session->set_flashdata('info','Gagal membuat diskusi baru');
			redirect(base_url('siswa/forum'));
		}
	}

	public function detail($id)
	{
		$data['id'] = $id;
		$data['forum'] = $this->SiswaModel->getForumById($id);
		$this->load->view('siswa/view_forum_detail', $data);
	}
}
