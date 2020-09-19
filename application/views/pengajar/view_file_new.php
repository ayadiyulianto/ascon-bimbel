
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
                <div class="row">
                  <div class="col-md-3">
                    <div class="card card-file">
                      <div class="dropdown-file">
                        <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a href="#modalViewDetails" data-toggle="modal" class="dropdown-item details"><i data-feather="info"></i>View Details</a>
                          <a href="#modalShare" data-toggle="modal" class="dropdown-item share"><i data-feather="share"></i>Share</a>
                          <a href="" class="dropdown-item download"><i data-feather="download"></i>Download</a>
                          <a href="#" class="dropdown-item rename"><i data-feather="edit"></i>Rename</a>
                          <a href="#" class="dropdown-item delete"><i data-feather="trash"></i>Delete</a>
                        </div>
                      </div><!-- dropdown -->
                      <div class="card-file-thumb tx-danger">
                        <i class="fa fa-file-pdf-o"></i>
                      </div>
                      <!-- <div class="card-file-thumb tx-indigo">
                        <i class="fa fa-file-image"></i>
                      </div>
                      <div class="card-file-thumb tx-primary">
                        <i class="fa fa-file-word"></i>
                      </div>
                      <div class="card-file-thumb tx-orange">
                        <i class="fa fa-file-powerpoint"></i>
                      </div>
                      <div class="card-file-thumb tx-success">
                        <i class="fa fa-file-excel"></i>
                      </div>
                      <div class="card-file-thumb tx-gray-600">
                        <i class="fa fa-file-alt"></i>
                      </div>
                      <div class="card-file-thumb tx-pink">
                        <i class="fa fa-file-video"></i>
                      </div>
                      <div class="card-file-thumb tx-info">
                        <i class="fa fa-file-audio"></i>
                      </div>
                      <div class="card-file-thumb tx-orange">
                        <i class="fa fa-file-code"></i>
                      </div> -->
                      <div class="card-body">
                        <h6><a href="" class="link-02">Medical Certificate.pdf</a></h6>
                        <span>10.45kb</span>
                      </div>
                      <div class="card-footer"><span class="d-none d-sm-inline">Uploaded: </span>2 hours ago</div>
                    </div>
                  </div><!-- col -->
                </div><!-- row -->

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

        // add config button on top
        // $('.filemgr-content-header').children('nav').append('<a href="<?=base_url('kelas/pengaturan')?>" class="btn btn-outline-secondary"><i class="fa fa-cog"></i> Pengaturan</a>');

      });

    </script>

  </body>
</html>
