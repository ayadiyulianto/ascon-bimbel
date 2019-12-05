<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LatihanSoal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('peserta/header');
		$this->load->view('peserta/view_latihansoal');
		$this->load->view('peserta/footer');
	}
	
	public function latihan()
	{
		$this->load->view('peserta/header');
		$this->load->view('peserta/view_soal');
		$this->load->view('peserta/footer');
	}

	public function bahas()
	{
		$this->load->view('peserta/header');
		$this->load->view('peserta/view_pembahasan');
		$this->load->view('peserta/footer');
	}
}
