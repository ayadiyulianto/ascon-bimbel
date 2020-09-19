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
    <div class="content content-fixed pd-t-10">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <a href="<?=base_url('siswa/dashboard')?>" class="btn btn-icon btn-xs btn-white"><i data-feather="arrow-left"></i> Kembali</a>
        <div class="row mg-t-25">
          <div class="col-md-6">
            <h4 class="mg-b-5">Invoice No. <?=$pembelian->id_invoice?></h4>
            <h5><?=$pembelian->nama_kelas?></h5>
            <p class="tx-color-03">Dibuat pada <?=tgl_indo($pembelian->waktu_register)?></p>
            <div class="card card-body bg-info text-center">
              <p class="tx-semibold tx-white">Kami telah mengirimkan tagihan pembayaran ke email kamu.<br>Jumlah yang harus dibayar</p>
              <h3 class="tx-semibold tx-white">Rp <?=rupiah($pembelian->total_bayar)?></h3>
              <div class="alert alert-solid alert-danger mg-t-10 mg-b-0" role="alert" style="border:solid 1px;">Penting untuk transfer sampai 3 digit terakhir agar proses verifikasi tidak terhambat</div>
            </div>
            <p class="mg-t-20 text-center tx-semibold"><?=$pembelian->jenis_bayar?></p>
            <div class="row text-center">
              <div class="col-md-6">
                <img class="ht-50 mg-b-20" src="<?=base_url('assets/images/pembayaran/'.$pembelian->tujuan_logo)?>">
              </div>
              <div class="col-md-6">
                <h4><?=$pembelian->tujuan_atas_nama?></h4>
                <h4 class="tx-bold"><?=$pembelian->tujuan_bayar?></h4>
              </div>
            </div>

            <div class="card mg-t-40 bg-light">
              <div class="card-header">
                <h5 class="mg-b-0">Tata Cara Pembayaran</h5>
              </div>
              <div class="card-body">
                <div class="accordion accordion-style2">
                  <h6 class="accordion-title">ATM Transfer</h6>
                  <div class="accordion-body">
                    <ol>
                      <li>Masukkan kartu, pilih bahasa, dan masukkan PIN sesuai petunjuk di layar</li>
                      <li>Pada Menu Transfer dan pilih Transfer Antar Bank atau Tranfr ke Rekening Bank Lain</li>
                      <li>Masukkan Kode Bank BRI (002) + BRI 0987654321 Atas Nama PT Ascon Inovasi Data sebagai tujuan transfer</li>
                      <li>Masukkan total nominal pembayaran kamu Rp <?=$pembelian->total_bayar?></li>
                      <li>Cek detail transfer pada layar konfirmasi lalu tekan Benar</li>
                      <li>Transaksi selesai!</li>
                    </ol>
                  </div>
                  <h6 class="accordion-title">Mobile Banking</h6>
                  <div class="accordion-body">
                    <ol>
                      <li>Masukkan kartu, pilih bahasa, dan masukkan PIN sesuai petunjuk di layar</li>
                      <li>Pada Menu Transfer dan pilih Transfer Antar Bank atau Tranfr ke Rekening Bank Lain</li>
                      <li>Masukkan Kode Bank BRI (002) + BRI 0987654321 Atas Nama PT Ascon Inovasi Data sebagai tujuan transfer</li>
                      <li>Masukkan total nominal pembayaran kamu Rp <?=$pembelian->total_bayar?></li>
                      <li>Cek detail transfer pada layar konfirmasi lalu tekan Benar</li>
                      <li>Transaksi selesai!</li>
                    </ol>
                  </div>
                  <h6 class="accordion-title">Internet Banking BRI</h6>
                  <div class="accordion-body">
                    <ol>
                      <li>Masukkan kartu, pilih bahasa, dan masukkan PIN sesuai petunjuk di layar</li>
                      <li>Pada Menu Transfer dan pilih Transfer Antar Bank atau Tranfr ke Rekening Bank Lain</li>
                      <li>Masukkan Kode Bank BRI (002) + BRI 0987654321 Atas Nama PT Ascon Inovasi Data sebagai tujuan transfer</li>
                      <li>Masukkan total nominal pembayaran kamu Rp <?=$pembelian->total_bayar?></li>
                      <li>Cek detail transfer pada layar konfirmasi lalu tekan Benar</li>
                      <li>Transaksi selesai!</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 mg-t-40 mg-md-t-0">
            <?= !empty(validation_errors()) ? '<label class="tx-danger">'.validation_errors().'</label>' : ''?>
            <div class="card bg-light">
              <div class="card-header">
                <h5 class="mg-b-0">Upload Bukti Pembayaran</h5>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="d-block">Nama Pemilik Rekening *</label>
                    <input type="text" name="bayar_atas_nama" value="<?=input('bayar_atas_nama',$pembelian->bayar_atas_nama)?>" class="form-control" placeholder="Nama Pemilik Rekening">
                  </div>
                  <div class="form-group">
                    <label class="d-block">Nomor Rekening *</label>
                    <input type="text" name="bayar_rekening" value="<?=input('bayar_rekening',$pembelian->bayar_rekening)?>" class="form-control" placeholder="Nomor Rekening">
                  </div>
                  <div class="form-group">
                    <label class="d-block">Foto Bukti *</label>
                    <input type="file" name="foto" class="form-control" required="">
                    <?php if(!empty($pembelian->foto_konfirmasi)){ ?>
                    <img class="img-fluid mg-t-10" src="<?=base_url('assets/images/pembayaran/konfirmasi/'.$pembelian->foto_konfirmasi)?>">
                    <?php } ?>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block tx-uppercase">Upload</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div><!-- container -->
    </div><!-- content -->

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
