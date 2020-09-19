<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.filemgr.css">

  </head>
  <body class="app-filemgr">

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>
    
    <!-- CONTENT -->
      <!-- Inner Menu -->
      <?php $this->load->view('pengajar/_inner_menu') ?>

                <!-- Content -->
                <div class="media d-block d-lg-flex">

                  <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">
                    <div class="card mg-b-20 mg-lg-b-25">
                      <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                        <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-b-0"><?=$title?></h6>
                        <nav class="nav nav-icon-only">
                          <a href="" class="nav-link"><i data-feather="thumbs-up"></i> Like</a>
                        </nav>
                      </div>
                      <div class="card-body pd-20 pd-lg-25 bd-b">
                        <div class="media align-items-center mg-b-20">
                          <div class="avatar avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                          <div class="media-body pd-l-15">
                            <h6 class="mg-b-3">Dyanne Aceron</h6>
                            <span class="d-block tx-13 tx-color-03">Cigarette Butt Collector</span>
                          </div>
                          <span class="d-none d-sm-block tx-12 tx-color-03 align-self-start">5 hours ago</span>
                        </div><!-- media -->
                        <p class="mg-b-20">Our team is expanding again. We are looking for a Product Manager and Software Engineer to drive our new aspects of our capital projects. If you're interested, please drop a comment here or simply message me. <a href="">#softwareengineer</a> <a href="">#engineering</a></p>
                      </div>
                      <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between position-relative">
                        <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-b-0">Komentar</h6>
                        <nav class="nav nav-icon-only">
                          <a class="nav-link stretched-link" data-toggle="collapse" href="#collapseContent" role="button" aria-expanded="false" aria-controls="collapseContent"><i class="fa fa-comments-o"></i></a>
                        </nav>
                      </div>
                      <div class="collapse" id="collapseContent">
                        <div class="card-body pd-20 pd-lg-25">
                          <div id="disqus_thread"></div>
                          <script>
                            var disqus_config = function () {
                              this.page.identifier = '<?='komunikasi_'.$id ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            (function() { // DON'T EDIT BELOW THIS LINE
                              var d = document, s = d.createElement('script');
                              s.src = 'https://oasse-bimbel.disqus.com/embed.js';
                              s.setAttribute('data-timestamp', +new Date());
                              (d.head || d.body).appendChild(s);
                            })();
                          </script>
                          <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
                      </div>
                    </div><!-- card -->
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
