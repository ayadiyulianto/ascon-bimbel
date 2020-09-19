<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.filemgr.css">

  </head>
  <body class="app-filemgr">

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>
    
    <!-- CONTENT -->
      <!-- Inner Menu -->
      <?php $this->load->view('pengajar/_inner_menu') ?>

                <!-- Content -->

                <div class="card pd-20">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Judul Tugas</label>
                      <div class="col-sm-10 tx-semibold"><?=$tugas->judul_konten?></div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Modul</label>
                      <div class="col-sm-10 tx-semibold"><?=$tugas->nama_modul?></div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pengirim</label>
                      <div class="col-sm-10 tx-semibold"><?=$tugas->nama_user?></div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Waktu diunggah</label>
                      <div class="col-sm-10 tx-semibold"><?="<span data-html='true' data-placement='top' data-toggle='tooltip' title='".'Tambah : '.tgl_indo($tugas->waktu_post,'d M  Y H:i:s').'<br> Ubah : '.tgl_indo($tugas->waktu_edit,'d M  Y H:i:s').'<br> Koreksi : '.tgl_indo($tugas->waktu_review,'d M  Y H:i:s')."'>".tgl($tugas->waktu_post)."</span>"?></div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jawaban</label>
                      <div class="col-sm-10 bd pd-y-15"><?=$tugas->jawaban?></div>
                    </div>
                    <form method="post" class="form-row">
                    <div class="form-group col-sm-6">
                      <input type="hidden" name="id" value="<?=$tugas->id?>">
                      <input type="hidden" name="id_konten" value="<?=$tugas->id_konten?>">
                      <input type="hidden" name="id_user_siswa" value="<?=$tugas->id_user_siswa?>">
                      <label class="d-block">Status</label>
                      <select class="form-control select2" name="status">
                        <option value="Menunggu Koreksi">Menunggu Koreksi</option>
                        <option value="Berhasil" <?= ($tugas->status=='Berhasil') ? 'selected':'' ?>>Terima</option>
                        <option value="Gagal" <?= ($tugas->status=='Gagal') ? 'selected':'' ?>>Tolak</option>
                      </select>
                    </div>
                    <div class="form-group col-sm-6">
                      <label class="d-block">Nilai</label>
                      <input type="number" class="form-control" name="nilai" value="<?=$tugas->nilai?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                  </div>
                </div>

                <!-- Inner Menu Closed Tag-->
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>
    <script src="<?=base_url()?>assets/js/dashforge.filemgr.js"></script>

    <script>

      $('.navbar-header').append('<a href="" id="filemgrMenu" class="burger-menu d-lg-none"><i data-feather="arrow-left"></i></a>');
      
      $(function(){
        'use strict'

        // add save button on top
        $('.filemgr-content-header').children('nav').append(
          '<a href="<?=base_url('tugas')?>" class="btn btn-sm btn-outline-secondary"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Kembali"></i> <span class="d-none d-md-inline">Kembali</span></a>');

      });

    </script>

  </body>
</html>
