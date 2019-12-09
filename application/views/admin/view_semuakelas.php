<?php $this->load->view('admin/header'); ?>

        <div class="courses-area">
            <div class="container-fluid">
                <div class="row mg-t-15">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-15">
                            <h2>Kelas Saya <a class="pull-right btn btn-custon-four btn-primary" data-toggle="modal" data-target="#PrimaryModalhdbgcl">Tambah</a></h2>
                        </div>
                    </div>
                </div>
                <div class="row mg-b-15">
                    <?php for($i=0; $i<=5; $i++){ ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="courses-inner mg-t-15">
                            <div class="courses-title">
                                <a href="#"><img src="<?php echo base_url('kiaalap/img/courses/1.jpg') ?>" alt=""></a>
                                <h2>Apps Development</h2>
                            </div>
                            <div class="courses-alaltic">
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock-o"></i></span> 1 Year</span>
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-star"></i></span> 4.5</span>
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                            </div>
                            <div class="course-des">
                                <p><b>Peserta:</b> 100</p>
                                <p><b>Deskripsi:</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua of Lorem Ipsum. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisis ut aliquip ex ea commodo consequat consectetur adipisicing elit.</p>
                            </div>
                            <div class="product-buttons">
                                <button type="button" class="button-default cart-btn">Tambah Pengajar</button>
                                <button type="button" class="button-default cart-btn">Ubah</button>
                                <button type="button" class="button-warning cart-btn">Hapus</button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title">Tambah Kelas</h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="modal-login-form-inner">
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="basic-login-inner modal-basic-inner">
                                        <form action="<?= base_url('admin/datamaster/tambahKelas') ?>" id="formTambah">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label class="login2">Kode Kelas</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <input name="kode_kelas" type="text" class="form-control" placeholder="Masukkan Kode Kelas" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label class="login2">Nama Kelas</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <input name="nama" type="text" class="form-control" placeholder="Masukkan kode kelas" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label class="login2">Foto</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <div class="file-upload-inner file-upload-inner-right ts-forms">
                                                    <div class="input append-small-btn">
                                                        <div class="file-button">
                                                            Browse
                                                            <input name="foto" type="file" onchange="document.getElementById('append-small-btn').value = this.value;">
                                                        </div>
                                                        <input type="text" id="append-small-btn" placeholder="no file selected">
                                                    </div>
                                                </div>
                                            </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label class="login2">Deskripsi</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <textarea name="deskripsi" class="form-control" placeholder="Tuliskan deskripsi singkat"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a data-dismiss="modal" href="#">Batal</a>
                        <a onclick="document.getElementById('formTambah').submit();" href="#">Tambah</a>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('admin/footer'); ?>