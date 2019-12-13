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
                                                <form action="<?= base_url('pengajar/modul/simpanSoal') ?>" method="post" id="formTambah" enctype="multipart/form-data">
                                                    <h3>Detail Soal</h3>
                                                    <div class="form-group-inner">
                                                        <label>Soal</label>
                                                        <input type="hidden" name="id_modul" value="<?= $id_modul ?>" />
                                                        <input type="hidden" name="id" value="<?php if($id!=NULL) echo $id ?>" />
                                                        <textarea id="summernote1" name="soal" class="form-control" placeholder="Ketik Soal"><?php if(isset($soal)) echo $soal['soal'] ?></textarea>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Pilihan Jawaban</label>
                                                    </div>
                                                    <div class="form-group-inner input-with-success">
                                                        <label>Jawaban Benar</label>
                                                        <input name="benar_1" type="text" class="form-control" placeholder="Ketik Jawaban Benar" <?php if(isset($soal)) echo 'value="'.$soal['benar_1'].'"' ?> />
                                                    </div>
                                                    <div class="form-group-inner input-with-error">
                                                        <label>Jawaban Salah</label>
                                                        <input name="salah_1" type="text" class="form-control" placeholder="Ketik Jawaban Salah" <?php if(isset($soal)) echo 'value="'.$soal['salah_1'].'"' ?> />
                                                    </div>
                                                    <div class="form-group-inner input-with-error">
                                                        <label>Jawaban Salah</label>
                                                        <input name="salah_2" type="text" class="form-control" placeholder="Ketik Jawaban Salah" <?php if(isset($soal)) echo 'value="'.$soal['salah_2'].'"' ?> />
                                                    </div>
                                                    <div class="form-group-inner input-with-error">
                                                        <label>Jawaban Salah</label>
                                                        <input name="salah_3" type="text" class="form-control" placeholder="Ketik Jawaban Salah" <?php if(isset($soal)) echo 'value="'.$soal['salah_3'].'"' ?> />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Pembahasan</label>
                                                        <textarea id="summernote" name="pembahasan" class="form-control" placeholder="Ketik Pembahasan"><?php if(isset($soal)) echo $soal['pembahasan'] ?></textarea>
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit">Simpan Soal</button>
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