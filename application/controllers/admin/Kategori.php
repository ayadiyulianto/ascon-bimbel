<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AdminModel');

		if ($this->session->userdata('role') != 'Administrator' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}
	}

	function index()
	{
		$data['title']		= "Data Master - Kategori";
		$data['kategori']	= $this->AdminModel->getKategori();
		$this->load->view('admin/view_kategori', $data);
	}

	function detail($id_kategori=null)
	{
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');
        $this->form_validation->set_rules('deskripsi_singkat', 'Deskripsi Singkat', 'trim|required');
        if (empty($_FILES['cover']['name']) AND empty($id_kategori)) $this->form_validation->set_rules('cover', 'Foto Sampul', 'required');
        if ($this->form_validation->run() != false) {
            if ($_FILES['cover']['name']) {
	            $path   = '../assets/images/kategori/';
	            $lokasi = realpath(APPPATH . $path);
	            $nmfile = $this->input->post('nama_kategori');
	            $cover = upload_foto($lokasi,$path,$nmfile, FALSE, FALSE);
            }else if(empty($_FILES['cover']['name'])){
                $cover=$this->input->post('covers');
            }

            $kategori = array(
                'nama_kategori'	=> $this->input->post('nama_kategori'),
                'slug'          => slug($this->input->post('nama_kategori')),
                'deskripsi_singkat'=> $this->input->post('deskripsi_singkat'),
                'foto_cover'	=> $cover
            );

            if(empty($id_kategori)){
        		$kategori['id_user_post']= userdata('id_user');
        		$kategori['waktu_post']	= date('Y-m-d H:i:s');
	            $insert = $this->MyModel->insert('kategori', $kategori);
	            if($insert){
	            	notif('success', 'Berhasil menambah kategori');
	            	redirect('admin/kategori');
	            }else{
	            	notif('danger', 'Terjadi kesalahan. Coba Lagi!');
	            }
	        }else{
	        	$where = array('id_kategori'=>$id_kategori);
		        if(!empty($_FILES['cover']['name'])){
		            $dt_foto = $this->MyModel->get('kategori','foto_cover',$where)->row()->foto_cover;
		            $appath = realpath(APPPATH . '../assets/images/kategori/'.$dt_foto);
		            $appath_thumb = realpath(APPPATH . '../assets/images/kategori/thumbnail/'.$dt_foto);
		            if(!empty($dt_foto) and file_exists($appath)){
		                unlink($appath);
		            }
		            if(!empty($dt_foto) and file_exists($appath_thumb)){
		                unlink($appath_thumb);
		            }
		        }

        		$update = $this->MyModel->update('kategori', $kategori, $where);
        		if($update){
        			notif('success', 'Berhasil mengubah kategori');
        			redirect("admin/kategori");
        		}else{
        			notif('error', 'Terjadi kesalahan saat mengubah kategori');
        		}
        	}
        }

		$data['title']		= "Detail Kategori";
		if($id_kategori!=null){
			$data['kategori']	= $this->MyModel->get('kategori', '*', array('id_kategori'=>$id_kategori))->row();
		}
		$this->load->view('admin/view_kategori_detail', $data);
	}
}