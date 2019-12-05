        <!-- accordion start-->
        <div class="courses-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                            <h2>Kelas Saya</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php for($i=0; $i<=5; $i++){ ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="courses-inner res-mg-b-30">
                            <div class="courses-title">
                                <a href="#"><img src="<?php echo base_url('kiaalap/img/courses/1.jpg') ?>" alt=""></a>
                                <h2>Apps Development</h2>
                            </div>
                            <div class="course-des">
                                <p><span><i class="fa fa-clock"></i></span><b>Status:</b> Belum Selesai</p>
                            </div>
                            <div class="product-buttons">
                                <a href="#"><button type="button" class="button-default cart-btn">Tentang Kelas</button></a>
                                <button type="button" class="button-default cart-btn">Lanjutkan Belajar</button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>