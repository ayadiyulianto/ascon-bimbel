<?php
if(!empty($kategori)){
  $id_kategori     = $kategori->id_kategori;
  $nama_kategori   = $kategori->nama_kategori;
  $deskripsi_singkat = $kategori->deskripsi_singkat;
  $foto         = $kategori->foto_cover;
}else{
  $id_kategori = $nama_kategori = $deskripsi_singkat = $foto = "";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link href="<?=base_url()?>lib/cropper/cropper.min.css" rel="stylesheet">
    
  </head>
  <body>

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>
    
    <!-- CONTENT -->
    <div class="content content-fixed bd-b">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="<?=base_url("admin/kategori")?>">Kategori</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buat Baru</li>
              </ol>
            </nav>
            <h3 class="mg-b-0 tx-spacing--1">Buat Kategori Baru</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
          <div class="row">
            <div class="col-lg-12 col-xl-12">
              <form method="post" enctype="multipart/form-data">
                <?= !empty(validation_errors()) ? '<label class="tx-danger">'.validation_errors().'</label>' : ''?>
                <div class="form-group">
                  <label class="d-block">Nama Kategori *</label>
                  <input type="text" name="nama_kategori" value="<?=input('nama_kategori', $nama_kategori)?>" class="form-control" placeholder="Misal: Codeigniter for Beginner">
                </div>
                <div class="form-group">
                  <label class="d-block">Deskripsi Singkat * (max. 300 karakter)</label>
                  <textarea name="deskripsi_singkat" class="form-control" placeholder="Misal. Siswa akan mempelajari apa itu Codeigniter"><?=input('deskripsi_singkat', $deskripsi_singkat)?></textarea>
                </div>
                <div class="form-group">
                  <label class="d-block">Foto Sampul *</label>
                  <div class="form-row">
                    <div class="form-group col-md-8">
                      <div class="img-container">
                        <img id="image" src="<?php if(!empty($foto)){echo base_url().'assets/images/kategori/'.$foto;}?>" alt="Browse Gambarmu">
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
                <button type="submit" class="btn btn-lg btn-primary btn-block btn-uppercase"><i data-feather="save" class="wd-10 mg-r-5"></i> Simpan</button>
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- container -->
      </div><!-- content-body -->

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>
    <script src="<?=base_url()?>lib/cropper/cropper.min.js"></script>
    <script src="<?=base_url()?>assets/js/cropper.js"></script>

    <script>
      $(function(){
        'use strict'

        cropper(1, 1.7777777777777777);

      })

    </script>

  </body>
</html>
