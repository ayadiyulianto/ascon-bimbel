<?php $this->load->view('siswa/header'); ?>

<div class="button-edu-area mg-b-15">
            <div class="container-fluid">
                <div class="row mg-t-15">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                            <h2>Pembahasan</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="button-ad-wrap">
                            <!-- <div class="button-ap-list responsive-btn">
                                <button type="button" class="btn btn-custon-rounded-three btn-primary"><i class="fa fa-arrow-left edu-informatio" aria-hidden="true"></i> Sebelumnya</button>
                                <div style="float: right;"><button type="button" class="btn btn-custon-rounded-three btn-primary">Selanjutnya <i class="fa fa-arrow-right edu-informatio" aria-hidden="true"></i></button></div>
                            </div> -->
                        </div>
                        <div class="button-ad-wrap">
                            <div class="alert-title">
                                <h1 class="text-center">Soal <?= $nomor ?></h1>
                                <br>
                                <?= $soal->soal ?>
                                <?php foreach($jawaban as $row){ ?>
                                <div class="i-checks pull-left">
                                    <label <?php if($row==$soal->benar_1){ echo 'style="color: green"'; } elseif($row==$soal->jawaban && $row!==$soal->benar_1){ echo 'style="color: red"';} ?>><input name="jawaban" type="radio" value="<?= $row ?>" <?php if($soal->jawaban==$row) echo 'checked="checked"'; ?>> <i></i><?= $row ?> </label>
                                </div><br><br>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="admintab-wrap edu-tab1 mg-t-15 mg-b-15">
                            <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                <li class="active"><a data-toggle="tab" href="#TabPembahasan"><span class="edu-icon edu-analytics tab-custon-ic"></span><h4>Pembahasan</h4></a>
                                </li>
                                <li><a data-toggle="tab" href="#TabDiskusi"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span><h4>Diskusi</h4></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="TabPembahasan" class="tab-pane in active animated fadeIn custon-tab-style1">
                                    <?= $soal->pembahasan ?>
                                </div>
                                <div id="TabDiskusi" class="tab-pane animated fadeIn custon-tab-style1">
                                    <div id="disqus_thread"></div>
                                    <script>
                                        
                                    var disqus_config = function () {
                                    this.page.url = '<?= base_url('soal/'.$id_soal) ?>';  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = '<?= 'soal_'.$id_soal ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                    };
                                    
                                    (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = 'https://oasse-bimbel.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                    })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="button-ad-wrap res-mg-b-30">
                            <h4>Nomor Soal</h4>
                            <div class="button-ap-list responsive-btn">
                                <?php $no=1; foreach($listnomorsoal as $row){ ?>
                                <a href="<?= base_url('siswa/latihansoal/bahas/'.$id_sesi_latihan.'/'.$no) ?>" class="btn btn-custon-rounded-three <?php if($row['status']=='salah'){ echo 'btn-danger'; } elseif($row['status']=='benar'){ echo 'btn-success';} ?>"><?= $no++ ?></a>
                                <?php } ?>
                                <br><br><br>
                                <a href="<?= base_url('siswa/latihansoal') ?>" style="width: 100%" class="btn btn-custon-four btn-primary" ><i class="fa fa-check edu-checked-pro"></i> SELESAI</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('siswa/footer'); ?>