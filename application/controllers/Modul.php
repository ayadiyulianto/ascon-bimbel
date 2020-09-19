<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

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
		$this->form_validation->set_rules('nama_modul', 'Nama Modul', 'trim|required');
        if ($this->form_validation->run() != false) {
        	$data['nama_modul'] = $this->input->post('nama_modul');
			$data['deskripsi_singkat'] = $this->input->post('deskripsi_singkat');
			$data['id_kelas'] = $id_kelas;
			$data['no_urut'] = ($this->MyModel->get('modul', 'MAX(no_urut) as max', array('id_kelas'=>$id_kelas))->row()->max)+1;
			$data['is_aktif'] = 'Y';
			$data['id_user_post'] = userdata('id_user');
			$data['waktu_post'] = date('Y-m-d H:i:s');
			$insert = $this->MyModel->insert('modul', $data);
			if($insert){
				notif('success', 'Berhasil menambah modul baru');
			}else{
				notif('error', 'Terjadi kesalahan saat menambah modul baru');
			}
			redirect("modul");
        }
		$data['title'] = "Modul Belajar";
		$data['modul'] = $this->MyModel->get('modul', '*', array('id_kelas'=>$id_kelas), 'no_urut asc');
		$this->load->view('pengajar/view_modul_new', $data);
	}

	function simpanDetail()
	{
		$id_modul = $this->input->post('id_modul');
		$data['nama_modul'] = $this->input->post('nama_modul');
		$data['deskripsi_singkat'] = $this->input->post('deskripsi_singkat');
		$data['id_user_edit'] = userdata('id_user');
		$data['waktu_edit'] = date('Y-m-d H:i:s');
		$update = $this->MyModel->update('modul',$data, array('id_modul'=>$id_modul));
		if($update){
			$result['status'] = 'success';
			$result['message']= 'Berhasil mengubah info modul';
		}else{
			$result['status'] = 'error';
			$result['message']= 'Gagal mengubah info modul';
		}
		echo json_encode($result);
	}

	function urutkanModul()
	{
		$modulOrder = explode(',', $this->input->post('sorted'));
		for($i=1; $i<=count($modulOrder); $i++){
			$data[] = array('id_modul'=>$modulOrder[$i-1], 'no_urut'=>$i);
		}
		$update = $this->MyModel->update_batch('modul', $data, 'id_modul');
		if($update){
			$result['status'] = 'success';
			$result['message']= 'Berhasil menyimpan urutan modul';
		}else{
			$result['status'] = 'error';
			$result['message']= 'Gagal menyimpan urutan modul';
		}
		echo json_encode($result);
	}

	function toggleModulAktif()
	{
		$id_modul = $this->input->post('id_modul');
		$data['is_aktif'] = $this->input->post('is_aktif');
		$update = $this->MyModel->update('modul', $data, array('id_modul'=>$id_modul));
		if($update){
			$result['status'] = 'success';
			$result['message']= 'Berhasil mengubah info modul';
		}else{
			$result['status'] = 'error';
			$result['message']= 'Gagal mengubah info modul';
		}
		echo json_encode($result);
	}

	function hapusModul()
	{
		$id_modul = $this->input->post('id');
		$delete = $this->MyModel->delete('modul', array('id_modul'=>$id_modul));
		if($delete){
			$result['status'] = 'success';
			$result['message']= 'Berhasil menghapus modul';
		}else{
			$result['status'] = 'error';
			$result['message']= 'Gagal menghapus modul';
		}
		echo json_encode($result);
	}

	function materiDetail($id_modul, $id_konten=NULL)
	{
		$this->form_validation->set_rules('judul_konten', 'Judul Materi', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis Materi', 'trim|required');
        if ($this->form_validation->run() != false) {
        	$id_konten = $this->input->post('id_konten');
        	$data['judul_konten']= $this->input->post('judul_konten');
        	$data['jenis']		= $this->input->post('jenis');
        	$data['isi']		= $this->input->post('isi');
        	$data['video_url'] 	= $this->input->post('video_url');
        	$data['durasi_belajar']= $this->input->post('durasi_belajar');
        	$data['catatan']	= $this->input->post('catatan');
        	if(empty($id_konten)){
        		$data['id_modul']	= $id_modul;
        		$data['id_user_post']= userdata('id_user');
        		$data['waktu_post']	= date('Y-m-d H:i:s');
        		$data['status']		= 'Y';
        		$data['no_urut']	= ($this->MyModel->get('modul_konten', 'MAX(no_urut) as max', array('id_modul'=>$id_modul))->row()->max)+1;
        		$insert = $this->MyModel->insert('modul_konten', $data);
        		if($insert){
        			notif('success', 'Berhasil menambah materi');
        			redirect("modul");
        		}else{
        			notif('error', 'Terjadi kesalahan saat menambah materi');
        		}
        	}else{
        		$data['id_user_edit']= userdata('id_user');
        		$data['waktu_edit']	= date('Y-m-d H:i:s');
        		$update = $this->MyModel->update('modul_konten', $data, array('id_konten'=>$id_konten));
        		if($update){
        			notif('success', 'Berhasil mengubah materi');
        			redirect("modul");
        		}else{
        			notif('error', 'Terjadi kesalahan saat mengubah materi');
        		}
        	}
        }
		$data['title']	= "Detail Materi";
		$data['id_modul'] = $id_modul;
		if($id_konten!=NULL){
			$data['materi'] = $this->MyModel->get('modul_konten', '*', array('id_konten'=>$id_konten))->row();
		}
		$this->load->view('pengajar/view_materi_detail_new', $data);
	}

	function latihanDetail($id_modul, $id_konten=NULL)
	{
		$this->form_validation->set_rules('judul_konten', 'Judul Materi', 'trim|required');
		$this->form_validation->set_rules('latihan_jumlah_soal', 'Jumal Soal', 'trim|required');
		$this->form_validation->set_rules('latihan_passing_grade', 'Passing Grade', 'trim|required');
		$this->form_validation->set_rules('durasi_belajar', 'Durasi Pengerjaan', 'trim|required');
        if ($this->form_validation->run() != false) {
        	$id_konten = $this->input->post('id_konten');
        	$data['judul_konten']= $this->input->post('judul_konten');
        	$data['latihan_jumlah_soal']= $this->input->post('latihan_jumlah_soal');
        	$data['latihan_passing_grade']= $this->input->post('latihan_passing_grade');
        	if($this->input->post('latihan_has_timer')=='Y'){ $data['latihan_has_timer']='Y'; }
        	else{ $data['latihan_has_timer']='N'; }
        	$data['durasi_belajar']= $this->input->post('durasi_belajar');
        	$data['catatan']	= $this->input->post('catatan');
        	if(empty($id_konten)){
        		$data['id_modul']	= $id_modul;
        		$data['jenis']		= 'Latihan';
        		$data['id_user_post']= userdata('id_user');
        		$data['waktu_post']	= date('Y-m-d H:i:s');
        		$data['status']		= 'Y';
        		$data['no_urut']	= ($this->MyModel->get('modul_konten', 'MAX(no_urut) as max', array('id_modul'=>$id_modul))->row()->max)+1;
        		$insert = $this->MyModel->insert('modul_konten', $data);
        		if($insert){
        			$id_konten = $this->MyModel->get('modul_konten', 'id_konten', $data)->row()->id_konten;
        			notif('success', 'Berhasil menambah latihan');
        			redirect("modul/latihandetail/".$id_modul.'/'.$id_konten);
        		}else{
        			notif('error', 'Terjadi kesalahan saat menambah latihan');
        		}
        	}else{
        		$data['id_user_edit']= userdata('id_user');
        		$data['waktu_edit']	= date('Y-m-d H:i:s');
        		$update = $this->MyModel->update('modul_konten', $data, array('id_konten'=>$id_konten));
        		if($update){
        			notif('success', 'Berhasil mengubah detail latihan');
        			redirect("modul/latihandetail/".$id_modul.'/'.$id_konten);
        		}else{
        			notif('error', 'Terjadi kesalahan saat mengubah latihan');
        		}
        	}
        }
		$data['title']	= "Detail Latihan";
		$data['id_modul'] = $id_modul;
		$data['id_konten'] = $id_konten;
		if($id_konten!=NULL){
			$data['latihan']= $this->MyModel->get('modul_konten', '*', array('id_konten'=>$id_konten))->row();
		}
		$this->load->view('pengajar/view_latihan_detail_new', $data);
	}

	function cetakSoal($id_konten){
		echo "cetakSoal";
	}

	function getSoal($id_konten)
	{
		$soal = $this->MyModel->get('soal_pertanyaan', 'id_soal, jenis_soal, soal', array('id_konten'=>$id_konten));
		if($soal->num_rows()==0){
			$html = '<tr><td colspan="4" align="center">Belum ada soal</td></tr>';
		}else{
			$html = '';
			$no = 1;
			foreach($soal->result_array() as $row){
				$html .= '<tr>
		            <td class="tx-normal">'.$no++.'</td>
		            <td class="tx-medium">'.$row['soal'].'</td>
		            <td class="tx-normal">'.$row['jenis_soal'].'</td>
		            <td>
		              <a class="btn btn-icon btn-outline-primary btn-xs edit-btn" data-id="'.$row['id_soal'].'" href="javascript:;"><i class="fa fa-pencil"></i></a>
		              <a class="btn btn-icon btn-danger btn-xs delete-btn" data-id="'.$row['id_soal'].'" href="javascript:;"><i class="fa fa-trash"></i></a>
		            </td>
		          </tr>';
	        }
	    }
		echo $html;
	}

	function getSoalById()
	{
		$where = array('id_soal'=>$this->input->post('id_soal'));
		$soal = $this->MyModel->get('soal_pertanyaan', '*', $where)->row_array();
		$jawaban = $this->MyModel->get('soal_jawaban', '*', $where)->result_array();
		$html = '';
		foreach($jawaban as $row){
			$checked = ($row['is_benar']=='Y') ? 'checked':'';
			$html .= '<div class="div-soal"><div class="d-flex justify-content-between mg-b-10">Jawaban<button class="btn btn-xs btn-icon btn-outline-danger hapus-jawaban"><i class="fa fa-trash"></i></button></div>
				<div class="row mg-b-20">
				<input type="hidden" name="id_jawaban[]" value="'.$row['id_jawaban'].'">
				<div class="form-group col-xs-1 col-lg-1"><div class="custom-control custom-'.$soal['jenis_soal'].'"><input type="'.$soal['jenis_soal'].'" name="benar[]" value="Y" '.$checked.' class="custom-control-input benar_tambah" id="custom'.$row['id_jawaban'].'"><label class="custom-control-label" for="custom'.$row['id_jawaban'].'"></label></div></div>
				<div class="form-group col-xs-11 col-lg-11"><textarea name="jawaban_text[]" class="form-control summernote2">'.$row['jawaban_text'].'</textarea></div>
				</div></div>';
		}
		$data['soal'] = $soal;
		$data['jawaban'] = $html;
		echo json_encode($data);
	}

	function simpanLatihanSoal()
	{	
    	$id_modul = $this->input->post('id_modul');
    	$id_konten = $this->input->post('id_konten');
    	$id_soal = $this->input->post('id_soal');
    	$data['jenis_soal']= $this->input->post('jenis_soal');
    	$data['soal']= str_replace('<p','<p class="mg-b-0"', $this->input->post('soal'));
    	$data['pembahasan']= $this->input->post('pembahasan');
    	if(empty($id_soal)){
    		$data['id_konten']	= $id_konten;
    		$insert = $this->MyModel->insert('soal_pertanyaan', $data);
    		if($insert){
    			$id_soal = $this->MyModel->get('soal_pertanyaan', 'id_soal', $data)->row()->id_soal;
				$result['status'] = 'success';
				$result['message']= 'Berhasil menambah soal latihan';

		    	$jawaban = array();
		    	$jawaban_text = $this->input->post('jawaban_text');
		    	$benar = $this->input->post('is_benar');
		    	for($i=0; $i<count($jawaban_text); $i++){
		    		$dt['id_soal']		= $id_soal;
		    		$dt['jawaban_text'] = str_replace('<p','<p class="mg-b-0"', $jawaban_text[$i]);
		    		$dt['is_benar']		= $benar[$i];
		    		$jawaban[] = $dt;
		    	}
		    	$this->MyModel->insert_batch('soal_jawaban', $jawaban);

    		}else{
				$result['status'] = 'error';
				$result['message']= 'Terjadi kesalahan saat menambah soal latihan';
    		}
    	}else{
    		$update = $this->MyModel->update('soal_pertanyaan', $data, array('id_soal'=>$id_soal));
    		if($update){
				$result['status'] = 'success';
				$result['message']= 'Berhasil mengubah soal latihan';
    		}else{
				$result['status'] = 'error';
				$result['message']= 'Terjadi kesalahan saat mengubah soal latihan';
    		}
			$new_jawaban = array();
			$update_jawaban = array();
    		$old_id = array_column($this->MyModel->get('soal_jawaban', 'id_jawaban', array('id_soal'=>$id_soal))->result_array(), 'id_jawaban');
	    	$id_jawaban = $this->input->post('id_jawaban');
	    	$removed_id = array_diff($old_id, $id_jawaban);
	    	$jawaban_text = $this->input->post('jawaban_text');
	    	$benar = $this->input->post('is_benar');
	    	for($i=0; $i<count($jawaban_text); $i++){
	    		$dt = array();
	    		$dt['id_soal']		= $id_soal;
	    		$dt['jawaban_text'] = $jawaban_text[$i];
	    		$dt['is_benar']		= $benar[$i];
	    		if(in_array($id_jawaban[$i], $old_id)) {
	    			$dt['id_jawaban'] = $id_jawaban[$i];
	    			$update_jawaban[] = $dt;
	    		}else{
	    			$new_jawaban[] = $dt;
	    		}
	    	}
	    	if(!empty($new_jawaban)) $this->MyModel->insert_batch('soal_jawaban', $new_jawaban);
	    	if(!empty($update_jawaban)) $this->MyModel->update_batch('soal_jawaban', $update_jawaban, 'id_jawaban');
	    	if(!empty($removed_id)) $this->MyModel->delete_batch('soal_jawaban', $removed_id, 'id_jawaban');
    	}

    	echo json_encode($result);
	}

	function hapusSoal()
	{
		$where['id_soal'] 	= $this->input->post('id');
		if ($this->MyModel->delete('soal_pertanyaan', $where)){
			$response['status'] = 'success';
			$response['message']= 'Berhasil menghapus';
		}else{
			$response['status'] = 'error';
			$response['message']= 'Gagal menghapus';
		}
		echo json_encode($response);
	}

	function urutkanKonten()
	{
		$kontenOrder = explode(',', $this->input->post('sorted'));
		for($i=0; $i<count($kontenOrder); $i++){
			$data[] = array('id_konten'=>$kontenOrder[$i], 'no_urut'=>$i);
		}
		$update = $this->MyModel->update_batch('modul_konten', $data, 'id_konten');
		if($update){
			$result['status'] = 'success';
			$result['message']= 'Berhasil menyimpan urutan konten';
		}else{
			$result['status'] = 'error';
			$result['message']= 'Gagal menyimpan urutan konten';
		}
		echo json_encode($result);
	}

	function toggleKontenAktif()
	{
		$id_konten = $this->input->post('id_konten');
		$data['status'] = $this->input->post('status');
		$update = $this->MyModel->update('modul_konten', $data, array('id_konten'=>$id_konten));
		if($update){
			$result['status'] = 'success';
			$result['message']= 'Berhasil mengubah info konten';
		}else{
			$result['status'] = 'error';
			$result['message']= 'Gagal mengubah info konten';
		}
		echo json_encode($result);
	}

	function hapusKonten()
	{
		$id_konten = $this->input->post('id');
		$delete = $this->MyModel->delete('modul_konten', array('id_konten'=>$id_konten));
		if($delete){
			$result['status'] = 'success';
			$result['message']= 'Berhasil menghapus konten';
		}else{
			$result['status'] = 'error';
			$result['message']= 'Gagal menghapus konten';
		}
		echo json_encode($result);
	}

	function tugasDetail($id_modul, $id_konten=NULL)
	{
		$this->form_validation->set_rules('judul_konten', 'Judul Tugas', 'trim|required');
        if ($this->form_validation->run() != false) {
        	$id_konten = $this->input->post('id_konten');
        	$data['judul_konten']= $this->input->post('judul_konten');
        	$data['isi']		= $this->input->post('isi');
        	$data['catatan']	= $this->input->post('catatan');
        	if(empty($id_konten)){
        		$data['id_modul']	= $id_modul;
        		$data['jenis']		= 'Tugas';
        		$data['id_user_post']= userdata('id_user');
        		$data['waktu_post']	= date('Y-m-d H:i:s');
        		$data['status']		= 'Y';
        		$data['no_urut']	= ($this->MyModel->get('modul_konten', 'MAX(no_urut) as max', array('id_modul'=>$id_modul))->row()->max)+1;
        		$insert = $this->MyModel->insert('modul_konten', $data);
        		if($insert){
        			notif('success', 'Berhasil menambah tugas');
        			redirect("modul");
        		}else{
        			notif('error', 'Terjadi kesalahan saat menambah tugas');
        		}
        	}else{
        		$data['id_user_edit']= userdata('id_user');
        		$data['waktu_edit']	= date('Y-m-d H:i:s');
        		$update = $this->MyModel->update('modul_konten', $data, array('id_konten'=>$id_konten));
        		if($update){
        			notif('success', 'Berhasil mengubah tugas');
        			redirect("modul");
        		}else{
        			notif('error', 'Terjadi kesalahan saat mengubah tugas');
        		}
        	}
        }
		$data['title']	= "Detail Tugas";
		$data['id_modul'] = $id_modul;
		if($id_konten!=NULL){
			$data['tugas'] = $this->MyModel->get('modul_konten', '*', array('id_konten'=>$id_konten))->row();
		}
		$this->load->view('pengajar/view_tugas_detail_new', $data);
	}

}
