
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.dashboard.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.filemgr.css">

  </head>
  <body class="app-filemgr">

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>
    
    <!-- CONTENT -->
    <!-- Inner Menu -->
    <?php $this->load->view('pengajar/_inner_menu') ?>

              <!-- Content -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body pd-y-30">
                      <div class="d-sm-flex">
                        <div class="media">
                          <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-teal tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-6">
                            <i data-feather="users"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Siswa</h6>
                            <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?=$ringkasan['jml_siswa']?></h4>
                          </div>
                        </div>
                        <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                          <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-pink tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-5">
                            <i data-feather="folder"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Modul</h6>
                            <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?=$ringkasan['jml_modul']?></h4>
                          </div>
                        </div>
                        <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                          <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-primary tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-4">
                            <i data-feather="file-text"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Soal Latihan</h6>
                            <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?=$ringkasan['jml_siswa']?></h4>
                          </div>
                        </div>
                        <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                          <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-orange tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-4">
                            <i data-feather="star"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Ulasan</h6>
                            <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?=$ringkasan['ulasan']->rating?> / 5 <small>(<?=$ringkasan['ulasan']->jumlah?> ulasan)</small></h4>
                          </div>
                        </div>
                      </div>
                    </div><!-- card-body -->
                  </div> <!-- card -->
                </div>

                <div class="col-lg-4 mg-t-20">
                  <div class="card">
                    <div class="card-header pd-t-20 pd-b-0 bd-b-0">
                      <h6 class="mg-b-5">Siswa Terdaftar</h6>
                      <p class="tx-12 tx-color-03 mg-b-0">Jumlah siswa yang belajar di kelas ini</p>
                    </div><!-- card-header -->
                    <div class="card-body pd-20">
                      <div class="chart-two mg-b-20">
                        <div id="flotChart2" class="flot-chart"></div>
                      </div><!-- chart-two -->
                      <div class="row">
                        <div class="col-sm">
                          <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5"><?=$ringkasan['sedang_belajar']?> <small>siswa</small></h4>
                          <p class="tx-11 tx-uppercase tx-spacing-1 tx-semibold mg-b-10 tx-primary">Sedang Belajar</p>
                          <!-- <div class="tx-12 tx-color-03">Siswa yang sedang belajar di kelas ini</div> -->
                        </div><!-- col -->
                        <div class="col-sm mg-t-20 mg-sm-t-0">
                          <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5"><?=$ringkasan['selesai_kelas'] ?> <small>siswa</small></h4>
                          <p class="tx-11 tx-uppercase tx-spacing-1 tx-semibold mg-b-10 tx-pink">Telah Selesai</p>
                          <!-- <div class="tx-12 tx-color-03">Siswa yang telah menyelasikan semua modul</div> -->
                        </div><!-- col -->
                      </div><!-- row -->
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div>

                <div class="col-lg-4 mg-t-20">
                  <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h6 class="mg-b-0">Siswa Terbaru</h6>
                    </div>
                    <ul class="list-group list-group-flush tx-13">
                      <?php if($siswa_terbaru->num_rows()==0){
                        echo '<li class="list-group-item d-flex pd-sm-x-20">Belum ada siswa</li>';
                      }
                      foreach($siswa_terbaru->result_array() as $row){ ?>
                      <li class="list-group-item d-flex pd-sm-x-20">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-gray-600"><?=$row['nama_user'][0]?></span></div>
                        <div class="pd-l-10">
                          <p class="tx-medium mg-b-0"><?=$row['nama_user']?></p>
                          <small class="tx-12 tx-color-03 mg-b-0"><?=tgl($row['waktu_post'])?></small>
                        </div>
                        <div class="mg-l-auto d-flex align-self-center">
                          <nav class="nav nav-icon-only">
                            <a href="<?=base_url('siswakelas/detail/'.$row['id_user'])?>" class="nav-link"><i data-feather="more-vertical"></i></a>
                          </nav>
                        </div>
                      </li>
                      <?php } ?>
                    </ul>
                    <div class="card-footer text-center tx-13">
                      <a href="<?=base_url('siswa')?>" class="link-03">Lihat Siswa Lainnya <i class="icon ion-md-arrow-down mg-l-5"></i></a>
                    </div><!-- card-footer -->
                  </div><!-- card -->
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 mg-t-20">
                  <div class="card">
                    <div class="card-header pd-t-20 pd-b-0 bd-b-0">
                      <h6 class="lh-5 mg-b-5">Overall Rating</h6>
                      <p class="tx-12 tx-color-03 mg-b-0">Measures the quality or your support team’s efforts.</p>
                    </div><!-- card-header -->
                    <div class="card-body pd-0">
                      <div class="pd-t-10 pd-b-15 pd-x-20 d-flex align-items-baseline">
                        <h1 class="tx-normal tx-rubik mg-b-0 mg-r-5"><?=$ringkasan['ulasan']->rating.' ('.$ringkasan['ulasan']->jumlah.')'?></h1>
                        <div class="tx-18"><?=rating($ringkasan['ulasan']->rating)?></div>
                      </div>
                      <?php foreach($rating->result() as $rtg){
                        $percentage = ($rtg->jumlah/$ringkasan['ulasan']->jumlah)*100; ?>
                      <div class="list-group list-group-flush tx-13">
                        <div class="list-group-item pd-y-5 pd-x-20 d-flex align-items-center">
                          <strong class="tx-rubik"><?=$rtg->rating?>.0</strong>
                          <div class="tx-16 mg-l-10"><?=rating($rtg->rating)?></div>
                          <div class="progress ht-5 flex-grow-1 mg-l-10">
                            <div class="progress-bar bg-orange" style="width: <?=$percentage?>%" role="progressbar" aria-valuenow="<?=$percentage?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="mg-l-10 tx-rubik tx-color-02"><?=$rtg->jumlah?></div>
                          <div class="mg-l-10 tx-rubik tx-gray-500"><?=$percentage?> %</div>
                        </div>
                      </div><!-- list-group -->
                      <?php } ?>
                    </div><!-- card-body -->
                    <div class="card-footer text-center tx-13">
                      <a href="<?=base_url('komunikasi/review')?>" class="link-03">Lihat Ulasan Siswa <i class="icon ion-md-arrow-down mg-l-5"></i></a>
                    </div><!-- card-footer -->
                  </div><!-- card -->
                </div><!-- col -->

              </div>

              <!-- Inner Menu Closed Tag-->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>

    <!-- another js -->
    <script src="<?=base_url()?>lib/chart.js/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>lib/jquery.flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="<?=base_url()?>lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="<?=base_url()?>assets/js/dashforge.sampledata.js"></script>
    <script src="<?=base_url()?>assets/js/dashforge.filemgr.js"></script>

    <script>

      $('.navbar-header').append('<a href="" id="filemgrMenu" class="burger-menu d-lg-none"><i data-feather="arrow-left"></i></a>');

      $(function(){
        'use strict'

        if(window.matchMedia('(min-width: 1200px)').matches) {
          $('.aside').addClass('minimize');
        }

        // add config button on top
        $('.filemgr-content-header').children('nav').append(
          '<a href="<?=base_url('kelas/pengaturan')?>" class="btn btn-outline-secondary"><i class="fa fa-cog" data-toggle="tooltip" data-placement="top" title="Pengaturan"></i> <span class="d-none d-md-inline">Pengaturan</span></a>');

        $.plot('#flotChart2', [{
          data: [[0,55],[1,38],[2,20],[3,70],[4,50],[5,15],[6,30],[7,50],[8,40],[9,55],[10,60],[11,40],[12,32],[13,17],[14,28],[15,36],[16,53],[17,66],[18,58],[19,46]],
          color: '#69b2f8'
        },{
          data: [[0,80],[1,80],[2,80],[3,80],[4,80],[5,80],[6,80],[7,80],[8,80],[9,80],[10,80],[11,80],[12,80],[13,80],[14,80],[15,80],[16,80],[17,80],[18,80],[19,80]],
          color: '#f0f1f5'
        }], {
          series: {
            stack: 0,
            bars: {
              show: true,
              lineWidth: 0,
              barWidth: .5,
              fill: 1
            }
          },
          grid: {
            borderWidth: 0,
            borderColor: '#edeff6'
          },
          yaxis: {
            show: false,
            max: 80
          },
          xaxis: {
            ticks:[[0,'Jan'],[4,'Feb'],[8,'Mar'],[12,'Apr'],[16,'May'],[19,'Jun']],
            color: '#fff',
          }
        });

      });

    </script>

  </body>
</html>
