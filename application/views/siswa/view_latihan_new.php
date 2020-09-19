<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.learning.css">

  </head>
  <body class="app-contact">

    <!-- CONTENT -->
    <div class="contact-wrapper" style="top: 0">
      <div class="contact-sidebar">
        <div class="contact-sidebar-header">
          <button id="btn-exit" class="btn btn-sm btn-outline-danger"><i data-feather="arrow-left"></i> KELUAR</button>
        </div>
        <div class="contact-sidebar-body">
          <div class="tab-content">
            <div id="tabContact" class="tab-pane fade active show">
              <div class="pd-y-20 pd-x-10 contact-list">
                <h3>LATIHAN</h3>
                <div class="d-flex justify-content-between mg-b-20">
                  <h6>Jumlah Soal : <?=$konten->latihan_jumlah_soal?></h6>
                  <?=($konten->latihan_has_timer=='Y') ? '<h6>Durasi : '.$konten->durasi_belajar.' menit</h6>':'' ?>
                </div>
                <label>Nomor Soal</label>
                <div class="row mg-b-20 mg-x-0">
                  <?php $no=1; foreach($listnomorsoal as $row){ ?>
                  <a href="<?=base_url('siswa/kelas/soal/'.$no)?>" class="btn btn-icon btn-<?=($row['status']=='belum')?'white':'primary'?> mg-3"><?=$no++?></a>
                  <?php } ?>
                </div>
                <button id="btn-submit" type="button" class="btn btn-outline-primary btn-block">SUBMIT</button>
              </div>
            </div>
          </div>
        </div><!-- contact-sidebar-body -->
      </div><!-- contact-sidebar -->

      <div class="contact-content" id="refresh-width">
        <div class="contact-content-header">
          <a href="javascript:;" id="contactContentHide2" class="btn btn-sm btn-white"><i data-feather="menu"></i></a>
          <label class="mg-x-20 mg-b-0 tx-semibold tx-sm-16 tx-md-20"><?=$konten->judul_konten?></label>
          <label class="mg-l-auto mg-b-0 tx-semibold tx-sm-16 tx-md-20" id="timer"></label>
        </div><!-- contact-content-header -->

        <div class="contact-content-body">
          <div class="pd-20 pd-xl-25 mg-x-auto" style="max-width: 992px;">
            <div class="d-flex align-items-center justify-content-between mg-b-25">
              <h5 class="mg-b-0">Soal <?=$nomor?></h5>
              <div class="mg-l-auto">
                <?php $next=$nomor; if(($nomor-1)>0){ ?>
                <a href="<?=base_url('siswa/kelas/soal/'.($nomor-1))?>" class="btn btn-sm btn-white mg-r-10"><i data-feather="arrow-left"></i><span class="d-none d-sm-inline mg-l-5"> Sebelumnya</span></a>
                <?php } if(($nomor+1)<=count($listnomorsoal)){ $next=$nomor+1; ?>
                <a href="<?=base_url('siswa/kelas/soal/'.($nomor+1))?>" class="btn btn-sm btn-white"><span class="d-none d-sm-inline mg-l-5">Selanjutnya </span><i data-feather="arrow-right"></i></a>
                <?php } ?>
              </div>
            </div>

            <form method="post">
              <input type="hidden" name="id" value="<?=$soal->id?>">
              <input type="hidden" name="next" value="<?=$next?>">
              <div class="card">
                <div class="card-body pd-20 mg-b-0"><?=$soal->soal?></div>
                <?php $answer=json_decode($soal->jawaban, TRUE); foreach($jawaban as $baris){ ?>
                <div class="card-body pd-x-20 pd-y-10 mg-b-0 bd-t">
                  <div class="custom-control custom-<?=$soal->jenis_soal?> mg-b-0">
                    <input type="<?=$soal->jenis_soal?>" name="jawaban[]" value="<?=$baris['id_jawaban']?>" class="custom-control-input" id="<?=$baris['id_jawaban']?>" <?=(!empty($answer)&&in_array($baris['id_jawaban'], $answer))?'checked':''?>>
                    <label class="custom-control-label" for="<?=$baris['id_jawaban']?>"><?=$baris['jawaban_text']?></label>
                  </div>
                </div>
                <?php } ?>
              </div>
              <button type="submit" class="btn btn-primary mg-t-25">Simpan Jawaban</button>
            </form>

          </div>

        </div><!-- contact-content-body -->

      </div><!-- contact-content -->

    </div><!-- contact-wrapper -->

    <?php $this->load->view('template/_foot') ?>

    <script src="<?=base_url()?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>lib/feather-icons/feather.min.js"></script>
    <script src="<?=base_url()?>lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?=base_url()?>assets/js/dashforge.js"></script>

    <!-- another js -->
    <script src="<?=base_url()?>assets/js/dashforge.learning.js"></script>

    <script>

      $(function(){
        'use strict'

        $('#btn-exit').click(function(e){
          e.preventDefault();
          var title = 'Yakin Ingin Keluar?';
          var text = "Aktivitas anda di halaman saat ini akan hilang";
          var url = "<?=base_url('siswa/kelas/belajar/'.userdata('id_konten'))?>";
          swalRedirect(title, text, url);
        });

        $('#btn-submit').click(function(e){
          e.preventDefault();
          var title = "Yakin untuk Menyelesaikan Latihan?";
          var text = "Jawaban akan disimpan untuk dinilai dan sesi latihan berakhir";
          var url = "<?=base_url('siswa/kelas/sesiselesai')?>";
          swalRedirect(title, text, url);
        });

        <?php if($konten->latihan_has_timer=='Y'){ ?>
        var countDownDate = new Date('<?=date("Y-m-d H:i:s",strtotime($waktu_mulai." +".$konten->durasi_belajar." minutes"))?>').getTime();
        var x = setInterval(function() {
          var now = new Date().getTime();
          var distance = countDownDate - now;
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var m = ("0"+minutes).slice(-2);
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          var s = ("0"+seconds).slice(-2);
          $('#timer').html("<i class='fa fa-clock-o d-none d-sm-inline mg-r-20'></i>"+m+" : "+s);
          if (distance < 0) {
            clearInterval(x);
            window.location.replace("<?=base_url('siswa/kelas/sesiselesai')?>");
          }
        }, 1000);
        <?php } ?>

      })
    </script>

  </body>
</html>
