<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>

    <style type="text/css">
      .content-fixed {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
      }
    </style>

  </head>
  <body>

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>

    <!-- CONTENT -->
    <div class="content content-fixed bd-b bg-warning" <?php if(!empty($kategori->foto_cover)){ ?> style="background-image: url('<?=base_url('assets/images/kategori/'.$kategori->foto_cover)?>');" <?php } ?> >
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div class="wd-md-75p">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="<?=base_url()?>"><span class="tx-white">Semua Kelas</span></a></li>
                <li class="breadcrumb-item" aria-current="page"><span class="tx-white">Kategori</span></li>
              </ol>
            </nav>
            <h2 class="tx-white"><?=$kategori->nama_kategori?></h2>
            <h6 class="mg-md-b-0 text-justify tx-white"><?=$kategori->deskripsi_singkat?></h6>
          </div>
          <form id="form-cari" method="get" class="d-flex justify-content-between mg-sm-t-0 mg-xs-t-10">
            <select id="sortby" name="sortby" class="select2 form-control">
              <?php $sortby=$this->input->get('sortby'); ?>
              <option <?=($sortby=='terbaru')?'selected':''?> value="terbaru">Terbaru</option>
              <option <?=($sortby=='rating')?'selected':''?> value="rating">Rating Tertinggi</option>
              <option <?=($sortby=='siswa')?'selected':''?> value="siswa">Siswa Terbanyak</option>
              <option <?=($sortby=='harga_asc')?'selected':''?> value="harga_asc">Harga Terendah</option>
              <option <?=($sortby=='harga_desc')?'selected':''?> value="harga_desc">Harga Tertinggi</option>
            </select>
          </form>
        </div>
      </div><!-- container -->
    </div><!-- content -->

    <div class="content">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">

        <!-- KELAS POPULER -->
        <div class="row">
          <div class="col-12 mg-b-10">
            <h4 class="tx-uppercase"><i data-feather="thumbs-up"></i> &nbsp Kelas Populer</h4>
          </div>
        </div>
        <div class="card bg-gray-100">
          <div class="card-body">
            <div class="row flex-row flex-nowrap" style="overflow-x: auto;">
              <?php foreach($kelas_populer->result() as $kls){
                $nested['kls'] = $kls;
                $this->load->view('frontend/view_card_kelas', $nested);
              } ?>
            </div><!-- row -->
          </div>
        </div>

        <!-- SEMUA KELAS BY KATEGORI -->

        <div class="row mg-t-40">
          <div class="col-12 mg-b-10 d-flex justify-content-between">
            <h4 class="tx-uppercase"><i data-feather="chevron-right"></i> &nbsp Semua Kelas di <?=$kategori->nama_kategori?></h4>
          </div>
        </div>
        <div class="row">
          <?php foreach($semuakelas->result() as $kls){
            $nested['kls'] = $kls;
            $this->load->view('frontend/view_card_kelas', $nested);
          } ?>
        </div>

        <!-- BANNER -->

        <div class="row mg-t-40">
          <div class="col-12">
            <img src="https://via.placeholder.com/1920x240" class="img-fluid" alt="...">
          </div>
        </div>

      </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('template/_footer') ?>
    <?php $this->load->view('template/_foot') ?>

    <!-- another js -->

    <script>
      $(function(){
        'use strict'

        $('#sortby').change(function(){
          $('#form-cari').submit();
        })

      })
    </script>

  </body>
</html>
