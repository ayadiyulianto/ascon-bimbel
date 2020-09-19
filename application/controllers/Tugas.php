<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PengajarModel');
		$this->load->library('session');

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

	function index()
	{
		$id_kelas = userdata('id_kelas');
		$data['title'] = "Tugas";
		$this->load->view('pengajar/view_tugas_new', $data);
	}

    function getData(){
        $aColumns = array('id', 'nama_user', 'judul_konten', 'nama_modul', 'waktu_post', 'nilai', 'id');
        $sIndexColumn = "id";
        $where = "id_kelas='".userdata('id_kelas')."'";
        $dt = data('view_tugas_siswa', $where, $sIndexColumn, $aColumns);
        $nomor_urut = $dt[0];
        $rResult    = $dt[1];
        $output     = $dt[2];
        foreach ($rResult->result_array() as $data){
            $output['data'][]=array(
                $nomor_urut,
                $data['nama_user'],
                $data['judul_konten'],
                $data['nama_modul'],
                "<span data-html='true' data-placement='top' data-toggle='tooltip' title='".'Tambah : '.tgl_indo($data['waktu_post'],'d M  Y H:i:s').'<br> Ubah : '.tgl_indo($data['waktu_edit'],'d M  Y H:i:s').'<br> Koreksi : '.tgl_indo($data['waktu_review'],'d M  Y H:i:s')."'>".tgl($data['waktu_post'])."</span>",
                $data['nilai'],
                $data['status'],
                "<a href='".base_url()."tugas/detail/".$data['id']."' type='button' class='btn btn-outline-primary btn-sm btn-icon' data-toggle='tooltip' data-placement='top' title='Koreksi'><i class='fa fa-pencil-square-o'></i></a>"
            );
            $nomor_urut++;
        }
        
        echo json_encode($output);
    }

    function detail($id)
    {
        $id_post = $this->input->post('id');
        if(!empty($id_post)){
            $dt['status'] = $this->input->post('status');
            $dt['nilai'] = $this->input->post('nilai');
            $dt['id_user_reviewer'] = userdata('id_user');
            $dt['waktu_review'] = date('Y-m-d H:i:s');
            $update = $this->MyModel->update('sesi_tugas', $dt, array('id'=>$id_post));
            if($update){
                notif('success', 'Berhasil update review');
                if($dt['status']=='Berhasil'){ $is_finished='Y'; }else{ $is_finished='N'; }
                $where['id_user_siswa'] = $this->input->post('id_user_siswa');
                $where['id_konten'] = $this->input->post('id_konten');
                $konten_siswa = $this->MyModel->get('konten_siswa', '*', $where)->row();
                if($konten_siswa->status!="Berhasil" || $konten_siswa->nilai<$dt['nilai']){
                    $dataKontenSiswa['is_finished'] = $is_finished;
                    $dataKontenSiswa['status'] = $dt['status'];
                    $dataKontenSiswa['nilai'] = $dt['nilai'];
                    $dataKontenSiswa['waktu_selesai'] = date('Y-m-d H:i:s');
                    $this->MyModel->update('konten_siswa', $dataKontenSiswa, $where);
                }
            }else{
                notif('error', 'Gagal update review');
            }
        }
    	$data['title'] = "Koreksi Tugas";
        $data['tugas'] = $this->MyModel->get('view_tugas_siswa', '*', array('id'=>$id))->row();
    	$this->load->view('pengajar/view_tugas_review_new', $data);
    }

}
