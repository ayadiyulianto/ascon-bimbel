<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('SiswaModel');

		if (userdata('role') != 'Siswa' OR userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}

		if (empty(userdata('id_kelas'))) {
			redirect("siswa/dashboard");
		}
	}

	// INFO KELAS

	function index()
	{
		$id_kelas = userdata('id_kelas');
		$id_user = userdata('id_user');
		$data['title'] = "Detail Kelas ".userdata('nama_kelas');
		$data['about'] = $this->MyModel->get('view_kelas', '*', array('id_kelas'=>$id_kelas))->row();
		$data['progress'] = $this->SiswaModel->getProgress($id_kelas, $id_user);
		$data['last_id_konten'] = $this->SiswaModel->getLastKonten($id_kelas, $id_user);
		$data['modul'] = $this->MyModel->get('modul', 'id_modul, nama_modul', array('id_kelas'=>$id_kelas, 'is_aktif'=>'Y'), 'no_urut asc');
		$data['nilai'] = $this->SiswaModel->getNilai($id_kelas, $id_user);
		$data['diskusi_kelas'] = $this->MyModel->get('diskusi', 'COUNT(*) as total, MAX(waktu_post) as latest_post', array('id_kelas'=>$id_kelas, 'id_konten'=>"0"))->row();
		$data['diskusi_modul'] = $this->MyModel->getDiskusiModul($id_kelas);
		$data['pengumuman'] = $this->MyModel->get('view_pengumuman', '*', array('id_kelas'=>$id_kelas, 'status'=>'Y'), 'waktu_post desc');
		$this->load->view('siswa/view_kelas_detail_new', $data);
	}

	// BELAJAR

	function belajar($id_konten=NULL)
	{
		$id_user = userdata('id_user');
		$id_kelas = userdata('id_kelas');

		if($id_konten==NULL){
			$id_konten = $this->SiswaModel->getDefaultKontenByKelas($id_kelas);
		}else{
			$cek_konten = $this->SiswaModel->cekKonten($id_konten, $id_kelas);
			if($cek_konten==0){
				redirect('siswa/kelas/belajar');
			}
		}

		$prev_id = $this->SiswaModel->getPrevKonten($id_konten, $id_kelas);
		$next_id = $this->SiswaModel->getNextKonten($id_konten, $id_kelas);

		if(!empty($prev_id)){
			$prev_button = '<a href="'.base_url('siswa/kelas/belajar/'.$prev_id).'" class="btn btn-sm btn-white mg-r-10" id="btn-prev"><i data-feather="arrow-left"></i><span class="d-none d-md-inline mg-l-5"> Sebelumnya</span></a>';
			$prev_finished = $this->MyModel->get('konten_siswa', 'is_finished', array('id_konten'=>$prev_id, 'id_user_siswa'=>$id_user))->row()->is_finished;
			if($prev_finished!='Y'){
				$last_id_konten = $this->SiswaModel->getLastKonten($id_kelas, $id_user);
				notif('warning', 'Maaf halaman tidak dapat dimuat, kamu harus menyelesaikan materi terdahulu sebelum mengakses materi selanjutnya', 'Peringatan');
				redirect('siswa/kelas/belajar/'.$last_id_konten);
			}
		}else{
			$prev_button = '';
		}
		$next_button = !empty($next_id) ? '<a href="'.base_url('siswa/kelas/belajar/'.$next_id).'" class="btn btn-sm btn-white" id="btn-next" disabled><span class="d-none d-md-inline mg-l-5">Selanjutnya </span><i data-feather="arrow-right"></i></a>':'';

		$konten = $this->SiswaModel->getFullKonten($id_konten, $id_user);
		if(empty($konten->id)){
			$this->historybelajar($id_konten);
			$konten = $this->SiswaModel->getFullKonten($id_konten, $id_user);
		}
		
		$data['title'] = "Belajar";
		$data['modul'] = $this->MyModel->get('modul', 'id_modul, nama_modul', array('id_kelas'=>$id_kelas, 'is_aktif'=>'Y'), 'no_urut asc');
		$data['konten'] = $konten;
		$data['prev_button'] = $prev_button;
		$data['next_button'] = $next_button;
		$this->load->view('siswa/view_belajar_new', $data);
	}

	function historybelajar($id_konten)
	{
		$data['id_konten'] = $id_konten;
		$data['id_user_siswa'] = userdata('id_user');
		$data['is_finished'] = 'N';
		$data['waktu_mulai'] = date('Y-m-d H:i:s');
		$this->MyModel->insert('konten_siswa', $data);
	}

	function tandaiSelesai()
	{
		$where = array('id_konten'=>$this->input->post('id_konten'), 'id_user_siswa'=>userdata('id_user'));
		$data = array('is_finished'=>'Y', 'waktu_selesai'=>date('Y-m-d H:i:s'));
		$this->MyModel->update('konten_siswa', $data, $where);
	}

	function simpanCatatan()
	{
		$where = array('id_konten'=>$this->input->post('id_konten'), 'id_user_siswa'=>userdata('id_user'));
		$data = array('catatan_siswa'=>$this->input->post('catatan_siswa'));
		$update = $this->MyModel->update('konten_siswa', $data, $where);
		if($update){
			$result['status'] = 'success';
			$result['message']= 'Berhasil menyimpan catatan';
		}else{
			$result['status'] = 'error';
			$result['message']= 'Gagal menyimpan catatan';
		}
		echo json_encode($result);
	}

	// LATIHAN

	function latihan($id_konten)
	{
		$id_sesi_latihan = userdata('id_sesi_latihan');
		if(empty($id_sesi_latihan)) {
			$id_siswa = userdata('id_user');
			$check = $this->MyModel->get('sesi_latihan', 'id, waktu_mulai', array('id_konten'=>$id_konten, 'id_user_siswa'=>$id_siswa, 'status'=>'Belum'));
			if($check->num_rows()>0){
				$id_sesi_latihan = $check->row()->id;
				$waktu_mulai = $check->row()->waktu_mulai;
				$sesi_latihan = array('id_konten'=>$id_konten, 'id_sesi_latihan'=>$id_sesi_latihan, 'waktu_mulai'=>$waktu_mulai);
			}else{
				$sesi_latihan = $this->SiswaModel->sesiLatihan($id_konten, $id_siswa);
			}
			$this->session->set_userdata($sesi_latihan);
		}
		redirect('siswa/kelas/soal');
	}

	function soal($nomor=1)
	{
		$id_sesi_latihan = userdata('id_sesi_latihan');
		if(empty($id_sesi_latihan)) {
			redirect('siswa/kelas/latihan');
		}

		$this->form_validation->set_rules('jawaban[]', 'Jawaban', 'trim|required');
		if ($this->form_validation->run() != false) {
			$answer['jawaban'] = json_encode($this->input->post('jawaban'));
			$answer['status'] = 'sudah';
			$update = $this->MyModel->update('sesi_soal', $answer, array('id'=>$this->input->post('id')));
			if($update){
				redirect('siswa/kelas/soal/'.$this->input->post('next'));
			}
		}

		$id_konten = userdata('id_konten');
		$listnomorsoal = $this->MyModel->get('sesi_soal', 'id_soal, status', array('id_sesi_latihan'=>$id_sesi_latihan), 'id')->result_array();
		$id_soal = $listnomorsoal[$nomor-1]['id_soal'];
		$jawaban = $this->MyModel->get('soal_jawaban', '*', array('id_soal'=>$id_soal))->result_array();
		// shuffle($jawaban); // uncomment to suffle jawaban

		$data['title'] = "Latihan";
		$data['nomor'] = $nomor;
		$data['waktu_mulai'] = userdata('waktu_mulai');
		$data['listnomorsoal'] = $listnomorsoal;
		$data['soal'] = $this->SiswaModel->getSoalById($id_sesi_latihan, $id_soal);
		$data['jawaban'] = $jawaban;
		$data['konten'] = $this->MyModel->get('modul_konten', 'judul_konten, durasi_belajar, latihan_jumlah_soal, latihan_passing_grade, latihan_has_timer', array('id_konten'=>$id_konten))->row();
		$this->load->view('siswa/view_latihan_new', $data);
	}

	function sesiSelesai(){
		$id_sesi_latihan = userdata('id_sesi_latihan');
		$id_konten = userdata('id_konten');
		$passing_grade = $this->MyModel->get('modul_konten', 'latihan_passing_grade', array('id_konten'=>$id_konten))->row()->latihan_passing_grade;

		$soal = $this->MyModel->get('sesi_soal', 'id, id_soal, jawaban', array('id_sesi_latihan'=>$id_sesi_latihan));
		$jumlah_soal = $soal->num_rows();
		$jumlah_benar = 0;
		foreach($soal->result() as $row){
			$id_jawaban = $this->MyModel->get('soal_jawaban', 'id_jawaban', array('id_soal'=>$row->id_soal, 'is_benar'=>'Y'))->result_array();
			$jawaban_benar = array_column($id_jawaban, 'id_jawaban');
			$jawaban_siswa = json_decode($row->jawaban, true);
			sort($jawaban_benar); sort($jawaban_siswa); // sort for multiple answer checking
			if($jawaban_benar==$jawaban_siswa){
				$jumlah_benar++;
				$status = 'benar';
			} else{
				$status = 'salah';
			}
			$updateSesiSoal[] = array('id'=> $row->id, 'status'=>$status);
		}
		$this->MyModel->update_batch('sesi_soal', $updateSesiSoal, 'id');

		$nilai = round(($jumlah_benar/$jumlah_soal)*100);
		if($nilai>=$passing_grade){
			$status = "Berhasil";
			$is_finished = 'Y';
		}else{
			$status = "Gagal";
			$is_finished = 'N';
		}

		$data['status'] = $status;
		$data['nilai'] = $nilai;
		$data['passing_grade'] = $passing_grade;
		$data['waktu_selesai'] = date('Y-m-d H:i:s');
		$this->MyModel->update('sesi_latihan', $data, array('id'=>$id_sesi_latihan));

		$where = array('id_konten'=>$id_konten, 'id_user_siswa'=>userdata('id_user'));
		$konten_siswa = $this->MyModel->get('konten_siswa', '*', $where)->row();
		if($konten_siswa->status!="Berhasil" || $konten_siswa->nilai<$nilai){
			$dataKontenSiswa['is_finished'] = $is_finished;
			$dataKontenSiswa['status'] = $status;
			$dataKontenSiswa['nilai'] = $nilai;
			$dataKontenSiswa['waktu_selesai'] = date('Y-m-d H:i:s');
			$this->MyModel->update('konten_siswa', $dataKontenSiswa, $where);
		}

		$this->session->unset_userdata(array('id_sesi_latihan', 'waktu_mulai', 'id_konten'));
		redirect('siswa/kelas/belajar/'.$id_konten);
	}

	function bahas($id_sesi_latihan)
	{
		$id_sesi_latihan_bahas = userdata('id_sesi_latihan_bahas');
		if(empty($id_sesi_latihan_bahas)) {
			$this->session->set_userdata('id_sesi_latihan_bahas', $id_sesi_latihan);
			$id_konten = $this->MyModel->get('sesi_latihan', 'id_konten', array('id'=>$id_sesi_latihan))->row()->id_konten;
			$this->session->set_userdata('id_konten', $id_konten);
		}
		redirect('siswa/kelas/bahassoal');
	}

	function bahassoal($nomor=1)
	{
		$id_sesi_latihan = userdata('id_sesi_latihan_bahas');
		if(empty($id_sesi_latihan)) {
			redirect('siswa/kelas/bahassoal');
		}

		$id_konten = userdata('id_konten');
		$listnomorsoal = $this->MyModel->get('sesi_soal', 'id_soal, status', array('id_sesi_latihan'=>$id_sesi_latihan))->result_array();
		$id_soal = $listnomorsoal[$nomor-1]['id_soal'];
		$jawaban = $this->MyModel->get('soal_jawaban', '*', array('id_soal'=>$id_soal))->result_array();
		shuffle($jawaban);

		$data['title'] = "Latihan";
		$data['nomor'] = $nomor;
		$data['listnomorsoal'] = $listnomorsoal;
		$data['soal'] = $this->SiswaModel->getSoalPembahasanById($id_sesi_latihan, $id_soal);
		$data['jawaban'] = $jawaban;
		$data['konten'] = $this->MyModel->get('modul_konten', 'judul_konten, durasi_belajar, latihan_jumlah_soal, latihan_passing_grade, latihan_has_timer', array('id_konten'=>$id_konten))->row();
		$this->load->view('siswa/view_latihan_bahas_new', $data);
	}

	// TUGAS

	function simpanTugas()
	{
		$data['id_konten'] = $this->input->post('id_konten');
		$data['jawaban'] = $this->input->post('jawaban');
		$data['id_user_siswa'] = userdata('id_user');
		$data['waktu_post'] = date('Y-m-d H:i:s');
		$data['status'] = "Menunggu Koreksi";
		$insert = $this->MyModel->insert('sesi_tugas', $data);
		if($insert){
			$id = $this->MyModel->get('sesi_tugas', 'id', $data)->row()->id;
			$result['status'] = 'success';
			$result['message']= 'Berhasil mengirim jawaban';
			$result['html']	= '<tr>
                          <td>'.tgl_indo($data['waktu_post'], 'l, j F Y H:i').'</td>
                          <td>0</td>
                          <td>Menunggu Koreksi</td>
                          <td><button type="button" data-id="'.$id.'" class="btn btn-xs btn-white btn-detail-tugas">Detail</button></td>
                        </tr>';
		}else{
			$result['status'] = 'error';
			$result['message']= 'Gagal mengirim jawaban';
		}
		echo json_encode($result);
	}

	function getTugas()
	{
		$id = $this->input->post('id');
		$tugas = $this->SiswaModel->getTugas($id);
		$result['nilai'] = $tugas->nilai;
		$result['status'] = $tugas->status;
		$result['reviewer'] = ($tugas->reviewer!='') ? $tugas->reviewer:'-';
		$result['waktu'] = ($tugas->waktu_review!='0000-00-00 00:00:00') ? tgl_indo($tugas->waktu_review):'-';
		$result['id'] = $tugas->id;
		$result['jawaban'] = $tugas->jawaban;
		echo json_encode($result);
	}

}