<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontendModel extends CI_Model {

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

	public function getSemuaKelas(){
		$this->db->select('id, nama, tgl_dibuat, deskripsi_singkat, foto');
		return $this->db->get('tb_kelas');
	}

	public function getKelasByUser($id_user){
		$this->db->select('id_kelas');
		$this->db->where('id_user', $id_user);
		return $this->db->get('tb_kelas_user');
	}

}