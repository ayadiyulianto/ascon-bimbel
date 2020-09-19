
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
              <div class="card" id="tambahPengumuman">
                <div class="card-header" data-toggle="collapse" href="#collapseDetail" role="button" aria-expanded="false" aria-controls="collapseDetail">
                  <h6 class="mg-b-0" style="cursor: pointer;">Tambah Pengumuman <i data-feather="plus"></i></h6>
                </div>
                <div class="card-body collapse" id="collapseDetail">
                  <form method="post">
                    <div class="form-group">
                      <label class="d-block">Judul Pengumuman</label>
                      <input type="text" name="judul" class="form-control" placeholder="Misal. Selamat datang siswa baru" value="<?=input('judul','')?>">
                    </div>
                    <div class="form-group">
                      <label class="d-block">Isi Pengumuman</label>
                      <textarea name="isi" class="form-control summernote" placeholder="Misal. Semangat mengerjakan kelas"><?=input('isi','')?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                  </form>
                </div>
              </div>

              <div class="card mg-t-20">
                <?php if($pengumuman->num_rows()==0){
                  echo '<div class="pd-20">Tidak ada pengumuman saat ini</div>';
                } foreach($pengumuman->result() as $png){
                  $aktif = $nonaktif = '';
                  if($png->status=='Y'){ $aktif='active'; $status='Publish'; }elseif($png->status=='N'){ $nonaktif='active'; $status='Arsip'; } ?>
                  <div class="card-body pd-20 pd-lg-25 bd-b">
                    <div class="media align-items-center mg-b-20">
                      <div class="avatar"><img src="<?=avatar($png->foto)?>" class="rounded-circle" alt=""></div>
                      <div class="media-body pd-l-15">
                        <h6 class="mg-b-3"><?=$png->nama_user?></h6>
                        <span class="d-block tx-13 tx-color-03"><?=tgl($png->waktu_post)?></span>
                      </div>
                      <div class="d-flex align-items-center">
                        <a href="#ubah" class="tx-color-03 align-self-start button-edit" data-toggle="tooltip" data-placement="top" title="Ubah"><i data-feather="edit" data-toggle="collapse" href="#ubah<?=$png->id_pengumuman?>" role="button" aria-expanded="false" aria-controls="collapseDetail"></i></a>
                        <div class="dropdown  d-inline mg-l-20">
                          <button class="btn btn-outline-secondary btn-xs btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$status?> </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item <?=$aktif?>" href="<?=base_url("komunikasi/flagpengumuman/".$png->id_pengumuman."/Y")?>">Publish</a>
                            <a class="dropdown-item <?=$nonaktif?>" href="<?=base_url("komunikasi/flagpengumuman/".$png->id_pengumuman."/N")?>">Sembunyikan</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <form method="post" id="ubah<?=$png->id_pengumuman?>" class="collapse">
                      <fieldset class="form-fieldset" id="tambahModul">
                        <legend>Ubah Pengumuman</legend>
                        <div class="form-group">
                          <label class="d-block">Judul Pengumuman</label>
                          <input type="hidden" name="id_pengumuman" value="<?=$png->id_pengumuman?>">
                          <input type="text" name="judul" class="form-control" placeholder="Misal. Selamat datang siswa baru" value="<?=$png->judul?>">
                        </div>
                        <div class="form-group">
                          <label class="d-block">Isi Pengumuman</label>
                          <textarea name="isi" class="form-control summernote" placeholder="Misal. Semangat mengerjakan kelas"><?=$png->isi?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Ubah</button>
                      </fieldset>
                    </form>
                    <div class="position-relative mg-t-20">
                      <h5 class="tx-16"><?=$png->judul?></h5>
                      <?php // show first paragraph
                      preg_match("/<p ?.*>(.*)<\/p>/", $png->isi, $isi);
                      echo $isi[1]; ?> <a target="_blank" href="<?=base_url('welcome/pengumuman/'.$png->id_pengumuman)?>" class="stretched-link">Selengkapnya</a>
                    </div>
                  </div>
                <?php } ?>
              </div><!-- card -->

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
        // $('.filemgr-content-header').children('nav').append(
        //   '<a href="#tambahPengumuman" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Buat Baru"></i> <span class="d-none d-md-inline">Buat Baru</span></a>');

        // text editor
        $('.summernote').summernote({
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen']]
          ],
          height:"400",
          dialogsInBody: true,
          placeholder:"Tuliskan isi pengumuman disini"
        });

      });

    </script>

  </body>
</html>
