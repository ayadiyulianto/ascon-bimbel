<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

	public function __construct()
	{
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
		$id_kelas = $this->session->userdata('id_kelas');
		$data['semuamodul'] = $this->SiswaModel->getModulByKelas($id_user, $id_kelas);
		$this->load->view('siswa/view_modul', $data);
	}

	public function baca($id_modul, $id_materi=NULL)
	{
		$id_siswa = $this->session->userdata('id_user');
		if($id_materi==NULL){
			$id_materi = $this->SiswaModel->getDefaultMateriByModul($id_modul);
		}
		$this->SiswaModel->mulaiModul($id_siswa, $id_modul);
		$this->SiswaModel->mulaiMateri($id_siswa, $id_materi);
		$data['id_siswa'] = $id_siswa;
		$data['id_modul'] = $id_modul;
		$data['materi'] = $this->SiswaModel->getMateriById($id_materi);
		$data['listmateri'] = $this->SiswaModel->getListMateri($id_modul);
		$this->load->view('siswa/view_baca_materi', $data);
	}

	public function tandaiSelesai($id_modul, $id_materi)
	{
		$id_siswa = $this->session->userdata('id_user');
		$this->SiswaModel->tandaiMateriSelesai($id_siswa, $id_materi);
		$id_materi_next = $this->SiswaModel->getNextIdMateri($id_modul, $id_materi);
		redirect(base_url("siswa/materi/baca/".$id_modul."/".$id_materi_next));
	}
}