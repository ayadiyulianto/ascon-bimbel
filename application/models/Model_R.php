<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_R extends CI_Model {

    public function read($tabel)
	{
        $this->db->from($tabel);
        return $this->db->get();
    }
}