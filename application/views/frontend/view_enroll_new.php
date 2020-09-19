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
        <form method="post">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card card-event">
              <?php if($kelas->diskon>0){ ?>
              <div class="marker marker-ribbon marker-danger pos-absolute t-10 l-0"><?='-'.$kelas->diskon.'%'?></div>
              <?php } ?>
              <img src="<?=base_url().'assets/images/kelas/'.$kelas->foto?>" class="card-img-top" alt="">
              <div class="card-body tx-13 pos-relative">
                <h4><?=$kelas->nama_kelas?></h4>
                <p><?=$this->MyModel->get('view_pengajar', 'nama_user', array('id_kelas'=>$kelas->id_kelas, 'role'=>'Utama'))->row()->nama_user?></p>
                <div class="d-flex justify-content-between">
                  <span class="tx-14 tx-md-16 tx-color-03"><i class="icon ion-md-people lh-0"></i> 
                    <?=$this->MyModel->get('view_siswa', 'COUNT(*) as jml', array('id_kelas'=>$kelas->id_kelas))->row()->jml?> siswa
                  </span>
                  <span class="tx-14 tx-md-16 tx-color-03 align-self-start">
                    <?php $review = $this->MyModel->getRatingKelas($kelas->id_kelas);
                      echo rating($review->rating).' '.$review->rating.' ('.$review->jumlah.' rating)'; ?>
                  </span>
                </div>
              </div><!-- card-body -->
              <div class="card-footer tx-13">
                <span>Harga</span>
                <span class="tx-14 tx-md-16 tx-semibold">
                  Rp <?php if($kelas->diskon>0) echo '<strike class="tx-normal tx-13">'.rupiah($kelas->harga).'</strike> ';
                  echo rupiah(((100-$kelas->diskon)/100)*$kelas->harga); ?>
                </span>
              </div><!-- card-footer -->
            </div><!-- card -->

            <div class="card card-body mg-y-20">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="haveCoupon">
                <label class="custom-control-label" for="haveCoupon">Punya Kupon</label>
              </div>
              <div class="mg-t-5 d-none" id="coupon">
                <div class="input-group">
                  <input type="text" id="coupon_code" name="coupon_code" class="form-control" placeholder="Ketik kode kupon disini">
                  <div class="input-group-append">
                    <button class="btn btn-outline-light" id="check_coupon" type="button"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                <label class="mg-t-10 mg-b-0" id="potongan"></label>
              </div>
            </div>
          </div><!-- col -->

          <div class="col-md-6 col-lg-8">
            <h4>Metode Pembayaran</h4>
            <?= !empty(validation_errors()) ? '<label class="tx-danger">'.validation_errors().'</label>' : ''?>
            <?php foreach($jenis->result() as $row){ ?>
            <div class="card mg-y-10">
              <div class="card-header">
                <h5 class="tx-uppercase mg-b-0"><?=$row->jenis?></h5>
              </div>
              <div class="card-body pd-y-10">
                <?php $mtd = $this->MyModel->get('metode_bayar', '*', array('jenis'=>$row->jenis, 'status'=>'Y'));
                foreach($mtd->result() as $mtd){ ?>
                <div class="pd-10 mg-y-5 bd">
                  <div class="custom-control custom-radio">
                    <input type="radio" name="metode_bayar" value="<?=$mtd->id?>" id="customRadio<?=$mtd->id?>" class="custom-control-input">
                    <label class="mg-l-5 custom-control-label" for="customRadio<?=$mtd->id?>"><img class="ht-50" src="<?=base_url('assets/images/pembayaran/'.$mtd->logo)?>"></label>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
            <?php } ?>

            <div class="card mg-t-20">
              <div class="card-header">
                <h5 class="tx-uppercase mg-b-0">BAYAR</h5>
              </div>
              <div class="card-body pd-y-10">
                <ul class="list-unstyled lh-7">
                  <li class="d-flex justify-content-between">
                    <span>HARGA</span>
                    <span>Rp <?=rupiah($kelas->harga)?></span>
                  </li>
                  <?php if($kelas->diskon>0){ ?>
                  <li class="d-flex justify-content-between">
                    <span>DISKON ( -<?=$kelas->diskon?>% )</span>
                    <span>- Rp <?=rupiah(($kelas->diskon/100)*$kelas->harga)?></span>
                  </li>
                  <?php } ?>
                  <li class="d-flex justify-content-between" id="list-kupon">
                  </li>
                  <hr class="mg-y-5">
                  <li class="d-flex justify-content-between">
                    <strong>TOTAL BAYAR</strong>
                    <strong id="total_bayar">Rp <?=rupiah(((100-$kelas->diskon)/100)*$kelas->harga)?></strong>
                  </li>
                </ul>
                <p class="tx-medium tx-13 mg-b-10">Dengan menyelesaikan pembayaran ini, anda menyetujui <a target="_blank" href="<?=base_url('welcome/ketentuanlayanan')?>">Ketentuan Layanan</a> kami.</p>
                <button type="submit" class="btn btn-lg btn-block btn-primary tx-uppercase">BAYAR SEKARANG</button>
              </div>
            </div>

          </div><!-- col -->
        </div><!-- row -->
        </form>
      </div><!-- container -->
    </div>

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>

    <!-- another js -->

    <script>
      $(function(){
        'use strict'

        $("#haveCoupon").change(function() {
          if(this.checked) {
            $('#coupon').removeClass('d-none');
          }else{
            $('#coupon').addClass('d-none');
            $('#coupon_code').val('');
          }
        });

        $('#check_coupon').click(function(e) {
          e.preventDefault();
          $.ajax({
            url: '<?=base_url('pembayaran/checkCoupon')?>',
            type: 'POST',
            data: {'code' : $('#coupon_code').val(), 'id_kelas' : <?=$kelas->id_kelas?>},
            dataType: 'json',
            success: function (result) {
              if(result.status=='available'){
                $('#list-kupon').html(result.list_kupon);
                var total_bayar = <?=((100-$kelas->diskon)/100)*$kelas->harga?>;
                var total_bayar = +total_bayar - +result.coupon_value;
                $('#total_bayar').html('Rp '+(total_bayar/1000).toFixed(3));
              }else if(result.status=='unavailable'){
                $('#coupon_code').val('');
                $('#total_bayar').html('');
              }
              $('#potongan').html(result.potongan);
            },
            error: function (data){
              $('#coupon_code').val('');
              $('#total_bayar').html('');
              $('#potongan').html('');
              console.log(data)
            }
          });
        });

      })
    </script>

  </body>
</html>
