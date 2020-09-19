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
    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row">

          <div class="col-md-3 col-xl-2 d-none d-md-block">
            <label class="tx-sans tx-10 tx-medium tx-spacing-1 tx-uppercase tx-color-03 mg-b-15">Getting Started</label>
            <ul class="nav nav-classic">
              <a href="<?=base_url('page/tentang')?>" class="nav-link <?= $this->uri->segment(2)=='tentang' ? 'active':'' ?>">Tentang Kami</a>
              <a href="<?=base_url('page/syaratketentuanlayanan')?>" class="nav-link <?= $this->uri->segment(2)=='syaratketentuanlayanan' ? 'active':'' ?>">Syarat dan Ketentuan</a>
              <a href="<?=base_url('page/privacypolicy')?>" class="nav-link <?= $this->uri->segment(2)=='privacypolicy' ? 'active':'' ?>">Kebijakan Privasi</a>
              <a href="<?=base_url('page/faq')?>" class="nav-link <?= $this->uri->segment(2)=='faq' ? 'active':'' ?>">Frequently Asked Question</a>
              <a href="<?=base_url('page/kontak')?>" class="nav-link <?= $this->uri->segment(2)=='kontak' ? 'active':'' ?>">Hubungi Kami</a>
            </ul>
          </div>

          <div class="col-md-9 col-xl-10">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="<?=base_url('page/tentang')?>">Getting Started</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
              </ol>
            </nav>
            <div class="card mg-t-20">
              <div class="card-header">
                <h4 class="mg-b-0"><?=$title?></h4>
              </div>
              <div class="card-body pd-20">
                <p class="text-justify">Selamat datang di Layanan Pengguna Oasse Bimbel.</p>
                <p class="text-justify">Silakan buat tiket untuk mengirimkan pertanyaan / permasalahan anda. Setelah anda membuat tiket baru, Anda akan menerima kode tiket yang akan kami kirmkan ke email anda. Setiap balasan dari tim kuka.co.id juga akan dikirimkan ke email anda. Jadi, pastikan email dan nomor telepon yang anda masukkan benar. Jika anda membutuhkan respon segera, anda dapat juga langsung menghubungi kami ke email atau ke nomor telepon pada halaman kontak.</p>
                <p class="text-justify mg-b-0">Terima kasih.</p>
              </div>
            </div>
            <div class="card mg-t-20">
              <div class="card-header">
                <h5 class="mg-b-0">Buat Tiket</h5>
              </div>
              <div class="card-body pd-20">
                <form method="post">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Kategori Pertanyaan</label>
                      <select name="kategori" class="form-control select2">
                        <option value="">-- Kategori Pertanyaan --</option>
                        <option value="Layanan Pengguna">Layanan Pengguna</option>
                        <option value="Lapor Bug">Lapor Bug</option>
                        <option value="Kritik Saran">Kritik atau Saran</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Nama</label>
                      <input type="nama" name="nama" class="form-control" value="<?=input('nama', '')?>" placeholder="Tulis nama">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="<?=input('email', '')?>" placeholder="Tulis email">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Nomor Kontak</label>
                      <input type="text" name="no_hp" class="form-control" value="<?=input('no_hp', '')?>" placeholder="Tulis nomor kontak">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Subjek</label>
                    <input type="text" name="subjek" class="form-control" value="<?=input('subjek', '')?>" placeholder="Tulis subjek">
                  </div>
                  <div class="form-group">
                    <label>Isi Pesan</label>
                    <textarea name="isi" rows="4" class="form-control" placeholder="Ketik isi pesan"><?=input('isi', '')?></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                </form>
              </div>
            </div>
          </div>
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
