<?php
if(!empty($tugas)){
  $id_konten    = $tugas->id_konten;
  $judul_konten = $tugas->judul_konten;
  $isi          = $tugas->isi;
  $catatan      = $tugas->catatan;
}else{
  $id_konten = $judul_konten = $isi = $catatan = "";
}
?>

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
              <form method="post" id="form-tugas">
              <fieldset class="form-fieldset">
                <legend>Detail Tugas</legend>
                <div class="form-group">
                  <label class="d-block">Apa judul tugas ini</label>
                  <input type="hidden" name="id_konten" value="<?=input('id_konten',$id_konten)?>" />
                  <input type="text" name="judul_konten" value="<?=input('judul_konten',$judul_konten)?>" class="form-control" placeholder="Misal: Codeigniter for Beginner">
                </div>
                <div class="form-group">
                  <label class="d-block">Tuliskan Instruksi Tugas</label>
                  <textarea name="isi" class="form-control summernote"><?=input('isi',$isi)?></textarea>
                </div>
                <div class="form-group">
                  <label class="d-block">Catatan Tambahan</label>
                  <textarea name="catatan" class="form-control summernote2"><?=input('catatan',$catatan)?></textarea>
                </div>
              </fieldset>

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

        // $('#customFile').change(function(){
        //   var filename = $(this).val();
        //   filename = filename.match(/[^\\/]*$/)[0];
        //   console.log(filename);
        //   $('#custom-file-label').html(filename);
        // });

        // add save button on top
        $('.filemgr-content-header').children('nav').append(
          '<a href="<?=base_url('modul')?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Batal"></i> <span class="d-none d-md-inline">Batal</span></a>'+
          '<button id="btn-save" class="btn btn-sm btn-primary mg-l-10"><i class="fa fa-save" data-toggle="tooltip" data-placement="top" title="Simpan"></i> <span class="d-none d-md-inline">Simpan</span></button>');

        $(document).on('click', '#btn-save', function(){
          $('#form-tugas').submit();
        })

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
          height:"600",
          dialogsInBody: true,
          placeholder:"Tuliskan tugas disini"
        });

        $('.summernote2').summernote({
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']]
          ],
          height:"300",
          dialogsInBody: true,
          placeholder:"Tuliskan catatan tambahan disini"
        });

      });

    </script>

  </body>
</html>
