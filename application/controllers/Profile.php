<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('SiswaModel');
		$this->load->model('PengajarModel');

		if(userdata('oasse-bimbel')==FALSE){
			$this->session->set_userdata('redirectTo', uri_string());
			redirect("auth");
		}
	}

	function index()
	{
		$id_user = userdata('id_user');
		$where = array('id_user'=>$id_user);
		$this->form_validation->set_rules('nama_user', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run() != false) {
        	$dt['nama_user'] = $this->input->post('nama_user');
        	$dt['email'] = $this->input->post('email');
        	$dt['tgl_lahir'] = $this->input->post('tgl_lahir');
        	$dt['jk'] = $this->input->post('jk');
        	$dt['pekerjaan'] = $this->input->post('pekerjaan');
        	$dt['bio'] = $this->input->post('bio');
        	$dt['alamat'] = $this->input->post('alamat');
        	$dt['no_hp'] = $this->input->post('no_hp');
        	$update = $this->MyModel->update('user', $dt, $where);
        	if($update){
        		notif('success', 'Berhasil mengubah profil');
        	}else{
        		notif('error', 'Gagal mengubah profil');
        	}
        }
		$data['title'] = 'Profile Saya';
		$data['user'] = $this->MyModel->get('user', '*', $where)->row();
		$data['riwayat_belajar'] = $this->SiswaModel->getKelasSaya($id_user);
		$data['riwayat_mengajar'] = $this->PengajarModel->getKelasSaya($id_user);
		$this->load->view('frontend/view_profile', $data);
	}

	function getAktivitas()
	{
		$id_kelas = $this->input->post('id_kelas');
		$id_user = $this->input->post('id_user');
		$offset = $this->input->post('offset');
		if(!empty($id_kelas)) $where['id_kelas'] = $id_kelas;
		$where['id_user'] = $id_user;
		$date = $this->MyModel->get('log_aktivitas', 'DATE(waktu_post) as date', $where, 'waktu_post desc', 10, $offset, 'date');
		$html = '';
		foreach($date->result() as $row){
			$html .= '<div class="timeline-label">'.tgl_indo($row->date).'</div>';
			$where['DATE(waktu_post)'] = $row->date;
			$data = $this->MyModel->get('log_aktivitas', '*', $where, 'waktu_post desc', 10, $offset);
			foreach($data->result() as $dt){
				$html .= '<div class="timeline-item">
							<div class="timeline-time">'.tgl_indo($dt->waktu_post, 'H:i').'</div>
							<div class="timeline-body pos-relative">
								<h6 class="mg-b-0">'.$dt->title.'</h6>
								<p>'.$dt->subtitle.'<a class="stretched-link" href="'.base_url().$dt->url_string.'"></a></p>
							</div>
						</div>';
			}
		}
        echo $html;
	}

	function ubahPassword()
	{
		$id_user_ubah = decrypt($this->input->post('id_user_ubah'));
		$access_password = $this->MyModel->get('user', 'password', array('id_user'=>userdata('id_user')))->row()->password;
		if (password_verify($this->input->post('password_saat_ini'), $access_password)) {
			notif('success', 'Ubah password berhasil!');
			$data['password'] = password_hash($this->input->post('password_baru'), PASSWORD_BCRYPT);
			$where = array('id_user'=>$id_user_ubah);
			$update = $this->MyModel->update('user', $data, $where);
			if($update){
				notif('success', 'Berhasil mengubah password');
			}else{
				notif('danger', 'Terjadi kesalahan saat upload');
			}
		}else{
			notif('danger', 'Konfirmasi password kamu saat ini salah. Coba lagi!');
		}
		redirect($this->input->post('redirect'));
	}

	function jadiPengajar()
	{
		$update = $this->MyModel->update('user', array('role'=>'Pengajar'), array('id_user'=>userdata('id_user')));
		if($update){
			$this->session->set_userdata('role', 'Pengajar');
			redirect('pengajar/dashboard');
		}else{
			redirect('siswa/dashboard');
		}
	}

	function jadiSiswa()
	{
		$update = $this->MyModel->update('user', array('role'=>'Siswa'), array('id_user'=>userdata('id_user')));
		if($update){
			$this->session->set_userdata('role', 'Siswa');
			redirect('siswa/dashboard');
		}else{
			redirect('pengajar/dashboard');
		}
	}

	function notifikasi()
	{
		return 0;
	}

	function pengaturan()
	{
		return 0;
	}
}
