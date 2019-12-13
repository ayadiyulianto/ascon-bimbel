<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('uploadFile'))
{
	function uploadFile($path){
		$config['upload_path']          = './assets/printing/img/';
	    $config['allowed_types']        = 'jpg|png';
	    $config['max_size']             = 5000;
        $data = file_get_contents($path);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')){
            return $this->upload->file_name;
        }else{
        	return '';
        }
	}
}

if (!function_exists('currentDate'))
{
    function currentDate(){
        return date('Y-m-d');
    }
}

if (!function_exists('currentDateTime'))
{
    function currentDateTime(){
        return date('Y-m-d H:i:s');
    }
}