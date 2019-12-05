<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

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
		$this->load->view('pengajar/header');
		$this->load->view('pengajar/modul');
		$this->load->view('pengajar/footer');
	}

	public function latihanSoal()
	{
		$this->load->view('pengajar/header');
		$this->load->view('pengajar/latihan_soal');
		$this->load->view('pengajar/footer');
	}

	public function materi()
	{
		$this->load->view('pengajar/header');
		$this->load->view('pengajar/materi');
		$this->load->view('pengajar/footer');
	}

	public function isiMateri()
	{
		$this->load->view('pengajar/header');
		$this->load->view('pengajar/isi_materi');
		$this->load->view('pengajar/footer');
	}
}
