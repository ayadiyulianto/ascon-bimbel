<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.profile.css">
    <style>
      .ui-datepicker{
        z-index: 9999999 !important;
      }
    </style>
  </head>
  <body>

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>

    <!-- CONTENT -->
    <div class="content content-fixed content-profile">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="media d-block d-lg-flex">

          <div class="profile-sidebar pd-lg-r-25">
            <div class="row">
              <div class="col-sm-3 col-md-2 col-lg">
                <div class="avatar avatar-xxl avatar-online"><img src="<?=avatar($user->foto)?>" class="rounded-circle" alt=""></div>
              </div><!-- col -->
              <div class="col-sm-8 col-md-7 col-lg mg-t-20 mg-sm-t-0 mg-lg-t-25">
                <h5 class="mg-b-2 tx-spacing--1"><?=$user->nama_user?></h5>
                <p class="tx-color-03 mg-b-25"><?=$user->email?></p>
                <div class="d-flex mg-b-25">
                  <a href="#modal_profile" class="btn btn-xs btn-outline-primary flex-fill mg-r-10" data-toggle="modal">Ubah Profile</a>
                  <a href="#modal_password" class="btn btn-xs btn-outline-danger flex-fill" data-toggle="modal">Ubah Password</a>
                </div>
                <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1">Bio</label>
                <p class="tx-13 tx-color-02 mg-b-10"><i class="fa fa-calendar"></i> &nbsp;<?=$user->jk=='L'?'Laki-Laki':'Perempuan'?>, <?=$user->tgl_lahir?></p>
                <p class="tx-13 tx-color-02 mg-b-10"><i class="fa fa-briefcase"></i> &nbsp;<?=$user->pekerjaan?></p>
                <p class="tx-13 tx-color-02"><?=$user->bio?></p>
              </div><!-- col -->
              <div class="col-sm-6 col-md-5 col-lg mg-t-20">
                <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">Kontak Informasi</label>
                <ul class="list-unstyled profile-info-list">
                  <li><i data-feather="map-pin"></i> <?=$user->alamat?></li>
                  <li><i data-feather="phone"></i> <?=$user->no_hp?></li>
                  <li><i data-feather="mail"></i> <?=$user->email?></li>
                </ul>
              </div><!-- col -->
              <div class="col-sm-6 col-md-5 col-lg mg-t-20">
                <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">Badge</label>
                <ul class="list-inline list-inline-skills">
                  <li class="list-inline-item"><button class="btn btn-icon btn-xs btn-white">Pembelajar</button></li>
                  <li class="list-inline-item"><button class="btn btn-icon btn-xs btn-success">Siswa Teladan</button></li>
                  <li class="list-inline-item"><button class="btn btn-icon btn-xs btn-primary">Rajin</button></li>
                  <li class="list-inline-item"><button class="btn btn-icon btn-xs btn-warning">Guru Terbaik</button></li>
                </ul>
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- profile-sidebar -->

          <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">

            <?php if($riwayat_belajar->num_rows()>0){ ?>
            <div class="card mg-b-20 mg-lg-b-25">
              <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                <h6 class="tx-uppercase tx-semibold mg-b-0">Riwayat Belajar</h6>
              </div><!-- card-header -->
              <div class="card-body pd-x-25 pd-y-15">
                <?php foreach($riwayat_belajar->result() as $rwb){ ?>
                <div class="media mg-y-10">
                  <div class="wd-65">
                    <img src="<?=base_url().'assets/images/kelas/'.$rwb->foto?>" class="wd-65">
                  </div>
                  <div class="media-body pd-l-25">
                    <h5 class="mg-b-5"><?=$rwb->nama_kelas?></h5>
                    <p class="mg-b-3"><?=$rwb->nama_kategori?></p>
                    <span class="d-block tx-13 tx-color-03">Mulai pada <?=tgl_indo($rwb->waktu_post, 'j F Y')?></span>
                  </div>
                </div><!-- media -->
                <?php } ?>
              </div>
            </div><!-- card -->
            <?php } ?>

            <?php if($riwayat_mengajar->num_rows()>0){ ?>
            <div class="card mg-b-20 mg-lg-b-25">
              <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                <h6 class="tx-uppercase tx-semibold mg-b-0">Riwayat Mengajar</h6>
              </div><!-- card-header -->
              <div class="card-body pd-x-25 pd-y-15">
                <?php foreach($riwayat_mengajar->result() as $rwm){ ?>
                <div class="media mg-y-10">
                  <div class="wd-65">
                    <img src="<?=base_url().'assets/images/kelas/'.$rwm->foto?>" class="wd-65">
                  </div>
                  <div class="media-body pd-l-25">
                    <h5 class="mg-b-5"><?=$rwm->nama_kelas?></h5>
                    <p class="mg-b-3"><?=$rwm->nama_kategori?></p>
                    <span class="d-block tx-13 tx-color-03">Mulai pada <?=tgl_indo($rwm->waktu_post, 'j F Y')?></span>
                  </div>
                </div><!-- media -->
                <?php } ?>
              </div>
            </div><!-- card -->
            <?php } ?>

            <div class="card mg-b-20 mg-lg-b-25">
              <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                <h6 class="tx-uppercase tx-semibold mg-b-0">Aktivitas Terakhir</h6>
                <!-- <nav class="nav nav-icon-only">
                  <a href="" class="nav-link"><i data-feather="more-horizontal"></i></a>
                </nav> -->
              </div><!-- card-header -->
              <div class="card-body pd-20 pd-lg-25">
                <div class="timeline-group tx-13" id="timeline-group">
                </div><!-- timeline-group -->
              </div>
              <div class="card-footer bg-transparent pd-y-15 pd-x-20" id="timeline-footer">
                <nav class="nav nav-with-icon tx-13">
                  <a href="javascript:;" class="nav-link" id="show-more">
                    Lihat aktivitas lain <i data-feather="chevron-down" class="mg-l-2 mg-r-0 mg-t-2"></i>
                  </a>
                </nav>
              </div><!-- card-footer -->
            </div><!-- card -->

          </div><!-- media-body -->

        </div><!-- media -->
      </div><!-- container -->
    </div><!-- content -->

    <div class="modal fade" id="modal_profile" tabindex="-1" role="dialog" aria-labelledby="labelprofile" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header bg-primary">
            <h5 class="modal-title tx-white" id="labelprofile">Ubah Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="tx-white">&times;</span>
            </button>
          </div>
          <form method="post">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-sm-6">
                <label>Nama</label>
                <input type="text" name="nama_user" class="form-control" value="<?=$user->nama_user?>" placeholder="Ketik nama kamu">
              </div>
              <div class="form-group col-sm-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?=$user->email?>" placeholder="Ketik email kamu">
              </div>
              <div class="form-group col-sm-6">
                <label>Tanggal Lahir</label>
                <input type="text" name="tgl_lahir" id="datepicker" class="form-control" value="<?=$user->tgl_lahir?>" placeholder="yyyy-mm-dd">
              </div>
              <div class="form-group col-sm-6">
                <label>Jenis Kelamin</label>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="custom-control custom-radio">
                      <input type="radio" name="jk" id="radioL" value="L" class="custom-control-input" <?=$user->jk=='L'?'checked':''?>>
                      <label for="radioL" class="custom-control-label">Laki-Laki</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="custom-control custom-radio">
                      <input type="radio" name="jk" id="radioP" value="P" class="custom-control-input" <?=$user->jk=='P'?'checked':''?>>
                      <label for="radioP" class="custom-control-label">Perempuan</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-6">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" value="<?=$user->pekerjaan?>" placeholder="Ketik pekerjaan kamu">
              </div>
              <div class="form-group col-sm-6">
                <label>Nomor Ponsel</label>
                <input type="number" name="no_hp" class="form-control" value="<?=$user->no_hp?>" placeholder="Tulis nomor ponsel kamu">
              </div>
              <div class="form-group col-sm-6">
                <label>Bio</label>
                <textarea name="bio" class="form-control" placeholder="Tulis informasi tentang dirimu (maks 1000 karakter)"><?=$user->bio?></textarea>
              </div>
              <div class="form-group col-sm-6">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"><?=$user->alamat?></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-xs btn-secondary tx-13" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-xs btn-primary tx-13">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal_password" tabindex="-1" role="dialog" aria-labelledby="labelpassword" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header bg-danger">
            <h5 class="modal-title tx-white" id="labelpassword">Ubah Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="tx-white">&times;</span>
            </button>
          </div>
          <form method="post" action="<?=base_url('profile/ubahpassword')?>">
          <div class="modal-body">
            <div class="form-group">
              <label>Password Baru *</label>
              <input type="hidden" name="id_user_ubah" value="<?=encrypt($user->id_user)?>">
              <input type="hidden" name="redirect" value="<?=uri_string()?>">
              <input type="password" name="password_baru" id="password_baru" class="form-control" value="" placeholder="Ketik password baru" required="">
            </div>
            <div class="form-group">
              <label>Ulangi Password Baru *</label>
              <input type="password" name="ulangi_password_baru" id="ulangi_password_baru"  class="form-control" value="" placeholder="Ketik ulang password baru" required="">
            </div>
            <div class="form-group">
              <label>Konfirmasi Password Kamu Saat Ini *</label>
              <input type="password" name="password_saat_ini" class="form-control" value="" placeholder="Ketik password saat ini" required="">
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
    <?php $this->load->view('template/_footer') ?>
    <?php $this->load->view('template/_foot') ?>

    <!-- another js -->

    <script>
      $(function(){
        'use strict'

        $('#datepicker').datepicker({
          dateFormat: 'yy-mm-dd',
          showOtherMonths: true,
          selectOtherMonths: true,
          changeMonth: true,
          changeYear: true
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
            password_baru.addClass('is-invalid');
            ulangi_password_baru.addClass('is-invalid');
            submit_btn.prop('disabled', true);
          }else{
            password_baru.removeClass('is-invalid');
            password_baru.addClass('is-valid');
            ulangi_password_baru.removeClass('is-invalid');
            ulangi_password_baru.addClass('is-valid');
            submit_btn.prop('disabled', false);
          }
        };

        // AKTIVITAS

        var id_user = '<?=userdata('id_user')?>';
        var offset = 0;
        getAktivitas();

        // ajax get diskusi
        function getAktivitas(){
          $.ajax({
            url: '<?=base_url('profile/getAktivitas')?>',
            type: 'POST',
            data: {id_user:id_user, offset:offset},
            success: function (result) {
              if(result=='' && offset==0) $('#timeline-group').append('Tidak ada aktivitas saat ini');
              $('#timeline-group').append(result);
              if(result=='') $('#timeline-footer').addClass('d-none');
              offset+=10;
            },
            error: function (data){
              swal('Oops', 'Terjadi Kesalahan saat mengambil data diskusi', 'error');
            }
          });
        }

        // button show more
        $('#show-more').click(function(e) {
          e.preventDefault();
          getAktivitas();
        });

      })
    </script>

  </body>
</html>
