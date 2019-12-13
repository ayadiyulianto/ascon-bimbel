<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {

	// Basic CUD

	public function insert($table, $data) {
		return $this->db->insert($table, $data);
	}

	public function update($table, $data, $where) {
		return $this->db->update($table, $data, $where);
	}

	public function delete($table, $where) {
		return $this->db->delete($table, $where);
	}

	// KELAS SAYA

	public function getKelasSaya($id_user){
		$this->db->select('tb_kelas.id, nama, tb_kelas_user.tgl_dibuat, deskripsi_singkat, foto');
		$this->db->from('tb_kelas_user');
		$this->db->join('tb_kelas', 'tb_kelas.id=tb_kelas_user.id_kelas');
		$this->db->where('tb_kelas_user.id_user', $id_user);
		return $this->db->get();
	}

	public function getForum(){
		$this->db->order_by('tgl_dibuat','DESC');
		return $this->db->get('tb_forum');
	}

	public function getLatihan($kode_kelas){
		$this->db->select('tb_modul.kode_modul, nama_modul, status, tgl_mulai, nilai');
		$this->db->join('tb_nilai_peserta','tb_modul.kode_modul=tb_nilai_peserta.kode_modul','left');
		$this->db->where('kode_kelas',$kode_kelas);
		$this->db->order_by('tb_modul.kode_modul','DESC');
		return $this->db->get('tb_modul');
	}

	public function sesiSoal($kode_modul, $id_user_peserta){

		$dataUserModul = array('kode_modul'=>$kode_modul, 'id_user_peserta'=>$id_user_peserta, 'tgl_mulai'=>date('Y-m-d'));
		$this->insert('tb_nilai_peserta', $dataUserModul);

		$this->db->select('id_sesi');
		$id_sesi = $this->db->get_where('tb_nilai_peserta', $dataUserModul)->row()->id_sesi;

		$this->db->select('jml_soal');
		$this->db->where('kode_modul',$kode_modul);
		$jml_soal = $this->db->get('tb_modul')->row()->jml_soal;

		$this->db->select('id_soal');
		$this->db->order_by('rand()');
		$this->db->limit($jml_soal);
		$soal = $this->db->get('tb_soal')->result();

		foreach ($soal as $key) {
			$sesiSoal[] = array('id_sesi'=>$id_sesi, 'id_soal'=>$key->id_soal);
		}
		return $this->db->insert_batch('tb_sesi_soal',$soal);
	}

	public function getSoal(){}

}