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
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">

        <div class="row">
          <div class="col-12">
            <div id="carouselExample4" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExample4" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExample4" data-slide-to="1"></li>
                <li data-target="#carouselExample4" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner bg-dark">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/1920x350" class="d-block w-100 op-3" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>First Slide</h5>
                      <p class="tx-14">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
                <div class="carousel-item">
                  <img src="https://via.placeholder.com/1920x350" class="d-block w-100 op-3" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Second Slide</h5>
                    <p class="tx-14">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="https://via.placeholder.com/1920x350" class="d-block w-100 op-3" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Third Slide</h5>
                    <p class="tx-14">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExample4" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i data-feather="chevron-left"></i></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExample4" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i data-feather="chevron-right"></i></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>

        <!-- KELAS POPULER -->
        <div class="row mg-t-40">
          <div class="col-12 mg-b-10">
            <h4 class="tx-uppercase"><i data-feather="thumbs-up"></i> &nbsp Kelas Populer</h4>
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

        <!-- KELAS TERBARU -->
        <div class="row mg-t-40">
          <div class="col-12 mg-b-10">
            <h4 class="tx-uppercase"><i data-feather="zap"></i> &nbsp Kelas Terbaru</h4>
          </div>
        </div>
        <div class="card bg-gray-100">
          <div class="card-body">
            <div class="row flex-row flex-nowrap" style="overflow-x: auto;">
              <?php foreach($kelas_terbaru->result() as $kls){
                $nested['kls'] = $kls;
                $this->load->view('frontend/view_card_kelas', $nested);
              } ?>
            </div><!-- row -->
          </div>
        </div>

        <!-- BANNER -->

        <div class="row mg-t-40">
          <div class="col-12">
            <img src="https://via.placeholder.com/1920x240" class="img-fluid" alt="...">
          </div>
        </div>

        <!-- SEMUA KELAS BY KATEGORI -->

        <?php foreach($semuakelas as $smk){
        if($smk['jml_kelas']>0){ ?>

        <div class="row mg-t-40">
          <div class="col-12 mg-b-10 d-flex justify-content-between">
            <h4 class="tx-uppercase"><i data-feather="chevron-right"></i> &nbsp <?=$smk['nama_kategori']?></h4>
            <a href="<?=base_url('welcome/kategori/'.$smk['slug'])?>" class="tx-primary"><i><u>Lihat semua</u></i></a>
          </div>
        </div>
        <div class="card bg-gray-100">
          <div class="card-body">
            <div class="row flex-row flex-nowrap" style="overflow-x: auto;">
              <?php foreach($smk['kelas']->result() as $kls){
                $nested['kls'] = $kls;
                $this->load->view('frontend/view_card_kelas', $nested);
              } ?>
            </div><!-- row -->
          </div>
        </div>

        <?php }} ?>

        <!-- BANNER -->

        <div class="row mg-t-40">
          <div class="col-12">
            <img src="https://via.placeholder.com/1920x240" class="img-fluid" alt="...">
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

      })
    </script>

  </body>
</html>
