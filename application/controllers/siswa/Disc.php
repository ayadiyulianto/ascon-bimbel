<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SiswaModel');
		$this->load->library('session');

		if ($this->session->userdata('role') != 'siswa' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect(base_url("auth"));
		}
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data['history'] = $this->SiswaModel->getDiscLastTest($id_user);
		$this->load->view('siswa/view_disc', $data);
	}

	public function test()
	{
		$data['soal'] = $this->SiswaModel->getDisc();
		$this->load->view('siswa/view_disc_test', $data);
	}

	public function simpan()
	{
		$soal = $this->SiswaModel->getDisc();
		$jumlah['dominance'] = 0;
		$jumlah['influence'] = 0;
		$jumlah['steadiness'] = 0;
		$jumlah['compliance'] = 0;
		foreach($soal->result() as $row){
			$dt['id_soal'] = $row->id;
			$discOrder = explode(',', $this->input->post('discOrder'.$row->id));
			for($i=0; $i<4; $i++){
				if ($discOrder[$i]=='d'.$row->id){
					$dt['urutan_d'] = 4-$i;
					$jumlah['dominance'] += $dt['urutan_d'];
				}elseif ($discOrder[$i]=='i'.$row->id) {
					$dt['urutan_i'] = 4-$i;
					$jumlah['influence'] += $dt['urutan_i'];
				}elseif ($discOrder[$i]=='s'.$row->id) {
					$dt['urutan_s'] = 4-$i;
					$jumlah['steadiness'] += $dt['urutan_s'];
				}elseif ($discOrder[$i]=='c'.$row->id) {
					$dt['urutan_c'] = 4-$i;
					$jumlah['compliance'] += $dt['urutan_c'];
				}
			}
			$data[] = $dt;
		}
		// print_r($data);
		$sesi['id_user'] = $this->session->userdata('id_user');
		$sesi['jumlah_d'] = $jumlah['dominance'];
		$sesi['jumlah_i'] = $jumlah['influence'];
		$sesi['jumlah_s'] = $jumlah['steadiness'];
		$sesi['jumlah_c'] = $jumlah['compliance'];
		$this->SiswaModel->insert('tb_disc_sesi', $sesi);
		$maxs = array_keys($jumlah, max($jumlah));
		redirect(base_url('siswa/disc/hasil/'.$maxs[0]));
	}

	public function hasil($max)
	{
		if ($max=='dominance') {
			$this->load->view('siswa/view_disc_dominance');
		}elseif ($max=='influence') {
			$this->load->view('siswa/view_disc_influence');
		}elseif ($max=='steadiness') {
			$this->load->view('siswa/view_disc_steadiness');
		}elseif ($max=='compliance') {
			$this->load->view('siswa/view_disc_compliance');
		}
	}

}
