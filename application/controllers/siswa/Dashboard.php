<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('SiswaModel');

		if (userdata('role') != 'Siswa' OR userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}
	}

	// INFO KELAS

	function index()
	{
		$id_user = userdata('id_user');
		$data['title'] = "Kelas Saya";
		$data['kelassaya'] = $this->SiswaModel->getKelasSaya($id_user);
		$data['pembelian'] = $this->SiswaModel->getPembelian($id_user);
		$this->load->view('siswa/view_kelas_new', $data);
	}

	function pilihKelas($id_kelas)
	{
		$has_access = $this->MyModel->get('kelas_siswa', '*', array('id_kelas'=>$id_kelas, 'id_user'=>userdata('id_user')))->num_rows();
		if($has_access==0) redirect('siswa/dashboard');
		$nama_kelas = $this->MyModel->get('kelas','nama_kelas', array('id_kelas'=>$id_kelas))->row()->nama_kelas;
		$this->session->set_userdata('id_kelas', $id_kelas);
		$this->session->set_userdata('nama_kelas', $nama_kelas);
		redirect('siswa/kelas');
	}

}