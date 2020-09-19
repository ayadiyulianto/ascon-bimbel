<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {

	// KELAS

	function getKelasSaya($id_user){
		return $this->db->select('view_kelas.*, kelas_siswa.waktu_post, kelas_siswa.has_access, kelas_siswa.is_finished')
		->from('view_kelas')
		->join('kelas_siswa', 'kelas_siswa.id_kelas=view_kelas.id_kelas')
		->where(array('kelas_siswa.id_user'=>$id_user))
		->order_by('kelas_siswa.waktu_post desc')
		->get();
	}

	function getPembelian($id_user){
		return $this->db->select('id_invoice, pembelian.id_user, nama_user, pembelian.id_kelas, nama_kelas, slug, nama_kategori, view_kelas.foto, pembelian.status, total_bayar, jenis_bayar, tujuan_bayar, waktu_register')
		->from('pembelian')
		->join('view_kelas', 'view_kelas.id_kelas=pembelian.id_kelas')
		->join('user', 'user.id_user=pembelian.id_user')
		->where(array('pembelian.id_user'=>$id_user))
		->order_by('waktu_register desc')
		->get();
	}

	function getProgress($id_kelas, $id_user){
		$jumlah = $this->db->select('COUNT(*) as jumlah')->from('modul_konten')
			->join('modul', 'modul.id_modul=modul_konten.id_modul AND modul.id_kelas='.$id_kelas.' AND modul.is_aktif="Y"')
			->where('status', 'Y')
			->get()->row()->jumlah;
		if(intval($jumlah)==0){
			return 0;
		}
		$selesai = $this->db->select('COUNT(*) as selesai')->from('konten_siswa')
			->join('modul_konten', 'modul_konten.id_konten=konten_siswa.id_konten AND modul_konten.status="Y"')
			->join('modul', 'modul.id_modul=modul_konten.id_modul AND modul.id_kelas='.$id_kelas.' AND modul.is_aktif="Y"')
			->where(array('is_finished'=>'Y', 'id_user_siswa'=>$id_user))
			->get()->row()->selesai;

		return round(($selesai/$jumlah)*100, 0);
	}

	function getKonten($id_modul, $id_user){
		return $this->db->select('mk.id_konten, mk.judul_konten, mk.jenis, mk.durasi_belajar, ks.is_finished, ks.status')
		->from('modul_konten as mk')
		->join('konten_siswa as ks', 'mk.id_konten=ks.id_konten AND ks.id_user_siswa='.$id_user, 'left')
		->where(array('mk.id_modul'=>$id_modul, 'mk.status'=>'Y'))
		->order_by('mk.no_urut asc')
		->get();
	}

	function getFullKonten($id_konten, $id_user){
		return $this->db->select('mk.*, ks.is_finished, ks.id, ks.status, ks.nilai, ks.catatan_siswa')
		->from('modul_konten as mk')
		->join('konten_siswa as ks', 'mk.id_konten=ks.id_konten AND ks.id_user_siswa='.$id_user, 'left')
		->where('mk.id_konten', $id_konten)
		->order_by('mk.no_urut asc')
		->get()->row();
	}

	function getNilai($id_kelas, $id_user){
		return $this->db->select('mk.id_konten, mk.judul_konten, mk.jenis, ks.is_finished, ks.status, ks.nilai, ks.waktu_selesai')
		->from('modul_konten as mk')
		->join('konten_siswa as ks', 'mk.id_konten=ks.id_konten AND ks.id_user_siswa='.$id_user, 'left')
		->join('modul as m', 'm.id_modul=mk.id_modul AND m.id_kelas='.$id_kelas)
		->where('(mk.jenis="Latihan" OR mk.jenis="Tugas")')
		->where(array('mk.status'=>'Y'))
		->get();
	}

	// BELAJAR

	function getDefaultKontenByKelas($id_kelas){
		return $this->db->select('id_konten')->from('modul_konten')
		->join('modul', 'modul.id_modul=modul_konten.id_modul AND modul.id_kelas='.$id_kelas)
		->order_by('modul_konten.no_urut asc')->limit(1)->get()->row()->id_konten;
	}

	function cekKonten($id_konten, $id_kelas){
		return $this->db->join('modul', 'modul.id_modul=modul_konten.id_modul AND modul.id_kelas='.$id_kelas)
		->where('id_konten', $id_konten)->get('modul_konten')->num_rows();
	}

	function getNextKonten($id_konten, $id_kelas){
		$id_konten = $this->db->query('(SELECT id_konten FROM (
			SELECT mk.id_konten, @n1:=@n1 + 1 num, @n2:=IF(id_konten='.$id_konten.', @n1, @n2) pos
			FROM (
			 	SELECT id_konten FROM modul_konten
				JOIN modul ON modul.id_modul=modul_konten.id_modul AND modul.id_kelas='.$id_kelas.' AND modul.is_aktif="Y"
				WHERE modul_konten.status="Y"
				ORDER BY modul.no_urut, modul_konten.no_urut
			) mk, (SELECT @n1:=0, @n2:=0) n
		) t
		WHERE num=@n2+1)
		UNION (SELECT NULL) LIMIT 1')->row()->id_konten;
		return $id_konten;
	}

	function getPrevKonten($id_konten, $id_kelas){
		$id_konten = $this->db->query('(SELECT id_konten FROM (
			SELECT mk.id_konten, @n1:=@n1 + 1 num, @n2:=IF(id_konten='.$id_konten.', @n1, @n2) pos
			FROM (
			 	SELECT id_konten FROM modul_konten
				JOIN modul ON modul.id_modul=modul_konten.id_modul AND modul.id_kelas='.$id_kelas.' AND modul.is_aktif="Y"
				WHERE modul_konten.status="Y"
				ORDER BY modul.no_urut, modul_konten.no_urut
			) mk, (SELECT @n1:=0, @n2:=0) n
		) t
		WHERE num=@n2-1)
		UNION (SELECT NULL)
		LIMIT 1')->row()->id_konten;
		return $id_konten;
	}

	function getLastKonten($id_kelas, $id_user){
		$last = $this->db->select('mk.id_konten')->from('modul_konten mk')
		->join('modul m', 'm.id_modul=mk.id_modul AND m.id_kelas=7 AND m.is_aktif="Y"')
		->join('konten_siswa ks', 'ks.id_konten=mk.id_konten AND ks.id_user_siswa='.$id_user)
		->where('mk.status', 'Y')
		->order_by('m.no_urut desc')->order_by('mk.no_urut desc')
		->limit(1)->get();
		if($last->num_rows()>0){
			return $last->row()->id_konten;
		}else{
			return 0;
		}
	}

	// LATIHAN SOAL

	function sesiLatihan($id_konten, $id_user_siswa){
		$waktu_mulai = date('Y-m-d H:i:s');
		$dataUserKonten = array('id_konten'=>$id_konten, 'id_user_siswa'=>$id_user_siswa, 'status'=>'Belum', 'waktu_mulai'=>$waktu_mulai);
		$this->MyModel->insert('sesi_latihan', $dataUserKonten);
		$id_sesi_latihan = $this->MyModel->get('sesi_latihan', 'id', $dataUserKonten)->row()->id;

		$where = array('id_konten'=>$id_konten);
		$jml_soal = $this->MyModel->get('modul_konten', 'latihan_jumlah_soal', $where)->row()->latihan_jumlah_soal;
		$soal = $this->MyModel->get('soal_pertanyaan', 'id_soal', $where, 'rand()', $jml_soal)->result();
		foreach ($soal as $key) {
			$sesiSoal[] = array('id_sesi_latihan'=>$id_sesi_latihan, 'id_soal'=>$key->id_soal, 'status'=>'belum');
		}
		$this->MyModel->insert_batch('sesi_soal',$sesiSoal);

		$sesi_latihan = array('id_konten'=>$id_konten, 'id_sesi_latihan'=>$id_sesi_latihan, 'waktu_mulai'=>$waktu_mulai);
		return $sesi_latihan;
	}

	function getSoalById($id_sesi_latihan, $id_soal){
		return $this->db->select('id, jawaban, status, jenis_soal, soal')->from('sesi_soal')
		->join('soal_pertanyaan', 'soal_pertanyaan.id_soal=sesi_soal.id_soal')
		->where(array('id_sesi_latihan'=>$id_sesi_latihan, 'sesi_soal.id_soal'=>$id_soal))
		->get()->row();
	}

	function getSoalPembahasanById($id_sesi_latihan, $id_soal){
		return $this->db->select('id, jawaban, status, jenis_soal, soal, pembahasan')->from('sesi_soal')
		->join('soal_pertanyaan', 'soal_pertanyaan.id_soal=sesi_soal.id_soal')
		->where(array('id_sesi_latihan'=>$id_sesi_latihan, 'sesi_soal.id_soal'=>$id_soal))
		->get()->row();
	}

	function getTugas($id){
		return $this->db->select('sesi_tugas.*, nama_user as reviewer')->from('sesi_tugas')
		->join('user', 'user.id_user=sesi_tugas.id_user_reviewer', 'left')
		->where('id', $id)->get()->row();
	}

}