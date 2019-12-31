<?php $this->load->view('pengajar/header_main') ?>

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
                                                <form action="<?= base_url('pengajar/kelas/simpanKelas') ?>" method="post" id="formTambah" enctype="multipart/form-data">
                                                    <h3>Detail Kelas</h3>
                                                    <div class="form-group-inner">
                                                        <label>Nama Kelas</label>
                                                        <input type="hidden" name="id" value="<?= $kelas->id ?>" />
                                                        <input name="nama" type="text" class="form-control" value="<?= $kelas->nama ?>" placeholder="Ketik Nama Kelas" />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Deskripsi Singkat</label>
                                                        <textarea rows="5" name="deskripsi_singkat" class="form-control" placeholder="Ketik Deskripsi Singkat"><?= $kelas->deskripsi_singkat ?></textarea>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Foto Sampul Kelas</label>
                                                        <div class="file-upload-inner file-upload-inner-right ts-forms">
                                                            <div class="input append-small-btn">
                                                                <div class="file-button">
                                                                    Browse
                                                                    <input name="foto" type="file" onchange="document.getElementById('append-small-btn').value = this.value;">
                                                                </div>
                                                                <input type="text" id="append-small-btn" value="<?= 'assets/images/kelas/'.$kelas->foto ?>" placeholder="no file selected">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Deskripsi Lengkap</label>
                                                        <textarea id="summernote" name="deskripsi_lengkap" class="form-control" placeholder="Ketik Deskripsi Lengkap"><?= $kelas->deskripsi_lengkap ?></textarea>
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit">Simpan Data Kelas</button>
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