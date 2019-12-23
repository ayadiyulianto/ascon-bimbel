<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskusi extends CI_Controller {

	public function index()
	{
		$this->load->view('pengajar/header');
		$this->load->view('pengajar/diskusi');
		$this->load->view('pengajar/footer');
	}
}
