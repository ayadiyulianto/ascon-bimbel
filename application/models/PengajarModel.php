<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengajarModel extends CI_Model {

	public function insert($table, $data) {
		return $this->db->insert($table,$data);
	}

	public function delete($table, $where){
		return $this->db->delete($table,$where);
	}

	public function update($table, $data, $where){
		return $this->db->update($table, $data, $where);
	}
}