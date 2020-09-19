<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengajarModel extends CI_Model {

	// KELAS

	function getKelasSaya($id_user){
		return $this->db->select('view_kelas.*')
		->from('view_kelas')
		->join('kelas_pengajar', 'kelas_pengajar.id_kelas=view_kelas.id_kelas')
		->where(array('kelas_pengajar.id_user'=>$id_user))
		->order_by('waktu_post desc')
		->get();
	}

	function getRingkasanKelas($id_kelas){
		$data['jml_siswa'] = $this->MyModel->get('kelas_siswa', 'COUNT(*) as jml_siswa', array('id_kelas'=>$id_kelas))->row()->jml_siswa;
		$data['jml_modul'] = $this->db->select('COUNT(*) as jml_modul')->from('modul_konten')->join('modul','modul.id_modul=modul_konten.id_modul AND modul.id_kelas='.$id_kelas)->get()->row()->jml_modul;
		$data['jml_soal'] = $this->db->select('COUNT(*) as jml_soal')->from('soal_pertanyaan')->join('modul_konten','modul_konten.id_konten=soal_pertanyaan.id_konten')->join('modul','modul.id_modul=modul_konten.id_modul AND modul.id_kelas='.$id_kelas)->get()->row()->jml_soal;
		$data['ulasan'] = $this->MyModel->get('review', 'IFNULL(ROUND(AVG(rating),1),0) as rating, COUNT(*) as jumlah', array('id_kelas'=>$id_kelas))->row();
		$data['sedang_belajar'] = $this->MyModel->get('kelas_siswa', 'COUNT(*) as sedang_belajar', array('id_kelas'=>$id_kelas, 'is_finished'=>'N'))->row()->sedang_belajar;
		$data['selesai_kelas'] = $this->MyModel->get('kelas_siswa', 'COUNT(*) as selesai_kelas', array('id_kelas'=>$id_kelas, 'is_finished'=>'Y'))->row()->selesai_kelas;
		return $data;
	}

	function getRingkasanMonitoring($id_kelas){
		$data['pendapatan'] = $this->MyModel->get('pembelian', 'SUM(total_bayar) as pendapatan', array('id_kelas'=>$id_kelas, 'status'=>'approved'))->row()->pendapatan;
		$data['jml_siswa'] = $this->MyModel->get('kelas_siswa', 'COUNT(*) as jml_siswa', array('id_kelas'=>$id_kelas))->row()->jml_siswa;
		return $data;
	}

	// SISWA

	function getSiswaByKelas($id_kelas){
		$this->db->select('user.id_user, nama, tgl_lahir, jk');
		$this->db->from('kelas_user');
		$this->db->join('user', 'kelas_user.id_user=user.id_user');
		$this->db->where('kelas_user.id_kelas', $id_kelas);
		$this->db->where('user.role', 'Siswa');
		return $this->db->get();
	}

	function getModulMateriByKelas($id_user, $id_kelas){
		$this->db->select('modul.id_modul, nama_modul, deskripsi_singkat, modul_siswa.status, id_materi_dibaca_terakhir');
		$this->db->from('modul_siswa');
		$this->db->join('modul', 'modul.id_modul=modul_siswa.id_modul AND modul_siswa.id_user_siswa='.$id_user, 'right');
		$this->db->where('modul.id_kelas', $id_kelas);
		$this->db->order_by('no_urut');
		return $this->db->get();
	}

	function getModulSoalByKelas($id_user, $id_kelas){
		$this->db->select('modul.id_modul, nama_modul, deskripsi_singkat, status_latihan, nilai, waktu_pengerjaan, id_sesi_latihan_terakhir');
		$this->db->from('modul_siswa');
		$this->db->join('modul', 'modul.id_modul=modul_siswa.id_modul AND modul_siswa.id_user_siswa='.$id_user, 'right');
		$this->db->where('modul.id_kelas', $id_kelas);
		$this->db->order_by('no_urut');
		return $this->db->get();
	}

	// DISKUSI

}