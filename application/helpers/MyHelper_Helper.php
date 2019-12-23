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

if (!function_exists('compressImage'))
{
    function compressImage($source_url, $destination_url, $quality) {
        $info = getimagesize($source_url);

        if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
        elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
        elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);

        //save file
        imagejpeg($image, $destination_url, $quality);

        //return destination file
        return $destination_url;
    }
}

if (!function_exists('currentDateTime'))
{
    function currentDateTime(){
        return date('Y-m-d H:i:s');
    }
}