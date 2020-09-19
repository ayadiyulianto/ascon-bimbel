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
                <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
              </ol>
            </nav>
            <h3 class="mg-b-20 tx-spacing--1">Semua Pengguna</h3>
          </div>
          <a href="#modal_new" class="btn btn-sm pd-x-15 btn-outline-primary btn-uppercase mg-l-5" data-toggle="modal"><i data-feather="plus" class="wd-10 mg-r-5"></i> Pengguna Baru</a>
        </div>
        <div class="row">
          <div class="col-lg-8 col-xl-9">
            <div class="card pd-20">
              <div class="df-example demo-table">
                <table id="myDataTable" class="table">
                  <thead>
                    <tr>
                      <th class="wd-5p"></th>
                      <th>Nama Pengguna</th>
                      <th>Role Aktif</th>
                      <th>Email</th>
                      <th>JK</th>
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
              <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-b-0">Pengguna Terbaru</h6>
            </div>
            <ul class="list-unstyled media-list mg-b-15">
              <?php foreach($userTerbaru->result() as $row){ ?>
              <li class="media align-items-center mg-b-10">
                <div class="wd-50">
                  <div class="avatar"><img src="<?=avatar($row->foto)?>" class="rounded-circle" alt=""></div>
                </div>
                <div class="media-body pd-l-15">
                  <h6 class="mg-b-2"><a href="<?=base_url('admin/user/detail/'.$row->id_user)?>" class="link-01"><?=$row->nama_user?></a></h6>
                  <span class="tx-13 tx-color-03"><?=tgl($row->waktu_post)?></span>
                </div>
              </li>
              <?php } ?>
            </ul>

            <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-t-50 mg-b-15">Berdasarkan Role Aktif</h6>

            <nav class="nav nav-classic tx-13">
              <?php foreach($role->result() as $row){ ?>
              <a href="<?=base_url('admin/user?role='.$row->role)?>" class="nav-link"><span><?=$row->role?></span> <span class="badge badge-secondary tx-white"><?=$row->jml_user?></span></a>
              <?php } ?>
            </nav>
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- content-body -->

    <div class="modal fade" id="modal_new" tabindex="-1" role="dialog" aria-labelledby="labelpassword" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header bg-primary">
            <h5 class="modal-title tx-white" id="labelpassword">Tambah Pengguna Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="tx-white">&times;</span>
            </button>
          </div>
          <form method="post" action="<?=base_url('admin/user/buat')?>">
          <div class="modal-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama_user" class="form-control" placeholder="Ketik nama pengguna" required="">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Ketik email pengguna" required="">
              <label id="email-warning" class="mg-t-10 tx-danger d-none">Email sudah terdaftar</label>
            </div>
            <div class="form-group">
              <label>Role *</label>
              <div class="row">
                <div class="col-sm-4">
                  <div class="custom-control custom-radio">
                    <input type="radio" name="role" id="radioA" value="Administrator" class="custom-control-input" required="">
                    <label for="radioA" class="custom-control-label">Administrator</label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="custom-control custom-radio">
                    <input type="radio" name="role" id="radioP" value="Pengajar" class="custom-control-input">
                    <label for="radioP" class="custom-control-label">Pengajar</label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="custom-control custom-radio">
                    <input type="radio" name="role" id="radioS" value="Siswa" class="custom-control-input">
                    <label for="radioS" class="custom-control-label">Siswa</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Password *</label>
              <input type="password" name="password_baru" id="password_baru" class="form-control" value="" placeholder="Ketik password" required="">
            </div>
            <div class="form-group">
              <label>Ulangi Password *</label>
              <input type="password" name="ulangi_password_baru" id="ulangi_password_baru"  class="form-control" value="" placeholder="Ketik ulang password" required="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-xs btn-secondary tx-13" data-dismiss="modal">Tutup</button>
            <button type="submit" id="submit-password" class="btn btn-xs btn-primary tx-13" disabled="">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>

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
          "sAjaxSource": "<?=base_url('admin/user/getData/'.$this->input->get('role'))?>",
          "order": [[ 2, "asc" ]],
          language: {
            searchPlaceholder: 'Cari...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        // EMAIL

        $('#email').change(function() {
          var email = $('#email');
          $.ajax({
            url: '<?=base_url('auth/checkEmail')?>',
            type: 'POST',
            data: {'email': email.val()},
            success: function (result) {
              if(result=='1'){
                email.removeClass('is-valid').addClass('is-invalid');
                $('#email-warning').removeClass('d-none');
              }else{
                email.removeClass('is-invalid').addClass('is-valid');
                $('#email-warning').addClass('d-none');
              }
            },
            error: function (data){
              console.log(data)
            }
          });
        });

        // PASSWORD
        
        $('#password_baru').keyup(function(){
          validate();
        });

        $('#ulangi_password_baru').keyup(function(){
          validate();
        });

        function validate(){
          var password_baru = $("#password_baru");
          var ulangi_password_baru = $("#ulangi_password_baru");
          var submit_btn = $('#submit-password');
          if(password_baru.val() != ulangi_password_baru.val()) {
            password_baru.removeClass('is-valid').addClass('is-invalid');
            ulangi_password_baru.removeClass('is-valid').addClass('is-invalid');
            submit_btn.prop('disabled', true);
          }else{
            password_baru.removeClass('is-invalid').addClass('is-valid');
            ulangi_password_baru.removeClass('is-invalid').addClass('is-valid');
            submit_btn.prop('disabled', false);
          }
        };

      })
    </script>

  </body>
</html>
