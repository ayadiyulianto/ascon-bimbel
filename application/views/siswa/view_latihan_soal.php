<?php $this->load->view('siswa/header'); ?>

        <div class="data-table-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Latihan Soal</h1>
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
                                                <th data-field="modul">Modul</th>
                                                <th data-field="status">Status</th>
                                                <th data-field="tgl_pengerjaan">Tanggal Pengerjaan</th>
                                                <th data-field="nilai">Nilai</th>
                                                <th data-field="action">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($semuamodul->result() as $modul){ ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $modul->nama_modul ?></td>
                                                <td><?php
                                                    if(!empty($modul->status_latihan)){ echo $modul->status_latihan;}
                                                    else{ echo "Belum dikerjakan"; }?>
                                                </td>
                                                <td><?php
                                                    if(!empty($modul->tgl_pengerjaan)){ echo $modul->tgl_pengerjaan;}
                                                    else{ echo "-"; }?>
                                                </td>
                                                <td><?php
                                                    if(!empty($modul->nilai)){ echo $modul->nilai;}
                                                    else{ echo "-"; }?>
                                                </td>
                                                <td>
                                                    <a href="#" data-toggle="tooltip" title="Deskripsi Modul" class="pd-setting-ed"><i class="fa fa-info" aria-hidden="true"></i></a>

                                                    <?php if(empty($modul->status_latihan) || $modul->status_latihan=="Belum dikerjakan"){ ?>
                                                    <a href="<?= base_url('siswa/latihansoal/latihan/'. $modul->id) ?>" class="pd-setting-ed">Kerjakan</a>

                                                    <?php } elseif(!empty($modul->status_latihan) && $modul->status_latihan=="Gagal"){ ?>
                                                    <a href="<?= base_url('siswa/latihansoal/latihan/'. $modul->id) ?>" class="pd-setting-ed">Ulangi</a>

                                                    <?php } elseif(!empty($modul->status_latihan) && $modul->status_latihan=="Berhasil"){ ?>
                                                    <a href="<?= base_url('siswa/latihansoal/bahas/'. $modul->id_sesi_latihan_terakhir) ?>" data-toggle="tooltip" title="Bahas Latihan Soal" class="pd-setting-ed">Bahas</a>
                                                    <?php } ?>
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