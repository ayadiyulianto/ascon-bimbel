<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster extends CI_Controller {

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

	public function kelas()
	{
		$this->load->view('admin/view_semuakelas');
	}

	public function tambahKelas()
	{
		
		$this->load->view('admin/view_semuakelas');
		$this->load->view('admin/footer');
	}

	public function pengajar()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/view_pengajar');
		$this->load->view('admin/footer');
	}

	public function siswa()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/view_siswa');
		$this->load->view('admin/footer');
	}
}
