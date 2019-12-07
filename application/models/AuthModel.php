<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function createNewUser($data) {
		return $this->db->insert('tb_user',$data);
	}
	public function delete($table,$where) {
		return $this->db->delete($table,$where);
	}
	public function checkUser($username){
		$this->db->select('id_user, password, nama, role');
		$this->db->where(array('username'=>$username));
		return $this->db->get('tb_user');
	}
	public function getLastPesertaId() {
		$this->db->select('id_user');
		$this->db->order_by('id_user', 'DESC');
		$this->db->like('id_user', 'P', 'after');
		$result = $this->db->get('tb_user');
		if($result->num_rows()==1){
			return $result->row()->id_user;
		}else{
			return 'P00001';
		}
	}
}