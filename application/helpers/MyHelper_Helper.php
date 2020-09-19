<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('checkCookie'))
{
    function checkCookie(){
        $ci =& get_instance();
        $cookie = get_cookie('oassebimbel');
        $checkUser = $ci->MyModel->get('user', 'id_user, role, password, nama_user, foto', array('cookie_key'=>$cookie));
        if($checkUser->num_rows()==1){
            $user = $checkUser->row();
            $session_data['oasse-bimbel'] = TRUE;
            $session_data['id_user'] = $user->id_user;
            $session_data['role'] = $user->role;
            $session_data['nama_user'] = $user->nama_user;
            $session_data['foto'] = $user->foto;
            // Add user data in session
            $ci->session->set_userdata($session_data);
        }
    }
}

if (!function_exists('slug'))
{
    function slug($text){
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
        $text = trim($text, '-');
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text)){
            return 'n-a';
        }
        return $text;
    }
}

if (!function_exists('rating'))
{
    function rating($rate, $color='orange'){
        $rating = '';
        for($i=1; $i<=5; $i++){
            if($i<=$rate) $rating .= '<i class="fa fa-star tx-'.$color.'"></i>';
            else $rating .= '<i class="fa fa-star tx-gray-300"></i>';
        }
        return $rating;
    }
}

if (!function_exists('notif'))
{
    function notif($color, $message, $title="Notifikasi"){
        $ci =& get_instance();
        $ci->session->set_flashdata('notif','<div class="modal" id="myModalNotification" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content tx-14"><div class="modal-header bg-'.$color.'"><h5 class="modal-title tx-uppercase tx-white">'.$title.'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="tx-white">&times;</span></button></div><div class="modal-body"><p class="mg-b-0 text-justify tx-medium">'.$message.'</p></div></div></div></div><script type="text/javascript">$(function(){$("#myModalNotification").modal("show");});</script>');
    }
}

if (!function_exists('input'))
{
    function input($post,$data){
        $ci =& get_instance();
        if($ci->input->post($post)){
            echo $ci->input->post($post);
        }elseif (!empty($data)) {
            echo $data;
        }
    }
}

if (!function_exists('userdata'))
{
    function userdata($data){
        $ci =& get_instance();
        $data = $ci->session->userdata($data);
        if(empty($data)){
             $data="";
        }
        return $data;
    }
}

if (!function_exists('encrypt'))
{
    function encrypt($data){
        $ci =& get_instance();
        return $ci->encrypt->encode($data);
    }
}

if (!function_exists('decrypt'))
{
    function decrypt($data){
        $ci =& get_instance();
        return $ci->encrypt->decode($data);
    }
}

if (!function_exists('avatar'))
{
    function avatar($data){
        if(empty($data)){
            return base_url('assets/images/user/user_placeholder.png');
        } else {
            return $data;
        }
    }
}

if (!function_exists('rupiah'))
{
    function rupiah($number){
        return number_format($number,2,",",".");
    }
}

