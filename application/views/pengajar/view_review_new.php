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

              <div class="card mg-b-20">
                <div class="card-body pd-y-30">
                  <div class="d-flex">
                    <div>
                      <div class="media">
                        <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-danger tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-4">
                          <i data-feather="star"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Rating</h6>
                          <h3 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?=$rating->rating?></h3>
                        </div>
                      </div>
                      <div class="media mg-t-20">
                        <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-teal tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-6">
                          <i data-feather="users"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">Ulasan</h6>
                          <h3 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?=$rating->jumlah?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="mg-l-40 wd-100p wd-md-50p">
                      <?php foreach($review->result() as $rtg){
                        $percentage = ($rtg->jumlah/$rating->jumlah)*100; ?>
                      <div class="list-group list-group-flush tx-13">
                        <div class="list-group-item pd-y-5 pd-x-20 d-flex align-items-center">
                          <strong class="tx-rubik"><?=$rtg->rating?></strong>
                          <div class="tx-16 mg-l-10"><?=rating($rtg->rating)?></div>
                          <div class="progress ht-10 flex-grow-1 mg-l-10">
                            <div class="progress-bar bg-orange" style="width: <?=$percentage?>%" role="progressbar" aria-valuenow="<?=$percentage?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="mg-l-10 tx-rubik tx-color-02"><?=$rtg->jumlah?></div>
                          <div class="mg-l-10 tx-rubik tx-gray-500"><?=$percentage?> %</div>
                        </div>
                      </div><!-- list-group -->
                      <?php } ?>
                    </div>
                  </div>
                </div><!-- card-body -->
              </div> <!-- card -->

              <div class="card mg-b-20 mg-lg-b-25">
                <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                  <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-b-0"><?=$title?> Terbaru</h6>
                </div>
                <div class="card-body pd-20 container-fluid">
                  <div class="card-columns" id="review-list"></div>
                  <!-- list review -->
                </div>
                <div class="card-footer bg-transparent pd-y-15 pd-x-20" id="review-footer">
                  <nav class="nav nav-with-icon tx-13">
                    <a href="javascript:;" class="nav-link" id="show-more">
                      Tampilkan ulasan lain (10)
                      <i data-feather="chevron-down" class="mg-l-2 mg-r-0 mg-t-2"></i>
                    </a>
                  </nav>
                </div>
              </div><!-- card -->

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

        // add save button on top
        // $('.filemgr-content-header').children('nav').append(
        //   '<a href="<?=base_url()?>" class="btn btn-outline-primary"><i class="fa fa-print"></i> Cetak</a>');

        var offset = 0;
        getReview();

        // get review
        function getReview(){
          $.ajax({
            url: '<?=base_url('welcome/getReview')?>',
            type: 'POST',
            data: {id_kelas:'<?=userdata('id_kelas')?>', offset:(offset)},
            success: function (result) {
              if(result=='' && offset==0) $('#review-list').append('<div class="pd-20">Tidak ada review saat ini</div>');
              $('#review-list').append(result);
              if(result=='') $('#review-footer').addClass('d-none');
              offset+=10;
            },
            error: function (data){
              swal('Oops!', "Terjadi kesalahan saat mengambil data", "error");
              console.log(data)
            }
          });
        }

        // button show more
        $('#show-more').click(function(e) {
          e.preventDefault();
          getReview();
        });
      });

    </script>

  </body>
</html>
