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
                <li class="breadcrumb-item"><a href="#">Support</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer Service</li>
              </ol>
            </nav>
            <h3 class="mg-b-20 tx-spacing--1">Tiket</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card pd-20">
              <div class="df-example demo-table">
                <table id="myDataTable" class="table">
                  <thead>
                    <tr>
                      <th class="wd-5p"></th>
                      <th>Kategori</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Kontak</th>
                      <th>Subjek</th>
                      <th>Diperbarui</th>
                      <th class="wd-12p">Aksi</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div><!-- col -->
        </div><!-- row -->
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
          "sAjaxSource": "<?=base_url('admin/support/csData')?>",
          "order": [[ 6, "desc" ]],
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
