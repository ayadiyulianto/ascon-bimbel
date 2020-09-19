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
    <div class="content content-fixed bd-b">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Semua Kelas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cari Kelas</li>
              </ol>
            </nav>
            <h3 class="mg-b-0"><?=$total_result.' hasil untuk "'.$this->input->get('keyword').'"'?></h3>
          </div>
          <form id="form-cari" method="get" class="d-flex justify-content-between mg-sm-t-0 mg-xs-t-10">
            <div class="search-form mg-r-20">
              <input name="keyword" type="search" value="<?=$this->input->get('keyword')?>" class="form-control" placeholder="Cari kelas">
              <input type="hidden" id="page" name="page" value="<?=$page?>">
              <button class="btn" type="submit"><i data-feather="search"></i></button>
            </div>
            <select id="sortby" name="sortby" class="select2 form-control">
              <?php $sortby=$this->input->get('sortby'); ?>
              <option <?=($sortby=='terbaru')?'selected':''?> value="terbaru">Terbaru</option>
              <option <?=($sortby=='rating')?'selected':''?> value="rating">Rating Tertinggi</option>
              <option <?=($sortby=='siswa')?'selected':''?> value="siswa">Siswa Terbanyak</option>
              <option <?=($sortby=='harga_asc')?'selected':''?> value="harga_asc">Harga Terendah</option>
              <option <?=($sortby=='harga_desc')?'selected':''?> value="harga_desc">Harga Tertinggi</option>
            </select>
          </form>
        </div>
      </div><!-- container -->
    </div><!-- content -->

    <div class="content">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">

        <div class="row mg-b-25">
          <?php if($total_result==0){ ?>
            <div class="col-12 tx-center">
              <img src="https://via.placeholder.com/500" class="img-fluid wd-150 mg-b-25">
              <h6>Kelas yang kamu cari tidak ditemukan. Coba cari dengan kata kunci lain atau <a href="<?=base_url('welcome')?>"><u>Telusuri Semua Kelas</u></a> yang mungkin sesuai dengan kebutuhan kamu.</h6>
            </div>
          <?php }else{
            foreach($kelas->result() as $kls){ ?>
            <div class="col-md-6 col-lg-4 mg-b-20">
              <div class="card card-event">
                <?php $enrolled = !empty($id_kelas_saya) && in_array($kls->id_kelas, $id_kelas_saya);
                if($enrolled){ ?>
                <div class="marker marker-ribbon marker-primary pos-absolute t-10 l-0">Terdaftar</div>
                <?php } elseif($kls->harga=='0'){ ?>
                  <div class="marker marker-ribbon marker-warning pos-absolute t-10 l-0">Gratis</div>
                <?php } elseif($kls->diskon>0){ ?>
                <div class="marker marker-ribbon marker-danger pos-absolute t-10 l-0"><?='-'.$kls->diskon.'%'?></div>
                <?php } ?>
                <img src="<?=base_url().'assets/images/kelas/thumbnail/'.$kls->foto?>" class="card-img-top" alt="">
                <div class="card-body tx-13 pos-relative">
                  <h4><?=$kls->nama_kelas?><a href="<?=base_url('welcome/kelas/'.$kls->slug)?>" class="stretched-link"></a></h4>
                  <p><?=$this->MyModel->get('view_pengajar', 'nama_user', array('id_kelas'=>$kls->id_kelas, 'role'=>'Utama'))->row()->nama_user?></p>
                  <p><?=$kls->deskripsi_singkat?></p>
                  <div class="d-flex justify-content-between">
                    <span class="tx-14 tx-md-16 tx-color-03"><i class="icon ion-md-people lh-0"></i> 
                      <?=$this->MyModel->get('view_siswa', 'COUNT(*) as jml', array('id_kelas'=>$kls->id_kelas))->row()->jml?> siswa
                    </span>
                    <span class="tx-14 tx-md-16 tx-color-03 align-self-start">
                      <?php $review = $this->MyModel->getRatingKelas($kls->id_kelas);
                        echo rating($review->rating).' '.$review->rating.' ('.$review->jumlah.' rating)'; ?>
                    </span>
                  </div>
                </div><!-- card-body -->
                <div class="card-footer tx-13 justify-content-between">
                    <?php if($enrolled){ ?>
                    <a href="<?=base_url('siswa/dashboard/pilihkelas/'.$kls->id_kelas)?>" class="btn btn-block btn-xs btn-primary">Lanjutkan Belajar</a>
                    <?php }elseif($kls->is_buka_pendaftaran!='Y'){ ?>
                    <span class="tx-14 tx-md-16 tx-color-03 tx-semibold">Tidak membuka pendafataran</span>
                    <?php }else{ ?>
                    <span class="tx-14 tx-md-16 tx-semibold">
                      Rp <?php if($kls->diskon>0) echo '<strike class="tx-normal tx-13">'.rupiah($kls->harga).'</strike> ';
                      echo rupiah(((100-$kls->diskon)/100)*$kls->harga)?>
                    </span>
                    <a href="<?=base_url('pembayaran/enroll/'.$kls->id_kelas)?>" class="btn btn-xs btn-primary">DAFTAR</a>
                    <?php } ?>
                </div><!-- card-footer -->
              </div><!-- card -->
            </div><!-- col -->
          <?php }} ?>
        </div><!-- row -->

        <!-- pagination -->
        <div class="row mg-t-40">
          <div class="col-12">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center pagination-outline mg-b-0">
                <li class="page-item <?=$page==1?'disabled':''?>"><button class="page-link page-link-icon" data-page="<?=$page-1?>"><i data-feather="chevron-left"></i></button></li>
                <?php for($i=1; $i<=$pages; $i++){?>
                <li class="page-item <?=$page==$i?'active':''?>"><button class="page-link" data-page="<?=$i?>"><?=$i?></button></li>
                <?php } ?>
                <li class="page-item <?=$pages<2||$page==$pages?'disabled':''?>"><button class="page-link page-link-icon" data-page="<?=$page+1?>"><i data-feather="chevron-right"></i></button></li>
              </ul>
            </nav>
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

        $('#sortby').change(function(){
          $('#form-cari').submit();
          $('#page').val('1');
        })

        // pagination
        $('.page-link').click(function(){
          var page = $(this).data('page');
          $('#page').val(page);
          $('#form-cari').submit();
        })

      })
    </script>

  </body>
</html>
