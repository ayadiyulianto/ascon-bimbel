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
                <li class="breadcrumb-item active" aria-current="page">Dashboard Pengajar</li>
              </ol>
            </nav>
            <h3 class="mg-b-0 tx-spacing--1">Kelas Yang Saya Ajar</h3>
          </div>
          <a href="<?=base_url('pengajar/dashboard/buatkelas')?>" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-t-20 mg-sm-t-0"><i data-feather="plus" class="wd-10 mg-r-5"></i> Buat Kelas Baru</a>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row">
          <?php if($semuakelas->num_rows()==0){ ?>
            <div class="col-12">
              <h6>Kamu belum mempunyai kelas. <a href="<?=base_url('pengajar/dashboard/buatkelas')?>"><u>Buat Kelas Baru</u></a> untuk membagikan pengetahuan kamu.</h6>
            </div>
          <?php } foreach($semuakelas->result() as $row){ ?>
            <div class="col-md-4 mg-b-20">
              <div class="card card-event">
                <div class="marker marker-ribbon marker-<?=($row->is_aktif=='Y' ? 'primary':'warning') ?> pos-absolute t-10 l-0"><?=($row->is_aktif=='Y' ? 'Aktif':'Belum Aktif') ?></div>
                <img src="<?=base_url().'assets/images/kelas/'.$row->foto?>" class="card-img-top" alt="">
                <div class="card-body tx-13 pos-relative">
                  <h5><a href="<?=base_url('welcome/kelas/'.$row->slug)?>" class="stretched-link"><?=$row->nama_kelas?></a></h5>
                  <p><?=$row->nama_kategori?></p>
                  <p><?=$row->deskripsi_singkat?></p>
                  <span class="tx-12 tx-color-03">Terakhir diperbarui <?=tgl_indo($row->waktu_edit)?></span>
                </div><!-- card-body -->
                <div class="card-footer tx-13 align-items-rigth">
                  <?php $jml=$this->MyModel->get('view_siswa', 'COUNT(*) as jml', array('id_kelas'=>$row->id_kelas))->row()->jml; ?>
                  <span class="tx-color-03"><?=$jml?> siswa terdaftar</span>
                  <a href="<?=base_url('pengajar/dashboard/pilihkelas/'.$row->id_kelas)?>" class="btn btn-xs btn-primary">Kelola</a>
                </div><!-- card-footer -->
              </div><!-- card -->
            </div>
          <?php } ?>
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- content-body -->

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
