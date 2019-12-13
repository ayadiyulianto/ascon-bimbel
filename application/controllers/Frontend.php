<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function index()
	{
		$this->load->view('frontend/index');
	}

	public function kelas()
	{
		$this->load->view('frontend/semua_kelas');
	}
}
