<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.auth.css">

  </head>
  <body>

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>
    
    <!-- CONTENT -->
    <div class="content content-fixed content-auth">
      <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p">
          <div class="sign-wrapper mg-lg-r-50 mg-xl-r-60">
            <div class="pd-t-20 wd-100p">
              <h4 class="tx-color-01 mg-b-5">Buat Akun Baru</h4>
              <p class="tx-color-03 tx-16 mg-b-40">Daftar dan gabung berbagai kelas bimbel online.</p>

              <span class="tx-danger"><?=validation_errors()?></span>
              <form method="post">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama_user" class="form-control" value="<?=input('nama_user','')?>" placeholder="Ketik nama kamu">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?=input('email','')?>" placeholder="Ketik email kamu">
                <label id="email-warning" class="mg-t-10 tx-danger d-none">Email sudah terdaftar</label>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ketik password kamu">
              </div>
              <div class="form-group">
                <label>Ulangi Password</label>
                <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Ketik password kamu">
              </div>
              <div class="form-group tx-12">
                Dengan klik <strong>Buat Akun</strong> berikut, kamu setuju dengan Ketentuan Layanan dan Pernyataan Privasi Kami.
              </div><!-- form-group -->

              <button type="submit" id="submit-btn" class="btn btn-brand-02 btn-block" disabled="">Buat Akun</button>
              </form>
              <div class="divider-text">atau</div>
              <button class="btn btn-outline-facebook btn-block">Daftar dengan Facebook</button>
              <button class="btn btn-outline-twitter btn-block">Daftar dengan Google</button>
              <div class="tx-13 mg-t-20 tx-center">Kamu sudah punya akun? <a href="<?=base_url('auth/login')?>">Login</a></div>
            </div>
          </div><!-- sign-wrapper -->
          <div class="media-body pd-y-30 pd-lg-x-50 pd-xl-x-60 align-items-center d-none d-lg-flex pos-relative">
            <div class="mx-lg-wd-500 mx-xl-wd-550">
              <img src="https://via.placeholder.com/1280x1225" class="img-fluid" alt="">
            </div>
          </div><!-- media-body -->
        </div><!-- media -->
      </div><!-- container -->
    </div><!-- content -->

    <!-- footer -->
    <?php $this->load->view('template/_footer') ?>
    <?php $this->load->view('template/_foot') ?>

    <!-- required js -->

    <script>
      $(function(){
        'use strict'

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
        
        $('#password').keyup(function(){
          validate();
        });

        $('#confirmpassword').keyup(function(){
          validate();
        });

        function validate(){
          var password_baru = $("#password");
          var ulangi_password_baru = $("#confirmpassword");
          var submit_btn = $('#submit-btn');
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
