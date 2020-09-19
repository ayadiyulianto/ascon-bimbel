<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AdminModel');

		if ($this->session->userdata('role') != 'Administrator' OR $this->session->userdata('oasse-bimbel') == FALSE) {
			redirect("auth");
		}

	}
	
	function index()
	{
		$data['title']	= "Transaksi Aktif";
		$data['status']	= "aktif";
		$this->load->view('admin/view_penjualan', $data);
	}

	function selesai()
	{
		$data['title']	= "Transaksi Selesai";
		$data['status']	= "selesai";
		$this->load->view('admin/view_penjualan', $data);
	}

    function getData($status=''){
        $aColumns = array('id_invoice', 'id_invoice', 'nama_user', 'id_kelas', 'status', 'total_bayar', 'jenis_bayar', 'tujuan_bayar', 'waktu_register', 'id_invoice');
        $sIndexColumn = "id_invoice";
        $where = "1";
        if($status=='aktif'){ $where='status="registered" OR status="confirmed"'; }
        elseif($status=='selesai'){ $where='status="approved" OR status="canceled"'; }
        $dt = data('view_pembelian', $where, $sIndexColumn, $aColumns);
        $nomor_urut = $dt[0];
        $rResult    = $dt[1];
        $output     = $dt[2];
        foreach ($rResult->result_array() as $data){
            $registered = $confirmed = $approved = $canceled = '';
        	if($data['status']=='registered'){ $status='<span class="tx-primary">Menunggu Pembayaran</span>'; $registered='active'; }
        	elseif($data['status']=='confirmed'){ $status='<span class="tx-success">Menunggu Approval</span>'; $confirmed='active'; }
        	elseif($data['status']=='approved'){ $status='<span class="tx-success">Approved</span>'; $approved='active'; }
        	elseif($data['status']=='canceled'){ $status='<span class="tx-danger">Dibatalkan</span>'; $canceled='active'; }

            $output['data'][]=array(
                $nomor_urut,
                $data['id_invoice'],
                $data['nama_user'],
                $data['id_kelas'],
                $status,
                rupiah($data['total_bayar']),
                $data['jenis_bayar'],
                $data['tujuan_bayar'],
                tgl($data['waktu_register']),
                '<div class="dropdown d-inline">
                  <button class="btn btn-secondary btn-xs btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flag"></i> </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item '.$approved.'" href="'.base_url("admin/penjualan/flag/".$data["id_invoice"]."/approved").'">Approve</a>
                    <a class="dropdown-item '.$canceled.'" href="'.base_url("admin/penjualan/flag/".$data["id_invoice"]."/canceled").'">Batalkan</a>
                    <a class="dropdown-item '.$registered.'" href="'.base_url("admin/penjualan/flag/".$data["id_invoice"]."/registered").'">Menunggu Pembayaran</a>
                    <a class="dropdown-item '.$confirmed.'" href="'.base_url("admin/penjualan/flag/".$data["id_invoice"]."/confirmed").'">Menunggu Approval</a>
                  </div>
                </div>'.
                "<a target='_blank' href='".base_url()."pembayaran/invoice/".$data['id_invoice']."' class='btn btn-outline-primary btn-xs btn-icon' data-toggle='tooltip' data-placement='top' title='Lihat Invoice'><i class='fa fa-info'></i></a>".
                "<a target='_blank' href='".base_url()."pembayaran/konfirmasi/".$data['id_invoice']."' class='btn btn-outline-primary btn-xs btn-icon' data-toggle='tooltip' data-placement='top' title='Lihat Konfirmasi'><i class='fa fa-image'></i></a>"
            );
            $nomor_urut++;
        }
        echo json_encode( $output );
    }

    function flag($id_invoice, $status)
    {
        $dt['status'] = $status;
        if($status=='approved'){
        	$dt['waktu_approved'] = date('Y-m-d H:i:s');
        }elseif($status=='canceled'){
        	$dt['waktu_canceled'] = date('Y-m-d H:i:s');
        }
        $where = array('id_invoice'=>$id_invoice);
        $update = $this->MyModel->update('pembelian', $dt, $where);
        if($update AND $status=='approved'){
        	$kelas_siswa = $this->MyModel->get('pembelian', 'id_kelas, id_user', $where)->row_array();
        	$cek = $this->MyModel->get('kelas_siswa', '*', $kelas_siswa)->num_rows();
        	if($cek==0){
        		$kelas_siswa['waktu_post'] = date('Y-m-d H:i:s');
        		$kelas_siswa['has_access'] = 'Y';
        		$kelas_siswa['is_finished'] = 'N';
        		$this->MyModel->insert('kelas_siswa', $kelas_siswa);
        	}
        }
        redirect('admin/penjualan');
    }

    function metode($id=NULL)
    {
        $this->form_validation->set_rules('jenis', 'Jenis Pembayaran', 'trim|required');
        $this->form_validation->set_rules('rekening', 'Nomor Rekening', 'trim|required');
        $this->form_validation->set_rules('atas_nama', 'Atas nama', 'trim|required');
        if (empty($_FILES['cover']['name']) AND empty($id)) $this->form_validation->set_rules('cover', 'Logo', 'required');
        if ($this->form_validation->run() != false) {
            if ($_FILES['cover']['name']) {
                $path   = '../assets/images/pembayaran/';
                $lokasi = realpath(APPPATH . $path);
                $nmfile = $this->input->post('rekening');
                $cover = upload_foto($lokasi,$path,$nmfile);
            }else if(empty($_FILES['cover']['name'])){
                $cover=$this->input->post('covers');
            }

            $metode = array(
                'jenis'     => $this->input->post('jenis'),
                'rekening'  => $this->input->post('rekening'),
                'atas_nama' => $this->input->post('atas_nama'),
                'logo'      => $cover
            );

            if(empty($id)){
                $insert = $this->MyModel->insert('metode_bayar', $metode);
                if($insert){
                    notif('success', 'Berhasil menambah metode pembayaran');
                    redirect('admin/penjualan/metode');
                }else{
                    notif('danger', 'Terjadi kesalahan. Coba Lagi!');
                }
            }else{
                $where = array('id'=>$id);
                $update = $this->MyModel->update('metode_bayar', $metode, $where);
                if($update){
                    notif('success', 'Berhasil mengubah metode pembayaran');
                    redirect("admin/penjualan/metode");
                }else{
                    notif('error', 'Terjadi kesalahan saat mengubah metode pembayaran');
                }
            }
        }
        $data['title']  = "Metode Pembayaran";
        $data['metode'] = $this->MyModel->get('metode_bayar');
        if(!empty($id)){
            $data['detail'] = $this->MyModel->get('metode_bayar', '*', array('id'=>$id))->row();
        }
        $this->load->view('admin/view_metode', $data);
    }

    function flagMetode($id, $status)
    {
        $dt['status'] = $status;
        $this->MyModel->update('metode_bayar', $dt, array('id'=>$id));
        redirect('admin/penjualan/metode');
    }

    function hapusMetode($id)
    {
        $delete = $this->MyModel->delete('metode_bayar', array('id'=>$id));
        if($delete){
            notif('success', 'Berhasil menghapus metode pembayaran');
        }else{
            notif('danger', 'Hapus gagal. Terjadi kesalahan saat menghapus metode pembayaran');
        }
        redirect('admin/penjualan/metode');
    }
}
