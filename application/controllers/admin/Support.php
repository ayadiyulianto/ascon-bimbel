<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AdminModel');

		if ($this->session->userdata('role') != 'Administrator' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}

	}
	
	function index()
	{
		echo "string";
	}

	function cs()
	{
		$data['title'] = 'Tiket Pertanyaan Pengguna';
		$this->load->view('admin/view_support_cs', $data);
	}

	function csData()
	{
        $aColumns = array('id_tiket', 'kategori', 'nama', 'email', 'no_hp', 'subjek','waktu_post', 'id_tiket');
        $sIndexColumn = "id_tiket";
        $where = "1";
        $dt = data('tiket', $where, $sIndexColumn, $aColumns);
        $nomor_urut = $dt[0];
        $rResult    = $dt[1];
        $output     = $dt[2];
        foreach ($rResult->result_array() as $data){
            $output['data'][]=array(
                $nomor_urut,
                $data['kategori'],
                $data['nama'],
                $data['email'],
                $data['no_hp'],
                $data['subjek'],
                tgl($data['waktu_post']),
                "<a href='".base_url()."support/tiket_detail/".$data['id_tiket']."' class='btn btn-outline-primary btn-xs btn-icon' data-toggle='tooltip' data-placement='top' title='Lihat Detail'><i class='fa fa-info'></i></a>"
            );
            $nomor_urut++;
        }        
        echo json_encode($output);
	}

}
