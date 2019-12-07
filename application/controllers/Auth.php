<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('AuthModel');
	}
	
	public function index() {
		if ($this->session->userdata('oasse-bimbel') == TRUE) {
			if ($this->session->userdata('role')=='admin'){
				redirect(base_url("admin/dashboard"));
			} elseif ($this->session->userdata('role')=='pengajar') {
				redirect(base_url("pengajar/kelas"));
			} elseif ($this->session->userdata('role')=='peserta') {
				redirect(base_url("peserta/kelassaya"));
			} 
		} else {
			$this->login();
		}
	}

	public function login() {
		header("Access-Control-Allow-Origin: *");
		if($this->session->userdata('oasse-bimbel') == TRUE){
			$this->index();
		}else{
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('login');
			} else {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$checkUser = $this->AuthModel->checkUser($username);
				if($checkUser->num_rows()==1){
					$user =  $checkUser->row();
					if (password_verify($password, $user->password)) {
						$session_data['oasse-bimbel'] = TRUE;
						$session_data['username'] = $user->username;
						$session_data['nama'] = $user->nama;
						$session_data['role'] = $user->role;
						// Add user data in session
						$this->session->set_userdata($session_data);
						$this->index();
					} else {
						$this->session->set_flashdata('error','Password Salah');
						$this->load->view('login');
					}
				}else {
					$this->session->set_flashdata('error','Username Salah');
					$this->load->view('login');
				}
			}
		}
		
	}
	
	// Logout from admin page
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url("auth"));
	}

	public function daftar()
	{
		header("Access-Control-Allow-Origin: *");
		if($this->session->userdata('oasse-bimbel') == TRUE){
			$this->index();
		}else{
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]');
			$this->form_validation->set_rules('ulangipassword', 'Ulangi Password', 'trim|required|xss_clean|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('register');
			} else {
				$cek = $this->AuthModel->checkUser($this->input->post('username'));
				if($cek->num_rows()){
					$this->session->set_flashdata('error','Username telah terdaftar.');
				}else{
					$lastId = $this->AuthModel->getLastId();
					$akun['id_user'] = ++$lastId;
					$akun['email'] = $this->input->post('email');
					$akun['username'] = $this->input->post('username');
					$akun['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$akun['role'] = "peserta";
					$insert=$this->AuthModel->createNewUser($akun);
					if($insert){
						$this->session->set_flashdata('info','Pendaftaran Berhasil. Silahkan Login!');
						redirect(base_url('auth'));
					}else{
						$this->session->set_flashdata('error','Gagal Input Data');
						$this->load->view('register');
					}
				}
			}
		}
	}

	public function lupapassword() {
		header("Access-Control-Allow-Origin: *");
		if($this->session->userdata('oasse-bimbel') == TRUE){
			$this->index();
		}else{
			$email=$this->input->post('email');
			$result = $this->AuthModel->get_where('tb_user',array('email'=>$email));
			if ($result->num_rows()==1) {
				$this->session->set_flashdata('info','Perubahan password telah dikirim ke email anda. Silahkan periksa  kotak masuk email anda');
			} else {
				$this->session->set_flashdata('error','Email anda tidak terdaftar. Silahkan daftar baru!');
			}
			$this->login();
		}
	}


}
