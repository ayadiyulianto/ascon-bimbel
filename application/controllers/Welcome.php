<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		if(userdata('oasse-bimbel')==FALSE){
			checkCookie();
		}
	}

	function index()
	{
		$data['title'] = 'Halaman Utama';
		$data['kelas_populer'] = $this->MyModel->getKelasPopuler(5);
		$data['kelas_terbaru'] = $this->MyModel->get('view_kelas','id_kelas, nama_kelas, slug, foto, harga, diskon, is_buka_pendaftaran', array('is_aktif'=>'Y'), 'waktu_post desc', 5);
		$data['semuakelas'] = $this->MyModel->getSemuaKelas();
		$id_user = userdata('id_user');
		if(!empty($id_user)){
			$kelas = $this->MyModel->get('view_siswa', 'id_kelas', array('id_user'=>$id_user));
			$data['id_kelas_saya'] = array_column($kelas->result_array(), 'id_kelas');
		}
		$this->load->view('frontend/view_index', $data);
	}

	function kategori($slug)
	{
		$sortby = $this->input->get('sortby');
		$kategori = $this->MyModel->get('kategori', '*', array('slug'=>$slug))->row();

		$data['title'] = 'Kelas '.$kategori->nama_kategori;
		$data['kategori'] = $kategori;
		$data['kelas_populer'] = $this->MyModel->getKelasPopuler(5, $kategori->id_kategori);

		$clue = array('id_kategori'=>$kategori->id_kategori);
		$data['semuakelas'] = $this->MyModel->searchKelas($sortby, $clue);

		$id_user = userdata('id_user');
		if(!empty($id_user)){
			$kelas = $this->MyModel->get('view_siswa', 'id_kelas', array('id_user'=>$id_user));
			$data['id_kelas_saya'] = array_column($kelas->result_array(), 'id_kelas');
		}
		$this->load->view('frontend/view_kategori_kelas', $data);
	}

	function carikelas()
	{
		$pageSize = 12;
		$sortby = $this->input->get('sortby');
		$keyword = $this->input->get('keyword');
		$page = $this->input->get('page');
		if(empty($page)) $page = 1;

		$data['title'] = 'Cari Kelas';
		$data['total_result'] = $this->db->select('COUNT(*) as count')->like('nama_kelas', $keyword)->get('view_kelas')->row()->count;
		$data['pages'] = ceil($data['total_result']/$pageSize);
		$data['page'] = $page;

		$clue = array('keyword'=>$keyword, 'limit'=>$pageSize, 'offset'=>($page-1)*$pageSize);
		$data['kelas'] = $this->MyModel->searchKelas($sortby, $clue);

		$id_user = userdata('id_user');
		if(!empty($id_user)){
			$kelas = $this->MyModel->get('view_siswa', 'id_kelas', array('id_user'=>$id_user));
			$data['id_kelas_saya'] = array_column($kelas->result_array(), 'id_kelas');
		}
		$this->load->view('frontend/view_cari_kelas', $data);
	}

	function kelas($slug)
	{
		$kelas = $this->MyModel->getKelasFull($slug);
		$data['title'] = 'Kelas '.$kelas->nama_kelas;
		$data['kelas'] = $kelas;
		$data['pengajar'] = $this->MyModel->get('view_pengajar', '*', array('id_kelas'=>$kelas->id_kelas, 'has_access'=>'Y'))->result_array();
		$data['modul'] = $this->MyModel->get('modul', 'id_modul, nama_modul, deskripsi_singkat', array('id_kelas'=>$kelas->id_kelas, 'is_aktif'=>'Y'), 'no_urut asc');
		$data['rating'] = $this->MyModel->getRatingKelas($kelas->id_kelas);
		$data['review'] = $this->MyModel->get('review', 'rating, COUNT(*) as jumlah', array('id_kelas'=>$kelas->id_kelas), 'rating desc', null, null, 'rating');
		$data['kelas_populer'] = $this->MyModel->getKelasPopuler(5, $kelas->id_kategori);
		$id_user = userdata('id_user');
		if(!empty($id_user)){
			$kelas_saya = $this->MyModel->get('view_siswa', 'id_kelas', array('id_user'=>$id_user));
			$data['id_kelas_saya'] = array_column($kelas_saya->result_array(), 'id_kelas');
			$data['rating_saya'] = $this->MyModel->get('review', 'id_review, rating, review', array('id_kelas'=>$kelas->id_kelas, 'id_user'=>$id_user))->row();
		}
		$this->load->view('frontend/view_kelas', $data);
	}
	
	function pengumuman($id_pengumuman)
	{
		$pengumuman = $this->MyModel->get('view_pengumuman', '*', array('id_pengumuman'=>$id_pengumuman))->row();
		$data['title'] = 'Pengumuman - '.$pengumuman->judul;
		$data['pengumuman'] = $pengumuman;
		$this->load->view('frontend/view_pengumuman', $data);
	}

	function getDiskusi($status='Y')
	{
		$id_kelas = $this->input->post('id_kelas');
		$id_modul = $this->input->post('id_modul');
		$id_konten= $this->input->post('id_konten');
		$offset = $this->input->post('offset');
		$sort_by = $this->input->post('sort_by');
		$keyword = $this->input->post('keyword');
		$where['id_kelas'] = $id_kelas;
		if($status=='Y'){
			$where['status'] = $status;
		}
		if(isset($id_modul)){
		    $where['id_modul'] = !empty($id_modul) ? $id_modul:NULL;
		}
		if(!empty($id_konten)){
			$where['id_konten'] = $id_konten;
		}
		$data = $this->MyModel->get('view_diskusi', '*', $where, 'waktu_post '.$sort_by, 10, $offset, null, 'judul', $keyword);
		$html = '';
		foreach($data->result() as $row){
			$hidden = $row->status=='Y' ? '':'<br>(diskusi ini disembunyikan dari publik)';
			// show first paragraph
			preg_match("/<p ?.*>(.*)<\/p>/", $row->isi, $isi);
			$html .= '<div class="card-body pd-20 pd-lg-25 position-relative bd-b">
                  <div class="media align-items-center mg-b-20">
                    <div class="avatar"><img src="'.avatar($row->foto).'" class="rounded-circle" alt=""></div>
                    <div class="media-body pd-l-15">
                      <h6 class="mg-b-3">'.$row->nama_user.'</h6>
                      <span class="d-block tx-13 tx-color-03">'.$row->role.'</span>
                    </div>
                    <span class="tx-12 tx-color-03 align-self-start text-right">'.tgl($row->waktu_post).$hidden.'</span>
                  </div>
                  <div class="position-relative">
	                  <h6 class="tx-16">'.$row->judul.'</h6>
	                  '.$isi[1].' <a target="_blank" href="'.base_url('welcome/diskusi/'.$row->id_diskusi).'" class="stretched-link">Selengkapnya</a>
	              </div>
                </div>';
		}
		echo $html;
	}

	function simpanDiskusi()
	{
		$id_diskusi = $this->input->post('id_diskusi');
		$data['judul'] = $this->input->post('judul');
		$data['isi'] = $this->input->post('isi');
		if(empty($id_diskusi)){
			$data['id_kelas'] = $this->input->post('id_kelas');
			$data['id_konten'] = $this->input->post('id_konten');
			$data['id_user_post'] = userdata('id_user');
			$data['waktu_post'] = date('Y-m-d H:i:s');
			$insert = $this->MyModel->insert('diskusi', $data);
			if($insert){
				$result['status'] = 'success';
				$result['message']= 'Berhasil menambah diskusi';
			}else{
				$result['status'] = 'error';
				$result['message']= 'Gagal menambah diskusi';
			}
		}else{
			$data['waktu_edit'] = date('Y-m-d H:i:s');
			$update = $this->MyModel->update('diskusi', $data, array('id_diskusi'=>$id_diskusi));
			if($update){
				$result['status'] = 'success';
				$result['message']= 'Berhasil mengubah diskusi';
			}else{
				$result['status'] = 'error';
				$result['message']= 'Gagal mengubah diskusi';
			}
		}
		echo json_encode($result);
	}

	function diskusi($id_diskusi)
	{
		$diskusi = $this->MyModel->get('view_diskusi', '*', array('id_diskusi'=>$id_diskusi))->row();
		$data['title'] = 'Diskusi - '.$diskusi->judul;
		$data['diskusi'] = $diskusi;
		$this->load->view('frontend/view_diskusi', $data);
	}

	function postReview()
	{
		$id_review = $this->input->post('id_review');
		$data['rating'] = $this->input->post('rating');
		$data['review'] = $this->input->post('review');
		$data['waktu_post'] = date('Y-m-d H:i:s');
		if(empty($id_review)){
			$data['id_user'] = userdata('id_user');
			$data['id_kelas'] = $this->input->post('id_kelas');
			$insert = $this->MyModel->insert('review', $data);
		}else{
			$update = $this->MyModel->update('review', $data, array('id_review'=>$id_review));
		}
		echo "Ulasan kamu berhasil diunggah!";
	}

	function getReview()
	{
		$id_kelas = $this->input->post('id_kelas');
		$offset = $this->input->post('offset');
		$data = $this->MyModel->get('view_review', '*', array('id_kelas'=>$id_kelas), 'waktu_post desc', 10, $offset);
		$html = '';
		foreach($data->result() as $row){
			$html .= '<div class="card card-body pd-20">
                  <div class="media align-items-center mg-b-20">
                    <div class="avatar"><img src="'.avatar($row->foto).'" class="rounded-circle" alt=""></div>
                    <div class="media-body pd-l-15">
                      <h6 class="mg-b-3">'.$row->nama_user.'</h6>
                      <span class="d-block tx-13 tx-color-03">'.tgl($row->waktu_post).'</span>
                    </div>
                    <span class="tx-12 tx-color-03 align-self-start">
                      <div class="tx-16">'.rating($row->rating).'</div>
                    </span>
                  </div>
                  <p class="mg-b-0">"'.$row->review.'"</p>
                </div>';
		}
		echo $html;
	}
	
}
