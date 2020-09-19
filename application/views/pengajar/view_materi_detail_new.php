<?php
if(!empty($materi)){
  $id_konten    = $materi->id_konten;
  $judul_konten = $materi->judul_konten;
  $jenis        = $materi->jenis;
  $durasi_belajar= $materi->durasi_belajar;
  $isi          = $materi->isi;
  $video_url    = $materi->video_url;
  $catatan      = $materi->catatan;
}else{
  $id_konten = $judul_konten = $jenis = $durasi_belajar = $isi = $video_url = $catatan = "";
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
              <form method="post" id="form-materi">
              <fieldset class="form-fieldset">
                <legend>Detail Materi</legend>
                <?= !empty(validation_errors()) ? '<label class="tx-danger">'.validation_errors().'</label>' : ''?>
                <div class="form-group">
                  <label class="d-block">Apa judul materi ini</label>
                  <input type="hidden" name="id_konten" value="<?=input('id_konten',$id_konten)?>" />
                  <input type="text" name="judul_konten" value="<?=input('judul_konten',$judul_konten)?>" class="form-control" placeholder="Misal: Codeigniter for Beginner">
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label class="d-block">Jenis materi</label>
                    <select class="custom-select select2" name="jenis" id="selectJenis">
                      <option value="">Pilih Jenis Materi</option>
                      <option <?= ($jenis=='Text' || $this->input->post('jenis')=='Text') ? 'selected' : '' ?> value="Text">Text</option>
                      <option <?= ($jenis=='Video' || $this->input->post('jenis')=='Video') ? 'selected' : '' ?> value="Video">Video</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label class="d-block">Estimasi waktu belajar materi (dalam menit)</label>
                    <input type="number" name="durasi_belajar" value="<?=input('durasi_belajar',$durasi_belajar)?>" class="form-control" placeholder="Misal 60">
                  </div>
                </div>
                <div class="form-group <?= ($jenis=='Video' || $this->input->post('jenis')=='Video') ? '' : 'd-none'?>" id="videoForm">
                  <label class="d-block">Video URL</label>
                  <input type="text" id="video_url" name="video_url" value="<?=input('video_url',$video_url)?>" class="form-control" placeholder="Misal: youtube.com/chrv17">
                </div>
                <div class="form-group <?= ($jenis=='Text' || $this->input->post('jenis')=='Text') ? '' : 'd-none'?>" id="textForm">
                  <label class="d-block">Tuliskan Isi Materi</label>
                  <textarea id="isi" name="isi" class="form-control summernote"><?=input('isi',$isi)?></textarea>
                </div>
                <div class="form-group">
                  <label class="d-block">Catatan Tambahan</label>
                  <textarea name="catatan" class="form-control summernote2"><?=input('catatan',$catatan)?></textarea>
                </div>
              </fieldset>
              </form>
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
          '<a href="<?=base_url('modul')?>" class="btn btn-outline-danger"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Kembali ke Modul"></i> <span class="d-none d-md-inline">Kembali ke Modul</span></a>'+
          '<button id="btn-save" class="btn btn-primary mg-l-10"><i class="fa fa-save" data-toggle="tooltip" data-placement="top" title="Simpan"></i> <span class="d-none d-md-inline">Simpan</span></button>');

        $(document).on('click', '#btn-save', function(){
          $('#form-materi').submit();
        });

        $("#selectJenis").change(function() {
          if($(this).val()=="Video"){
            $("#videoForm").removeClass("d-none");
            $("#textForm").addClass("d-none");
            $("#isi").val('');
          }else{
            $("#textForm").removeClass("d-none");
            $("#videoForm").addClass("d-none");
            $("#video_url").val('');
          }
        });

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
          placeholder:"Tuliskan materi disini",
          callbacks: {
            onImageUpload: function(images) {
              var $images = $(images);
              var $this = $(this);
              uploadImage($images, $this);
            },
            onMediaDelete: function(target) {
              deleteImage(target);
            }
          }
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


    <!-- <div class="modal fade" id="modalTabbed" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel2">Pilih File</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
            <div class="nav-wrapper mg-b-20 tx-13">
              <div>
                <nav class="nav nav-line tx-medium">
                  <a href="#uploadTab" class="nav-link active" data-toggle="tab">Upload File</a>
                  <a href="#libraryTab" class="nav-link" data-toggle="tab">File Library</a>
                  <a href="#externalTab" class="nav-link" data-toggle="tab">Link External</a>
                </nav>
              </div>
            </div>
            <div class="tab-content">
              <div id="uploadTab" class="tab-pane fade active show ht-200">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="resources">
                  <label class="custom-file-label" id="custom-file-label"  for="customFile">Pilih File</label>
                </div>
              </div>
              <div id="libraryTab" class="tab-pane fade ht-200" >
                <div style="overflow: auto; display: inline-block; width: 100%; max-height: 200px;">
                  <table class="table table-sm table-primary tx-13 mg-b-0">
                    <tbody>
                      <tr>
                        <td class="align-middle mg-l-10 wd-30"><div class="wd-15 ht-15 rounded-circle bd bd-3 bd-primary"></div></td>
                        <td class="tx-medium">Excellent.mp4</td>
                        <td class="text-right">3 MB</td>
                      </tr>
                      <tr>
                        <td class="align-middle mg-l-10 wd-30"><div class="wd-15 ht-15 rounded-circle bd bd-3 bd-success"></div></td>
                        <td class="tx-medium">Magnificient.zip</td>
                        <td class="text-right">5 MB</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div id="externalTab" class="tab-pane fade ht-200">
                <div class="form-group">
                  <label class="d-block">Apa judul file ini</label>
                  <input type="text" name="resources_nama" class="form-control" placeholder="Misal: Power Point Codeigniter">
                </div>
                <div class="form-group">
                  <label class="d-block">URL Sumber File</label>
                  <input type="text" name="resources_url" class="form-control" placeholder="Misal: www.google.com/file/codeigniter.zip">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary tx-13">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->

    
        <!-- $('#customFile').change(function(){
          var filename = $(this).val();
          filename = filename.match(/[^\\/]*$/)[0];
          console.log(filename);
          $('#custom-file-label').html(filename);
        }); -->
