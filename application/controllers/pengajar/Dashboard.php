<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('PengajarModel');

		if (userdata('role') != 'Pengajar' OR userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}
	}

	function index()
	{
		$id_user = userdata('id_user');
		$data['title'] = "Kelas Yang Saya Ajar";
		$data['semuakelas'] = $this->PengajarModel->getKelasSaya($id_user);
		$this->load->view('pengajar/view_kelas_new', $data);
	}

	function buatKelas()
	{
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('deskripsi_singkat', 'Deskripsi Singkat', 'trim|required');
        if (empty($_FILES['cover']['name'])) $this->form_validation->set_rules('cover', 'Foto Sampul', 'required');
        if ($this->form_validation->run() != false) {
            $path   = '../assets/images/kelas/';
            $lokasi = realpath(APPPATH . $path);
            $nmfile = $this->input->post('nama_kelas');
            $foto = upload_foto($lokasi,$path,$nmfile);
            $kelas = array(
                'nama_kelas'	=> $this->input->post('nama_kelas'),
                'slug'          => slug($this->input->post('nama_kelas')),
                'id_kategori'	=> $this->input->post('kategori'),
                'deskripsi_singkat'=> $this->input->post('deskripsi_singkat'),
                'deskripsi'		=> $this->input->post('deskripsi'),
                'foto'			=> $foto,
                'id_user_post'	=> userdata('id_user'),
                'waktu_post'    => date('Y-m-d H:i:s')
            );
            $insert = $this->MyModel->insert('kelas', $kelas);
            if($insert){
            	$id_kelas = $this->MyModel->get('kelas', 'id_kelas', $kelas)->row()->id_kelas;
            	$kelas_pengajar = array(
            		'id_kelas'	=> $id_kelas,
            		'id_user'	=> userdata('id_user'),
            		'waktu_post'=> date('Y-m-d H:i:s'),
            		'has_access'=> 'Y',
                    'role'      => 'Utama'
            	);
            	$this->MyModel->insert('kelas_pengajar', $kelas_pengajar);
            	notif('success', 'Kelas telah dibuat. Silahkan lengkapi informasi kelas dan modul belajar sebelum mempublikasikan kelas ini');
            	redirect('pengajar/dashboard/pilihKelas/'.$id_kelas);
            }else{
            	notif('danger', 'Terjadi kesalahan. Coba Lagi!');
            }
        }

		$data['title'] = "Buat Kelas Baru";
		$data['kategori'] = $this->MyModel->get('kategori');
		$this->load->view('pengajar/view_kelas_buat_new', $data);
	}

	function pilihKelas($id_kelas)
	{
		$where = array('id_kelas'=>$id_kelas);
		$has_access = $this->MyModel->get('kelas_pengajar', 'has_access', $where)->row()->has_access;
		if($has_access!='Y'){
			redirect('pengajar/dashboard');
		}
		$nama_kelas = $this->MyModel->get('kelas','nama_kelas', $where)->row()->nama_kelas;
		$this->session->set_userdata('id_kelas', $id_kelas);
		$this->session->set_userdata('nama_kelas', $nama_kelas);
		redirect('kelas');
	}
}