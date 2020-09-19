<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>

    <style type="text/css">
      .kategori {
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
    <div class="content content-fixed">
      <div class="container pd-x-0 tx-13">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kategori</li>
              </ol>
            </nav>
            <h3 class="mg-b-20 tx-spacing--1">Semua Kategori</h3>
          </div>
          <a href="<?=base_url()?>admin/kategori/detail" class="btn btn-sm pd-x-15 btn-outline-primary btn-uppercase mg-l-5"><i data-feather="plus" class="wd-10 mg-r-5"></i> Kategori Baru</a>
        </div>
      </div>
    </div>

    <?php foreach($kategori->result() as $row){ ?>
    <div class="content kategori mg-b-5" style="background-image: url('<?=!empty($row->foto_cover) ? base_url('assets/images/kategori/'.$row->foto_cover) : 'https://via.placeholder.com/1920x720'?>');">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div class="wd-md-75p">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><span class="tx-white">Semua Kelas</span></li>
                <li class="breadcrumb-item" aria-current="page"><span class="tx-white">Kategori</span></li>
              </ol>
            </nav>
            <h2 class="tx-white"><?=$row->nama_kategori?></h2>
            <h6 class="text-justify tx-white"><?=$row->deskripsi_singkat?></h6>
            <h5 class="mg-md-b-0 tx-white"><?=$row->jml_kelas?> kelas dalam kategori ini</h5>
          </div>
          <a href="<?=base_url('admin/kategori/detail/'.$row->id_kategori)?>" class="btn btn-white"><i class="fa fa-pencil"></i> Ubah</a>
        </div>
      </div><!-- container -->
    </div><!-- content -->
    <?php } ?>

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>

    <!-- another js -->

    <script>
      $(function(){
        'use strict'

      })
    </script>

  </body>
</html>
