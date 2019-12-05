
        <!-- Static Table Start -->
        <div class="data-table-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                            <h2>Modul<a class="pull-right btn btn-custon-four btn-primary" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl">Tambah</a></h2>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
                            <div class="panel-group edu-custon-design" id="accordion">
                                <?php for($i=0; $i<=5; $i++){ ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading accordion-head">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>">Modul 1</a>
                                            <a class="pull-right" onmouseover="this.style.color='#000'" onmouseout="this.style.color='#fff'" href="#"><i class="fa fa-trash"></i> Hapus</a>
                                            <a style="margin-right:5px" class="pull-right" onmouseover="this.style.color='#000'" onmouseout="this.style.color='#fff'" href="#"><i class="fa fa-pencil"></i> Ubah</a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?= $i ?>" class="panel-collapse panel-ic collapse">
                                        <div class="panel-body admin-panel-content animated bounce">
                                            <p>It was popularised in the 1960s with the release of Letraset sheets of the containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.</p>
                                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua of Lorem Ipsum. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisis ut aliquip ex ea commodo consequat consectetur adipisicing elit.</p>
                                            <a class="btn btn-custon-four btn-primary" href="<?php echo base_url('pengajar/modul/materi')?>">Tambah</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title">Tambah Modul</h4>
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
                                        <form action="#">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label class="login2">Kode Modul</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <input type="email" class="form-control" placeholder="Masukkan kode modul" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label class="login2">Kode Kelas</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <input type="password" class="form-control" placeholder="Masukkan kode kelas" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label class="login2">Judul Modul</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <input type="email" class="form-control" placeholder="Masukkan judul" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label class="login2">Passing Grade</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <input type="email" class="form-control" placeholder="Masukkan nilai" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label class="login2">Deskripsi</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <textarea type="email" class="form-control" placeholder="Tuliskan deskripsi singkat"></textarea>
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
                        <a href="#">Tambah</a>
                    </div>
                </div>
            </div>
        </div>