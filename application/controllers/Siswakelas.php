<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswakelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PengajarModel');
		$this->load->model('SiswaModel');
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
		$data['title'] = "Siswa";
		$this->load->view('pengajar/view_siswa_new', $data);
	}

    function getData(){
        $aColumns = array('id_user', 'nama_user', 'jk', 'waktu_post', 'id_user');
        $sIndexColumn = "id_user";
        $where = "id_kelas='".userdata('id_kelas')."'";
        $dt = data('view_siswa', $where, $sIndexColumn, $aColumns);
        $nomor_urut = $dt[0];
        $rResult    = $dt[1];
        $output     = $dt[2];
        foreach ($rResult->result_array() as $data){
            $ya = $tidak = '';
            if($data['has_access']=='Y'){ $status='<span class="tx-primary">Ya</span>'; $ya='active'; }
            elseif($data['has_access']=='N'){ $status='<span class="tx-danger">Tidak</span>'; $tidak='active'; }

            if($data['is_finished']=='Y'){ $is_finished='<span class="tx-success">Selesai</span>'; }
            elseif($data['is_finished']=='N'){ $is_finished='<span class="tx-secondary">Progress</span>'; }

            $output['data'][]=array(
                $nomor_urut,
                $data['nama_user'],
                $data['jk'],
                $status,
                $is_finished,
                tgl($data['waktu_post']),
                '<div class="dropdown d-inline">
                  <button class="btn btn-secondary btn-xs btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flag"></i> </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item '.$ya.'" href="'.base_url("siswakelas/flag/".$data["id"]."/Y").'">Beri Akses</a>
                    <a class="dropdown-item '.$tidak.'" href="'.base_url("siswakelas/flag/".$data["id"]."/N").'">Cabut Akses</a>
                  </div>
                </div>'."<a href='".base_url()."siswakelas/detail/".$data['id_user']."' type='button' class='btn btn-outline-primary btn-sm btn-icon' data-toggle='tooltip' data-placement='top' title='Lihat Detail'><i class='fa fa-info'></i></a>"
            );
            $nomor_urut++;
        }        
        echo json_encode( $output );
    }

    function detail($id_user)
    {
    	$id_kelas = userdata('id_kelas');
    	$data['title'] = "Detail Siswa";
    	$data['siswa'] = $this->MyModel->get('user', '*', array('id_user'=>$id_user))->row();
		$data['progress'] = $this->SiswaModel->getProgress($id_kelas, $id_user);
		$data['modul'] = $this->MyModel->get('modul', 'id_modul, nama_modul', array('id_kelas'=>$id_kelas, 'is_aktif'=>'Y'), 'no_urut asc');
		$data['nilai'] = $this->SiswaModel->getNilai($id_kelas, $id_user);
    	$this->load->view('pengajar/view_siswa_detail_new', $data);
    }


    function flag($id, $status)
    {
        $dt['has_access'] = $status;
        $where = array('id'=>$id);
        $update = $this->MyModel->update('kelas_siswa', $dt, $where);
        redirect('siswakelas');
    }

}
