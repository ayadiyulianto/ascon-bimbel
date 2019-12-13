<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	// Basic CUD

	public function insert($table, $data) {
		return $this->db->insert($table, $data);
	}

	public function insert_batch($table, $data) {
		return $this->db->insert_batch($table, $data);
	}

	public function update($table, $data, $where) {
		return $this->db->update($table, $data, $where);
	}

	public function delete($table, $where) {
		return $this->db->delete($table, $where);
	}

	// KELAS

	public function getSemuaKelas(){
		$this->db->select('id, nama, tgl_dibuat, deskripsi_singkat, foto');
		return $this->db->get('tb_kelas');
	}

	public function checkKodeKelas($id_kelas){
		$this->db->select('id');
		$this->db->where('id', $id_kelas);
		return $this->db->get('tb_kelas');
	}

	public function getKelas($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_kelas')->row();
	}

	public function getSemuaPengajar(){
		$this->db->select('id, nama');
		$this->db->where('role', 'pengajar');
		return $this->db->get('tb_user');
	}

	public function getPengajarByKelas($id_kelas){
		$this->db->select('id_user');
		$this->db->where('id_kelas', $id_kelas);
		return $this->db->get('tb_kelas_user');
	}

	public function deletePengajarOnKelas($id_kelas){
		$sql = "DELETE tb_kelas_user FROM tb_kelas_user INNER JOIN tb_user ON tb_user.id=tb_kelas_user.id_user WHERE tb_kelas_user.id_kelas=? AND tb_user.role=?";
		return $this->db->query($sql, array($id_kelas, 'pengajar'));
	}

	// USER

	public function getUser($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_user')->row();
	}

	public function getAllUsers($role){
		$this->db->select('id, nama, username, email, no_hp, tgl_lahir, jk');
		$this->db->where('role', $role);
		return $this->db->get('tb_user');
	}

	public function checkUser($username){
		$this->db->select('id');
		$this->db->where('username', $username);
		return $this->db->get('tb_user');
	}
}