<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct() {
		parent::__construct();
		if(userdata('oasse-bimbel')==FALSE){
			checkCookie();
		}
	}

	function tentang()
	{
		$data['title'] = 'Tentang Kami';
		$this->load->view('frontend/view_tentang', $data);
	}

	function layanan()
	{
		$data['title'] = 'Layanan Kami';
		$this->load->view('frontend/view_layanan', $data);
	}

	function karier()
	{
		$data['title'] = 'Bergabung dengan Kami';
		$this->load->view('frontend/view_karier', $data);
	}

	function helpcenter()
	{
		$data['title'] = 'Pusat Bantuan';
		$this->load->view('frontend/view_helcenter', $data);
	}

	function faq()
	{
		$data['title'] = 'Frequently Asked Question';
		$this->load->view('frontend/view_faq', $data);
	}

	function kontak()
	{
        $this->form_validation->set_rules('kategori', 'Kategori Pertanyaan', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'Nomor Kontak', 'trim|required');
        $this->form_validation->set_rules('subjek', 'Subjek', 'trim|required');
        $this->form_validation->set_rules('isi', 'Isi', 'trim|required');
        if ($this->form_validation->run() != false) {
            $tiket = array(
                'kategori'	=> $this->input->post('kategori'),
                'nama'      => $this->input->post('nama'),
                'email'		=> $this->input->post('email'),
                'no_hp'		=> $this->input->post('no_hp'),
                'subjek'	=> $this->input->post('subjek'),
                'isi'		=> $this->input->post('subjek'),
                'waktu_post'=> date('Y-m-d H:i:s')
            );
            $insert = $this->MyModel->insert('tiket', $tiket);
            if($insert){
            	notif('success', 'Tiket berhasil dibuat. Balasan akan dikirim ke email kamu.');
            	redirect('page/kontak');
            }else{
            	notif('danger', 'Terjadi kesalahan. Coba Lagi!');
            }
        }
		$data['title'] = 'Hubungi Kami';
		$this->load->view('frontend/view_kontak', $data);
	}

	function syaratketentuanlayanan()
	{
		$data['title'] = 'Syarat dan Ketentuan Layanan';
		$this->load->view('frontend/view_syaratketentuanlayanan', $data);
	}

	function privacypolicy()
	{
		$data['title'] = 'Kebijakan Privasi';
		$this->load->view('frontend/view_privacypolicy', $data);
	}
	
}
