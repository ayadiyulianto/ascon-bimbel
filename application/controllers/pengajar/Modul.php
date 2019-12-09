<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('PengajarModel');
	}

	public function index()
	{
		
		$this->load->view('pengajar/modul');
		
	}

	public function tambahModul()
	{
		$data['kode_modul'] = $this->input->post('kode_modul');
		$data['kode_kelas'] = $this->input->post('kode_kelas');
		$data['nama_modul'] = $this->input->post('nama_modul');
		$data['deskripsi_singkat'] = $this->input->post('deskripsi_singkat');
		$insert = $this->PengajarModel->insert('tb_modul',$data);
		if($insert){
			$this->session->set_flashdata('info','Berhasil menambahkan modul');
			redirect(base_url('pengajar/modul'));
		}else{
			$this->session->set_flashdata('info','Gagal menambahkan modul');
			redirect(base_url('pengajar/modul'));
		}
	}

	public function ubahModul($kode_modul)
	{
		$data['kode_modul'] = $this->input->post('kode_modul');
		$data['kode_kelas'] = $this->input->post('kode_kelas');
		$data['nama_modul'] = $this->input->post('nama_modul');
		$data['deskripsi_singkat'] = $this->input->post('deskripsi_singkat');
		$where = array('kode_modul'=>$kode_modul);
		$update = $this->PengajarModel->update('tb_modul', $data, $where);
		if($update){
			$this->session->set_flashdata('info','Berhasil menambahkan modul');
			redirect(base_url('pengajar/modul'));
		}else{
			$this->session->set_flashdata('info','Gagal menambahkan modul');
			redirect(base_url('pengajar/modul'));
		}
	}

	public function hapusModul($kode_modul)
	{
		$where = array('kode_modul' =>$kode_modul);
		$delete = $this->PengajarModel->delete('tb_modul',$where);
		if($delete){
			$this->session->set_flashdata('info','Berhasil hapus modul');
			redirect(base_url('pengajar/modul'));
		}else{
			$this->session->set_flashdata('info','Gagal hapus modul');
			redirect(base_url('pengajar/modul'));
		}
	}	

	public function latihanSoal()
	{
		
		$this->load->view('pengajar/latihan_soal');
		
	}

	public function tambahSoal()
	{
		
		$this->load->view('pengajar/tambahSoal');
		
	}

	public function simpanSoal()
	{
		$data['soal'] = $this->input->post('soal');
		$data['benar_1'] = $this->input->post('benar_1');
		$data['salah_1'] = $this->input->post('salah_1');
		$data['salah_2'] = $this->input->post('salah_2');
		$data['salah_3'] = $this->input->post('salah_3');
		$data['pembahasan'] = $this->input->post('pembahasan');
		$insert = $this->PengajarModel->insert('tb_soal',$data);
		if($insert){
			$this->session->set_flashdata('info','Berhasil menambahkan soal');
			redirect(base_url('pengajar/modul/tambahSoal'));
		}else{
			$this->session->set_flashdata('info','Gagal menambahkan soal');
			redirect(base_url('pengajar/modul/tambahSoal'));
		}
	}

	public function materi()
	{
		$this->load->view('pengajar/header');
		$this->load->view('pengajar/materi');
		$this->load->view('pengajar/footer');
	}

	public function isiMateri()
	{
		$this->load->view('pengajar/header');
		$this->load->view('pengajar/isi_materi');
		$this->load->view('pengajar/footer');
	}
}
