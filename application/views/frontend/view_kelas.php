<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>

    <style type="text/css">
      .content-fixed {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
      }
      .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 99; }
        @media (min-width: 992px) {
          .sticky {
            top: 60px; } }
    </style>

  </head>
  <body>

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>

    <!-- CONTENT -->
    <div class="content content-fixed bg-warning" style="background-image: url('<?=base_url('assets/images/general/gradient-background.jpg')?>');">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div class="mg-r-20">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style2 mg-b-10">
                <li class="breadcrumb-item"><a href="<?=base_url()?>"><span class="tx-white">Semua Kelas</span></a></li>
                <li class="breadcrumb-item"><a href="<?=base_url('welcome/kategori/'.slug($kelas->nama_kategori))?>"><span class="tx-white"><?=$kelas->nama_kategori?></span></a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Kelas</li>
              </ol>
            </nav>
            <h3 class="mg-b-5 tx-bold tx-white"><?=$kelas->nama_kelas?></h3>
            <p class="tx-medium tx-white">Pengajar : <?=implode(', ', array_column($pengajar, 'nama_user'))?></p>
            <p class="tx-14 tx-md-16 text-justify tx-white"><?=$kelas->deskripsi_singkat?></p>
            <div class="d-flex justify-content-between align-items-center tx-white">
              <span class="tx-14 tx-md-16 tx-medium">
                <i class="fa fa-users tx-danger"></i> 
                <?=$this->MyModel->get('view_siswa', 'COUNT(*) as jml', array('id_kelas'=>$kelas->id_kelas))->row()->jml?> siswa terdaftar
              </span>
              <span class="tx-14 tx-md-16 tx-medium">
                <?=rating($rating->rating, 'danger').' '.$rating->rating.' ( '.$rating->jumlah.' rating )'?>
              </span>
            </div>
            <div class="d-flex align-items-center justify-content-between mg-t-40 tx-white">
              <?php $enrolled = !empty($id_kelas_saya) && in_array($kelas->id_kelas, $id_kelas_saya);
              if($enrolled){ ?>
                <span class="tx-14 tx-md-16"><i class="fa fa-check tx-primary"></i> Kamu sudah terdaftar</span>
                <a href="<?=base_url('siswa/dashboard/pilihkelas/'.$kelas->id_kelas)?>" class="btn btn-lg btn-warning tx-medium tx-uppercase">Lanjutkan Belajar</a>
              <?php }elseif($kelas->is_buka_pendaftaran!='Y'){ ?>
                <span class="tx-14 tx-md-16 tx-color-03 tx-semibold">Tidak membuka pendafataran</span>
              <?php }else{ ?>
                <span class="tx-20 tx-bold tx-white">
                  Rp <?php if($kelas->diskon>0) echo '<strike class="tx-normal tx-14 tx-md-16">'.rupiah($kelas->harga).'</strike> ';
                  echo rupiah(((100-$kelas->diskon)/100)*$kelas->harga);
                  if($kelas->diskon>0) echo ' <span class="badge badge-danger">-'.$kelas->diskon.'%</span>';?>
                </span>
                <a href="<?=base_url('pembayaran/enroll/'.$kelas->id_kelas)?>" class="btn btn-lg btn-warning tx-20 tx-semibold tx-uppercase">DAFTAR</a>
              <?php } ?>
            </div>
          </div>
          <div class="mg-t-20 mg-lg-t-0">
            <img src="<?=base_url().'assets/images/kelas/'.$kelas->foto?>" class="img-fluid rounded" alt="<?=$kelas->nama_kelas?>">
          </div>
        </div>
        <div id="div-height-harga"></div><!-- get height for responsive banner harga -->
      </div><!-- container -->
    </div><!-- content -->

    <div class="content pd-10 d-none bg-warning" id="div-harga">
      <div class="container pd-0">
        <div class="row">
          <div class="col-12 d-flex align-items-center justify-content-between">
            <span class="tx-semibold tx-14 tx-md-18 mg-r-10"><?=$kelas->nama_kelas?></span>
            <div class="d-flex align-items-center">
              <?php $enrolled = !empty($id_kelas_saya) && in_array($kelas->id_kelas, $id_kelas_saya);
              if($enrolled){ ?>
              <a href="<?=base_url('siswa/dashboard/pilihkelas/'.$kelas->id_kelas)?>" class="btn btn-block btn-lg btn-primary tx-medium tx-uppercase">Lanjutkan Belajar</a>
              <?php }elseif($kelas->is_buka_pendaftaran!='Y'){ ?>
              <span class="tx-12 tx-md-16 tx-color-03 tx-semibold">Tidak membuka pendafataran</span>
              <?php }else{ ?>
              <span class="tx-14 tx-md-16 tx-md-20 tx-bold tx-primary mg-r-10">
                Rp <?php if($kelas->diskon>0) echo '<strike class="tx-12 tx-md-16">'.rupiah($kelas->harga).'</strike> ';
                echo rupiah(((100-$kelas->diskon)/100)*$kelas->harga);
                if($kelas->diskon>0) echo ' <span class="badge badge-danger">-'.$kelas->diskon.'%</span>';?>
              </span>
              <a href="<?=base_url('pembayaran/enroll/'.$kelas->id_kelas)?>" class="btn btn-primary tx-14 tx-md-16 tx-md-20 tx-semibold tx-uppercase">DAFTAR</a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="content content-components">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">

        <div class="card bg-gray-100">
          <div class="card-header">
            <h4 class="mg-b-0">Deskripsi</h4>
          </div>
          <div class="card-body">
            <?=$kelas->deskripsi?>
          </div>
        </div>

        <div class="card mg-t-40 bg-gray-100">
          <div class="card-header">
            <h4 class="mg-b-0">Pengajar</h4>
          </div>
          <div class="card-body">
            <div class="card-deck">
            <?php foreach($pengajar as $pnj){ ?>
              <div class="card card-body">
                <div class="media pd-10">
                  <div class="avatar avatar-md">
                    <img src="<?=avatar($pnj['foto'])?>" class="rounded-circle">
                  </div>
                  <div class="media-body pd-l-25">
                    <h5 class="mg-b-5"><?=$pnj['nama_user']?></h5>
                    <p class="mg-b-5 tx-medium tx-gray-700"><?=$pnj['pekerjaan']?></p>
                  </div>
                </div>
                <p class="mg-b-0 text-justify"><?=$pnj['bio']?></p>
              </div>
            <?php } ?>
            </div>
          </div>
        </div>

        <div class="card mg-t-40 bg-gray-100">
          <div class="card-header">
            <h4 class="mg-b-0">Modul Belajar</h4>
          </div>
          <div class="card-body">
            <div class="accordion accordion-style1">
              <?php foreach($modul->result() as $row){ ?>
              <h6 class="accordion-title"><?=$row->nama_modul?></h6>
              <div class="accordion-body">
                <div class="row">
                  <div class="col-md-6">
                    <p class="text-justify"><?=$row->deskripsi_singkat?></p>
                    <p class="text-justify"> <strong>Modul ini terdiri dari : </strong>
                      <?php $summary = $this->MyModel->get('modul_konten', 'count(*) as count, sum(durasi_belajar) as durasi_belajar, jenis', array('id_modul'=>$row->id_modul, 'status'=>'Y'), null, null, null, 'jenis')->result_array();
                        for($i=0; $i<count($summary); $i++){
                          $terdiri[$i] = $summary[$i]['count'].' '.$summary[$i]['jenis'];
                          if($summary[$i]['jenis']=='Video'){ $terdiri[$i] .= ' (&plusmn; '.$summary[$i]['durasi_belajar'].' menit)'; }
                        }
                        echo implode(', ', $terdiri);
                       ?>
                    </p>
                  </div>
                  <div class="col-md-6">
                    <ul class="list-group">
                    <?php
                    $konten = $this->MyModel->get('modul_konten', 'judul_konten, jenis, durasi_belajar', array('id_modul'=>$row->id_modul, 'status'=>'Y'), 'no_urut asc');
                    foreach($konten->result() as $baris){
                      if($baris->jenis=='Text'){ $icon='fa-file-text-o'; }
                      elseif($baris->jenis=='Video'){ $icon='fa-play-circle'; }
                      elseif($baris->jenis=='Latihan'){ $icon='fa-file-excel-o'; }
                      elseif($baris->jenis=='Tugas'){ $icon='fa-briefcase'; } ?>
                      <li class="list-group-item">
                        <i class="fa <?=$icon?> tx-primary mg-r-20"></i><span class="mg-r-20"><?=$baris->jenis.' : '.$baris->judul_konten?></span> <span class="tx-gray-500">(<?=$baris->durasi_belajar?> menit)</span>
                      </li>
                    <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <div class="card mg-t-40 bg-gray-100">
          <div class="card-header">
            <h4 class="mg-b-0">Ulasan Siswa</h4>
          </div>
          <div class="card-body bd-b">
            <div class="d-md-flex">
              <div class="d-flex wd-md-50p">
                <div>
                  <div class="media">
                    <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-danger tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-4">
                      <i data-feather="star"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Rating</h6>
                      <h3 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?=$rating->rating?></h3>
                    </div>
                  </div>
                  <div class="media mg-t-20">
                    <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-teal tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-6">
                      <i data-feather="users"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">Ulasan</h6>
                      <h3 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0"><?=$rating->jumlah?></h3>
                    </div>
                  </div>
                </div>
                <div class="mg-l-40 wd-100p">
                  <?php foreach($review->result() as $rtg){
                    $percentage = round(($rtg->jumlah/$rating->jumlah)*100); ?>
                  <div class="list-group list-group-flush tx-13">
                    <div class="list-group-item pd-y-5 pd-x-20 d-flex align-items-center">
                      <strong class="tx-rubik"><?=$rtg->rating?></strong>
                      <div class="tx-14 tx-md-16 mg-l-10"><?=rating($rtg->rating)?></div>
                      <div class="progress ht-10 flex-grow-1 mg-l-10">
                        <div class="progress-bar bg-orange" style="width: <?=$percentage?>%" role="progressbar" aria-valuenow="<?=$percentage?>" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="mg-l-10 tx-rubik tx-color-02"><?=$rtg->jumlah?></div>
                      <div class="mg-l-10 tx-rubik tx-gray-500"><?=$percentage?> %</div>
                    </div>
                  </div><!-- list-group -->
                  <?php } ?>
                </div>
              </div>
              <div class="wd-md-50p mg-md-l-40 mg-md-t-0 mg-t-40">
                <?php if(!empty(userdata('id_user'))) { ?>
                  <form method="post">
                    <div class="form-group">
                      <div class="d-flex justify-content-between">
                        <label class="tx-bold tx-20">Ulasan Kamu</label><a href="#post" id="post-review" class="tx-semibold">POST</a>
                      </div>
                      <input type="hidden" id="id_review" name="id_review" value="<?=!empty($rating_saya)?$rating_saya->id_review:''?>">
                      <input type="number" id="rating" value="<?=!empty($rating_saya)?$rating_saya->rating:''?>" name="rating" class="form-control">
                    </div>
                    <div class="form-group">
                      <textarea name="review" id="review" rows="3" class="form-control" placeholder="Beri ulasan kamu ..."><?=!empty($rating_saya)?$rating_saya->review:''?></textarea>
                    </div>
                  </form>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="card-body pd-20 container-fluid">
            <div class="card-columns" id="review-list"></div>
            <!-- list review -->
          </div>
          <div class="card-footer bg-transparent pd-y-15 pd-x-20" id="review-footer">
            <nav class="nav nav-with-icon tx-13">
              <a href="javascript:;" class="nav-link" id="show-more">
                Tampilkan ulasan lain (10)
                <i data-feather="chevron-down" class="mg-l-2 mg-r-0 mg-t-2"></i>
              </a>
            </nav>
          </div>
        </div>

        <!-- KELAS REKOMENDASI -->
        <div class="row mg-t-40">
          <div class="col-12 mg-b-10">
            <h4 class="tx-uppercase"><i data-feather="thumbs-up"></i> &nbsp Kelas Rekomendasi</h4>
          </div>
        </div>
        <div class="card bg-gray-100">
          <div class="card-body">
            <div class="row flex-row flex-nowrap" style="overflow-x: auto;">
              <?php foreach($kelas_populer->result() as $kls){
                $nested['kls'] = $kls;
                $this->load->view('frontend/view_card_kelas', $nested);
              } ?>
            </div><!-- row -->
          </div>
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

        window.onscroll = function() {stickyFunction()};
        var divharga = $('#div-harga');
        var offsetTop = $('#div-height-harga').offset().top;
        function stickyFunction() {
          if (window.pageYOffset > offsetTop) {
            divharga.addClass("sticky");
            divharga.removeClass("d-none");
          } else {
            divharga.removeClass("sticky");
            divharga.addClass("d-none");
          }
        }

        // REVIEW
        <?php if(!empty(userdata('id_user'))) { ?>
        $('#post-review').click(function(e){
          e.preventDefault();
          var id_review = $('#id_review').val();
          var rating = $('#rating').val();
          var review = $('#review').val();
          $.ajax({
            url: '<?=base_url('welcome/postReview')?>',
            type: 'POST',
            data: {id_kelas:'<?=$kelas->id_kelas?>', id_review:id_review, rating:rating, review:review},
            success: function (result) {
              swal('Terima kasih telah memberikan ulasan!', result, "success");
            },
            error: function (data){
              swal('Oops!', "Terjadi kesalahan saat mengambil data", "error");
              console.log(data)
            }
          });
        })
        <?php } ?>

        var offset = 0;
        getReview();

        function getReview(){
          $.ajax({
            url: '<?=base_url('welcome/getReview')?>',
            type: 'POST',
            data: {id_kelas:'<?=$kelas->id_kelas?>', offset:offset},
            success: function (result) {
              if(result=='' && offset==0) $('#review-list').append('<div class="pd-20">Tidak ada review saat ini</div>');
              $('#review-list').append(result);
              if(result=='') $('#review-footer').addClass('d-none');
              offset+=10;
            },
            error: function (data){
              swal('Oops!', "Terjadi kesalahan saat mengambil data", "error");
              console.log(data)
            }
          });
        }

        // button show more
        $('#show-more').click(function(e) {
          e.preventDefault();
          getReview();
        });

      })
    </script>

  </body>
</html>
