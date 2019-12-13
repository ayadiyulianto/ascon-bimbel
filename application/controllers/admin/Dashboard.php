<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('AdminModel');
		$this->load->library('session');

		if ($this->session->userdata('role') != 'admin' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}

	}
	
	public function index()
	{
		$this->load->view('admin/view_dashboard');
	}

}
