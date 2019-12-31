<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihansoal extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('SiswaModel');
		$this->load->library('session');

		if ($this->session->userdata('role') != 'siswa' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect(base_url("auth"));
		}

		if (!$this->session->has_userdata('id_kelas')) {
			redirect(base_url("siswa/kelassaya"));
		}
	}

	public function index()
	{
		$id_sesi_latihan = $this->session->userdata('id_sesi_latihan');
		if(!empty($id_sesi_latihan)){
			redirect(base_url('siswa/latihansoal/soal'));
		}
		$id_siswa = $this->session->userdata('id_user');
		$id_kelas = $this->session->userdata('id_kelas');
		$data['semuamodul'] = $this->SiswaModel->getModulSoalByKelas($id_siswa, $id_kelas);
		$this->load->view('siswa/view_latihan_soal', $data);
	}
	
	public function latihan($id_modul=NULL)
	{
		if($id_modul==NULL){
			redirect(base_url('siswa/latihansoal'));
		}

		$id_sesi_latihan = $this->session->userdata('id_sesi_latihan');
		if(!empty($id_sesi_latihan)){
			redirect(base_url('siswa/latihansoal/soal'));
		}

		$id_siswa = $this->session->userdata('id_user');
		$this->SiswaModel->mulaiModul($id_siswa, $id_modul);

		$id_siswa = $this->session->userdata('id_user');
		$id_sesi = $this->SiswaModel->sesiSoal($id_modul, $id_siswa);
		$this->session->set_userdata('id_sesi_latihan', $id_sesi);
		redirect(base_url('siswa/latihansoal/soal'));
	}

	public function soal($nomor=1){
		$id_sesi_latihan = $this->session->userdata('id_sesi_latihan');
		if(empty($id_sesi_latihan)){
			redirect(base_url('siswa/latihansoal'));
		}

		$data['nomor'] = $nomor;
		$id_sesi_latihan = $this->session->userdata('id_sesi_latihan');
		$data['tgl_mulai'] = $this->SiswaModel->getTglMulai($id_sesi_latihan);
		$listnomorsoal = $this->SiswaModel->getNomorSoal($id_sesi_latihan)->result_array();
		$data['listnomorsoal'] = $listnomorsoal;
		$id_soal = $listnomorsoal[$nomor-1]['id_soal'];
		$data['soal'] = $this->SiswaModel->getSoalById($id_soal);
		$jawaban = $this->SiswaModel->getJawabanByIdSoal($id_soal);
		shuffle($jawaban);
		$data['jawaban'] = $jawaban;
		$this->load->view('siswa/view_soal', $data);
	}

	public function simpanJawaban($nomor){
		$where['id'] = $this->input->post('id_sesi_soal');
		$data['jawaban'] = $this->input->post('jawaban');
		$data['status'] = 'sudah';
		$this->SiswaModel->update('tb_sesi_soal', $data, $where);

		$id_sesi_latihan = $this->session->userdata('id_sesi_latihan');
		$maks = $this->SiswaModel->getNomorSoal($id_sesi_latihan)->num_rows();
		if($maks<=$nomor){
			redirect(base_url('siswa/latihansoal/soal/'.$nomor));
		} else{
			redirect(base_url('siswa/latihansoal/soal/'.($nomor+1)));
		}
	}

	public function sesiSelesai(){
		$tgl_selesai = date('Y-m-d H:i:s');
		$id_sesi_latihan = $this->session->userdata('id_sesi_latihan');
		$sesi_latihan = $this->SiswaModel->getSesiLatihan($id_sesi_latihan);
		$passing_grade = $this->SiswaModel->getPassingGrade($sesi_latihan->id_modul);

		$soaldanjawaban = $this->SiswaModel->getSoalDanJawaban($id_sesi_latihan);
		$jumlah_soal = $soaldanjawaban->num_rows();
		$jumlah_benar = 0;
		foreach($soaldanjawaban->result() as $row){
			if($row->benar_1 == $row->jawaban){
				$jumlah_benar++;
				$statusBenarSalah = 'benar';
			} else{
				$statusBenarSalah = 'salah';
			}
			$updateSesiSoal[] = array('id'=> $row->id_sesi_soal, 'status'=>$statusBenarSalah);
		}
		$this->SiswaModel->updateSesiSoal($updateSesiSoal);

		$nilai = round($jumlah_benar/$jumlah_soal) * 100;
		if($nilai>=$passing_grade){
			$status = "Berhasil";
		}else{
			$status = "Gagal";
		}

		$where['id'] = $id_sesi_latihan;
		$data['status'] = $status;
		$data['nilai'] = $nilai;
		$data['tgl_selesai'] = $tgl_selesai;
		$data['passing_grade'] = $passing_grade;
		$this->SiswaModel->update('tb_sesi_latihan', $data, $where);

		$whereModulSiswa['id_modul'] = $sesi_latihan->id_modul;
		$whereModulSiswa['id_user_siswa'] = $sesi_latihan->id_user_siswa;
		$modulSiswa = $this->SiswaModel->getWhere('tb_modul_siswa', $where)->row();
		if($modulSiswa->status_latihan!="Berhasil" || $modulSiswa->nilai<$nilai){
			$dataModulSiswa['status_latihan'] = $status;
			$dataModulSiswa['nilai'] = $nilai;
			$dataModulSiswa['tgl_pengerjaan'] = $sesi_latihan->tgl_mulai;
		}
		$dataModulSiswa['id_sesi_latihan_terakhir'] = $sesi_latihan->id;
		$this->SiswaModel->update('tb_modul_siswa', $dataModulSiswa, $whereModulSiswa);

		$this->session->unset_userdata('id_sesi_latihan');
		redirect(base_url('siswa/latihansoal'));
	}

	public function bahas($id_sesi_latihan, $nomor=1)
	{
		$data['id_sesi_latihan'] = $id_sesi_latihan;
		$data['nomor'] = $nomor;
		$listnomorsoal = $this->SiswaModel->getNomorSoal($id_sesi_latihan)->result_array();
		$data['listnomorsoal'] = $listnomorsoal;
		$id_soal = $listnomorsoal[$nomor-1]['id_soal'];
		$data['id_soal'] = $id_soal;
		$data['soal'] = $this->SiswaModel->getSoalPembahasanById($id_soal);
		$data['jawaban'] = $this->SiswaModel->getJawabanByIdSoal($id_soal);
		$this->load->view('siswa/view_pembahasan', $data);
	}
}