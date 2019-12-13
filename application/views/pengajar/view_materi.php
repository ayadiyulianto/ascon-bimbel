<?php $this->load->view('pengajar/header') ?>

        <div class="data-table-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Daftar Materi</h1>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                    <div class="add-product">
                                        <a href="<?= base_url('pengajar/modul/formmateri/'.$id_modul) ?>">Tambah Materi</a>
                                    </div>
                                    <div class="visible-xs">
                                        <a class="btn btn-primary" href="<?= base_url('pengajar/modul/formmateri/'.$id_modul) ?>" >Tambah Materi</a>
                                    </div>
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
                                                <th data-field="nama">Judul Materi</th>
                                                <th data-field="estimasi">Estimasi Waktu</th>
                                                <th data-field="action">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($semuamateri->result() as $materi){ ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $materi->judul_materi ?></td>
                                                <td><?= $materi->estimasi_waktu ?> menit</td>
                                                <td>
                                                    <a href="<?= base_url('pengajar/modul/formmateri/'.$id_modul.'/'.$materi->id) ?>" data-toggle="tooltip" title="Ubah" class="pd-setting-ed"><i class="fa fa-book" aria-hidden="true"></i></a>
                                                    <a href="<?= base_url('pengajar/modul/hapusmateri/'.$id_modul.'/'.$materi->id) ?>" onclick="return confirm('Yakin ingin menghapus?')" data-toggle="tooltip" title="Hapus" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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

<?php $this->load->view('pengajar/footer') ?>