if (!function_exists('data'))
{
    function data($table, $where, $sIndexColumn, $aColumns){
        $ci =& get_instance();
        error_reporting(0);
        $sLimit = "";
        if ( isset( $_REQUEST['iDisplayStart'] ) && $_REQUEST['iDisplayLength'] != '-1' ){
            $sLimit = "LIMIT ".$ci->security->xss_clean( $_REQUEST['iDisplayStart'] ).", ".$ci->security->xss_clean( $_REQUEST['iDisplayLength'] );
        }
        $numbering = $ci->security->xss_clean( $_REQUEST['iDisplayStart'] );
        $page = 1;/*//pagging // ordering*/
        if ( isset( $_REQUEST['iSortCol_0'] ) ){
            $sOrder = "ORDER BY  ";
            for ( $i=0 ; $i<intval( $_REQUEST['iSortingCols'] ) ; $i++ ){
                if ( $_REQUEST[ 'bSortable_'.intval($_REQUEST['iSortCol_'.$i]) ] == "true" ){
                    $sOrder .= $aColumns[ intval( $_REQUEST['iSortCol_'.$i] ) ]." ".$ci->security->xss_clean( $_REQUEST['sSortDir_'.$i] ) .", ";
                }
            }
            $sOrder = substr_replace( $sOrder, "", -2 );
            if ( $sOrder == "ORDER BY" ){$sOrder = "";}
        }
        /*// filtering*/
        $sWhere = "";
        if ( $_REQUEST['sSearch'] != "" ){
            $sWhere = "WHERE (";
            for ( $i=0 ; $i<count($aColumns) ; $i++ ){
                $sWhere .= $aColumns[$i]." LIKE \"%".$ci->security->xss_clean( $_REQUEST['sSearch'] )."%\" OR ";
            }
            $sWhere = substr_replace( $sWhere, "", -3 );$sWhere .= ')';
        }
        /*// individual column filtering*/
        for ( $i=0 ; $i<count($aColumns) ; $i++ ){
            if ( $_REQUEST['bSearchable_'.$i] == "true" && $_REQUEST['sSearch_'.$i] != '' ){
                if ( $sWhere == "" ){$sWhere = "WHERE ";}else{$sWhere .= " AND ";}
                $sWhere .= $aColumns[$i]." LIKE \"%".$ci->security->xss_clean($_REQUEST['sSearch_'.$i])."%\" ";
            }
        }
        
        $rResult = $ci->MyModel->get_data($table,$where,$aColumns, $sWhere, $sOrder, $sLimit, 'x'); 
        $iFilteredTotal = 10;
        $rResultTotal = $ci->MyModel->get_data($table,$where,$aColumns, $sWhere, NULL, NULL, $sIndexColumn); 
        $iTotal = $rResultTotal->num_rows();
        $iFilteredTotal = $iTotal;
        
        $output = array("sEcho" => intval($_REQUEST['sEcho']),"iTotalRecords" => $iTotal,"iTotalDisplayRecords" => $iFilteredTotal,"data" => array());
        
        $nomor_urut=$_REQUEST['iDisplayStart']+1;

        return array($nomor_urut, $rResult, $output);
    }
}

if (!function_exists('tgl_indo'))
{
    function tgl_indo($timestamp = '', $date_format = 'l, j F Y', $suffix = '') {
        if($timestamp=='0000-00-00 00:00:00') return '-';

        if (trim ($timestamp) == ''){
            $timestamp = time ();
        } elseif (!ctype_digit ($timestamp)){
            $timestamp = strtotime ($timestamp);
        }
        $date_format = preg_replace ("/S/", "", $date_format);
        $pattern = array (
            '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
            '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
            '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
            '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
            '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
            '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
            '/April/','/June/','/July/','/August/','/September/','/October/',
            '/November/','/December/',
        );
        $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
            'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
            'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
            'Januari','Februari','Maret','April','Juni','Juli','Agustus','September',
            'Oktober','November','Desember',
        );
        $date = date ($date_format, $timestamp);
        $date = preg_replace ($pattern, $replace, $date);
        $date = "{$date} {$suffix}";
        return $date;
    }     
}

if (!function_exists('tgl'))
{
    function tgl($ptime){
        $estimate_time = time() - strtotime($ptime);
        if( $estimate_time<1 AND $estimate_time>0 ){
            return 'kurang dari 1 menit yang lalu';
        }elseif( $estimate_time>-1 AND $estimate_time<0 ){
            return 'kurang dari 1 menit lagi';
        }
        $condition = array( 
            12 * 30 * 24 * 60 * 60  =>  'tahun',
            30 * 24 * 60 * 60       =>  'bulan',
            24 * 60 * 60            =>  'hari',
            60 * 60                 =>  'jam',
            60                      =>  'menit',
            1                       =>  'detik'
        );
        foreach( $condition as $secs => $str ){
            $d = $estimate_time / $secs;
            if( $d>=1 ){
                $r = round( $d );
                return $r.' '.$str.' yang lalu';
            }elseif($d<=-1){
                $r = round( $d );
                return abs($r).' '.$str.' lagi';
            }
        }
    }  
}

