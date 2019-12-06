<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {

    public function get($table,$select="*",$order_by=1) {
        $this->db->select($select);
		$this->db->order_by($order_by);
		return $this->db->get($table);
	}
	public function get_where($table,$where,$select="*",$order_by=1) {
        $this->db->select($select);
		$this->db->order_by($order_by);
		return $this->db->get_where($table,$where);
	}
	public function update($table,$data,$where) {
		return $this->db->update($table,$data,$where);
	}
	public function insert($table,$data) {
		return $this->db->insert($table,$data);
	}
	public function delete($table,$where) {
		return $this->db->delete($table,$where);
	}
}