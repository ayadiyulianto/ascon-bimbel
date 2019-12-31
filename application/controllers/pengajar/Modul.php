<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

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
		$data['semuamodul'] = $this->PengajarModel->getModulByKelas($id_kelas);
		$this->load->view('pengajar/view_modul', $data);
	}

	public function tambahModul()
	{
		$data['id_kelas'] = $this->session->userdata('id_kelas');
		$data['nama_modul'] = $this->input->post('nama_modul');
		$insert = $this->PengajarModel->insert('tb_modul',$data);
		if($insert){
			$this->session->set_flashdata('info','Berhasil menambahkan modul');
			redirect(base_url('pengajar/modul'));
		}else{
			$this->session->set_flashdata('info','Gagal menambahkan modul');
			redirect(base_url('pengajar/modul'));
		}
	}

	public function formModul($id)
	{	
		$data['modul'] = $this->PengajarModel->getModul($id);
		$this->load->view('pengajar/view_form_modul', $data);
	}

	public function simpanDetailModul()
	{
		$id = $this->input->post('id');
		$data['nama_modul'] = $this->input->post('nama_modul');
		$data['deskripsi_singkat'] = $this->input->post('deskripsi_singkat');
		$where['id'] = $id;
		$update = $this->PengajarModel->update('tb_modul',$data, $where);
		if($update){
			$this->session->set_flashdata('info','Berhasil memperbarui modul');
			redirect(base_url('pengajar/modul/formModul/'.$id));
		}else{
			$this->session->set_flashdata('info','Gagal memperbarui modul');
			redirect(base_url('pengajar/modul/formModul/'.$id));
		}
	}

	public function simpanLatihanModul()
	{
		$id = $this->input->post('id');
		$data['passing_grade'] = $this->input->post('passing_grade');
		$data['jml_soal'] = $this->input->post('jml_soal');
		$data['durasi_pengerjaan'] = $this->input->post('durasi_pengerjaan');
		$update = $this->PengajarModel->update('tb_modul',$data, array('id'=>$id));
		if($update){
			$this->session->set_flashdata('info','Berhasil memperbarui modul');
			redirect(base_url('pengajar/modul/formModul/'.$id));
		}else{
			$this->session->set_flashdata('info','Gagal memperbarui modul');
			redirect(base_url('pengajar/modul/formModul/'.$id));
		}
	}

	public function hapusModul($id)
	{
		$where = array('id' =>$id);
		$delete = $this->PengajarModel->delete('tb_modul',$where);
		if($delete){
			$this->session->set_flashdata('info','Berhasil hapus modul');
			redirect(base_url('pengajar/modul'));
		}else{
			$this->session->set_flashdata('info','Gagal hapus modul');
			redirect(base_url('pengajar/modul'));
		}
	}	

	public function materi($id_modul)
	{
		$data['id_modul'] = $id_modul;
		$data['semuamateri'] = $this->PengajarModel->getMateriByModul($id_modul);
		$this->load->view('pengajar/view_materi', $data);
	}

	public function formMateri($id_modul, $id=NULL)
	{
		$data['id_modul'] = $id_modul;
		$data['id'] = $id;
		if($id!=NULL){
			$data['materi'] = $this->PengajarModel->getMateri($id)->row_array();
		}
		$this->load->view('pengajar/view_form_materi', $data);
	}

	public function simpanMateri()
	{
		$id_modul = $this->input->post('id_modul');
		$id = $this->input->post('id');
		$data['id_modul'] = $id_modul;
		$data['judul_materi'] = $this->input->post('judul_materi');
		$data['estimasi_waktu'] = $this->input->post('estimasi_waktu');
		$data['materi'] = $this->input->post('materi');
		if(empty($id)){
			$insert = $this->PengajarModel->insert('tb_materi',$data);
			if($insert){
				$this->session->set_flashdata('info','Berhasil menambahkan materi');
				redirect(base_url('pengajar/modul/materi/'.$id_modul));
			}else{
				$this->session->set_flashdata('info','Gagal menambahkan materi');
				redirect(base_url('pengajar/modul/formMateri/'.$id_modul));
			}
		}else{
			$update = $this->PengajarModel->update('tb_materi',$data, array('id_materi'=>$id));
			if($update){
				$this->session->set_flashdata('info','Berhasil mengubah materi');
				redirect(base_url('pengajar/modul/formMateri/'.$id_modul.'/'.$id));
			}else{
				$this->session->set_flashdata('info','Gagal mengubah soal');
				redirect(base_url('pengajar/modul/formMateri/'.$id_modul.'/'.$id));
			}
		}
	}

	public function hapusMateri($id_modul, $id)
	{
		$where = array('id' =>$id);
		$delete = $this->PengajarModel->delete('tb_materi',$where);
		if($delete){
			$this->session->set_flashdata('info','Berhasil menghapus materi');
			redirect(base_url('pengajar/modul/materi/'.$id_modul));
		}else{
			$this->session->set_flashdata('info','Gagal menghapus materi');
			redirect(base_url('pengajar/modul/materi/'.$id_modul));
		}
	}	

	public function latihanSoal($id_modul)
	{
		$data['id_modul'] = $id_modul;
		$data['semuasoal'] = $this->PengajarModel->getSoalByModul($id_modul);
		$this->load->view('pengajar/view_latihan_soal', $data);
	}

	public function formSoal($id_modul, $id=NULL)
	{
		$data['id_modul'] = $id_modul;
		$data['id'] = $id;
		if($id!=NULL){
			$data['soal'] = $this->PengajarModel->getSoal($id)->row_array();
		}
		$this->load->view('pengajar/view_form_soal', $data);
	}

	public function simpanSoal()
	{
		$id_modul = $this->input->post('id_modul');
		$id = $this->input->post('id');
		$data['id_modul'] = $id_modul;
		$data['soal'] = $this->input->post('soal');
		$data['benar_1'] = $this->input->post('benar_1');
		$data['salah_1'] = $this->input->post('salah_1');
		$data['salah_2'] = $this->input->post('salah_2');
		$data['salah_3'] = $this->input->post('salah_3');
		$data['pembahasan'] = $this->input->post('pembahasan');
		if(empty($id)){
			$insert = $this->PengajarModel->insert('tb_soal',$data);
			if($insert){
				$this->session->set_flashdata('info','Berhasil menambahkan soal');
				redirect(base_url('pengajar/modul/latihansoal/'.$id_modul));
			}else{
				$this->session->set_flashdata('info','Gagal menambahkan soal');
				redirect(base_url('pengajar/modul/formsoal/'.$id_modul));
			}
		}else{
			$update = $this->PengajarModel->update('tb_soal',$data, array('id'=>$id));
			if($update){
				$this->session->set_flashdata('info','Berhasil mengubah soal');
				redirect(base_url('pengajar/modul/formsoal/'.$id_modul.'/'.$id));
			}else{
				$this->session->set_flashdata('info','Gagal mengubah soal');
				redirect(base_url('pengajar/modul/formsoal/'.$id_modul.'/'.$id));
			}
		}
	}

	public function hapusSoal($id_modul, $id)
	{
		$where = array('id' =>$id);
		$delete = $this->PengajarModel->delete('tb_soal',$where);
		if($delete){
			$this->session->set_flashdata('info','Berhasil hapus soal');
			redirect(base_url('pengajar/modul/latihansoal/'.$id_modul));
		}else{
			$this->session->set_flashdata('info','Gagal hapus soal');
			redirect(base_url('pengajar/modul/latihansoal/'.$id_modul));
		}
	}	

}
