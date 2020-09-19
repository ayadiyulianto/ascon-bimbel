<?php
if(!empty($kelas)){
  $id_kelas     = $kelas->id_kelas;
  $id_kategori  = $kelas->id_kategori;
  $nama_kelas   = $kelas->nama_kelas;
  $deskripsi_singkat = $kelas->deskripsi_singkat;
  $foto         = $kelas->foto;
  $deskripsi    = $kelas->deskripsi;
}else{
  $id_kelas = $id_kategori = $nama_kelas = $deskripsi_singkat = $foto = $deskripsi = "";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link href="<?=base_url()?>lib/cropper/cropper.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.filemgr.css">

  </head>
  <body class="app-filemgr">

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>
    
    <!-- CONTENT -->
      <!-- Inner Menu -->
      <?php $this->load->view('pengajar/_inner_menu') ?>

                <!-- Content -->
                <form id="form-kelas" method="post" enctype="multipart/form-data">
                <fieldset class="form-fieldset">
                  <legend>Tentang Kelas</legend>
                  <?= !empty(validation_errors()) ? '<label class="tx-danger">'.validation_errors().'</label>' : ''?>
                  <div class="form-group">
                    <label class="d-block">Nama Kelas</label>
                    <input type="hidden" name="id_kelas" value="<?=input('id_kelas',$id_kelas)?>" />
                    <input type="text" name="nama_kelas" value="<?=input('nama_kelas',$nama_kelas)?>" class="form-control" placeholder="Misal: Codeigniter for Beginner">
                  </div>
                  <div class="form-group">
                    <label class="d-block">Kategori *</label>
                    <select name="kategori" class="form-control select2 wd-lg-50p">
                      <option value="">Pilih Kategori</option>
                      <?php foreach($kategori->result() as $row){ ?>
                      <option value="<?=$row->id_kategori?>" <?php echo ($this->input->post('kategori')==$row->id_kategori || $row->id_kategori==$id_kategori) ? 'selected' : '' ?> ><?=$row->nama_kategori?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="d-block">Deskripsi Singkat</label>
                    <textarea name="deskripsi_singkat" class="form-control" placeholder="Misal. Siswa akan mempelajari apa itu Codeigniter"><?=input('deskripsi_singkat',$deskripsi_singkat)?></textarea>
                  </div>
                  <div class="form-group">
                    <label class="d-block">Deskripsi Lengkap</label>
                    <textarea name="deskripsi" class="form-control summernote"><?=input('deskripsi',$deskripsi)?></textarea>
                  </div>
                  <div class="form-group">
                    <label class="d-block">Foto Sampul</label>
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <div class="img-container" style="height: 450px">
                          <img id="image" src="<?php if(!empty($foto)){echo base_url().'assets/images/kelas/'.$foto;}?>" alt="Browse Gambarmu">
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-group text-center img-preview" style="height: 200px; overflow: hidden;"></div>
                        <div class="form-group text-center">
                          <div class="btn-group" role="group">
                            <button class="btn btn-primary tooltips" data-original-title="Zoom In" data-toggle="tooltip" data-placement="top" title="" id="zoomIn" type="button"><i class="fa fa-search-plus"></i></button>
                            <button class="btn btn-primary tooltips" data-original-title="Zoom Out" data-toggle="tooltip" data-placement="top" title="" id="zoomOut" type="button"><i class="fa fa-search-minus"></i></button>
                          </div>
                          <div class="btn-group" role="group">
                            <button class="btn btn-primary tooltips" data-original-title="Rotate Left" data-toggle="tooltip" data-placement="top" title="" id="rotateLeft" type="button"><i class="fa fa-rotate-left"></i></button>
                            <button class="btn btn-primary tooltips" data-original-title="Rotate Right" data-toggle="tooltip" data-placement="top" title="" id="rotateRight" type="button"><i class="fa fa-rotate-right"></i></button>
                          </div>
                          <div class="btn-group" role="group">
                            <button class="btn btn-primary tooltips" data-original-title="Flip Horizontal" data-toggle="tooltip" data-placement="top" title="" id="fliphorizontal" type="button"><i class="fa fa-arrows-h"></i></button>
                            <button class="btn btn-primary tooltips" data-original-title="Flip Vertical" data-toggle="tooltip" data-placement="top" title="" id="flipvertical" type="button"><i class="fa fa-arrows-v"></i></button>
                          </div>
                        </div>
                        <div class="form-group text-center">
                          <div class="btn-group" role="group">
                            <label class="btn btn-outline-danger" for="inputImage" title="Upload image file">
                              <span data-toggle="tooltip" data-animation="false" title="Pilih Gambar">
                                <input name="covers" type="hidden" value="<?php if (!empty($foto)) {echo $foto;}?>">
                                <input name="cover" onchange="cek_file('2MB','image','inputImage')" type="file" class="sr-only" id="inputImage" accept=".jpg,.jpeg,.png,.bmp">
                                <span class="fa fa-upload"></span> Browse
                              </span>
                            </label>
                            <label class="btn btn-danger tooltips" data-toggle="tooltip" data-placement="top" title="Reset" id="reset" type="button"><i class="fa fa-refresh"></i> Reset</label>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" id="dataX" name="x">
                      <input type="hidden" id="dataY" name="y">
                      <input type="hidden" id="dataWidth" name="width">
                      <input type="hidden" id="dataHeight" name="height">
                      <input type="hidden" id="dataRotate" name="rotate">
                      <input type="hidden" id="dataScaleX" name="flipx">
                      <input type="hidden" id="dataScaleY" name="flipy">
                    </div>
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
    <script src="<?=base_url()?>lib/cropper/cropper.min.js"></script>
    <script src="<?=base_url()?>assets/js/cropper.js"></script>
    <script src="<?=base_url()?>assets/js/dashforge.filemgr.js"></script>

    <script>

      $('.navbar-header').append('<a href="" id="filemgrMenu" class="burger-menu d-lg-none"><i data-feather="arrow-left"></i></a>');

      $(function(){
        'use strict'

        // minimize sidemenu
        if(window.matchMedia('(min-width: 1200px)').matches) {
          $('.aside').addClass('minimize');
        }

        // add save button on top
        $('.filemgr-content-header').children('nav').append(
          '<button id="btn-save" class="btn btn-primary"><i class="fa fa-save" data-toggle="tooltip" data-placement="top" title="Simpan"></i> <span class="d-none d-md-inline">Simpan</span></button>');

        $('#btn-save').click(function(){
          $('#form-kelas').submit();
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
          height:"400",
          placeholder:"Jelaskan tentang kelas ini agar siswa tertarik belajar",
          dialogsInBody: true,
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
            ['color', ['color']]
          ],
          dialogsInBody: true,
          height:"150"
        });

        cropper(1, 1.7777777777777777);

      })

    </script>

  </body>
</html>
