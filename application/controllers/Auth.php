<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('MyModel');
		$this->load->library('password');
	}
	
	public function index() {
		if ($this->session->userdata('oasse-bimbel') == TRUE) {
			if ($this->session->userdata('role')=='admin'){
				redirect("admin/dashboard");
			} elseif ($this->session->userdata('role')=='pengajar') {
				redirect("pengajar/kelas");
			} elseif ($this->session->userdata('role')=='peserta') {
				redirect("peserta/kelassaya");
			} 
		} else {
			$this->login();
		}
	}

	public function login() {
		header("Access-Control-Allow-Origin: *");
		if($this->session->userdata('printing') == TRUE){
			$this->index();
		}else{
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('login');
			} else {
				$where = array(
					'username' => $this->input->post('username')
				);
				$result = $this->MyModel->get_where('tb_user',$where)->row();
				if (password_verify($this->input->post('password'), $result->password)) {
					$session_data['oasse-bimbel'] = TRUE;
					$session_data['username'] = $result->row()->username;
					$session_data['nama'] = $result->row()->nama;
					$session_data['role'] = $result->row()->role;
					// Add user data in session
					$this->session->set_userdata($session_data);
					$this->index();
				} else {
					$this->session->set_flashdata('error','Username atau Password Salah');
					$this->load->view('login');
				}
			}
		}
		
	}
	
	// Logout from admin page
	public function logout() {
		$this->session->sess_destroy();
		redirect("printing/auth");
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
				$cek = $this->MyModel->get_where('tb_user', array('username'=>$this->input->post('username')));
				if($cek->num_rows()==1){
					$this->session->set_flashdata('error','Username telah terdaftar.');
				}else{
					$akun['id_user'] = 'P00001';
					$akun['email'] = $this->input->post('email');
					$akun['username'] = $this->input->post('username');
					$akun['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$akun['role'] = "peserta";

					$insert=$this->MyModel->insert('tb_user',$akun);
					if($insert){
						$this->session->set_flashdata('info','Pendaftaran Berhasil. Silahkan Login!');
						redirect('auth');
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
		if($this->session->userdata('logged_in') == TRUE){
			$this->index();
		}else{
			$email=$this->input->post('email');
			$result = $this->MyModel->get_where('printing_tb_biodata_penghuni',array('email'=>$email));
			if ($result->num_rows()==1) {
				$this->session->set_flashdata('info','Perubahan password telah dikirim ke email anda. Silahkan periksa  kotak masuk email anda');
			} else {
				$this->session->set_flashdata('error','Email anda tidak terdaftar. Silahkan daftar baru!');
			}
			$this->login();
		}
	}


}
