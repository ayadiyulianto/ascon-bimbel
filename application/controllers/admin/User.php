<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AdminModel');
		$this->load->model('SiswaModel');
		$this->load->model('PengajarModel');
		$this->load->library('session');

		if ($this->session->userdata('role') != 'Administrator' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}
	}

	function index()
	{
		$data['title']	= "Data Master - Pengguna";
		$data['userTerbaru'] = $this->MyModel->get('user', 'id_user, nama_user, waktu_post, foto', null,'waktu_post desc', 5);
		$data['role']	= $this->MyModel->get('user', 'role, COUNT(*) as jml_user', null, 'jml_user desc', null, null, 'role');
		$this->load->view('admin/view_user', $data);
	}

    function getData($role=null){
        $aColumns = array('id_user', 'nama_user', 'role', 'email', 'jk', 'status', 'waktu_edit', 'id_user');
        $sIndexColumn = "id_user";
        $where = "1";
        if($role!=null){ $where='role="'.$role.'"'; }
        $dt = data('user', $where, $sIndexColumn, $aColumns);
        $nomor_urut = $dt[0];
        $rResult    = $dt[1];
        $output     = $dt[2];
        foreach ($rResult->result_array() as $data){
        	if($data['waktu_edit']=="0000-00-00 00:00:00"){ $tgl=$data['waktu_post'];
        	}else{ $tgl=$data['waktu_edit']; }

            $aktif = $nonaktif = '';
        	if($data['status']=='Y'){ $status='<span class="tx-primary">Aktif</span>'; $aktif='active'; }
        	elseif($data['status']=='N'){ $status='<span class="tx-danger">Non Aktif</span>'; $nonaktif='active'; }

            $output['data'][]=array(
                $nomor_urut,
                $data['nama_user'],
                $data['role'],
                $data['email'],
                $data['jk'],
                $status,
                tgl($tgl),
                '<div class="dropdown d-inline">
                  <button class="btn btn-secondary btn-xs btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flag"></i> </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item '.$aktif.'" href="'.base_url("admin/user/flag/".$data["id_user"]."/Y").'">Aktif</a>
                    <a class="dropdown-item '.$nonaktif.'" href="'.base_url("admin/user/flag/".$data["id_user"]."/N").'">Non Aktif</a>
                  </div>
                </div>'."<a href='".base_url()."admin/user/detail/".$data['id_user']."' class='btn btn-outline-primary btn-xs btn-icon' data-toggle='tooltip' data-placement='top' title='Lihat Detail'><i class='fa fa-info'></i></a>"
            );
            $nomor_urut++;
        }
        echo json_encode( $output );
    }

    function detail($id_user)
    {
		$where = array('id_user'=>$id_user);
		$this->form_validation->set_rules('nama_user', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run() != false) {
        	$dt['nama_user'] = $this->input->post('nama_user');
        	$dt['email'] = $this->input->post('email');
        	$dt['tgl_lahir'] = $this->input->post('tgl_lahir');
        	$dt['jk'] = $this->input->post('jk');
        	$dt['pekerjaan'] = $this->input->post('pekerjaan');
        	$dt['bio'] = $this->input->post('bio');
        	$dt['alamat'] = $this->input->post('alamat');
        	$dt['no_hp'] = $this->input->post('no_hp');
        	$update = $this->MyModel->update('user', $dt, $where);
        	if($update){
        		notif('success', 'Berhasil mengubah profil');
        	}else{
        		notif('error', 'Gagal mengubah profil');
        	}
        }
		$data['title'] = 'Profile Pengguna';
		$data['user'] = $this->MyModel->get('user', '*', $where)->row();
		$data['riwayat_belajar'] = $this->SiswaModel->getKelasSaya($id_user);
		$data['riwayat_mengajar'] = $this->PengajarModel->getKelasSaya($id_user);
		$this->load->view('frontend/view_profile', $data);
    }

    function buat()
    {
		$email = $this->input->post('email');
		$cek_email = $this->MyModel->get('user', 'email', array('email'=>$email))->num_rows();
		if($cek_email>0){
			notif('danger','Email telah terdaftar.');
		}else{
			$akun['role'] = $this->input->post('role');
			$akun['nama_user'] = $this->input->post('nama_user');
			$akun['email'] = $email;
			$akun['password'] = password_hash($this->input->post('password_baru'), PASSWORD_BCRYPT);
			$akun['waktu_post'] = date('Y-m-d H:i:s');
			$akun['id_user_post'] = userdata('id_user');
			$insert=$this->MyModel->insert('user', $akun);
			if($insert){
				notif('success', 'Buat Akun Pengguna Berhasil.');
			}else{
				notif('danger', 'Buat Akun Pengguna Gagal.');
			}
		}
		redirect("admin/user");
    }

    function flag($id_user, $status)
    {
        $dt = array('status'=>$status);
        $this->MyModel->update('user', $dt, array('id_user'=>$id_user));
        redirect('admin/user');
    }

}
