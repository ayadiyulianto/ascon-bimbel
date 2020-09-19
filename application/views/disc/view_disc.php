<?php $this->load->view('siswa/header_main'); ?>
        
        <div class="data-table-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Test Kepribadian DISC</h1>
                                    <span>Tes Kepribadian DISC membagi kepribadian manusia menjadi 4 macam: Dominance, Influence, Steadiness dan Compliance.</span>
                                    <div class="add-product">
                                        <a href="<?= base_url('siswa/disc/test') ?>">Ikuti Test DISC</a>
                                    </div>
                                    <div class="visible-xs">
                                        <a class="btn btn-primary" href="#" >Ikuti Test DISC</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if($history!=null && $history->jumlah_c==max(array($history->jumlah_d, $history->jumlah_i, $history->jumlah_s, $history->jumlah_c)) ){ ?>
        <div class="blog-details-area mg-t-15 mg-b-15" id="compliance">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="blog-details-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="latest-blog-single blog-single-full-view">
                                        <div class="blog-details blog-sig-details">
                                            
<h1 class="has-text-centered mb-0" style="box-sizing: inherit; margin-top: 0px; margin-bottom: 0.5em; padding: 0px; font-size: 2em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif; text-align: center !important;">COMPLIANCE</h1><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Karakteristik Umum</h3><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Akurat. Analitis. Teliti. Berhati-hati. Pencari fakta. Presisi. Standar yang tinggi. Sistematis.</p><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Nilai Untuk Tim</h3><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Memiliki perspektif yang baik. Emosi yang stabil. Meneliti semua aktivitas. Mampu memahami situasi. Mengumpulan, mengkritisi dan menguji informasi.</p><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Kekurangan</h3><span style="color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Memerlukan batasan yang jelas antara tindakan dan hubungan. Terikat dengan prosedur dan metode. Terlalu memikirkan detil. Tidak mengungkapkan perasaan secara verbal. Tidak mau berdebat dan menyimpan sendiri perasaan.</span><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Ketakutan Terbesar</h3><span style="color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Kritik.</span><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Hal yang Membuat Termotivasi</h3><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Standar kualitas yang tinggi. Interaksi sosial terbatas. Tugas yang mendetil. Pengaturan informasi yang logis.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mg-t-30">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div id="disqus_thread"></div>

                                    <script>
                                    var disqus_config = function () {
                                    this.page.url = '<?= base_url('disc/compliance') ?>';  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = '<?= 'disc_compliance' ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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
        <?php } 

        elseif($history!=null && $history->jumlah_d==max(array($history->jumlah_d, $history->jumlah_i, $history->jumlah_s, $history->jumlah_c)) ){ ?>
        <div class="blog-details-area mg-t-15 mg-b-15" id="dominance">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="blog-details-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="latest-blog-single blog-single-full-view">
                                        <div class="blog-details blog-sig-details">

<h1 class="has-text-centered mb-0" style="box-sizing: inherit; margin-top: 0px; margin-bottom: 0.5em; padding: 0px; font-size: 2em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif; text-align: center !important;">DOMINANCE</h1><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Karakteristik Umum</h3><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Langsung. Menentukan. Ego tinggi. Pemecah masalah. Pengambil risiko. Inisiatif.</p><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Nilai Untuk Tim</h3><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Pengambil keputusan. Menjunjung nilai. Menantang status quo. Inovatif.</p><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Kekurangan</h3><p><span style="color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Melangkahi otoritas. Suka berargumen. Tidak suka rutinitas. Mencoba terlalu banyak sekaligus.</span></p><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Ketakutan Terbesar</h3><p><span style="color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Dimanfaatkan</span></p><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Hal yang Membuat Termotivasi</h3><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Tantangan baru. Kekuatan untuk mengambil risiko dan keputusan. Bebas dari rutinitas dan tugas yang biasa saja.Mengubah lingkungan kerja dan bermain.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mg-t-30">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div id="disqus_thread"></div>

                                    <script>
                                    var disqus_config = function () {
                                    this.page.url = '<?= base_url('disc/dominance') ?>';  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = '<?= 'disc_dominance' ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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
        <?php } 

        elseif($history!=null && $history->jumlah_i==max(array($history->jumlah_d, $history->jumlah_i, $history->jumlah_s, $history->jumlah_c)) ){ ?>
        <div class="blog-details-area mg-t-15 mg-b-15" id="influence">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="blog-details-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="latest-blog-single blog-single-full-view">
                                        <div class="blog-details blog-sig-details">

<h1 class="has-text-centered mb-0" style="box-sizing: inherit; margin-top: 0px; margin-bottom: 0.5em; padding: 0px; font-size: 2em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif; text-align: center !important;">INFLUENCE</h1><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Karakteristik Umum</h3><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Antusias. Dapat dipercaya. Optimis. Persuasif. Talkative. Impulsif. Emosional.</p><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Nilai Untuk Tim</h3><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Pemecah masalah kreatif. Penyemangat yang baik. Memotivasi yang lain untuk mencapai tujuan. Selera humor yang positif. Pendamai.</p><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Kekurangan</h3><p><span style="color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Lebih memikirikan popularitas daripada hasil nyata. Tidak peduli pada detil. Gerakan tubuh dan wajah yang berlebihan. Hanya mau mendengarkan apabila menarik.</span></p><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Ketakutan Terbesar</h3><p><span style="color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Penolakkan.</span></p><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Hal yang Membuat Termotivasi</h3><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Pujian, popularitas dan penerimaan. Lingkungan yang ramah. Kebebasan dari peraturan dan regulasi. Memiliki orang lain yang menangani hal detil.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mg-t-30">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div id="disqus_thread"></div>

                                    <script>
                                    var disqus_config = function () {
                                    this.page.url = '<?= base_url('disc/influence') ?>';  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = '<?= 'disc_influence' ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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
        <?php } 

        elseif($history!=null && $history->jumlah_s==max(array($history->jumlah_d, $history->jumlah_i, $history->jumlah_s, $history->jumlah_c)) ){ ?>
        <div class="blog-details-area mg-t-15 mg-b-15" id="steadiness">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="blog-details-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="latest-blog-single blog-single-full-view">
                                        <div class="blog-details blog-sig-details">
                                            
<h1 class="has-text-centered mb-0" style="box-sizing: inherit; margin-top: 0px; margin-bottom: 0.5em; padding: 0px; font-size: 2em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif; text-align: center !important;">STEADINESS</h1><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Karakteristik Umum</h3><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Pendengar yang baik. Anggota tim yang baik. Posesif. Tenang. Dapat diprediksi. Memahami. Ramah.</p><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Nilai Untuk Tim</h3><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Dapat diandalkan. Anggota yang setia. Patuh pada peraturan. Pendengar yang baik, sabar dan berempati. Baik sebagai penengah konflik.</p><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Kekurangan</h3><span style="color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Menolak perubahan. Perlu waktu lama untuk berubah. Pendendam. Sensitif terhadap kritik. Sulit menentukan prioritas.</span><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Ketakutan Terbesar</h3><span style="color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Ketidakamanan.</span><h3 style="box-sizing: inherit; margin: 1.3333em 0px 0.6666em; padding: 0px; font-size: 1.5em; font-weight: 600; color: rgb(54, 54, 54); line-height: 1.125; font-family: Nunito, sans-serif;">Hal yang Membuat Termotivasi</h3><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Pengakuan atas pengabdian dan tanggung jawab. Keamanan dan keselamatan. Tidak ada perubahan mendadak dalam prosedur atau gaya hidup. Aktivitas yang bisa diselesaikan.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mg-t-30">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div id="disqus_thread"></div>

                                    <script>
                                    var disqus_config = function () {
                                    this.page.url = '<?= base_url('disc/steadiness') ?>';  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = '<?= 'disc_steadiness' ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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
        <?php } ?>

        <div class="blog-details-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="blog-details-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="latest-blog-single blog-single-full-view">
                                        <div class="blog-image">
                                            <img src="<?php echo base_url('assets/images/disc/disc_illustration.jpg') ?>" alt="" />
                                        </div>
                                        <div class="blog-details blog-sig-details">

                                            <h1 class="mg-t-30">Tes Kepribadian DISC</h1>

                                            <p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Landasan sejarah DISC bermula sekitar tahun 444 SM (Sebelum Masehi) ketika manusia mencoba menggolongkan kepribadian menjadi 4 elemen: Api, Air, Angin dan Tanah. Berbeda dengan teori DISC modern yang percaya bahwa kepribadian dipengaruhi dari dalam diri manusia, 4 elemen ini meyakini adanya faktor luar yang mempengaruhi kepribadian manusia. Sekitar tahun 400 SM, teori 4 elemen ini dikembangkan kembali oleh Hippokrates menjadi teori 4 Temperamen: Koleris, Sanguin, Melankolis dan Plegmatis.</p><p style="box-sizing: inherit; margin-bottom: 1em; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;">Teori mengenai penggolongan kepribadian pun terus dikembangkan. Pada tahun 1921, Carl Gustav Jung mengembangkan teori 4 temperamen yang dikembangkan menjadi 16 tipe kepribadian.</p><p style="box-sizing: inherit; margin-bottom: 0px; padding: 0px; color: rgb(74, 74, 74); font-family: Nunito, sans-serif; font-size: 20px;"><span style="box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;">DISC</span>&nbsp;modern pertama kali dipublikasikan oleh Dr. William Marston, seorang psikolog, melalui bukunya yang berjudul Emotions of Normal People dan diterbitkan pada tahun 1928. Beliau mencoba membagi kepribadian manusia yang beragam menjadi 4 kelompok besar: Dominance, Influence, Steadiness dan Compliance. Beliau tidak membuat tes apapun untuk mengukur kepribadian DISC. Meskipun begitu, berdasarkan model yang dibuatnya, beberapa ahli lainnya mencoba mengintepretasikannya ke dalam sebuah tes.</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row mg-t-30">
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
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('siswa/footer'); ?>