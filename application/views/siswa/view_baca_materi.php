<?php $this->load->view('siswa/header'); ?>

        <div class="button-edu-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="blog-details-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="latest-blog-single blog-single-full-view">
                                        <div class="blog-details blog-sig-details">
                                            <h1 class="blog-ht"><?= $materi->judul_materi ?></h1>
                                            <?= $materi->materi ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bottom">
                                    <a class="btn btn-default pull-right" href="<?= base_url('siswa/materi/tandaiSelesai/'.$id_modul.'/'.$materi->id) ?>">Tandai Selesai</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="button-ad-wrap res-mg-b-30">
                            <h4>Materi</h4>
                            <table>
                                <?php foreach($listmateri->result() as $row){ ?>
                                <tr>
                                    <?php $checkMulai = $this->SiswaModel->checkMateriMulai($id_siswa, $row->id); 
                                    $checkSelesai = $this->SiswaModel->checkMateriSelesai($id_siswa, $row->id); ?>
                                    <td><a <?php if($checkMulai) echo 'href="'.base_url('siswa/materi/baca/'.$id_modul.'/'. $row->id).'"' ?> ><?= $row->judul_materi ?></a></td>
                                    <td valign="top"><?php if($checkSelesai) echo '<i class="fa fa-check"></i>' ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?php $this->load->view('siswa/footer'); ?>