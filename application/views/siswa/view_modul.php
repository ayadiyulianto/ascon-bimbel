<?php $this->load->view('siswa/header'); ?>

        <div class="data-table-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Daftar Modul</h1>
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
                                                <th data-field="status">Status</th>
                                                <th data-field="action">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($semuamodul->result() as $modul){ ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $modul->nama_modul ?></td>
                                                <td><?php
                                                    if(!empty($modul->status)){ echo $modul->status;}
                                                    else{ echo "Belum Selesai"; }?>
                                                </td>
                                                <td>
                                                    <a href="#" data-toggle="tooltip" title="Deskripsi Modul" class="pd-setting-ed"><i class="fa fa-info" aria-hidden="true"></i></a>
                                                    <a href="<?= base_url('siswa/materi/baca/'.$modul->id.'/'. $modul->id_materi_dibaca_terakhir) ?>" data-toggle="tooltip" title="Materi" class="pd-setting-ed"><i class="fa fa-book" aria-hidden="true"></i> Baca Materi</a>
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
        
<?php $this->load->view('siswa/footer'); ?>