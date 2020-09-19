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
                <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kelas</li>
              </ol>
            </nav>
            <h3 class="mg-b-20 tx-spacing--1">Semua Kelas</h3>
          </div>
          <a href="<?=base_url()?>admin/kelas/buat" class="btn btn-sm pd-x-15 btn-outline-primary btn-uppercase mg-l-5"><i data-feather="plus" class="wd-10 mg-r-5"></i> Kelas Baru</a>
        </div>
        <div class="row">
          <div class="col-lg-8 col-xl-9">
            <div class="card pd-20">
              <div class="df-example demo-table">
                <table id="myDataTable" class="table">
                  <thead>
                    <tr>
                      <th class="wd-5p"></th>
                      <th>Nama Kelas</th>
                      <th>Kategori</th>
                      <th>Siswa</th>
                      <th>Status</th>
                      <th>Diperbarui</th>
                      <th class="wd-12p">Aksi</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div><!-- col -->

          <div class="col-sm-7 col-md-5 col-lg-4 col-xl-3 mg-t-40 mg-lg-t-0">

            <div class="d-flex align-items-center justify-content-between mg-b-20">
              <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-b-0">Kelas Terbaru</h6>
            </div>
            <ul class="list-unstyled media-list mg-b-15">
              <?php foreach($kelasTerbaru->result() as $row){ ?>
              <li class="media align-items-center mg-b-10">
                <div class="wd-50">
                  <img src="<?=base_url().'assets/images/kelas/'.$row->foto?>" class="wd-50">
                </div>
                <div class="media-body pd-l-15">
                  <h6 class="mg-b-2"><a href="<?=base_url('admin/kelas/detail/'.$row->id_kelas)?>" class="link-01"><?=$row->nama_kelas?></a></h6>
                  <span class="tx-13 tx-color-03"><?=tgl($row->waktu_post)?></span>
                </div>
              </li>
              <?php } ?>
            </ul>

            <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-t-50 mg-b-15">Berdasarkan Kategori</h6>

            <nav class="nav nav-classic tx-13">
              <?php foreach($kategori->result() as $row){ ?>
              <a href="<?=base_url('admin/kelas?kategori='.$row->id_kategori)?>" class="nav-link"><span><?=$row->nama_kategori?></span> <span class="badge badge-secondary tx-white"><?=$row->jml_kelas?></span></a>
              <?php } ?>
            </nav>
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
          "sAjaxSource": "<?=base_url('admin/kelas/getData/'.$this->input->get('kategori'))?>",
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
