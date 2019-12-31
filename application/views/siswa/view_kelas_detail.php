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
                                Rating : <b>4,4</b>
                                <span style="color: orange">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </span>
                                <b>1,250</b>
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
                                <?php for($i=0; $i<3; $i++){ ?>
                                    <div class="chat-message">
                                        <div class="profile-hdtc">
                                             <img class="message-avatar" src="<?= base_url('kiaalap/img/product/pro4.jpg') ?>" alt="">
                                        </div>
                                        <div class="message">
                                            <a class="message-author"> <?= "Lorem ipsum sit dolor amet" ?> </a>
                                            <span class="message-date"> <?= date('d-M-Y') ?> </span>
                                            <span class="message-content"> <?= "Shabby chic selfies pickled Tumblr letterpress iPhone. Wolf vegan retro selvage literally" ?> </span>
                                            <!-- <div class="m-t-md mg-t-10">
                                                <a class="btn btn-xs btn-default"><i class="fa fa-book"></i> Modul 1</a>
                                                <a class="btn btn-xs btn-default"><i class="fa fa-comments"></i> 1 Komentar</a>
                                            </div> -->
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
                                    <form id="comment" action="#" class="comment">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 blog-res-mg-bt">
                                            <div class="form-group">
                                                <input name="name" class="responsive-mg-b-10" type="text" placeholder="Nama" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input name="email" type="text" placeholder="Email" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <textarea name="message" cols="30" rows="10" placeholder="Tuliskan Pesan..."></textarea>
                                            </div>
                                            <div class="payment-adress comment-stn">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Kirim Ulasan</button>
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