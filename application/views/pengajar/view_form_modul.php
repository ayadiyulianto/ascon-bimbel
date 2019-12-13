<?php $this->load->view('pengajar/header') ?>

        <!-- Basic Form Start -->
        <div class="basic-form-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline8-list">
                            <div class="sparkline8-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">
                                                <form action="<?= base_url('pengajar/modul/simpanDetailModul') ?>" method="post" id="formTambah">
                                                    <h3>Detail Modul</h3>
                                                    <div class="form-group-inner">
                                                        <label>Nama Modul</label>
                                                        <input type="hidden" name="id" value="<?= $modul->id ?>" />
                                                        <input name="nama_modul" type="text" class="form-control" value="<?= $modul->nama_modul ?>" placeholder="Ketik Nama Modul" />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Deskripsi Singkat</label>
                                                        <textarea rows="7" name="deskripsi_singkat" class="form-control" placeholder="Ketik Deskripsi Singkat"><?= $modul->deskripsi_singkat ?></textarea>
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">
                                                <form action="<?= base_url('pengajar/modul/simpanLatihanModul') ?>" method="post" id="formTambah">
                                                    <h3>Latihan Soal</h3>
                                                    <div class="form-group-inner">
                                                        <label>Passing Grade (skala 1-100)</label>
                                                        <input type="hidden" name="id" value="<?= $modul->id ?>" />
                                                        <input name="passing_grade" type="number" class="form-control" value="<?= $modul->passing_grade ?>" placeholder="Ketik Passing Grade" />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Jumlah Soal Tiap Latihan</label>
                                                        <input name="jml_soal" type="number" class="form-control" value="<?= $modul->jml_soal ?>" placeholder="Ketik Jumlah Soal" />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Durasi Pengerjaan (dalam menit)</label>
                                                        <input name="durasi_pengerjaan" type="number" class="form-control" value="<?= $modul->durasi_pengerjaan ?>" placeholder="Ketik Durasi (Ketik 0 jika tidak ada durasi)" />
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('pengajar/footer') ?>