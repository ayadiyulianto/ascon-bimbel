<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>

  </head>
  <body>

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>
    
    <!-- CONTENT -->
    <div class="content content-fixed">
      <div class="container pd-x-0 tx-13">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Penjualan</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
              </ol>
            </nav>
            <h3 class="mg-b-20 tx-spacing--1"><?=$title?></h3>
          </div>
          <a href="<?=base_url('admin/penjualan/cetak/'.$status)?>" class="btn btn-sm pd-x-15 btn-outline-primary btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Cetak</a>
        </div>

        <div class="card pd-20">
          <div class="df-example demo-table">
            <table id="myDataTable" class="table">
              <thead>
                <tr>
                  <th class="wd-5p"></th>
                  <th>No Invoice</th>
                  <th>Nama</th>
                  <th>ID Kelas</th>
                  <th>Status</th>
                  <th>Total Bayar</th>
                  <th>Jenis Bayar</th>
                  <th>Tujuan Bayar</th>
                  <th>Mendaftar</th>
                  <th class="wd-12p">Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>

      </div><!-- container -->
    </div><!-- content-body -->

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>

    <!-- another js -->

    <script>
      $(function(){
        'use strict'

        $('#myDataTable').DataTable({
          "responsive": true,
          "bProcessing": true,
          "bServerSide": true,
          "sAjaxSource": "<?=base_url('admin/penjualan/getData/'.$status)?>",
          "order": [[ 4, "asc" ]],
          language: {
            searchPlaceholder: 'Cari...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      })
    </script>

  </body>
</html>