// upload foto

if (!function_exists('compress_img'))
{
    function compress_img($picture){

        $tipe = pathinfo($picture, PATHINFO_EXTENSION);
        $output = str_replace(".$tipe", '', $picture);
        if($tipe == 'png' or $tipe == 'PNG'){
            $image = imagecreatefrompng($picture);
        }else if($tipe == 'jpeg' or $tipe == 'jpg' or $tipe == 'JPG' or $tipe == 'JPEG'){
            $image = imagecreatefromjpeg($picture);
        }else if($tipe == 'gif'){
            $image = imagecreatefromgif($picture);
        }else{
            show_error('Terjadi Kesalahan', '400 Bad Request', $heading = '400 Bad Request');
        }
        $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
        imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
        imagealphablending($bg, TRUE);
        imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
        imagedestroy($image);
        $quality = 75; // 0 = worst / smaller file, 100 = better / bigger file 
        rename($picture, $output . ".jpg");
        imagejpeg($bg, $output . ".jpg", $quality);
        imagedestroy($bg);
        $name=pathinfo($picture, PATHINFO_FILENAME).'.jpg';

        return $name;
    }
}

if (!function_exists('upload_foto'))
{
    function upload_foto($lokasi,$path,$nmfile,$compress=TRUE,$thumbnail=TRUE){   
        $ci =& get_instance();     
        $config['upload_path']      = $lokasi;
        $config['allowed_types']    = 'jpg||png||PNG||jpeg||bmp';
        $config['file_name']        = $nmfile;
        $config['remove_spaces']    = TRUE;
        $ci->load->library('upload', $config);
        $ci->upload->do_upload('cover');
        $cover = $ci->upload->file_name;
        $letakhasil = realpath(APPPATH . $path.$cover);

        // IMAGE LIBRARY
        $ci->load->library('image_lib');
        //rotate
        $rot = $ci->input->post('rotate');
        if ($rot!=0) {
            if ($rot < 0) {$rotate = 360 - str_replace('-', '', $rot);}else{$rotate = $rot;}
            $config = array();
            $config['source_image'] = $letakhasil;
            $config['rotation_angle'] = $rotate;
            $ci->image_lib->initialize($config);
            $ci->image_lib->rotate();
            $ci->image_lib->clear();
        }
        //flip
        if ($ci->input->post('flipx') == -1) {
            if ($rotate == 90 OR $rotate == 270) {$rot = 'hor';}else{$rot = 'vrt';}
            $config = array();
            $config['source_image'] = $letakhasil;
            $config['rotation_angle'] = $rot;
            $ci->image_lib->initialize($config);
            $ci->image_lib->rotate();
            $ci->image_lib->clear();
        }
        if ($ci->input->post('flipy') == -1) {
            if ($rotate == 90 OR $rotate == 270) {$rot = 'vrt';}else{$rot = 'hor';}
            $config = array();
            $config['source_image'] = $letakhasil;
            $config['rotation_angle'] = $rot;
            $ci->image_lib->initialize($config);
            $ci->image_lib->rotate();
            $ci->image_lib->clear();
        }
        //crop
        $config = array();
        $config['source_image'] = $letakhasil;
        $config['maintain_ratio'] = false;
        $config['width']  = $ci->input->post('width');
        $config['height'] = $ci->input->post('height');
        $config['x_axis'] = $ci->input->post('x');
        $config['y_axis'] = $ci->input->post('y');
        $ci->image_lib->initialize($config);
        $ci->image_lib->crop();
        $ci->image_lib->clear();

        if($compress){
            $cover = compress_img($letakhasil);
        }
        if($thumbnail){
            $config = array();
            $config['source_image'] = $lokasi.'/'.$cover;
            $config['new_image'] = $lokasi.'/thumbnail/'.$cover;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 300;
            $ci->image_lib->initialize($config);
            $ci->image_lib->resize();
            $ci->image_lib->clear();
        }

        return $cover;
    }
}