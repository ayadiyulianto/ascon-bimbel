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
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
          <div class="media-body align-items-center d-none d-lg-flex">
            <div class="mx-wd-600">
              <img src="https://via.placeholder.com/1260x950" class="img-fluid" alt="">
            </div>
          </div><!-- media-body -->
          <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
            <div class="wd-100p">
              <h3 class="tx-color-01 mg-b-5">LOGIN</h3>
              <p class="tx-color-03 tx-16 mg-b-40">OASSE - BIMBEL ONLINE</p>

              <span class="tx-danger"><?=validation_errors()?></span>
              <form method="post">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="<?=input('email','')?>" placeholder="Ketik email">
                </div>
                <div class="form-group">
                  <div class="d-flex justify-content-between mg-b-5">
                    <label class="mg-b-0">Password</label>
                    <a href="<?=base_url()?>" class="tx-13">Lupa Password?</a>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Ketik password kamu">
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="rememberme" value="Y" id="customCheck" class="custom-control-input">
                  <label class="mg-l-5 custom-control-label" for="customCheck">Tetap login dalam perangkat ini</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block mg-t-10">Login</button>
              </form>
              <div class="divider-text">atau</div>
              <button class="btn btn-outline-primary btn-block">Login dengan Facebook</button>
              <button class="btn btn-outline-danger btn-block">Login dengan Google</button>
              <div class="tx-13 mg-t-20 tx-center">Belum punya akun? <a href="<?=base_url('auth/daftar')?>">Buat akun baru</a></div>
            </div>
          </div><!-- sign-wrapper -->
        </div><!-- media -->
      </div><!-- container -->
    </div><!-- content -->

    <!-- footer -->
    <?php $this->load->view('template/_footer') ?>
    <?php $this->load->view('template/_foot') ?>

    <!-- required js -->

  </body>
</html>
