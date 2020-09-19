<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.filemgr.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.profile.css">

  </head>
  <body class="app-filemgr">

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>
    
    <!-- CONTENT -->
      <!-- Inner Menu -->
      <?php $this->load->view('pengajar/_inner_menu') ?>

                <!-- Content -->
                <div class="media d-block d-lg-flex">
                  
                  <div class="profile-sidebar pd-lg-r-25">
                    <div class="row">
                      <div class="col-sm-3 col-md-2 col-lg">
                        <div class="avatar avatar-xxl"><img src="<?=avatar($siswa->foto)?>" class="rounded-circle" alt=""></div>
                      </div><!-- col -->
                      <div class="col-sm-8 col-md-7 col-lg mg-t-20 mg-sm-t-0 mg-lg-t-25">
                        <h5 class="mg-b-2 tx-spacing--1"><?=$siswa->nama_user?></h5>
                        <p class="tx-color-03 mg-b-25"><?=$siswa->email?></p>
                        <p class="tx-13 tx-color-02 mg-b-25">Redhead, Innovator, Saviour of Mankind, Hopeless Romantic, Attractive 20-something Yogurt Enthusiast</p>
                      </div><!-- col -->
                      <div class="col-sm-6 col-md-5 col-lg mg-t-20">
                        <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">Badge</label>
                        <ul class="list-inline list-inline-skills">
                          <li class="list-inline-item"><button class="btn btn-icon btn-xs btn-white">Pembelajar</button></li>
                          <li class="list-inline-item"><button class="btn btn-icon btn-xs btn-success">Siswa Teladan</button></li>
                          <li class="list-inline-item"><button class="btn btn-icon btn-xs btn-primary">Rajin</button></li>
                          <li class="list-inline-item"><button class="btn btn-icon btn-xs btn-warning">Guru Terbaik</button></li>
                        </ul>
                      </div><!-- col -->
                      <div class="col-sm-6 col-md-5 col-lg mg-t-40">
                        <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">Kontak Informasi</label>
                        <ul class="list-unstyled profile-info-list">
                          <li><i data-feather="home"></i> <?=$siswa->alamat?></li>
                          <li><i data-feather="phone"></i> <?=$siswa->no_hp?></li>
                          <li><i data-feather="mail"></i> <?=$siswa->email?></li>
                        </ul>
                      </div><!-- col -->
                    </div><!-- row -->
                  </div><!-- profile-sidebar -->

                  <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">

                    <ul class="nav nav-line mg-b-30 tx-md-18">
                      <li class="nav-item">
                        <a class="nav-link active tx-semibold" id="modul-tab" data-toggle="tab" href="#modul" role="tab" aria-controls="modul" aria-selected="true">MODUL</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link tx-semibold" id="nilai-tab" data-toggle="tab" href="#nilai" role="tab" aria-controls="nilai" aria-selected="false">NILAI</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link tx-semibold" id="aktivitas-tab" data-toggle="tab" href="#aktivitas" role="tab" aria-controls="aktivitas" aria-selected="false">AKTIVITAS</a>
                      </li>
                    </ul>

                    <div class="tab-content mg-t-20" id="myTabContent5">

                      <div class="tab-pane fade show active" id="modul" role="tabpanel" aria-labelledby="modul-tab">
                        <div class="card mg-b-10">
                          <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                            <h6 class="tx-uppercase tx-semibold mg-b-0">Progres Belajar Siswa</h6>
                            <div class="progress ht-15 wd-50p">
                              <div class="progress-bar" style="width: <?=$progress?>%" role="progressbar" aria-valuenow="<?=$progress?>" aria-valuemin="0" aria-valuemax="100"><?=$progress?>%</div>
                            </div>
                          </div>

                          <?php foreach($modul->result() as $row){ ?>
                          <div class="card-body pd-t-30">
                            <h5><?=$row->nama_modul?></h5>
                            <div class="table-responsive">
                              <table class="table table-hover mg-b-0">
                                <tbody>
                                  <?php
                                  $konten = $this->SiswaModel->getKonten($row->id_modul, userdata('id_user'));
                                  foreach($konten->result() as $baris){
                                    if($baris->jenis=='Text'){ $icon='fa-file-text-o'; }
                                    elseif($baris->jenis=='Video'){ $icon='fa-play-circle'; }
                                    elseif($baris->jenis=='Latihan'){ $icon='fa-file-excel-o'; }
                                    elseif($baris->jenis=='Tugas'){ $icon='fa-briefcase'; } ?>
                                    <tr>
                                      <td style="vertical-align: middle; text-align: right;" class="wd-5p">
                                        <?=($baris->is_finished=='Y')?'<i class="tx-success" data-feather="check-circle"></i>':'<i class="tx-gray-500" data-feather="circle"></i>'?>
                                      </td>
                                      <td style="vertical-align: middle;"><i class="fa <?=$icon?> tx-20 tx-primary mg-r-20"></i><span class="tx-16 mg-r-20"><?=$baris->jenis.' : '.$baris->judul_konten?></span> <span class="tx-gray-500">(<?=$baris->durasi_belajar?> menit)</span></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <?php } ?>

                        </div>
                      </div>

                      <!-- TAB NILAI -->
                      <div class="tab-pane fade" id="nilai" role="tabpanel" aria-labelledby="nilai-tab">
                        <div class="card mg-b-10">
                          <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                            <h6 class="tx-uppercase tx-semibold mg-b-0">Nilai Siswa pada Kelas Ini</h6>
                          </div>
                          <div class="card-body pd-t-30">
                            <div class="table-responsive">
                              <table class="table table-hover mg-b-0">
                                <thead>
                                  <th class="wd-5p"></th>
                                  <th>Judul</th>
                                  <th>Status</th>
                                  <th>Waktu</th>
                                  <th>Nilai</th>
                                </thead>
                                <tbody>
                                  <?php foreach($nilai->result() as $n){ 
                                  if($n->jenis=='Latihan'){ $icon='fa-file-excel-o'; }
                                  elseif($n->jenis=='Tugas'){ $icon='fa-briefcase'; } ?>
                                  <tr>
                                    <td style="text-align: right; vertical-align: middle;"><?=($n->is_finished=='Y')?'<i class="tx-success" data-feather="check-circle"></i>':''?></td>
                                    <td class="tx-semibold" style="vertical-align: middle;"><i class="fa <?=$icon?> tx-20 tx-primary mg-r-10"></i> <?=$n->jenis.' : '.$n->judul_konten?></td>
                                    <td style="vertical-align: middle;"><?= empty($n->status) ? 'Belum':$n->status ?></td>
                                    <td><?=tgl_indo($n->waktu_selesai, 'j F Y')?><br><?=tgl_indo($n->waktu_selesai, 'H:i')?> WIB</td>
                                    <td class="tx-semibold" style="vertical-align: middle;"><?= empty($n->nilai) ? '--':$n->nilai ?></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- TAB DISKUSI -->
                      <div class="tab-pane fade" id="aktivitas" role="tabpanel" aria-labelledby="aktivitas-tab">
                        <div class="card mg-b-20 mg-lg-b-25">
                          <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                            <h6 class="tx-uppercase tx-semibold mg-b-0">Aktivitas Terakhir</h6>
                            <!-- <nav class="nav nav-icon-only">
                              <a href="" class="nav-link"><i data-feather="more-horizontal"></i></a>
                            </nav> -->
                          </div><!-- card-header -->
                          <div class="card-body pd-20 pd-lg-25">
                            <div class="timeline-group tx-13">
                              <div class="timeline-label">Today</div>
                              <div class="timeline-item">
                                <div class="timeline-time">10:30pm</div>
                                <div class="timeline-body">
                                  <h6 class="mg-b-0">Building a Simple User Interface</h6>
                                  <p><a href="">Elisse Joson</a> San Francisco, CA</p>
                                  <p>In this lesson, you create a layout in XML that includes a text field and a button. In the next lesson, your app responds when the </p>
                                </div><!-- timeline-body -->
                              </div><!-- timeline-item -->
                              <div class="timeline-item">
                                <div class="timeline-time">08:15pm</div>
                                <div class="timeline-body">
                                  <h6 class="mg-b-0">Blueberry Cheesecake Dessert Recipe</h6>
                                  <p><a href="">Katherine Lumaad</a> Oakland, CA</p>
                                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                                </div><!-- timeline-body -->
                              </div><!-- timeline-item -->
                            </div><!-- timeline-group -->
                          </div>
                          <div class="card-footer bg-transparent pd-y-15 pd-x-20">
                            <nav class="nav nav-with-icon tx-13">
                              <a href="#" class="nav-link">
                                Lihat aktivitas lain <i data-feather="chevron-down" class="mg-l-2 mg-r-0 mg-t-2"></i>
                              </a>
                            </nav>
                          </div><!-- card-footer -->
                        </div><!-- card -->

                      </div>
                    </div>

                  </div><!-- media-body -->
                </div><!-- media -->

                <!-- Inner Menu Closed Tag-->
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>
    <script src="<?=base_url()?>assets/js/dashforge.filemgr.js"></script>

    <script>
      
      $('.navbar-header').append('<a href="" id="filemgrMenu" class="burger-menu d-lg-none"><i data-feather="arrow-left"></i></a>');

      $(function(){
        'use strict'

        if(window.matchMedia('(min-width: 1200px)').matches) {
          $('.aside').addClass('minimize');
        }

        // add save button on top
        // $('.filemgr-content-header').children('nav').append(
        //   '<a href="<?=base_url()?>" class="btn btn-outline-primary"><i class="fa fa-print"></i> Cetak</a>');

      });

    </script>

  </body>
</html>
