<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LatihanSoal extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if ($this->session->userdata('role') != 'siswa' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}

		$this->load->model('PesertaModel');
		$this->load->library('session');
	}

	public function index()
	{
		$kode_kelas = $this->session->userdata('kode_kelas');
		$data['LatihanSoal'] = $this->PesertaModel->getLatihan($kode_kelas, );
		$this->load->view('peserta/view_latihansoal');
	}
	
	public function latihan($kode_modul)
	{
		$id_user_peserta = $this->session->userdata('id_user');
		$this->PesertaModel->sesiSoal($kode_modul, $id_user_peserta);
		$data['LatihanSoal'] = $this->PesertaModel->get('tb_soal');
		$this->load->view('peserta/view_soal');	}

	public function bahas()
	{
		$data['LatihanSoal'] = $this->PesertaModel->get('tb_');
		$this->load->view('peserta/view_pembahasan');
	}
}