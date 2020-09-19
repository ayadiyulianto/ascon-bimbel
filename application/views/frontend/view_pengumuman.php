<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>

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
                <li class="breadcrumb-item"><a href="<?=base_url('siswa/kelas')?>"><?=userdata('nama_kelas')?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
              </ol>
            </nav>
            <h4 class="mg-b-0">Detail Pengumuman</h4>
          </div>
        </div>
      </div><!-- container -->
    </div><!-- content -->

    <div class="content">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">

        <div class="card">
          <div class="card-body pd-20 pd-lg-25 bd-b">
            <div class="media align-items-center mg-b-20">
              <div class="avatar"><img src="<?=avatar($pengumuman->foto)?>" class="rounded-circle" alt=""></div>
              <div class="media-body pd-l-15">
                <h6 class="mg-b-3"><?=$pengumuman->nama_user?></h6>
                <span class="d-block tx-13 tx-color-03"><?=$pengumuman->role?></span>
              </div>
              <span class="d-none d-sm-block tx-12 tx-color-03 align-self-start"><?=tgl($pengumuman->waktu_post)?></span>
            </div>
            <h5><?=$pengumuman->judul?></h5>
            <?=$pengumuman->isi?>
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

      })
    </script>

  </body>
</html>
