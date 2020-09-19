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
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Monitoring</li>
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

          <div class="col-lg-12 mg-t-20">
            <div class="card">
              <div class="card-header bd-b-0 pd-t-20 pd-lg-t-25 pd-l-20 pd-lg-l-25 d-flex flex-column flex-sm-row align-items-sm-start justify-content-sm-between">
                <div>
                  <h6 class="mg-b-5">Website Audience Metrics</h6>
                  <p class="tx-12 tx-color-03 mg-b-0">Audience to which the users belonged while on the current date range.</p>
                </div>
                <div class="btn-group mg-t-20 mg-sm-t-0">
                  <button class="btn btn-xs btn-white btn-uppercase">Day</button>
                  <button class="btn btn-xs btn-white btn-uppercase">Week</button>
                  <button class="btn btn-xs btn-white btn-uppercase active">Month</button>
                </div><!-- btn-group -->
              </div><!-- card-header -->
              <div class="card-body pd-lg-25">
                <div class="row align-items-sm-end">
                  <div class="col-lg-10">
                    <div class="chart-six"><canvas id="chartBar1"></canvas></div>
                  </div>
                  <div class="col-lg-2 mg-t-30 mg-lg-t-0">
                    <div class="row">
                      <div class="col-lg-12 mg-b-10">
                        <div class="d-flex align-items-center justify-content-between mg-b-5">
                          <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">New Users</h6>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mg-b-5">
                          <h5 class="tx-normal tx-rubik lh-2 mg-b-0">13,596</h5>
                        </div>
                        <div class="progress ht-4 mg-b-0 op-5">
                          <div class="progress-bar bg-teal wd-65p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col-lg-12 mg-b-20">
                        <div class="d-flex align-items-center justify-content-between mg-b-5">
                          <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">Page Views</h6>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mg-b-5">
                          <h5 class="tx-normal tx-rubik lh-2 mg-b-0">13,596</h5>
                        </div>
                        <div class="progress ht-4 mg-b-0 op-5">
                          <div class="progress-bar bg-teal wd-65p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col-lg-12 mg-b-20">
                        <div class="d-flex align-items-center justify-content-between mg-b-5">
                          <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">Page Sessions</h6>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mg-b-5">
                          <h5 class="tx-normal tx-rubik lh-2 mg-b-0">13,596</h5>
                        </div>
                        <div class="progress ht-4 mg-b-0 op-5">
                          <div class="progress-bar bg-teal wd-65p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col-lg-12 mg-b-20">
                        <div class="d-flex align-items-center justify-content-between mg-b-5">
                          <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">Bounce Rate</h6>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mg-b-5">
                          <h5 class="tx-normal tx-rubik lh-2 mg-b-0">13,596</h5>
                        </div>
                        <div class="progress ht-4 mg-b-0 op-5">
                          <div class="progress-bar bg-teal wd-65p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div><!-- row -->

                  </div>
                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div>

          <div class="col-lg-12 mg-t-20">
            <div class="card">
              <div class="card-header pd-y-20 d-md-flex align-items-center justify-content-between">
                <h6 class="mg-b-0">Account & Monthly Recurring Revenue Growth</h6>
                <ul class="list-inline d-flex mg-t-20 mg-sm-t-10 mg-md-t-0 mg-b-0">
                  <li class="list-inline-item d-flex align-items-center">
                    <span class="d-block wd-10 ht-10 bg-df-1 rounded mg-r-5"></span>
                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Growth Actual</span>
                  </li>
                  <li class="list-inline-item d-flex align-items-center mg-l-5">
                    <span class="d-block wd-10 ht-10 bg-df-2 rounded mg-r-5"></span>
                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Actual</span>
                  </li>
                  <li class="list-inline-item d-flex align-items-center mg-l-5">
                    <span class="d-block wd-10 ht-10 bg-df-3 rounded mg-r-5"></span>
                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Plan</span>
                  </li>
                </ul>
              </div><!-- card-header -->
              <div class="card-body pos-relative pd-0">
                <div class="pos-absolute t-20 l-20 wd-xl-100p z-index-10">
                  <div class="row">
                    <div class="col-sm-5">
                      <h3 class="tx-normal tx-rubik tx-spacing--2 mg-b-5">$620,076</h3>
                      <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-10">MRR Growth</h6>
                      <p class="mg-b-0 tx-12 tx-color-03">Measure How Fast You’re Growing Monthly Recurring Revenue. <a href="">Learn More</a></p>
                    </div><!-- col -->
                    <div class="col-sm-5 mg-t-20 mg-sm-t-0">
                      <h3 class="tx-normal tx-rubik tx-spacing--2 mg-b-5">$1,200</h3>
                      <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-10">Avg. MRR/Customer</h6>
                      <p class="mg-b-0 tx-12 tx-color-03">The revenue generated per account on a monthly or yearly basis. <a href="">Learn More</a></p>
                    </div><!-- col -->
                  </div><!-- row -->
                </div>

                <div class="chart-one">
                  <div id="flotChart" class="flot-chart"></div>
                </div><!-- chart-one -->
              </div><!-- card-body -->
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

        var ctx1 = document.getElementById('chartBar1').getContext('2d');
        new Chart(ctx1, {
          type: 'bar',
          data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
              data: [150,110,90,115,125,160,160,140,100,110,120,120],
              backgroundColor: '#66a4fb'
            },{
              data: [180,140,120,135,155,170,180,150,140,150,130,130],
              backgroundColor: '#65e0e0'
            }]
          },
          options: {
            maintainAspectRatio: false,
            legend: {
              display: false,
                labels: {
                  display: false
                }
            },
            scales: {
              xAxes: [{
                display: false,
                barPercentage: 0.5
              }],
              yAxes: [{
                gridLines: {
                  color: '#ebeef3'
                },
                ticks: {
                  fontColor: '#8392a5',
                  fontSize: 10,
                  min: 80,
                  max: 200
                }
              }]
            }
          }
        });
        
        var plot = $.plot('#flotChart', [{
          data: df3,
          color: '#69b2f8'
        },{
          data: df1,
          color: '#d1e6fa'
        },{
          data: df2,
          color: '#d1e6fa',
          lines: {
            fill: false,
            lineWidth: 1.5
          }
        }], {
          series: {
            stack: 0,
            shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 0,
              fill: 1
            }
          },
          grid: {
            borderWidth: 0,
            aboveData: true
          },
          yaxis: {
            show: false,
            min: 0,
            max: 350
          },
          xaxis: {
            show: true,
            ticks: [[0,''],[8,'Jan'],[20,'Feb'],[32,'Mar'],[44,'Apr'],[56,'May'],[68,'Jun'],[80,'Jul'],[92,'Aug'],[104,'Sep'],[116,'Oct'],[128,'Nov'],[140,'Dec']],
            color: 'rgba(255,255,255,.2)'
          }
        });

      })
    </script>

  </body>
</html>
