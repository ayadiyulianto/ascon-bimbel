<?php $this->load->view('siswa/header'); ?>

<div class="button-edu-area mg-b-15">
            <div class="container-fluid">
                <div class="row mg-t-15">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                            <h2><?= $tgl_mulai ?> <i class="fa fa-clock-o"></i></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="button-ad-wrap">
                            <!-- <div class="button-ap-list responsive-btn">
                                <a href="#" class="btn btn-custon-rounded-three btn-primary"><i class="fa fa-arrow-left edu-informatio" aria-hidden="true"></i> Sebelumnya</a>
                                <a href="#" class="pull-right btn btn-custon-rounded-three btn-primary">Selanjutnya <i class="fa fa-arrow-right edu-informatio" aria-hidden="true"></i></a>
                            </div>
                            <br> -->
                            <form action="<?= base_url('siswa/latihansoal/simpanjawaban/'.$nomor) ?>" method="post">
                                <input type="hidden" name="id_sesi_soal" value="<?= $soal->id_sesi_soal ?>">
                                <div class="alert-title">
                                    <h1 class="text-center">Soal <?= $nomor ?></h1>
                                    <br>
                                    <?= $soal->soal ?>
                                    <?php foreach($jawaban as $row){ ?>
                                    <div class="i-checks pull-left">
                                        <label><input name="jawaban" type="radio" value="<?= $row ?>" <?php if($soal->jawaban==$row) echo 'checked="checked"'; ?>> <i></i><?= $row ?> </label>
                                    </div><br><br>
                                    <?php } ?>
                                </div>
                                <br>
                                <div class="button-ap-list responsive-btn">
                                    <button type="submit" class="btn btn-custon-rounded-three btn-success"><i class="fa fa-check edu-informatio" aria-hidden="true"></i> Simpan Jawaban</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="button-ad-wrap res-mg-b-30">
                            <h4>Nomor Soal</h4>
                            <div class="button-ap-list responsive-btn">
                                <?php $no=1; foreach($listnomorsoal as $row){ ?>
                                <a href="<?= base_url('siswa/latihansoal/soal/'.$no) ?>" class="btn btn-custon-rounded-three <?php if($row['status']=='belum'){ echo 'btn-default'; } else{ echo 'btn-success';} ?>"><?= $no++ ?></a>
                                <?php } ?>
                                <br><br><br>
                                <button style="width: 100%" type="button" class="btn btn-custon-four btn-primary" data-toggle="modal" data-target="#PrimaryModalalert"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> SELESAI</button>

                                <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-close-area modal-close-df">
                                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                            </div>
                                            <div class="modal-body">
                                                <i class="educate-icon educate-warning modal-check-pro"></i>
                                                <h2>Peringatan!</h2>
                                                <p>Anda yakin ingin menyelesaikan sesi latihan soal? Jika anda menekan tombol 'Simpan', jawaban anda akan dikirim dan sesi latihan ini akan berakhir!</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" href="#">BATAL</a>
                                                <a href="<?= base_url('siswa/latihansoal/sesiselesai') ?>">SELESAI</a>
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

<?php $this->load->view('siswa/footer'); ?>