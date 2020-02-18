<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelassaya extends CI_Controller {

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

	public function tentang($id)
	{
		$id_user = $this->session->userdata('id_user');
		$data['kelas'] = $this->SiswaModel->getKelas($id);
		$data['silabus'] = $this->SiswaModel->getModul($id);
		$data['rating'] = $this->SiswaModel->getRating($id);
		$data['reviews'] = $this->SiswaModel->getReview($id);
		$data['myreview'] = $this->SiswaModel->getReviewByUser($id, $id_user);
		$this->load->view('siswa/view_kelas_detail', $data);
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

	public function beriUlasan(){
		$id_kelas = $this->input->post('id_kelas');
		$data['id_kelas'] = $id_kelas;
		$data['id_user'] = $this->session->userdata('id_user');
		$data['rating'] = $this->input->post('rating');
		$data['review'] = $this->input->post('review');
		$insert = $this->SiswaModel->insert('tb_review', $data);
		if($insert){
			$this->session->set_flashdata('success','Berhasil memberi ulasan');
			redirect(base_url('siswa/kelassaya/tentang/'.$id_kelas));
		}else{
			$this->session->set_flashdata('error','Gagal memberi ulasan');
			redirect(base_url('siswa/kelassaya/tentang/'.$id_kelas));
		}
	}
}