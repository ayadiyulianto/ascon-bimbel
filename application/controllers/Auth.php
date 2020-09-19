<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ($this->session->userdata('oasse-bimbel') == FALSE) {
			checkCookie();
	    }
	}
	
	function index()
	{
		if ($this->session->userdata('oasse-bimbel') == TRUE) {
			$redirectTo = userdata('redirectTo');
			if (!empty($redirectTo)){
				$this->session->unset_userdata('redirectTo');
				redirect($redirectTo);
			} elseif ($this->session->userdata('role')=='Administrator'){
				redirect("admin/dashboard");
			} elseif ($this->session->userdata('role')=='Pengajar') {
				redirect("pengajar/dashboard");
			} elseif ($this->session->userdata('role')=='Siswa') {
				redirect("siswa/dashboard");
			} 
		} else {
			redirect('auth/login');
		}
	}

	function login()
	{
		if($this->session->userdata('oasse-bimbel') == TRUE){
			$this->index();
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() != FALSE) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$checkUser = $this->MyModel->get('user', 'id_user, role, password, nama_user, foto', array('email'=>$email));
			if($checkUser->num_rows()==1){
				$user = $checkUser->row();
				if (password_verify($password, $user->password)) {
					$session_data['oasse-bimbel'] = TRUE;
					$session_data['id_user'] = $user->id_user;
					$session_data['role'] = $user->role;
					$session_data['nama_user'] = $user->nama_user;
					$session_data['foto'] = $user->foto;
					// Add user data in session
					$this->session->set_userdata($session_data);
					$rememberme = $this->input->post('rememberme');
					// Add cookies
					if($rememberme=='Y'){
						$key = random_string('alnum', 60);
	                	$update = $this->MyModel->update('user', array('cookie_key'=>$key), array('id_user'=>$user->id_user));
	                	if($update){ 
	                		set_cookie('oassebimbel', $key, 3600*24*30);
	                	}
	                }

					$this->index();
				} else {
					notif('danger', 'Password kamu salah');
				}
			}else {
				notif('danger', 'Email kamu salah');
			}
		}
		$data['title'] = "Login";
		$this->load->view('frontend/view_login_new', $data);
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		delete_cookie('oassebimbel');
		redirect("auth");
	}

	function daftar()
	{
		if($this->session->userdata('oasse-bimbel') == TRUE){
			$this->index();
		}

		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('nama_user', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]');
		$this->form_validation->set_rules('confirmpassword', 'Ulangi Password', 'trim|required|xss_clean|matches[password]');

		if ($this->form_validation->run() != FALSE) {
			$email = $this->input->post('email');
			$cek_email = $this->MyModel->get('user', 'email', array('email'=>$email))->num_rows();
			if($cek_email>0){
				notif('danger','Email telah terdaftar.');
			}else{
				$akun['role'] = "Siswa";
				$akun['nama_user'] = $this->input->post('nama_user');
				$akun['email'] = $email;
				$akun['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				$akun['waktu_post'] = date('Y-m-d H:i:s');
				$insert=$this->MyModel->insert('user', $akun);
				if($insert){
					notif('success', 'Buat Akun Berhasil. Silahkan Login!');
					redirect("auth");
				}else{
					notif('danger', 'Buat Akun Gagal.');
				}
			}
		}
		$data['title'] = "Daftar";
		$this->load->view('frontend/view_daftar_new', $data);
	}

	function checkEmail()
	{
		$email = $this->input->post('email');
		$cek_email = $this->MyModel->get('user', 'email', array('email'=>$email))->num_rows();
		echo $cek_email;
	}

	function lupapassword()
	{
		if($this->session->userdata('oasse-bimbel') == TRUE){
			$this->index();
		}else{
			$email=$this->input->post('email');
			$result = $this->MyModel->get_where('tb_user',array('email'=>$email));
			if ($result->num_rows()==1) {
				notif('success','Perubahan password telah dikirim ke email anda. Silahkan periksa  kotak masuk email anda');
			} else {
				notif('danger','Email anda tidak terdaftar. Silahkan daftar baru!');
			}
			redirect("auth");
		}
	}

}
