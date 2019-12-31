<?php $this->load->view('siswa/header'); ?>

        <div class="button-edu-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="admintab-wrap edu-tab1 mg-t-15 mg-b-15">
                            <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                <li class="active"><a data-toggle="tab" href="#TabMateri"><span class="edu-icon edu-analytics tab-custon-ic"></span><h4>Materi</h4></a>
                                </li>
                                <li><a data-toggle="tab" href="#TabDiskusi"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span><h4>Diskusi</h4></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="TabMateri" class="tab-pane in active animated fadeIn ">
                                    <div class="row mg-t-15">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="blog-details-inner">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="latest-blog-single blog-single-full-view">
                                                            <div class="blog-details blog-sig-details">
                                                                <h1 class="blog-ht"><?= $materi->judul_materi ?></h1>
                                                                <?= $materi->materi ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bottom">
                                                        <a class="btn btn-default pull-right" href="<?= base_url('siswa/materi/tandaiSelesai/'.$id_modul.'/'.$materi->id) ?>">Tandai Selesai</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="button-ad-wrap res-mg-b-30">
                                                <h4>Materi</h4>
                                                <table>
                                                    <?php foreach($listmateri->result() as $row){ ?>
                                                    <tr>
                                                        <?php $checkMulai = $this->SiswaModel->checkMateriMulai($id_siswa, $row->id); 
                                                        $checkSelesai = $this->SiswaModel->checkMateriSelesai($id_siswa, $row->id); ?>
                                                        <td><a <?php if($checkMulai) echo 'href="'.base_url('siswa/materi/baca/'.$id_modul.'/'. $row->id).'"' ?> ><?= $row->judul_materi ?></a></td>
                                                        <td valign="top"><?php if($checkSelesai) echo '<i class="fa fa-check"></i>' ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="TabDiskusi" class="tab-pane animated fadeIn">
                                    <div class="row mg-t-15">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="button-ad-wrap res-mg-b-30">

                                                <div id="disqus_thread"></div>
                                                <script>
                                                    
                                                var disqus_config = function () {
                                                this.page.url = '<?= base_url('materi/'.$id_materi) ?>';  // Replace PAGE_URL with your page's canonical URL variable
                                                this.page.identifier = '<?= 'materi_'.$id_materi ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('siswa/footer'); ?>