                  <div class="col-md-4 col-8">
                    <div class="card card-event">
                      <?php $enrolled = !empty($id_kelas_saya) && in_array($kls->id_kelas, $id_kelas_saya);
                      if($enrolled){ ?>
                      <div class="marker marker-ribbon marker-primary pos-absolute t-10 l-0">Terdaftar</div>
                      <?php } elseif($kls->harga==0){ ?>
                      <div class="marker marker-ribbon marker-warning pos-absolute t-10 l-0">Gratis</div>
                      <?php } elseif($kls->diskon>0){ ?>
                      <div class="marker marker-ribbon marker-danger pos-absolute t-10 l-0"><?='Diskon '.$kls->diskon.'%'?></div>
                      <?php } ?>
                      <img src="<?=base_url().'assets/images/kelas/thumbnail/'.$kls->foto?>" class="card-img-top" alt="">
                      <div class="card-body tx-13 pos-relative">
                        <h4><?=$kls->nama_kelas?><a href="<?=base_url('welcome/kelas/'.$kls->slug)?>" class="stretched-link"></a></h4>
                        <p><?=$this->MyModel->get('view_pengajar', 'nama_user', array('id_kelas'=>$kls->id_kelas, 'role'=>'Utama'))->row()->nama_user?></p>
                        <div class="d-flex justify-content-between">
                          <span class="tx-14 tx-md-16 tx-color-03"><i class="icon ion-md-people lh-0"></i> 
                            <?=$this->MyModel->get('view_siswa', 'COUNT(*) as jml', array('id_kelas'=>$kls->id_kelas))->row()->jml?> siswa
                          </span>
                          <span class="tx-14 tx-md-16 tx-color-03 align-self-start">
                            <?php $review = $this->MyModel->getRatingKelas($kls->id_kelas);
                              echo rating($review->rating).' '.$review->rating.' ('.$review->jumlah.' rating)'; ?>
                          </span>
                        </div>
                      </div>
                      <div class="card-footer tx-13">
                        <?php if($enrolled){ ?>
                        <a href="<?=base_url('siswa/dashboard/pilihkelas/'.$kls->id_kelas)?>" class="btn btn-block btn-xs btn-primary">Lanjutkan Belajar</a>
                        <?php }elseif($kls->is_buka_pendaftaran!='Y'){ ?>
                        <span class="tx-14 tx-md-16 tx-color-03 tx-semibold">Tidak membuka pendafataran</span>
                        <?php }else{ ?>
                          <span class="tx-14 tx-md-16 tx-semibold">
                            <?php if($kls->harga>0){ ?>
                              Rp <?php if($kls->diskon>0) echo '<strike class="tx-normal tx-13">'.rupiah($kls->harga).'</strike> ';
                              echo rupiah(((100-$kls->diskon)/100)*$kls->harga)?>
                            <?php } ?>
                          </span>
                          <a href="<?=base_url('pembayaran/enroll/'.$kls->id_kelas)?>" class="btn btn-xs btn-primary">DAFTAR</a>
                        <?php } ?>
                      </div>
                    </div>
                  </div>