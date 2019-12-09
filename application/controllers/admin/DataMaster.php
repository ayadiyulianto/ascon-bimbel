<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('AdminModel');
	}

	public function kelas()
	{
		$this->load->view('admin/view_semuakelas');
	}

	public function tambahKelas()
	{
		$data['kode_kelas'] = $this->input->post('kode_kelas');
		$data['nama'] = $this->input->post('nama');
		$data['foto'] = $this->input->post('foto');
		$data['deskripsi'] = $this->input->post('deskripsi');
		$insert = $this->AdminModel->insert('tb_kelas', $data);
		if($insert){
			$this->session->set_flashdata('info','Berhasil menambah kelas');
			redirect(base_url('admin/datamaster/kelas'));
		}else{
			$this->session->set_flashdata('info','Gagal menambah kelas');
			redirect(base_url('admin/datamaster/kelas'));
		}
	}

	public function ubahKelas($kode_kelas)
	{
		$data['kode_kelas'] = $this->input->post('kode_kelas');
		$data['nama'] = $this->input->post('nama');
		$data['foto'] = $this->input->post('foto');
		$data['deskripsi'] = $this->input->post('deskripsi');
		$where = array('kode_kelas'=>$kode_kelas);
		$update = $this->AdminModel->update('tb_kelas', $data, $where);
		if($update){
			$this->session->set_flashdata('info','Berhasil mengubah kelas');
			redirect(base_url('admin/datamaster/kelas'));
		}else{
			$this->session->set_flashdata('info','Gagal mengubah kelas');
			redirect(base_url('admin/datamaster/kelas'));
		}
	}

	public function hapusKelas($kode_kelas){
		$where = array('kode_kelas'=>$kode_kelas);
		$delete = $this->AdminModel->delete('tb_kelas', $where);
		if($delete){
			$this->session->set_flashdata('info','Berhasil menghapus kelas');
			redirect(base_url('admin/datamaster/kelas'));
		}else{
			$this->session->set_flashdata('info','Gagal menghapus kelas');
			redirect(base_url('admin/datamaster/kelas'));
		}
	}

	public function pengajar()
	{
		$this->load->view('admin/view_pengajar');
	}

	public function tambahPengajar()
	{
		$this->load->view('admin/vFormPengajar');
	}

	public function siswa()
	{
		$this->load->view('admin/view_siswa');
	}

	public function tambahSiswa()
	{
		$this->load->view('admin/vFormPengajar');
	}
}
