<?php $this->load->view('siswa/header_main'); ?>
        
        <div class="data-table-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Kelas Saya</h1>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="courses-area">
            <div class="container-fluid">
                <div class="row mg-b-15">
                    <?php foreach($kelassaya->result() as $kelas){ ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="courses-inner">
                            <div class="courses-title">
                                <a href="#"><img src="<?php echo base_url('assets/images/kelas/'.$kelas->foto) ?>" alt=""></a>
                                <h2><?= $kelas->nama ?></h2>
                            </div>
                            <div class="courses-alaltic">
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock-o"></i></span> 1 Year</span>
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-star"></i></span> 4.5</span>
                            </div>
                            <div class="course-des">
                                <p><b>Progress:</b> 90%</p>
                            </div>
                            <div class="product-buttons">
                                <a href="<?php echo base_url('siswa/kelassaya/tentang/'.$kelas->id) ?>">Tentang Kelas Ini</a>
                                <a href="<?php echo base_url('siswa/kelassaya/pilihkelas/'.$kelas->id) ?>">Lanjutkan Belajar</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

<?php $this->load->view('siswa/footer'); ?>