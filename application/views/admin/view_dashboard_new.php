<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link rel="stylesheet" href="<?=base_url()?>lib/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.dashboard.css">

  </head>
  <body>

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>
    
    <!-- CONTENT -->
    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </nav>
            <h3 class="mg-b-0 tx-spacing--1">Selamat Datang di Dashboard Admin</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body pd-y-30">
                <div class="d-sm-flex">
                  <div class="media">
                    <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-teal tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-6">
                      <i data-feather="folder"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">Kelas</h6>
                      <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?=$ringkasan['jml_kelas']?></h4>
                    </div>
                  </div>
                  <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                    <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-pink tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-5">
                      <i data-feather="user"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Pengguna</h6>
                      <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?=$ringkasan['jml_pengguna']?></h4>
                    </div>
                  </div>
                  <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                    <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-primary tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-4">
                      <i data-feather="users"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Enrollment</h6>
                      <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?=$ringkasan['jml_enroll']?></h4>
                    </div>
                  </div>
                  <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                    <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-danger tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-4">
                      <i data-feather="dollar-sign"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Pendapatan</h6>
                      <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">Rp <?=rupiah($ringkasan['pendapatan'])?></h4>
                    </div>
                  </div>
                  <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                    <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-indigo tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-4">
                      <i data-feather="activity"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Active Users</h6>
                      <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">25 <small>/ bulan</small></h4>
                    </div>
                  </div>
                </div>
              </div><!-- card-body -->
            </div> <!-- card -->
          </div>

          <div class="col-lg-8 col-xl-9 mg-t-20">
            <div class="card">
              <div class="card-header pd-t-20 pd-b-0 bd-b-0">
                <h6 class="mg-b-5">Pengguna Terdaftar</h6>
                <p class="tx-12 tx-color-03 mg-b-0">Jumlah pengguna yang mendaftar di oasse bimbel</p>
              </div><!-- card-header -->
              <div class="card-body pd-20">
                <div class="chart-two mg-b-20">
                  <div id="flotChart2" class="flot-chart"></div>
                </div><!-- chart-two -->
                <div class="row">
                  <div class="col-sm">
                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5"><?=$ringkasan['jml_pengajar']?> <small class="tx-primary">pengajar</small></h4>
                    <!-- <p class="tx-11 tx-uppercase tx-spacing-1 tx-semibold mg-b-10 tx-primary">Sedang Belajar</p> -->
                  </div><!-- col -->
                  <div class="col-sm mg-t-20 mg-sm-t-0">
                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5"><?=$ringkasan['jml_siswa']?> <small class="tx-pink">siswa</small></h4>
                    <!-- <p class="tx-11 tx-uppercase tx-spacing-1 tx-semibold mg-b-10 tx-pink">Telah Menyelesaikan Kelas</p> -->
                  </div><!-- col -->
                </div><!-- row -->
              </div><!-- card-body -->
            </div><!-- card -->
          </div>

          <div class="col-sm-7 col-md-5 col-lg-4 col-xl-3 mg-t-20">
            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h6 class="mg-b-0">Pengguna Terbaru</h6>
              </div>
              <ul class="list-group list-group-flush tx-13">
                <?php if($userTerbaru->num_rows()==0){
                  echo '<li class="list-group-item d-flex pd-sm-x-20">Belum ada pengguna</li>';
                }
                foreach($userTerbaru->result() as $row){ ?>
                <li class="list-group-item d-flex pd-sm-x-20">
                  <div class="wd-50">
                    <div class="avatar"><img src="<?=avatar($row->foto)?>" class="rounded-circle" alt=""></div>
                  </div>
                  <div class="pd-l-10">
                    <p class="tx-medium mg-b-0"><?=$row->nama_user?></p>
                    <small class="tx-12 tx-color-03 mg-b-0"><?=tgl($row->waktu_post)?></small>
                  </div>
                  <div class="mg-l-auto d-flex align-self-center">
                    <nav class="nav nav-icon-only">
                      <a href="<?=base_url('admin/user/detail/'.$row->id_user)?>" class="nav-link"><i data-feather="more-vertical"></i></a>
                    </nav>
                  </div>
                </li>
                <?php } ?>
              </ul>
              <div class="card-footer text-center tx-13">
                <a href="<?=base_url('admin/user')?>" class="link-03">Lihat Pengguna Lainnya <i class="icon ion-md-arrow-down mg-l-5"></i></a>
              </div><!-- card-footer -->
            </div><!-- card -->
          </div>

        </div>
      </div><!-- container -->
    </div><!-- content -->

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>
    <!-- required js -->
    <script src="<?=base_url()?>lib/jquery.flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="<?=base_url()?>lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="<?=base_url()?>lib/chart.js/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>lib/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?=base_url()?>lib/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="<?=base_url()?>assets/js/dashforge.sampledata.js"></script>

    <script>
      $(function(){
        'use strict'

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
