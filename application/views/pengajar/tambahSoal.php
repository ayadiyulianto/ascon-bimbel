<?php $this->load->view('pengajar/header'); ?>
       <div class="tinymce-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tinymce-single responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>Tambah Soal<a class="pull-right btn btn-custon-four btn-primary" href="#">Simpan</a></h2>
                            </div>
                            <form action="<?php echo base_url('pengajar/modul/simpanSoal')?>">
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label class="login2">Soal Baru</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <textarea name="soal" class="form-control" id="summernote1"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner input-with-success">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label class="login2">Pilihan Jawaban</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input name="benar_1" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner input-with-error">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input name="salah_1" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner input-with-error">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input name="salah_2" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner input-with-error">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input name="salah_3" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label class="login2">Pembahasan</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <textarea name="pembahasan" class="form-control" id="summernote"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('pengajar/footer'); ?>