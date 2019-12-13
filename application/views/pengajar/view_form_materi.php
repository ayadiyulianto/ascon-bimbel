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
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner">
                                                <form action="<?= base_url('pengajar/modul/simpanMateri') ?>" method="post" id="formTambah" enctype="multipart/form-data">
                                                    <h3>Detail Materi</h3>
                                                    <div class="form-group-inner">
                                                        <label>Judul Materi</label>
                                                        <input type="hidden" name="id_modul" value="<?= $id_modul ?>" />
                                                        <input type="hidden" name="id" value="<?php if($id!=NULL) echo $id ?>" />
                                                        <textarea name="judul_materi" class="form-control" placeholder="Ketik Judul Materi"><?php if(isset($materi)) echo $materi['judul_materi'] ?></textarea>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Estimasi Waktu Belajar (dalam menit)</label>
                                                        <input name="estimasi_waktu" type="text" class="form-control" placeholder="Ketik Estimasi Waktu" <?php if(isset($materi)) echo 'value="'.$materi['estimasi_waktu'].'"' ?> />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Isi Materi</label>
                                                        <textarea id="summernote" name="materi" class="form-control" placeholder="Ketik Isi Materi"><?php if(isset($materi)) echo $materi['materi'] ?></textarea>
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit">Simpan Materi</button>
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