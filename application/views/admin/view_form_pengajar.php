<?php $this->load->view('admin/header') ?>

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
                                                <form action="<?= base_url('admin/datamaster/simpanDataDiriPengajar') ?>" method="post" id="formTambah" enctype="multipart/form-data">
                                                    <h3>Data Diri</h3>
                                                    <div class="form-group-inner">
                                                        <label>Nama Lengkap</label>
                                                        <input name="id" type="hidden" value="<?= $pengajar->id ?>"/>
                                                        <input name="nama" type="text" class="form-control" value="<?= $pengajar->nama ?>" placeholder="Ketik Nama Lengkap" />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Tanggal Lahir</label>
                                                        <input name="tgl_lahir" type="date" class="form-control" value="<?= date('Y-m-d', strtotime($pengajar->tgl_lahir)) ?>" placeholder="" />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Jenis Kelamin</label>
                                                        <input name="jk" type="text" class="form-control" value="<?= $pengajar->jk ?>" placeholder="" />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Alamat</label>
                                                        <textarea name="alamat" class="form-control" placeholder="Ketik Alamat"><?= $pengajar->alamat ?></textarea>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Nomor HP</label>
                                                        <input name="no_hp" type="text" class="form-control" value="<?= $pengajar->no_hp ?>" placeholder="08XXX" />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Foto Diri</label>
                                                        <div class="file-upload-inner file-upload-inner-right ts-forms">
                                                            <div class="input append-small-btn">
                                                                <div class="file-button">
                                                                    Browse
                                                                    <input name="foto" type="file" onchange="document.getElementById('append-small-btn').value = this.value;">
                                                                </div>
                                                                <input type="text" id="append-small-btn" value="<?= 'assets/images/user/'.$pengajar->foto ?>" placeholder="no file selected">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit">Simpan Data Diri</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">
                                                <form action="<?= base_url('admin/datamaster/simpanAkunPengajar') ?>" method="post">
                                                    <h3>Info Akun</h3>
                                                    <div class="form-group-inner">
                                                        <label>Username</label>
                                                        <input name="id" type="hidden" value="<?= $pengajar->id ?>"/>
                                                        <input name="username" type="text" class="form-control" value="<?= $pengajar->username ?>" placeholder="Ketik Username" />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Email</label>
                                                        <input name="email" type="email" class="form-control" value="<?= $pengajar->email ?>" placeholder="Ketik Email" />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Ubah Password</label>
                                                        <input name="password" type="password" class="form-control" placeholder="password" />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Ulangi Password</label>
                                                        <input name="ulangipassword" type="password" class="form-control" placeholder="password" />
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit">Simpan Info Akun</button>
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

<?php $this->load->view('admin/footer') ?>