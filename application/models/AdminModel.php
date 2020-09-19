<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	// DASHBOARD

	function getRingkasan(){
		$data['jml_kelas'] = $this->MyModel->get('kelas', 'COUNT(*) as jml_kelas')->row()->jml_kelas;
		$data['jml_pengguna'] = $this->MyModel->get('user', 'COUNT(*) as jml_pengguna')->row()->jml_pengguna;
		$data['jml_enroll'] = $this->MyModel->get('kelas_siswa', 'COUNT(*) as jml_enroll')->row()->jml_enroll;
		$data['jml_pengajar'] = $this->MyModel->get('user', 'COUNT(*) as jml_pengajar', array('role'=>'Pengajar'))->row()->jml_pengajar;
		$data['jml_siswa'] = $this->MyModel->get('user', 'COUNT(*) as jml_siswa', array('role'=>'Siswa'))->row()->jml_siswa;
		$data['pendapatan'] = $this->MyModel->get('pembelian', 'SUM(total_bayar) as pendapatan', array('status'=>'approved'))->row()->pendapatan;
		return $data;
	}

    function getKategori(){
        return $this->db->select('kategori.*, COUNT(kelas.id_kelas) as jml_kelas')->from('kategori')
        ->join('kelas', 'kelas.id_kategori=kategori.id_kategori AND kelas.is_aktif="Y" AND kelas.status_verify!="Suspended"', 'left')
        ->group_by('id_kategori')->order_by('jml_kelas desc')
        ->get();
    }

}