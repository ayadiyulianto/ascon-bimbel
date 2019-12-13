<?php $this->load->view('pengajar/header'); ?>

        <div class="data-table-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Daftar Siswa</h1>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                    <hr>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="name">Nama</th>
                                                <th data-field="date">Tanggal Lahir</th>
                                                <th data-field="price">Jenis Kelamin</th>
                                                <th data-field="action">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($semuasiswa->result() as $siswa){ ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $siswa->nama ?></td>
                                                <td><?= $siswa->tgl_lahir ?></td>
                                                <td><?= $siswa->jk ?></td>
                                                <td>
                                                    <a href="<?= base_url('pengajar/siswa/progressbelajar/'.$siswa->id_user) ?>" data-toggle="tooltip" title="Progress Belajar" class="pd-setting-ed"><i class="fa fa-book" aria-hidden="true"></i></a>
                                                    <a href="<?= base_url('pengajar/siswa/hasillatihan/'.$siswa->id_user) ?>" data-toggle="tooltip" title="Hasil Latihan Soal" class="pd-setting-ed"><i class="fa fa-tasks" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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
                                        <form action="<?= base_url('pengajar/siswa/tambahModul') ?>" method="post" id="formTambah">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <label class="login2">Judul Modul</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <input name="nama_siswa" type="text" class="form-control" placeholder="Masukkan judul siswa" />
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
        
<?php $this->load->view('pengajar/footer'); ?>
