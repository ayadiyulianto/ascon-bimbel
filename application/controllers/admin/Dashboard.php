<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AdminModel');

		if ($this->session->userdata('role') != 'Administrator' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}

	}
	
	function index()
	{
		$data['title'] = "Dashboard";
		$data['ringkasan'] = $this->AdminModel->getRingkasan();
		$data['userTerbaru'] = $this->MyModel->get('user', 'id_user, nama_user, waktu_post, foto', null,'waktu_post desc', 5);
		$this->load->view('admin/view_dashboard_new', $data);
	}

	function monitoring()
	{
		$data['title'] = "Dashboard - Monitoring";
		$data['ringkasan'] = $this->AdminModel->getRingkasan();
		$this->load->view('admin/view_monitoring', $data);
	}

}
