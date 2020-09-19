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
    <div class="content content-fixed bd-b bg-gray-100 pd-b-0">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item active" aria-current="page">Dashboard Siswa</li>
              </ol>
            </nav>
            <h3 class="tx-bold mg-b-0">Kelas Saya</h3>
          </div>
          <div class="col-12 mg-t-20">
            <ul class="nav nav-line tx-md-16">
              <li class="nav-item">
                <a class="nav-link active tx-semibold" id="kelas-tab" data-toggle="tab" href="#kelas" role="tab" aria-controls="kelas" aria-selected="true">Kelas Saya</a>
              </li>
              <li class="nav-item">
                <a class="nav-link tx-semibold" id="beli-tab" data-toggle="tab" href="#beli" role="tab" aria-controls="beli" aria-selected="false">Pembelian</a>
              </li>
            </ul>
          </div>
        </div>
      </div><!-- container -->
    </div><!-- content -->

    <div class="content">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="tab-content mg-t-20" id="myTabContent5">
          <div class="tab-pane fade show active" id="kelas" role="tabpanel" aria-labelledby="kelas-tab">
            <div class="row">
              <?php if($kelassaya->num_rows()==0){ ?>
                <div class="col-12 tx-center">
                  <h6>Kamu belum terdaftar dalam kelas manapun. <a href="<?=base_url('welcome/semuakelas')?>"><u>Lihat Kelas</u></a> yang sesuai dengan kebutuhanmu.</h6>
                </div>
              <?php } foreach($kelassaya->result() as $kelas){ ?>
              <div class="col-md-4 mg-b-20">
                <div class="card card-event">
                  <img src="<?=base_url().'assets/images/kelas/'.$kelas->foto?>" class="card-img-top" alt="">
                  <div class="card-body tx-13">
                    <?php if($kelas->is_finished=='Y'){ ?>
                    <div class="marker marker-ribbon marker-success pos-absolute t-10 l-0">Selesai</div>
                    <?php }
                    if($kelas->has_access!='Y'){ ?>
                    <div class="marker marker-ribbon marker-warning pos-absolute t-10 l-0">Tidak Memiliki Akses</div>
                    <?php } ?>
                    <h5><a href="<?=base_url('welcome/kelas/'.$kelas->slug)?>"><?=$kelas->nama_kelas?></a></h5>
                    <p><?=$kelas->nama_kategori?></p>
                    <p><?=$kelas->deskripsi_singkat?></p>
                    <span class="tx-12 tx-color-03">Mulai pada <?=tgl_indo($kelas->waktu_post)?></span>
                  </div><!-- card-body -->
                  <div class="card-footer tx-13">
                    <?php $progress=$this->SiswaModel->getProgress($kelas->id_kelas, userdata('id_user')); ?>
                    <span class="tx-medium">Progress : <?=$progress?>%</span>
                    <?php if($kelas->has_access=='Y'){ ?>
                    <a href="<?=base_url('siswa/dashboard/pilihkelas/'.$kelas->id_kelas)?>" class="btn btn-xs btn-primary">Lanjutkan Belajar</a>
                    <?php } ?>
                  </div><!-- card-footer -->
                </div><!-- card -->
              </div><!-- col -->
              <?php } ?>
            </div><!-- row -->
          </div>

          <div class="tab-pane fade" id="beli" role="tabpanel" aria-labelledby="beli-tab">
            <div class="row">
              <?php if($pembelian->num_rows()==0){ ?>
                <div class="col-12 tx-center">
                  <h6>Kamu belum melakukan pembelian kelas manapun. <a href="<?=base_url('welcome/semuakelas')?>"><u>Beli Kelas</u></a> yang sesuai dengan kebutuhanmu.</h6>
                </div>
              <?php } foreach($pembelian->result() as $pmb){ ?>
              <div class="col-md-4 mg-b-20">
                <div class="card card-event">
                  <img src="<?=base_url().'assets/images/kelas/'.$pmb->foto?>" class="card-img-top" alt="">
                  <div class="card-body tx-13">
                    <?php if($pmb->status=='registered'){ ?>
                    <div class="marker marker-ribbon marker-warning pos-absolute t-10 l-0">Menunggu Pembayaran</div>
                    <?php }elseif($pmb->status=='confirmed'){ ?>
                    <div class="marker marker-ribbon marker-secondary pos-absolute t-10 l-0">Menunggu Approved</div>
                    <?php }elseif($pmb->status=='approved'){ ?>
                    <div class="marker marker-ribbon marker-success pos-absolute t-10 l-0">Selesai</div>
                    <?php }elseif($pmb->status=='canceled'){ ?>
                    <div class="marker marker-ribbon marker-danger pos-absolute t-10 l-0">Dibatalkan</div>
                    <?php } ?>
                    <h5><a href="<?=base_url('welcome/kelas/'.$pmb->slug)?>"><?=$pmb->nama_kelas?></a></h5>
                    <p><?=$pmb->nama_kategori?></p>
                    <p>No. Invoice : <?=$pmb->id_invoice?></p>
                    <span class="tx-12 tx-color-03">Mendaftar pada <?=tgl_indo($pmb->waktu_register)?></span>
                  </div><!-- card-body -->
                  <div class="card-footer tx-13">
                    <a href="<?=base_url('pembayaran/invoice/'.$pmb->id_invoice)?>" class="btn btn-xs btn-block btn-outline-secondary">Lihat invoice</a>
                    <?php if($pmb->status=='registered' or $pmb->status=='confirmed' ){ ?>
                    <a href="<?=base_url('pembayaran/konfirmasi/'.$pmb->id_invoice)?>" class="btn btn-xs btn-primary mg-l-10">Konfirmasi</a>
                    <?php } ?>
                  </div><!-- card-footer -->
                </div><!-- card -->
              </div><!-- col -->
              <?php } ?>
            </div><!-- row -->
          </div>
        </div>

      </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('template/_footer') ?>
    <?php $this->load->view('template/_foot') ?>

    <script>
      $(function(){
        'use strict'

      })
    </script>

  </body>
</html>
