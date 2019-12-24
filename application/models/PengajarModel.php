<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengajarModel extends CI_Model {

	// Basic CUD

	public function insert($table, $data) {
		return $this->db->insert($table,$data);
	}

	public function delete($table, $where){
		return $this->db->delete($table,$where);
	}

	public function update($table, $data, $where){
		return $this->db->update($table, $data, $where);
	}

	// KELAS

	public function getSemuaKelas($id_user){
		$this->db->select('tb_kelas.id, nama, tb_kelas.tgl_dibuat, deskripsi_singkat, foto');
		$this->db->from('tb_kelas');
		$this->db->join('tb_kelas_user', 'tb_kelas_user.id_kelas=tb_kelas.id');
		$this->db->where('tb_kelas_user.id_user', $id_user);
		return $this->db->get();
	}

	public function getKelas($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_kelas')->row();
	}

	public function getPengajarByKelas($id){
		$this->db->select('id_user');
		$this->db->where('id', $id);
		return $this->db->get('tb_kelas_user');
	}

	// MODUL

	public function getModulByKelas($id_kelas){
		$this->db->select('id, nama_modul, deskripsi_singkat');
		$this->db->where('id_kelas', $id_kelas);
		return $this->db->get('tb_modul');
	}

	public function getModul($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_modul')->row();
	}

	public function getMateriByModul($id_modul){
		$this->db->select('id, judul_materi, estimasi_waktu');
		$this->db->where('id_modul', $id_modul);
		return $this->db->get('tb_materi');
	}

	public function getMateri($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_materi');
	}

	public function getSoalByModul($id_modul){
		$this->db->select('id, soal');
		$this->db->where('id_modul', $id_modul);
		return $this->db->get('tb_soal');
	}

	public function getSoal($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_soal');
	}

	// SISWA

	public function getSiswaByKelas($id_kelas){
		$this->db->select('id_user, nama, tgl_lahir, jk');
		$this->db->from('tb_kelas_user');
		$this->db->join('tb_user', 'tb_kelas_user.id_user=tb_user.id');
		$this->db->where('tb_kelas_user.id_kelas', $id_kelas);
		$this->db->where('tb_user.role', 'siswa');
		return $this->db->get();
	}

}