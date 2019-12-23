<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {

	// Basic CRUD

	public function getWhere($table, $where){
		return $this->db->get_where($table, $where);
	}

	public function insert($table, $data){
		return $this->db->insert($table, $data);
	}

	public function update($table, $data, $where){
		return $this->db->update($table, $data, $where);
	}

	public function delete($table, $where){
		return $this->db->delete($table, $where);
	}

	// KELAS SAYA

	public function getKelasSaya($id_user){
		$this->db->select('tb_kelas.id, nama, tb_kelas_user.tgl_dibuat, deskripsi_singkat, foto');
		$this->db->from('tb_kelas_user');
		$this->db->join('tb_kelas', 'tb_kelas.id=tb_kelas_user.id_kelas');
		$this->db->where('tb_kelas_user.id_user', $id_user);
		return $this->db->get();
	}
	
	public function getKelas($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_kelas')->row();
	}

	// MATERI

	public function getModulByKelas($id_user, $id_kelas){
		$this->db->select('tb_modul.id, nama_modul, deskripsi_singkat, status, id_materi_dibaca_terakhir');
		$this->db->from('tb_modul_siswa');
		$this->db->join('tb_modul', 'tb_modul.id=tb_modul_siswa.id_modul AND tb_modul_siswa.id_user_siswa='.$id_user, 'right');
		$this->db->where('tb_modul.id_kelas', $id_kelas);
		$this->db->order_by('no_urut');
		return $this->db->get();
	}

	public function getDefaultMateriByModul($id_modul){
		$this->db->select('id');
		$this->db->where('id_modul', $id_modul);
		$this->db->where('no_urut', 1);
		$this->db->order_by('no_urut');
		return $this->db->get('tb_materi')->row()->id;
	}

	public function mulaiMateri($id_siswa, $id_materi){
		$data['id_materi'] = $id_materi;
		$data['id_user_siswa'] = $id_siswa;
		$check=$this->db->get_where('tb_materi_siswa', $data);
		if($check->num_rows()==0) $this->db->insert('tb_materi_siswa', $data);
	}

	public function mulaiModul($id_siswa, $id_modul){
		$data['id_user_siswa'] = $id_siswa;
		$data['id_modul'] = $id_modul;
		$check=$this->db->get_where('tb_modul_siswa', $data);
		if($check->num_rows()==0) $this->db->insert('tb_modul_siswa', $data);
	}

	public function getMateriById($id){
		$this->db->where('id', $id);
		return $this->db->get('tb_materi')->row();
	}

	public function getListMateri($id_modul){
		$this->db->select('id, judul_materi, no_urut');
		$this->db->where('id_modul', $id_modul);
		$this->db->order_by('no_urut');
		return $this->db->get('tb_materi');
	}

	public function checkMateriMulai($id_siswa, $id_materi){
		$this->db->select('waktu_mulai');
		$this->db->where('id_user_siswa', $id_siswa);
		$this->db->where('id_materi', $id_materi);
		$this->db->where('waktu_mulai is not null');
		$waktu_mulai = $this->db->count_all_results('tb_materi_siswa');
		if($waktu_mulai>0){
			return true;
		}else{
			return false;
		}
	}

	public function checkMateriSelesai($id_siswa, $id_materi){
		$this->db->select('waktu_selesai');
		$this->db->where('id_user_siswa', $id_siswa);
		$this->db->where('id_materi', $id_materi);
		$this->db->where('waktu_selesai is not null');
		$waktu_selesai = $this->db->count_all_results('tb_materi_siswa');
		if($waktu_selesai>0){
			return true;
		}else{
			return false;
		}
	}

	public function tandaiMateriSelesai($id_siswa, $id_materi){
		$where['id_user_siswa'] = $id_siswa;
		$where['id_materi'] = $id_materi;
		$data['waktu_selesai'] = date('Y-m-d H:i:s');
		$this->db->update('tb_materi_siswa', $data, $where);
	}

	public function getNextIdMateri($id_modul, $id_materi){
		$list_materi = $this->getListMateri($id_modul)->result_array();
		$index = array_search($id_materi, array_column($list_materi, 'id'));
		if($index<count($list_materi)){
			return $list_materi[$index+1]['id'];
		} else{
			return $id_materi;
		}
	}

	// LATIHAN SOAL

	public function getModulSoalByKelas($id_user, $id_kelas){
		$this->db->select('tb_modul.id, nama_modul, deskripsi_singkat, status_latihan, nilai, tgl_pengerjaan, id_sesi_latihan_terakhir');
		$this->db->from('tb_modul_siswa');
		$this->db->join('tb_modul', 'tb_modul.id=tb_modul_siswa.id_modul AND tb_modul_siswa.id_user_siswa='.$id_user, 'right');
		$this->db->where('tb_modul.id_kelas', $id_kelas);
		$this->db->order_by('no_urut');
		return $this->db->get();
	}

	public function sesiSoal($id_modul, $id_user_siswa){

		$dataUserModul = array('id_modul'=>$id_modul, 'id_user_siswa'=>$id_user_siswa, 'tgl_mulai'=>date('Y-m-d H:i:s'));
		$this->db->insert('tb_sesi_latihan', $dataUserModul);

		$this->db->select('id');
		$id_sesi = $this->db->get_where('tb_sesi_latihan', $dataUserModul)->row()->id;

		$this->db->select('jml_soal');
		$this->db->where('id',$id_modul);
		$jml_soal = $this->db->get('tb_modul')->row()->jml_soal;

		$this->db->select('id');
		$this->db->order_by('rand()');
		$this->db->limit($jml_soal);
		$soal = $this->db->get('tb_soal')->result();

		foreach ($soal as $key) {
			$sesiSoal[] = array('id_sesi'=>$id_sesi, 'id_soal'=>$key->id);
		}
		$this->db->insert_batch('tb_sesi_soal',$sesiSoal);

		return $id_sesi;
	}

	public function getTglMulai($id_sesi_latihan){
		$this->db->select('tgl_mulai');
		$this->db->where('id', $id_sesi_latihan);
		return $this->db->get('tb_sesi_latihan')->row()->tgl_mulai;
	}

	public function getNomorSoal($id_sesi_latihan){
		$this->db->select('id_soal, status');
		$this->db->where('id_sesi', $id_sesi_latihan);
		$this->db->order_by('id');
		return $this->db->get('tb_sesi_soal');
	}

	public function getSoalById($id_soal){
		$this->db->select('tb_sesi_soal.id as id_sesi_soal, soal, jawaban');
		$this->db->from('tb_soal');
		$this->db->join('tb_sesi_soal', 'tb_sesi_soal.id_soal=tb_soal.id');
		$this->db->where('tb_soal.id', $id_soal);
		return $this->db->get()->row();
	}

	public function getJawabanByIdSoal($id){
		$this->db->select('benar_1, salah_1, salah_2, salah_3');
		$this->db->where('id', $id);
		return $this->db->get('tb_soal')->row_array();
	}

	public function getSesiLatihan($id_sesi_latihan){
		$this->db->where('id', $id_sesi_latihan);
		return $this->db->get('tb_sesi_latihan')->row();
	}

	public function getPassingGrade($id){
		$this->db->select('passing_grade');
		$this->db->where('id', $id);
		return $this->db->get('tb_modul')->row()->passing_grade;
	}

	public function getSoalDanJawaban($id_sesi_latihan){
		$this->db->select('tb_sesi_soal.id as id_sesi_soal, jawaban, benar_1');
		$this->db->from('tb_sesi_soal');
		$this->db->join('tb_soal', 'tb_soal.id=tb_sesi_soal.id_soal');
		$this->db->where('id_sesi', $id_sesi_latihan);
		return $this->db->get();
	}

	public function updateSesiSoal($data){
		return $this->db->update_batch('tb_sesi_soal', $data, 'id');
	}

	public function getSoalPembahasanById($id_soal){
		$this->db->select('tb_sesi_soal.id as id_sesi_soal, soal, benar_1, jawaban, pembahasan');
		$this->db->from('tb_soal');
		$this->db->join('tb_sesi_soal', 'tb_sesi_soal.id_soal=tb_soal.id');
		$this->db->where('tb_soal.id', $id_soal);
		return $this->db->get()->row();
	}

	// FORUM

	public function getForum(){
		$this->db->order_by('tgl_dibuat','DESC');
		return $this->db->get('tb_forum');
	}

}