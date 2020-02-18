<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskusi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PengajarModel');
		$this->load->library('session');

		if ($this->session->userdata('role') != 'pengajar' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect(base_url("auth"));
		}
		
		if (!$this->session->has_userdata('id_kelas')) {
			redirect(base_url("pengajar/kelas"));
		}
	}

	public function index()
	{
		$id_kelas = $this->session->userdata('id_kelas');
		$data['semuadiskusi'] = $this->PengajarModel->getDiskusi($id_kelas);
		$this->load->view('pengajar/view_diskusi', $data);
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
			redirect(base_url('pengajar/diskusi'));
		}else{
			$this->session->set_flashdata('info','Gagal membuat diskusi baru');
			redirect(base_url('pengajar/diskusi'));
		}
	}

	public function detail($id)
	{
		$data['id'] = $id;
		$data['diskusi'] = $this->PengajarModel->getDiskusiById($id);
		$this->load->view('pengajar/view_diskusi_detail', $data);
	}
}
