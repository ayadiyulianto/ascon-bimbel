<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PengajarModel');
		$this->load->library('session');

		if ($this->session->userdata('role') != 'pengajar' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}

	}

	public function index()
	{
		$id_kelas = $this->session->userdata('id_kelas');
		$data['semuasiswa'] = $this->PengajarModel->getSiswaByKelas($id_kelas);
		$this->load->view('pengajar/view_siswa', $data);
	}

	public function progressBelajar($id_siswa)
	{
		$this->load->view('pengajar/view_progress_belajar');
	}

	public function hasilLatihan($id_siswa)
	{
		$this->load->view('pengajar/view_hasil_latihan');
	}
}
