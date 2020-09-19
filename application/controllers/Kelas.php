<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('PengajarModel');

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
		$where = array('id_kelas'=>$id_kelas);
		$data['title'] = "Kelas ".userdata('nama_kelas');
		$data['ringkasan'] = $this->PengajarModel->getRingkasanKelas($id_kelas);
		$data['siswa_terbaru'] = $this->MyModel->get('view_siswa', 'id_user, nama_user, waktu_post', array('id_kelas'=>$id_kelas), 'waktu_post desc');
		$data['rating'] = $this->MyModel->get('review', 'rating, COUNT(*) as jumlah', $where, 'rating desc', null, null, 'rating');
		$this->load->view('pengajar/view_kelas_ringkasan_new', $data);
	}

	function monitoring()
	{
		$id_kelas = userdata('id_kelas');
		$data['title'] = "Monitoring Kelas";
		$data['ringkasan'] = $this->PengajarModel->getRingkasanMonitoring($id_kelas);
		$this->load->view('pengajar/view_kelas_monitoring_new', $data);
	}

	function monitoringCetak()
	{
		echo "string";
	}

	function pengaturan()
	{
		$id_kelas = userdata('id_kelas');
		$data['title'] = "Pengaturan Kelas ".userdata('nama_kelas');
		$data['kelas'] = $this->MyModel->get('kelas', '*', array('id_kelas'=>$id_kelas))->row();
		$data['pengajar'] = $this->MyModel->get('view_pengajar', 'id, id_user, nama_user, role, has_access, waktu_post', array('id_kelas'=>$id_kelas));
		$this->load->view('pengajar/view_kelas_pengaturan_new', $data);
	}

	function promosi()
	{
		$id_kelas = userdata('id_kelas');
        $this->form_validation->set_rules('code', 'Kode Kupon', 'trim|required');
        $this->form_validation->set_rules('value', 'Potongan Harga', 'trim|required');
        $this->form_validation->set_rules('durasi', 'Durasi', 'trim|required');
        if ($this->form_validation->run() != false) {
        	$kupon['id_kelas'] = $id_kelas;
        	$kupon['code']	= $this->input->post('code');
        	$kupon['value']	= $this->input->post('value');
        	$kupon['quota']	= $this->input->post('quota');
        	$kupon['waktu_post']	= date('Y-m-d H:i:s');
        	$kupon['waktu_expired']	= date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'). ' + '.$this->input->post('durasi').' days'));;
        	$kupon['status']= 'Y';
        	$kupon['id_user_post']= userdata('id_user');
        	$insert = $this->MyModel->insert('kupon', $kupon);
        	if($insert){
        		notif('success', 'Berhasil membuat kupon.');
        	}else{
        		notif('danger', 'Gagal membuat kupon. Coba lagi!');
        	}
        }
		$data['title'] = "Promosi Kelas";
		$data['aktif'] = $this->MyModel->get('kupon', '*', array('id_kelas'=>$id_kelas, 'waktu_expired >'=>date('Y-m-d H:i:s') ));
		$data['expired'] = $this->MyModel->get('kupon', '*', array('id_kelas'=>$id_kelas, 'waktu_expired <'=>date('Y-m-d H:i:s') ));
		$this->load->view('pengajar/view_kelas_promosi', $data);
	}

	function flagKupon($id, $status)
	{
        $dt['status'] = $status;
        $where = array('id'=>$id);
        $update = $this->MyModel->update('kupon', $dt, $where);
        redirect('kelas/promosi');
	}

	function nonaktifkan()
	{
		$data['is_aktif'] = $this->input->post('is_aktif');
		if($this->MyModel->update('kelas', $data, array('id_kelas'=> userdata('id_kelas')))){ echo "Berhasil"; }
		else{ echo "Terjadi Error";}
	}

	function bukapendaftaran()
	{
		$data['is_buka_pendaftaran'] = $this->input->post('is_buka_pendaftaran');
		if($this->MyModel->update('kelas', $data, array('id_kelas'=> userdata('id_kelas')))){ echo "Berhasil"; }
		else{ echo "Terjadi Error";}
	}

	function ubahHarga(){
		$where = array('id_kelas'=>userdata('id_kelas'));
		$data['harga'] = str_replace(',', '', $this->input->post('harga'));
		$data['diskon'] = $this->input->post('diskon');
		$update = $this->MyModel->update('kelas', $data, $where);
		if ($update){
			$response['status'] = 'success';
			$response['message'] = "Berhasil mengubah harga";
		}else{
			$response['status'] = "error";
			$response['message'] = "Terjadi kesalahan saat mengubah harga";
		}
		echo json_encode($response);
	}

	function getPengajar()
	{
		$pengajar = $this->MyModel->get('user', 'id_user, nama_user', array('role'=>'Pengajar'))->result();
        echo json_encode($pengajar);
	}

	function tambahPengajar()
	{
		$data['id_kelas'] 	= userdata('id_kelas');
		$data['id_user'] 	= $this->input->post('id_user');
		$data['role'] 		= 'Pembantu';
		$check = $this->MyModel->get('kelas_pengajar', '*', $data);
		if ($check->num_rows()==0){	
			$data['waktu_post'] = date('Y-m-d H:i:s');
			$data['has_access'] = 'Y';
			$insert = $this->MyModel->insert('kelas_pengajar', $data);
			if ($insert){
				$row = $this->MyModel->get('view_pengajar', 'id, nama_user', $data)->row_array();
				$response['status'] = 'success';
				$response['message'] = "Berhasil menambah pelajar!";
				$response['html'] = '<tr>
	                  <td class="tx-medium">'.$row['nama_user'].'</td>
	                  <td class="tx-color-03 tx-normal">Baru saja</td>
	                  <td>'.$data['role'].'</td>
	                  <td>'.$data['has_access'].'</td>
	                  <td>
	                  	<div class="dropdown d-inline">
                        <button class="btn btn-secondary btn-xs btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flag"></i> </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item active" href="'.base_url('kelas/aksespengajar/'.$row['id'].'/Y').'">Y</a>
                          <a class="dropdown-item" href="'.base_url('kelas/aksespengajar/'.$row['id'].'/N').'">N</a>
                        </div>
                      </div>
	                    <button type="button" class="btn btn-icon btn-danger btn-xs delete-btn" data-id="'.$row['id'].'"><i class="fa fa-trash"></i></button>
	                  </td>
	                </tr>';
			}else{
				$response['status'] = "error";
				$response['message'] = "Terjadi kesalahan saat menambah ke database!";
			}
		} else{
			$response['status'] = 'error';
			$response['message'] = "Pengajar telah tergabung dalam kelas ini!";
		}
		echo json_encode($response);
	}

    function aksesPengajar($id, $status)
    {
        $dt = array('has_access'=>$status);
        $this->MyModel->update('kelas_pengajar', $dt, array('id'=>$id));
        redirect('kelas/pengaturan');
    }

	function hapusPengajar()
	{
		$where['id'] 	= $this->input->post('id');
		if ($this->MyModel->delete('kelas_pengajar', $where)){
			$response['status'] = 'success';
			$response['message']= 'Berhasil menghapus';
		}else{
			$response['status'] = 'error';
			$response['message']= 'Gagal menghapus';
		}
		echo json_encode($response);
	}

	function detail()
	{
		$id_kelas = userdata('id_kelas');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('deskripsi_singkat', 'Deskripsi Singkat', 'trim|required');
        if ($this->form_validation->run() != false) {
            if ($_FILES['cover']['name']) {
	            $path   = '../assets/images/kelas/';
	            $lokasi = realpath(APPPATH . $path);
	            $nmfile = $this->input->post('nama_kelas');
                $cover = upload_foto($lokasi,$path,$nmfile);
            }else if(empty($_FILES['cover']['name'])){
                $cover=$this->input->post('covers');
            }

            $kelas  = array(
                'nama_kelas'    => $this->input->post('nama_kelas'),
                'slug'    		=> slug($this->input->post('nama_kelas')),
                'id_kategori'	=> $this->input->post('kategori'),
                'deskripsi_singkat'=> $this->input->post('deskripsi_singkat'),
                'deskripsi'		=> $this->input->post('deskripsi'),
                'foto'          => $cover,
                'id_user_edit'  => userdata('id_user'),
                'waktu_edit'    => date('Y-m-d H:i:s')
            );

            $where = array('id_kelas'=>$id_kelas);

            if(!empty($_FILES['cover']['name'])){
                $dt_foto = $this->MyModel->get('kelas','foto',$where)->row()->foto;
                $appath = realpath(APPPATH . '../assets/images/kelas/'.$dt_foto);
                $appath_thumb = realpath(APPPATH . '../assets/images/kelas/thumbnail/'.$dt_foto);
                if(!empty($dt_foto) and file_exists($appath)){
                    unlink($appath);                        
                }
                if(!empty($dt_foto) and file_exists($appath_thumb)){
                    unlink($appath_thumb);
                }                        
            }

            if($this->MyModel->update('kelas', $kelas, $where)){
            	notif('success', 'Berhasil memperbarui data');
            }else{
            	notif('danger', 'Terjadi kesalahan saat menyimpan ke database');
            }
        }
        
		$data['title'] = "Detail Kelas ".userdata('nama_kelas');
		$data['kelas'] = $this->MyModel->get('kelas', '*', array('id_kelas'=>$id_kelas))->row();
		$data['kategori'] = $this->MyModel->get('kategori');
		$this->load->view('pengajar/view_kelas_detail_new', $data);
	}

}
