<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (userdata('oasse-bimbel') == FALSE) {
			$this->session->set_userdata('redirectTo', uri_string());
			redirect("auth");
		}
	}

	function enroll($id_kelas)
	{
		$id_user = userdata('id_user');
		$sudah_terdaftar = $this->MyModel->get('pembelian', 'id_invoice', array('id_kelas'=>$id_kelas, 'id_user'=>$id_user, 'status !='=>'canceled'));
		if($sudah_terdaftar->num_rows()>0){
			redirect('pembayaran/invoice/'.$sudah_terdaftar->row()->id_invoice);
		}

		$kelas = $this->MyModel->get('kelas','id_kelas, nama_kelas, slug, foto, harga, diskon, is_buka_pendaftaran', array('id_kelas'=>$id_kelas))->row();
		$this->form_validation->set_rules('metode_bayar', 'Metode Pembayaran', 'trim|required');
        if ($this->form_validation->run() != false) {
        	$id_invoice = strtoupper(random_string('alnum', 4)).date('ymd').'U'.$id_user.'K'.$id_kelas;
        	$dt['id_invoice'] = $id_invoice;
        	$dt['id_user'] = $id_user;
        	$dt['id_kelas'] = $id_kelas;
        	$dt['status'] = 'registered';
        	$dt['harga'] = $kelas->harga;
        	$dt['diskon'] = $kelas->diskon;
        	$coupon_code = $this->input->post('coupon_code');
        	$coupon_value = 0;
        	if(!empty($coupon_code)){
        		$coupon_value = $this->MyModel->get('kupon', '*', array('code'=>$coupon_code))->row()->value;
	        	$dt['coupon_code'] = $coupon_code;
	        	$dt['coupon_value'] = $coupon_value;
	        }
        	$dt['total_bayar'] = $kelas->harga-($kelas->diskon/100)*$kelas->harga-$coupon_value;
        	$id_metode_bayar = $this->input->post('metode_bayar');
        	$metode_bayar = $this->MyModel->get('metode_bayar', '*', array('id'=>$id_metode_bayar))->row();
        	$dt['jenis_bayar'] = $metode_bayar->jenis;
        	$dt['tujuan_bayar'] = $metode_bayar->rekening;
        	$dt['tujuan_atas_nama'] = $metode_bayar->atas_nama;
        	$dt['tujuan_logo'] = $metode_bayar->logo;
        	$dt['waktu_register'] = date('Y-m-d H:i:s');
        	$insert = $this->MyModel->insert('pembelian', $dt);
        	if($insert){
        		redirect('pembayaran/konfirmasi/'.$id_invoice);
        	}else{
        		notif('danger', 'Terjadi kesalahan saat enroll kelas. Coba lagi nanti');
        	}
        }

		$data['title'] = "Pembelian";
		$data['jenis'] = $this->db->select('jenis')->where('status', 'Y')->group_by('jenis')->get('metode_bayar');
		$data['kelas'] = $kelas;
		$this->load->view('frontend/view_enroll_new', $data);
	}

	function checkCoupon()
	{
		$code = $this->input->post('code');
		$id_kelas = $this->input->post('id_kelas');
		$check = $this->MyModel->get('kupon', '*', array('code'=>$code, 'id_kelas'=>$id_kelas));
		$kupon = $check->row();

		if($check->num_rows()>0){
			$redeemed = $this->MyModel->get('pembelian', 'COUNT(*) as redeemed', array('coupon_code'=>$code))->row()->redeemed;
			if($kupon->quota=='0' || intval($kupon->quota)>intval($redeemed)){
				if(strtotime($kupon->waktu_expired)>date('Y-m-d') || $kupon->waktu_expired=='0000-00-00'){
					$result['status'] = 'available';
					$result['coupon_value'] = $kupon->value;
					$result['potongan'] = 'Potongan <strong>Rp '.rupiah($kupon->value).'</strong>';
					$result['list_kupon'] = '<span>KUPON</span><span>- Rp '.rupiah($kupon->value).'</span>';
				}else{
					$result['status'] = 'unavailable';
					$result['potongan'] = 'Kupon sudah tidak berlaku';
				}
			}else{
				$result['status'] = 'unavailable';
				$result['potongan'] = 'Maaf kuota kupon ini telah penuh';
			}
		}else{
			$result['status'] = 'unavailable';
			$result['potongan'] = 'Maaf kode kupon tidak tersedia';
		}
		echo json_encode($result);
	}

	function invoice($id_invoice)
	{
		$data['title'] = "Pembayaran Invoice No. ".$id_invoice;
		$data['pembelian'] = $this->MyModel->get('view_pembelian', '*', array('id_invoice'=>$id_invoice))->row();
		$this->load->view('frontend/view_invoice_new', $data);
	}

	function konfirmasi($id_invoice)
	{
		$this->form_validation->set_rules('bayar_atas_nama', 'Atas Nama Pembayaran', 'trim|required');
		$this->form_validation->set_rules('bayar_rekening', 'Nomor Rekening', 'trim|required');
        if ($this->form_validation->run() != false) {
            $path   = '../assets/images/pembayaran/konfirmasi/';
            $lokasi = realpath(APPPATH . $path);
            $nmfile = $id_invoice;
	        $config['upload_path']      = $lokasi;
	        $config['allowed_types']    = 'jpg||png||PNG||jpeg||bmp';
	        $config['file_name']        = $nmfile;
	        $config['remove_spaces']    = TRUE;
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('foto');
	        $cover = $this->upload->file_name;
        	$letakhasil = realpath(APPPATH . $path.$cover);
	        $foto = compress_img($letakhasil);
	        $dt['status'] = 'confirmed';
	        $dt['foto_konfirmasi'] = $foto;
        	$dt['bayar_atas_nama'] = $this->input->post('bayar_atas_nama');
        	$dt['bayar_rekening'] = $this->input->post('bayar_rekening');
        	$dt['waktu_konfirmasi'] = date('Y-m-d H:i:s');
        	$update = $this->MyModel->update('pembelian', $dt, array('id_invoice'=>$id_invoice));
        	if($update){
        		notif('success', 'Berhasil upload bukti pembayaran untuk invoive no. '.$id_invoice);
        		redirect('siswa/dashboard');
        	}else{
        		notif('danger', 'Terjadi kesalahan saat upload');
        	}
        }
		$data['title'] = "Konfirmasi Pembayaran Invoice No. ".$id_invoice;
		$data['pembelian'] = $this->MyModel->get('view_pembelian', '*', array('id_invoice'=>$id_invoice))->row();
		$this->load->view('frontend/view_konfirmasi_new', $data);
	}

	function batal($id_invoice)
	{
		$cancel = array('status'=>'canceled', 'waktu_canceled'=>date('Y-m-d H:i:s'));
		$update = $this->MyModel->update('pembelian', $cancel, array('id_invoice'=>$id_invoice));
		if($update){
			notif('danger', 'Pembelian dibatalkan');
		}else{
			notif('warning', 'Terjadi kesalahan saat membatalkan pembelian');
		}
		redirect('pembayaran/invoice/'.$id_invoice);
	}

}