<?php $this->load->view('pengajar/header'); ?>

        <div class="data-table-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Forum Diskusi</h1>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                    <hr>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="row mg-b-15">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="chat-discussion" style="height: auto">
                                                <div class="chat-message">
                                                    <div class="profile-hdtc">
                                                         <img class="message-avatar" src="<?= base_url('kiaalap/img/product/pro4.jpg') ?>" alt="">
                                                    </div>
                                                    <div class="message">
                                                        <a class="message-author" href="<?= base_url('siswa/diskusi/detail/'.$diskusi->id) ?>"> <?= $diskusi->judul ?> </a>
                                                        <span class="message-date"> <?= $diskusi->tgl_dibuat ?> </span>
                                                        <span class="message-content"> <?= $diskusi->isi ?> </span>
                                                        <div class="m-t-md mg-t-10">
                                                            <a class="btn btn-xs btn-default"><i class="fa fa-book"></i> Modul 1</a>
                                                            <a class="btn btn-xs btn-default"><i class="fa fa-comments"></i> 1 Komentar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sparkline13-graph">
                                <div class="row mg-t-15">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div id="disqus_thread"></div>
                                        <script>
                                            
                                        var disqus_config = function () {
                                        this.page.url = '<?= base_url('forum/'.$id) ?>';  // Replace PAGE_URL with your page's canonical URL variable
                                        this.page.identifier = '<?= 'forum_'.$id ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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

<?php $this->load->view('pengajar/footer'); ?>