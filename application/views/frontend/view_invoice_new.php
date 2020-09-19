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
    <div class="content content-fixed bd-b pd-t-10">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <?php
          if (userdata('role') == 'Siswa'){ $redirect = base_url("siswa/dashboard"); }
          elseif (userdata('role') == 'Administrator'){ $redirect = base_url("admin/penjualan"); }
        ?>
        <a href="<?=$redirect?>" class="btn btn-icon btn-xs btn-white"><i data-feather="arrow-left"></i> Kembali</a>
        <div class="d-flex align-items-end justify-content-between mg-t-25">
          <div class="mg-t-20 mg-sm-t-0">
            <label class="tx-sans tx-uppercase tx-10 tx-medium tx-spacing-1 tx-color-03">Tagihan Untuk</label>
            <h6 class="tx-15"><?=$pembelian->nama_user?></h6>
            <p class="mg-b-0">No HP : <?=$pembelian->no_hp?></p>
            <p class="mg-b-0">Email : <?=$pembelian->email?></p>

            <?php if(userdata('id_user')==$pembelian->id_user){ ?>
            <div class="d-flex mg-t-20">
              <button class="btn btn-white"><i data-feather="printer" class="mg-r-5"></i> Cetak</button>
              <?php if($pembelian->status=='registered' or $pembelian->status=='confirmed' ){ ?>
                <a href="<?=base_url('pembayaran/konfirmasi/'.$pembelian->id_invoice)?>" class="btn btn-primary mg-l-5"><i data-feather="credit-card" class="mg-r-5"></i> Konfirmasi <span class="d-none d-xs-inline">Pembayaran</span></a>
                <button id="btn-batal" class="btn btn-danger mg-l-5"><i data-feather="x" class="mg-r-5"></i> Batalkan <span class="d-none d-xs-inline">Pembelian</span></button>
              <?php } ?>
            </div>
            <?php } ?>
          </div>
          <div class="tx-right">
            <h4 class="">Invoice No.</h4>
            <h2 class=""><?=$pembelian->id_invoice?></h2>
            <p class="mg-b-0 tx-color-03">Dibuat pada <?=tgl_indo($pembelian->waktu_register)?></p>
            <?php if($pembelian->status=='registered' or $pembelian->status=='confirmed' ){ ?>
              <h3 class="mg-b-0 mg-t-20 tx-primary">Menunggu Pembayaran</h3>
            <?php }elseif($pembelian->status=='approved'){ ?>
              <h3 class="mg-b-0 mg-t-20 tx-success">APPROVED</h3>
            <?php }elseif($pembelian->status=='canceled'){ ?>
              <h3 class="mg-b-0 mg-t-20 tx-danger">DIBATALKAN</h3>
            <?php } ?>
          </div>
        </div>

      </div><!-- container -->
    </div><!-- content -->

    <div class="content">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <form method="post">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card card-event">
              <?php if($pembelian->diskon>0){ ?>
              <div class="marker marker-ribbon marker-danger pos-absolute t-10 l-0"><?='-'.$pembelian->diskon.'%'?></div>
              <?php } ?>
              <img src="<?=base_url().'assets/images/kelas/'.$pembelian->foto?>" class="card-img-top" alt="">
              <div class="card-body tx-13 pos-relative">
                <h4><?=$pembelian->nama_kelas?></h4>
                <p><?=$this->MyModel->get('view_pengajar', 'nama_user', array('id_kelas'=>$pembelian->id_kelas, 'role'=>'Utama'))->row()->nama_user?></p>
                <div class="d-flex justify-content-between">
                  <span class="tx-14 tx-md-16 tx-color-03"><i class="icon ion-md-people lh-0"></i> 
                    <?=$this->MyModel->get('view_siswa', 'COUNT(*) as jml', array('id_kelas'=>$pembelian->id_kelas))->row()->jml?> siswa
                  </span>
                  <span class="tx-14 tx-md-16 tx-color-03 align-self-start">
                    <?php $review = $this->MyModel->getRatingKelas($pembelian->id_kelas);
                      echo rating($review->rating).' '.$review->rating.' ('.$review->jumlah.' rating)'; ?>
                  </span>
                </div>
              </div><!-- card-body -->
              <div class="card-footer tx-13">
                <span>Harga</span>
                <span class="tx-14 tx-md-16 tx-semibold">
                  Rp <?php if($pembelian->diskon>0) echo '<strike class="tx-normal tx-13">'.rupiah($pembelian->harga).'</strike> ';
                  echo rupiah(((100-$pembelian->diskon)/100)*$pembelian->harga); ?>
                </span>
              </div><!-- card-footer -->
            </div><!-- card -->

            <div class="card card-body mg-y-20">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" disabled <?=!empty($pembelian->coupon_code)?'checked':''?> >
                <label class="custom-control-label" for="haveCoupon">Punya Kupon</label>
              </div>
              <div class="mg-t-5">
                <input type="text" name="coupon_code" value="<?=$pembelian->coupon_code?>" class="form-control" placeholder="Ketik kode kupon disini" disabled>
                <label class="mg-t-10 mg-b-0"><?=!empty($pembelian->coupon_code)?'Potongan Rp '.rupiah($pembelian->coupon_value):''?></label>
              </div>
            </div>
          </div><!-- col -->

          <div class="col-md-6 col-lg-8">
            <h4>Metode Pembayaran</h4>
            <div class="card mg-y-10">
              <div class="card-header">
                <h5 class="tx-uppercase mg-b-0"><?=$pembelian->jenis_bayar?></h5>
              </div>
              <div class="card-body pd-y-10 row">
                <div class="col-sm-6 my-sm-auto">
                  <img class="ht-50" src="<?=base_url('assets/images/pembayaran/'.$pembelian->tujuan_logo)?>">
                </div>
                <div class="col-sm-6 my-sm-auto mg-t-10">
                  atas nama
                  <h5 class="mg-b-0"><?=$pembelian->tujuan_atas_nama?></h5>
                  <h5 class="mg-b-0"><?=$pembelian->tujuan_bayar?></h5>
                </div>
              </div>
            </div>

            <div class="card mg-t-20">
              <div class="card-header">
                <h5 class="tx-uppercase mg-b-0">Pembayaran</h5>
              </div>
              <div class="card-body pd-y-10">
                <ul class="list-unstyled lh-7 mg-b-0">
                  <li class="d-flex justify-content-between">
                    <span>HARGA</span>
                    <span>Rp <?=rupiah($pembelian->harga)?></span>
                  </li>
                  <?php if($pembelian->diskon>0){ ?>
                  <li class="d-flex justify-content-between">
                    <span>DISKON ( -<?=$pembelian->diskon?>% )</span>
                    <span>- Rp <?=rupiah(($pembelian->diskon/100)*$pembelian->harga)?></span>
                  </li>
                  <?php }
                  if(!empty($pembelian->coupon_code)){ ?>
                  <li class="d-flex justify-content-between" id="list-kupon">
                    <span>KUPON</span>
                    <span>- Rp <?=rupiah($pembelian->coupon_value)?></span>
                  </li>
                  <?php } ?>
                  <hr class="mg-y-5">
                  <li class="d-flex justify-content-between">
                    <h4 class="mg-b-0">TOTAL BAYAR</h4>
                    <h4 class="mg-b-0" id="total_bayar">Rp <?=rupiah(((100-$pembelian->diskon)/100)*$pembelian->harga - $pembelian->coupon_value)?></h4>
                  </li>
                </ul>
              </div>
            </div>

            <div class="card mg-t-20">
              <div class="card-header">
                <h5 class="tx-uppercase mg-b-0">KETERANGAN</h5>
              </div>
              <div class="card-body pd-y-10">
                <ul class="list-unstyled lh-7 mg-b-0">
                  <li class="d-flex justify-content-between">
                    <span>Invoice dibuat</span>
                    <span><?=tgl_indo($pembelian->waktu_register, 'l, j F Y, H:i:s')?></span>
                  </li>
                  <?php if($pembelian->waktu_konfirmasi!='0000-00-00 00:00:00'){ ?>
                  <li class="d-flex justify-content-between">
                    <span>Konfirmasi pembayaran</span>
                    <span><?=tgl_indo($pembelian->waktu_konfirmasi, 'l, j F Y, H:i:s')?></span>
                  </li>
                  <?php }
                  if($pembelian->waktu_approved!='0000-00-00 00:00:00'){ ?>
                  <li class="d-flex justify-content-between" id="list-kupon">
                    <span>Pembayaran diapprove</span>
                    <span><?=tgl_indo($pembelian->waktu_approved, 'l, j F Y, H:i:s')?></span>
                  </li>
                  <?php }
                  if($pembelian->waktu_canceled!='0000-00-00 00:00:00'){ ?>
                  <li class="d-flex justify-content-between" id="list-kupon">
                    <span>Invoice dibatalkan</span>
                    <span><?=tgl_indo($pembelian->waktu_canceled, 'l, j F Y, H:i:s')?></span>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </div>

          </div><!-- col -->
        </div><!-- row -->
        </form>
      </div><!-- container -->
    </div>

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>

    <!-- another js -->

    <script>
      $(function(){
        'use strict'

        $('#btn-batal').click(function(e){
          e.preventDefault();
          var title = 'Yakin Ingin Membatalkan Pembelian?';
          var text = "Pembatalan tidak bisa diubah kembali";
          var url = "<?=base_url('pembayaran/batal/'.$pembelian->id_invoice)?>";
          swalRedirect(title, text, url);
        });

      })
    </script>

  </body>
</html>
