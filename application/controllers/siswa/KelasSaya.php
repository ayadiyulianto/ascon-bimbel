<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelasSaya extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('SiswaModel');
		$this->load->library('session');

		if ($this->session->userdata('role') != 'siswa' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect(base_url("auth"));
		}
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data['kelassaya'] = $this->SiswaModel->getKelasSaya($id_user);
		$this->load->view('siswa/view_kelas_saya', $data);
	}

	public function pilihKelas($id)
	{
		$this->session->set_userdata('id_kelas', $id);
		$kelas = $this->SiswaModel->getKelas($id);
		$this->session->set_userdata('nama_kelas', $kelas->nama);
		redirect(base_url('siswa/materi'));
	}

	public function daftarKelas($id){
		$data['id_kelas'] = $id;
		$data['id_user'] = $this->session->userdata('id_user');
		$daftar = $this->SiswaModel->insert('tb_kelas_user', $data);
		if($daftar){
			$this->session->set_flashdata('success','Berhasil mendaftar');
			redirect(base_url('siswa/kelassaya/pilihkelas/'.$id));
		}else{
			$this->session->set_flashdata('error','Gagal mendaftar');
			redirect(base_url('frontend/kelas'));
		}
	}
}