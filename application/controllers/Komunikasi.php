<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komunikasi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('PengajarModel');
		$this->load->model('SiswaModel');

		if (userdata('oasse-bimbel') == FALSE OR (userdata('role')!='Pengajar' AND userdata('role')!='Administrator')) {
			redirect("auth");
		}

		if (!$this->session->has_userdata('id_kelas')) {
			if (userdata('role') == 'Pengajar'){
				redirect("pengajar/dashboard");
			} elseif (userdata('role') == 'Administrator'){
				redirect("admin/kelas");
			}
		}
	}

	function pengumuman()
	{
		$id_kelas = userdata('id_kelas');
		$this->form_validation->set_rules('judul', 'Judul Pengumuman', 'trim|required');
        if ($this->form_validation->run() != false) {
			$dt['judul'] = $this->input->post('judul');
			$dt['isi'] = $this->input->post('isi');
			$id_pengumuman = $this->input->post('id_pengumuman');
			if(empty($id_pengumuman)){
				$dt['id_kelas'] = $id_kelas;
				$dt['id_user_post'] = userdata('id_user');
				$dt['waktu_post'] = date('Y-m-d H:i:s');
				$insert = $this->MyModel->insert('pengumuman', $dt);
				if($insert){
					notif('success','Berhasil membuat pengumuman baru');
				}else{
					notif('danger','Gagal membuat pengumuman baru');
				}
			}else{
				$dt['id_user_edit'] = userdata('id_user');
				$dt['waktu_edit'] = date('Y-m-d H:i:s');
				$update = $this->MyModel->update('pengumuman', $dt, array('id_pengumuman'=>$id_pengumuman));
				if($update){
					notif('success','Berhasil mengubah pengumuman');
				}else{
					notif('danger','Gagal mengubah pengumuman');
				}
			}
		}
		$data['title'] = "Pengumuman";
		$data['pengumuman'] = $this->MyModel->get('view_pengumuman', '*', array('id_kelas'=>$id_kelas), 'waktu_post desc');
		$this->load->view('pengajar/view_pengumuman_new', $data);
	}

	function flagPengumuman($id_pengumuman, $status)
	{
        $dt['status'] = $status;
        $where = array('id_pengumuman'=>$id_pengumuman);
        $update = $this->MyModel->update('pengumuman', $dt, $where);
        redirect('komunikasi/pengumuman');
	}

	function diskusi()
	{
		$id_kelas = userdata('id_kelas');
		$data['title'] = "Diskusi";
		$data['diskusi_kelas'] = $this->MyModel->get('diskusi', 'COUNT(*) as total, MAX(waktu_post) as latest_post', array('id_kelas'=>$id_kelas, 'id_konten'=>"0"))->row();
		$data['diskusi_modul'] = $this->MyModel->getDiskusiModul($id_kelas);
		$this->load->view('pengajar/view_diskusi_new', $data);
	}

	function flagDiskusi($id_diskusi, $status)
	{
        $dt['status'] = $status;
        $where = array('id_diskusi'=>$id_diskusi);
        $update = $this->MyModel->update('diskusi', $dt, $where);
        redirect('welcome/diskusi/'.$id_diskusi);
	}

	function review()
	{
		$id_kelas = userdata('id_kelas');
		$data['title'] = "Review";
		$data['rating'] = $this->MyModel->getRatingKelas($id_kelas);
		$data['review'] = $this->MyModel->get('review', 'rating, COUNT(*) as jumlah', array('id_kelas'=>$id_kelas), 'rating desc', null, null, 'rating');
		$this->load->view('pengajar/view_review_new', $data);
	}

}
