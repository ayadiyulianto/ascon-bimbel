<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AdminModel');

		if ($this->session->userdata('role') != 'Administrator' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}
	}

	function index()
	{
		$data['title']		= "Data Master - Kelas";
		$data['kelasTerbaru'] = $this->MyModel->get('kelas', 'id_kelas, nama_kelas, waktu_post, foto', null,'waktu_post desc', 5);
		$data['kategori']	= $this->MyModel->getKategori();
		$this->load->view('admin/view_kelas_new', $data);
	}

    function getData($id_kategori=null){
        $aColumns = array('id_kelas', 'nama_kelas', 'id_kategori', 'id_kelas', 'status_verify','waktu_edit', 'id_kelas');
        $sIndexColumn = "id_kelas";
        $where = "1";
        if($id_kategori!=null){ $where='id_kategori='.$id_kategori; }
        $dt = data('kelas', $where, $sIndexColumn, $aColumns);
        $nomor_urut = $dt[0];
        $rResult    = $dt[1];
        $output     = $dt[2];
        foreach ($rResult->result_array() as $data){
        	if($data['waktu_edit']=="0000-00-00 00:00:00"){ $tgl=$data['waktu_post'];
        	}else{ $tgl=$data['waktu_edit']; }

            $verified = $suspended = '';
        	if($data['status_verify']=='New'){ $status='<span class="tx-primary">New</span>'; }
        	elseif($data['status_verify']=='Verified'){ $status='<span class="tx-success">Verified</span>'; $verified='active'; }
        	elseif($data['status_verify']=='Suspended'){ $status='<span class="tx-danger">Suspended</span>'; $suspended='active'; }

            $nama_kategori = $this->MyModel->get('kategori', 'nama_kategori', array('id_kategori'=>$data['id_kategori']))->row()->nama_kategori;
        	$jml_siswa = $this->MyModel->get('kelas_siswa', 'count(*) as jml_siswa', array('id_kelas'=>$data['id_kelas']))->row()->jml_siswa;

            $output['data'][]=array(
                $nomor_urut,
                $data['nama_kelas'],
                $nama_kategori,
                $jml_siswa,
                $status,
                tgl($tgl),
                '<div class="dropdown d-inline">
                  <button class="btn btn-secondary btn-xs btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flag"></i> </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item '.$verified.'" href="'.base_url("admin/kelas/flag/".$data["id_kelas"]."/verified").'">Verify</a>
                    <a class="dropdown-item '.$suspended.'" href="'.base_url("admin/kelas/flag/".$data["id_kelas"]."/suspended").'">Suspend</a>
                  </div>
                </div>'."<a href='".base_url()."admin/kelas/detail/".$data['id_kelas']."' class='btn btn-outline-primary btn-xs btn-icon' data-toggle='tooltip' data-placement='top' title='Lihat Detail'><i class='fa fa-info'></i></a>"
            );
            $nomor_urut++;
        }        
        echo json_encode( $output );
    }

	function buat()
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
            	redirect('admin/kelas/pilihKelas/'.$id_kelas);
            }else{
            	notif('danger', 'Terjadi kesalahan. Coba Lagi!');
            }
        }

		$data['title'] = "Buat Kelas Baru";
		$data['kategori'] = $this->MyModel->get('kategori');
		$this->load->view('pengajar/view_kelas_buat_new', $data);
	}

	function detail($id_kelas)
	{
		$nama_kelas = $this->MyModel->get('kelas','nama_kelas', array('id_kelas'=>$id_kelas))->row()->nama_kelas;
		$this->session->set_userdata('id_kelas', $id_kelas);
		$this->session->set_userdata('nama_kelas', $nama_kelas);
		redirect("kelas");
	}

    function flag($id_kelas, $status)
    {
        $dt = array('status_verify'=>$status);
        $this->MyModel->update('kelas', $dt, array('id_kelas'=>$id_kelas));
        redirect('admin/kelas');
    }

}