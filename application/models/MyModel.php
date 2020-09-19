<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyModel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    // Basic CRUD

    function get($table, $select='*', $where=null, $order=null, $limit=null, $offset=0, $group_by=null, $like = null, $keyword=''){
        $this->db->select($select);
        if($where!=null){ $this->db->where($where); }
        if($order!=null){ $this->db->order_by($order); }
        if($limit!=null){ $this->db->limit($limit, $offset); }
        if($group_by!=null){ $this->db->group_by($group_by); }
        if($like!=null){ $this->db->like($like, $keyword); }
        return $this->db->get($table);
    }

    function insert($table, $data) {
        return $this->db->insert($table, $data);
    }

    function insert_batch($table, $data) {
        return $this->db->insert_batch($table, $data);
    }

    function update($table, $data, $where) {
        return $this->db->update($table, $data, $where);
    }

    function update_batch($table, $data, $column_name) {
        return $this->db->update_batch($table, $data, $column_name);
    }

    function delete($table, $where) {
        return $this->db->delete($table, $where);
    }

    function delete_batch($table, $list, $column_name) {
        $this->db->where_in($column_name, $list);
        return $this->db->delete($table);
    }

    // DataTable

    function get_data($table, $where, $aColumns, $sWhere, $sOrder, $sLimit, $sIndexColumn=NULL){
       if (!empty($sIndexColumn)) {
            $filter = $sWhere.' '.$sOrder.' '.$sLimit;
            $select = '*';
        }else{
            $filter = '';
            $select = $sIndexColumn;
        }
        $query = $this->db->query("
            SELECT $select FROM (
                SELECT * from $table WHERE $where
            ) A 
            $filter 
        ");        
        return $query;
    }

    // Kelas
    
    function getKategori(){
        return $this->db->select('kategori.*, COUNT(kelas.id_kelas) as jml_kelas')->from('kategori')
        ->join('kelas', 'kelas.id_kategori=kategori.id_kategori AND kelas.is_aktif="Y" AND kelas.status_verify!="Suspended"')
        ->group_by('id_kategori')->order_by('jml_kelas desc')
        ->get();
    }

    function getSemuaKelas(){
        $data = $this->getKategori()->result_array();
        for($i=0; $i<count($data); $i++){
            $data[$i]['kelas'] = $this->get('view_kelas','id_kelas, nama_kelas, slug, foto, harga, diskon, is_buka_pendaftaran', array('is_aktif'=>'Y', 'id_kategori'=>$data[$i]['id_kategori']), 'waktu_post desc', 5);
        }
        return $data;
    }

    function getKelasPopuler($limit, $id_kategori=null){
        if($id_kategori!=null){
            $kategori = 'AND id_kategori='.$id_kategori;
        }else{
            $kategori = '';
        }

        return $this->db->query('SELECT view_kelas.id_kelas, nama_kelas, slug, harga, diskon, foto, is_buka_pendaftaran, jml_siswa FROM view_kelas
            LEFT JOIN (SELECT id_kelas, COUNT(*) as jml_siswa FROM kelas_siswa GROUP BY id_kelas)
                siswa ON siswa.id_kelas=view_kelas.id_kelas
            WHERE view_kelas.is_aktif="Y" '.$kategori.' ORDER BY jml_siswa DESC LIMIT '.$limit);
    }

    function getKelasFull($slug){
        return $this->db->select('kelas.*, nama_kategori')->from('kelas')
        ->join('kategori', 'kategori.id_kategori=kelas.id_kategori')
        ->where('kelas.slug', $slug)
        ->get()->row();
    }

    function searchKelas($sortby, $clueArray){

        if(empty($sortby) || $sortby=="terbaru") {
            $sortby = "waktu_post DESC";
        }elseif($sortby=="rating"){
            $sortby = "rating DESC";
        }elseif($sortby=="siswa"){
            $sortby = "jml_siswa DESC";
        }elseif($sortby=="harga_asc"){
            $sortby = "harga ASC";
        }elseif($sortby=="harga_desc"){
            $sortby = "harga DESC";
        }

        $keyword = '';
        if(array_key_exists('keyword', $clueArray)){
            if(!empty($clueArray['keyword'])){
                $keyword = 'nama_kelas LIKE "%'.$keyword.'%" AND';
            }
        }

        $limit = '';
        if(array_key_exists('limit', $clueArray)){
            $limit = ' LIMIT '.$clueArray['limit'];
        }

        $offset = '';
        if(array_key_exists('offset', $clueArray)){
            $offset = ' OFFSET '.$clueArray['offset'];
        }

        $kategori = '';
        if(array_key_exists('id_kategori', $clueArray)){
            if($clueArray['id_kategori']!=null){
                $kategori = ' id_kategori='.$clueArray['id_kategori'].' AND';
            }
        }

        return $this->db->query('SELECT view_kelas.id_kelas, nama_kelas, slug, nama_kategori, deskripsi_singkat, harga, diskon, foto, is_buka_pendaftaran, jml_siswa, rating, jml_review FROM view_kelas
            LEFT JOIN (SELECT id_kelas, COUNT(*) as jml_siswa FROM kelas_siswa GROUP BY id_kelas)
                siswa ON siswa.id_kelas=view_kelas.id_kelas
            LEFT JOIN (SELECT id_kelas, IFNULL(ROUND(AVG(rating),1),0) as rating, COUNT(*) as jml_review FROM review GROUP BY id_kelas)
                rating ON rating.id_kelas=view_kelas.id_kelas
            WHERE '.$keyword.$kategori.' is_aktif="Y"
            ORDER BY '.$sortby.$limit.$offset);
    }

    // Diskusi

    function getDiskusiModul($id_kelas){
        return $this->db->select('mk.id_modul, nama_modul, COUNT(*) as total, MAX(d.waktu_post) as latest_post')
        ->from('diskusi as d')
        ->join('modul_konten as mk', 'mk.id_konten=d.id_konten')
        ->join('modul', 'modul.id_modul=mk.id_modul')
        ->where('d.id_kelas', $id_kelas)
        ->order_by('modul.no_urut asc')
        ->group_by('mk.id_modul')
        ->get();
    }

    // Review

    function getRatingKelas($id_kelas){
        return $this->get('review', 'IFNULL(ROUND(AVG(rating),1),0) as rating, COUNT(*) as jumlah', array('id_kelas'=>$id_kelas))->row();
    }

}