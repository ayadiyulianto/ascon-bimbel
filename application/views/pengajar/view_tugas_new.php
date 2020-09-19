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

                <div class="card pd-20">
                  <div class="df-example demo-table">
                    <table id="myDataTable" class="table">
                      <thead>
                        <tr>
                          <th></th>
                          <th class="wd-10p">Nama</th>
                          <th class="wd-30p">Judul</th>
                          <th class="wd-20p">Modul</th>
                          <th>Diunggah</th>
                          <th>Nilai</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>

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
        $('.filemgr-content-header').children('nav').append(
          '<a href="<?=base_url()?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="Cetak"></i> <span class="d-none d-md-inline">Cetak</span></a>');

        $('#myDataTable').DataTable({
          "responsive": true,
          "bProcessing": true,
          "bServerSide": true,
          "sAjaxSource": "<?=base_url().'tugas/getData'?>",
          "order": [[ 6, "desc" ]],
          language: {
            searchPlaceholder: 'Cari...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });

    </script>

  </body>
</html>
