<?php $this->load->view('siswa/header_main'); ?>

        <div class="blog-details-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="blog-details-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="latest-blog-single blog-single-full-view">
                                        <div class="blog-image">
                                            <a href="#"><img src="<?php echo base_url('assets/images/kelas/'.$kelas->foto) ?>" alt="" />
											</a>
                                        </div>
                                        <div class="blog-details blog-sig-details">

                                            <h1 class="mg-t-30"><?= $kelas->nama ?></h1>

                                            <p><b><?= $kelas->deskripsi_singkat ?></b></p>

                                            <?= $kelas->deskripsi_lengkap ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="comment-head">
                                        <h3>Silabus</h3>
                                    </div>
                                </div>
                            </div>
                            <?php foreach($silabus->result() as $modul){ ?>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="user-comment mg-b-15">
                                        <div class="comment-details">
                                            <h4><?= $modul->nama_modul ?></h4>
                                            <p><?= $modul->deskripsi_singkat ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <h1 class="mg-t-15">
                                Rating : <b><?= $rating->rating ?></b>
                                <span style="color: orange">
                                    <?php for($i=1; $i<=$rating->rating; $i++){ ?>
                                    <i class="fa fa-star"></i>
                                    <?php } ?>
                                    <!-- <i class="fa fa-star-half-o"></i> -->
                                </span>
                                <b>(<?= $rating->count ?>)</b>
                            </h1>

                            <div class="row mg-t-30">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="lead-head">
                                        <h3>Ulasan Peserta</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="review-content-section">
                                <div class="chat-discussion" style="height: auto">
                                <?php foreach($reviews->result() as $review){ ?>
                                    <div class="chat-message">
                                        <div class="profile-hdtc">
                                             <img class="message-avatar" src="<?= base_url('kiaalap/img/product/pro4.jpg') ?>" alt="">
                                        </div>
                                        <div class="message">
                                            <span class="message-author"> <?= $review->nama.' ('.$review->rating.')' ?> </span>
                                            <span class="message-date"> <?= date('d-M-Y', strtotime($review->tgl_dibuat)) ?> </span>
                                            <span class="message-content"> <?= $review->review ?> </span>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="row mg-t-30">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="lead-head">
                                        <h3>Berikan Ulasan</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="coment-area">
                                    <form action="<?= base_url('siswa/kelassaya/beriUlasan') ?>" method="post" class="comment">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 blog-res-mg-bt">
                                            <div class="form-group">
                                                <h1>
                                                <input type="hidden" name="id_kelas" value="<?= $kelas->id ?>">
                                                <span style="color: orange" >
                                                <input name="rating" id="rating" type="number" value="<?php if(isset($myreview)) echo $myreview->rating ?>" class="rating" data-min="1" data-max="5" required="required" data-inline/>
                                                </span>
                                                <?php if(isset($myreview)) echo '('.$myreview->rating.')' ?>
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <p class="pull-right"><?php if(isset($myreview)) echo $myreview->tgl_dibuat ?></p>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <textarea name="review" cols="30" rows="10" placeholder="Tuliskan Pesan..."><?php if(isset($myreview)) echo $myreview->review ?></textarea>
                                            </div>
                                            <div class="payment-adress comment-stn">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Beri Ulasan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('siswa/footer'); ?>