<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('PengajarModel');
		$this->load->library('session');

		if ($this->session->userdata('role') != 'pengajar' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}

	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data['semuakelas'] = $this->PengajarModel->getSemuaKelas($id_user);
		$this->load->view('pengajar/view_semua_kelas', $data);
	}

	public function formKelas($id)
	{
		$data['kelas'] = $this->PengajarModel->getKelas($id);
		$data['pengajar'] = $this->PengajarModel->getPengajarByKelas($id);
		$this->load->view('pengajar/view_form_kelas', $data);
	}

	public function simpanKelas()
	{
		$id = $this->input->post('id');
		$data['nama'] = $this->input->post('nama');
		$data['deskripsi_singkat'] = $this->input->post('deskripsi_singkat');
		$data['deskripsi_lengkap'] = $this->input->post('deskripsi_lengkap');

		$config['upload_path']   = './assets/images/kelas/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = 5000;
        $this->load->library('upload', $config);
	    if ($this->upload->do_upload('foto')){
	        $data['foto']=$this->upload->file_name;
			$kelasBeforeUpdate = $this->PengajarModel->getKelas($id);
			$fotolama='./assets/images/kelas/'.$kelasBeforeUpdate->foto;
	        $uploadsucces=true;
	    }else{
	    	$uploadsucces=false;
	    }

		$where['id'] = $id;
		$update = $this->PengajarModel->update('tb_kelas', $data, $where);
		if($update){
			if($uploadsucces) unlink($fotolama);
			$this->session->set_flashdata('success','Berhasil mengubah data kelas');
			redirect(base_url('pengajar/kelas/formKelas/'.$id));
		}else{
			if($uploadsucces) unlink($data['foto']);
			$this->session->set_flashdata('error','Gagal mengubah data kelas');
			redirect(base_url('pengajar/kelas/formKelas/'.$id));
		}
	}

	public function pilihKelas($id)
	{
		$this->session->set_userdata('id_kelas', $id);
		$kelas = $this->PengajarModel->getKelas($id);
		$this->session->set_userdata('nama_kelas', $kelas->nama);
		redirect(base_url('pengajar/modul'));
	}
}
