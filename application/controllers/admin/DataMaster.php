<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('AdminModel');
		$this->load->library('session');

		if ($this->session->userdata('role') != 'admin' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect(base_url("auth"));
		}
	}

	// KELAS

	public function kelas()
	{
		$data['semuakelas'] = $this->AdminModel->getSemuaKelas();
		$this->load->view('admin/view_semua_kelas', $data);
	}

	public function tambahKelas()
	{
		$data['nama'] = $this->input->post('nama');
		$data['deskripsi_singkat'] = $this->input->post('deskripsi_singkat');

		$config['upload_path']   = './assets/images/kelas/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = 5000;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')){
            $data['foto']=$this->upload->file_name;
        }

		$insert = $this->AdminModel->insert('tb_kelas', $data);
		if($insert){
			$this->session->set_flashdata('success','Berhasil menambah kelas');
			redirect(base_url('admin/datamaster/kelas'));
		}else{
			$this->session->set_flashdata('error','Gagal menambah kelas');
			redirect(base_url('admin/datamaster/kelas'));
		}
	}

	public function formKelas($id_kelas)
	{
		$data['kelas'] = $this->AdminModel->getKelas($id_kelas);
		$data['semuapengajar'] = $this->AdminModel->getSemuaPengajar();
		$pengajar = $this->AdminModel->getPengajarByKelas($id_kelas);
		$data['id_pengajar'] = array_column($pengajar->result_array(),'id_user');
		$this->load->view('admin/view_form_kelas', $data);
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
			$kelasBeforeUpdate = $this->AdminModel->getKelas($id_kelas_lama);
			$fotolama='./assets/images/kelas/'.$kelasBeforeUpdate->foto;
	        $uploadsucces=true;
	    }else{
	    	$uploadsucces=false;
	    }

		$where['id'] = $id;
		$update = $this->AdminModel->update('tb_kelas', $data, $where);
		if($update){
			if($uploadsucces) unlink($fotolama);
			$this->session->set_flashdata('success','Berhasil mengubah data kelas');
			redirect(base_url('admin/datamaster/formkelas/'.$id));
		}else{
			if($uploadsucces) unlink($data['foto']);
			$this->session->set_flashdata('error','Gagal mengubah data kelas');
			redirect(base_url('admin/datamaster/formkelas/'.$id));
		}
	}

	public function simpanPengajarKelas(){
		$id_kelas = $this->input->post('id_kelas');
		$delete = $this->AdminModel->deletePengajarOnKelas($id_kelas);
		$pengajar = $this->input->post('pengajar');
		if(!empty($pengajar)){
			foreach($pengajar as $id_pengajar){
				$data[] = array('id_kelas'=>$id_kelas, 'id_user'=>$id_pengajar);
			}
			$insert = $this->AdminModel->insert_batch('tb_kelas_user', $data);
			if($insert){
				$this->session->set_flashdata('success','Berhasil menambah pengajar');
				redirect(base_url('admin/datamaster/formkelas/'.$id_kelas));
			}else{
				$this->session->set_flashdata('error','Gagal menambah pengajar');
				redirect(base_url('admin/datamaster/formkelas/'.$id_kelas));
			}	
		}else{
			redirect(base_url('admin/datamaster/formkelas/'.$id_kelas));
		}
	}

	public function hapusKelas($id){
		$where = array('id'=>$id);
		$delete = $this->AdminModel->delete('tb_kelas', $where);
		if($delete){
			$this->session->set_flashdata('success','Berhasil menghapus kelas');
			redirect(base_url('admin/datamaster/kelas'));
		}else{
			$this->session->set_flashdata('error','Gagal menghapus kelas');
			redirect(base_url('admin/datamaster/kelas'));
		}
	}

	// PENGAJAR

	public function pengajar()
	{
		$data['semuapengajar'] = $this->AdminModel->getAllUsers('pengajar');
		$this->load->view('admin/view_pengajar', $data);
	}

	public function tambahAkunPengajar()
	{
		$username = $this->input->post('username');
		$cek = $this->AdminModel->checkUser($username);
		if($cek->num_rows()){
			$this->session->set_flashdata('error','Username telah terdaftar.');
			redirect(base_url('admin/datamaster/pengajar'));
		}else{
			$akun['role'] = "pengajar";
			$akun['nama'] = $this->input->post('nama');
			$akun['username'] = $username;
			$akun['email'] = $this->input->post('email');
			$akun['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			$insert = $this->AdminModel->insert('tb_user', $akun);
			if($insert){
				$this->session->set_flashdata('success','Berhasil menambah pengajar');
				redirect(base_url('admin/datamaster/pengajar'));
			}else{
				$this->session->set_flashdata('error','Gagal menambah pengajar');
				redirect(base_url('admin/datamaster/pengajar'));
			}
		}
	}

	public function formPengajar($id)
	{
		$data['pengajar'] = $this->AdminModel->getUser($id);
		$this->load->view('admin/view_form_pengajar', $data);
	}

	public function simpanAkunPengajar()
	{
		$id = $this->input->post('id');
		$akun['email'] = $this->input->post('email');
		$akun['username'] = $this->input->post('username');
		//$akun['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		$where['id'] = $id;
		$update = $this->AdminModel->update('tb_user', $akun, $where);
		if($update){
			$this->session->set_flashdata('success','Berhasil mengubah akun pengajar');
			redirect(base_url('admin/datamaster/formpengajar/'.$id));
		}else{
			$this->session->set_flashdata('error','Gagal mengubah akun pengajar');
			redirect(base_url('admin/datamaster/formpengajar/'.$id));
		}
	}

	public function simpanDataDiriPengajar()
	{
		$id = $this->input->post('id');
		$data['nama'] = $this->input->post('nama');
		$data['tgl_lahir'] = date('Y-m-d', strtotime($this->input->post('tgl_lahir')));
		$data['jk'] = $this->input->post('jk');
		$data['alamat'] = $this->input->post('alamat');
		$data['no_hp'] = $this->input->post('no_hp');

		$config['upload_path']   = './assets/images/user/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = 5000;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')){
            $data['foto']=$this->upload->file_name;
			$userBeforeUpdate = $this->AdminModel->getUser($id);
			$fotolama='./assets/images/user/'.$userBeforeUpdate->foto;
            $uploadsucces=true;
        }else{
        	$uploadsucces=false;
        }

		$where['id'] = $id;
		$update = $this->AdminModel->update('tb_user', $data, $where);
		if($update){
			if($uploadsucces) unlink($fotolama);
			$this->session->set_flashdata('success','Berhasil mengubah data diri pengajar');
			redirect(base_url('admin/datamaster/formPengajar/'.$id));
		}else{
			if($uploadsucces) unlink($data['foto']);
			$this->session->set_flashdata('error','Gagal mengubah data diri pengajar');
			redirect(base_url('admin/datamaster/formPengajar/'.$id));
		}
	}

	public function hapusPengajar($id){
		$where = array('id'=>$id);
		$delete = $this->AdminModel->delete('tb_user', $where);
		if($delete){
			$this->session->set_flashdata('success','Berhasil menghapus pengajar');
			redirect(base_url('admin/datamaster/pengajar'));
		}else{
			$this->session->set_flashdata('error','Gagal menghapus pengajar');
			redirect(base_url('admin/datamaster/pengajar'));
		}
	}

	// SISWA

	public function siswa()
	{
		$data['semuasiswa'] = $this->AdminModel->getAllUsers('siswa');
		$this->load->view('admin/view_siswa', $data);
	}

	public function tambahAkunSiswa()
	{
		$username = $this->input->post('username');
		$cek = $this->AdminModel->checkUser($username);
		if($cek->num_rows()){
			$this->session->set_flashdata('error','Username telah terdaftar.');
			redirect(base_url('admin/datamaster/siswa'));
		}else{
			$akun['role'] = "siswa";
			$akun['nama'] = $this->input->post('nama');
			$akun['email'] = $this->input->post('email');
			$akun['username'] = $username;
			$akun['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			$insert = $this->AdminModel->insert('tb_user', $akun);
			if($insert){
				$this->session->set_flashdata('success','Berhasil menambah siswa');
				redirect(base_url('admin/datamaster/siswa'));
			}else{
				$this->session->set_flashdata('error','Gagal menambah siswa');
				redirect(base_url('admin/datamaster/siswa'));
			}
		}
	}

	public function formSiswa($id)
	{
		$data['siswa'] = $this->AdminModel->getUser($id);
		$this->load->view('admin/view_form_siswa', $data);
	}

	public function simpanAkunSiswa()
	{
		$id = $this->input->post('id');
		$akun['email'] = $this->input->post('email');
		$akun['username'] = $this->input->post('username');
		//$akun['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		$where['id'] = $id;
		$update = $this->AdminModel->update('tb_user', $akun, $where);
		if($update){
			$this->session->set_flashdata('success','Berhasil mengubah akun siswa');
			redirect(base_url('admin/datamaster/formSiswa/'.$id));
		}else{
			$this->session->set_flashdata('error','Gagal mengubah akun siswa');
			redirect(base_url('admin/datamaster/formSiswa/'.$id));
		}
	}

	public function simpanDataDiriSiswa()
	{
		$id = $this->input->post('id');
		$data['nama'] = $this->input->post('nama');
		$data['tgl_lahir'] = date('Y-m-d', strtotime($this->input->post('tgl_lahir')));
		$data['jk'] = $this->input->post('jk');
		$data['alamat'] = $this->input->post('alamat');
		$data['no_hp'] = $this->input->post('no_hp');

		$config['upload_path']   = './assets/images/user/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = 5000;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')){
            $data['foto']=$this->upload->file_name;
			$userBeforeUpdate = $this->AdminModel->getUser($id);
			$fotolama='./assets/images/user/'.$userBeforeUpdate->foto;
            $uploadsucces=true;
        }else{
        	$uploadsucces=false;
        }

		$where['id'] = $id;
		$update = $this->AdminModel->update('tb_user', $data, $where);
		if($update){
			if($uploadsucces) unlink($fotolama);
			$this->session->set_flashdata('success','Berhasil mengubah data diri siswa');
			redirect(base_url('admin/datamaster/formSiswa/'.$id));
		}else{
			if($uploadsucces) unlink($data['foto']);
			$this->session->set_flashdata('error','Gagal mengubah data diri siswa');
			redirect(base_url('admin/datamaster/formSiswa/'.$id));
		}
	}

	public function hapusSiswa($id){
		$where = array('id'=>$id);
		$delete = $this->AdminModel->delete('tb_user', $where);
		if($delete){
			$this->session->set_flashdata('success','Berhasil menghapus siswa');
			redirect(base_url('admin/datamaster/siswa'));
		}else{
			$this->session->set_flashdata('error','Gagal menghapus siswa');
			redirect(base_url('admin/datamaster/siswa'));
		}
	}
}
