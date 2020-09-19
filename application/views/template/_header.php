
    <header class="navbar navbar-header navbar-header-fixed">
      <a href="" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
      <div class="navbar-brand">
        <a href="<?=base_url()?>" class="df-logo">oasse<span style="color: orange">bimbel</span></a>
      </div><!-- navbar-brand -->
      <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
          <a href="<?=base_url()?>" class="df-logo">oassse<span style="color: orange">bimbel</span></a>
          <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
        </div><!-- navbar-menu-header -->
        <ul class="nav navbar-menu">
          <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Navigasi</li>

          <?php if(userdata('role') == 'Administrator' && $this->uri->segment(1)=='admin'){ ?>

          <!-- MENU ADMIN -->

          <li class="nav-item with-sub">
            <a href="" class="nav-link"><i data-feather="home"></i> Beranda</a>
            <div class="navbar-menu-sub">
              <div class="d-lg-flex">
                <ul>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/dashboard')?>" class="nav-sub-link"><i data-feather="monitor"></i> Dashboard</a></li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/dashboard/monitoring')?>" class="nav-sub-link"><i data-feather="trending-up"></i> Monitoring</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="nav-item with-sub">
            <a href="" class="nav-link"><i data-feather="box"></i> Data Master</a>
            <div class="navbar-menu-sub">
              <div class="d-lg-flex">
                <ul>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/kategori')?>" class="nav-sub-link"><i data-feather="layers"></i> Kategori</a></li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/kelas')?>" class="nav-sub-link"><i data-feather="folder"></i> Kelas</a></li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/user')?>" class="nav-sub-link"><i data-feather="users"></i> Pengguna</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="nav-item with-sub">
            <a href="" class="nav-link"><i data-feather="shopping-bag"></i> Penjualan</a>
            <div class="navbar-menu-sub">
              <div class="d-lg-flex">
                <ul>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/penjualan')?>" class="nav-sub-link"><i data-feather="book-open"></i> Transaksi Aktif</a></li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/penjualan/selesai')?>" class="nav-sub-link"><i data-feather="book"></i> Transaksi Selesai</a></li>
                  <li class="nav-label mg-t-20">Pengaturan</li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/penjualan/metode')?>" class="nav-sub-link"><i data-feather="credit-card"></i> Metode Pembayaran</a></li>
                  <li class="nav-label mg-t-20">Promosi</li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/penjualan/flashsale')?>" class="nav-sub-link"><i data-feather="zap"></i> Flash Sale</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="nav-item with-sub">
            <a href="" class="nav-link"><i data-feather="monitor"></i> Landing Page</a>
            <div class="navbar-menu-sub">
              <div class="d-lg-flex">
                <ul>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/landingpage/banner')?>" class="nav-sub-link"><i data-feather="image"></i> Banner</a></li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/landingpage/layanan')?>" class="nav-sub-link"><i data-feather="layers"></i> Layanan</a></li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/landingpage/tentang')?>" class="nav-sub-link"><i data-feather="info"></i> Tentang</a></li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/landingpage/karier')?>" class="nav-sub-link"><i data-feather="award"></i> Karier</a></li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/landingpage/seo')?>" class="nav-sub-link"><i data-feather="globe"></i> SEO</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="nav-item with-sub">
            <a href="" class="nav-link"><i data-feather="help-circle"></i> Support</a>
            <div class="navbar-menu-sub">
              <div class="d-lg-flex">
                <ul>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/support/cs')?>" class="nav-sub-link"><i data-feather="message-square"></i> Customer Service</a></li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/support/helpcenter')?>" class="nav-sub-link"><i data-feather="help-circle"></i> Pusat Bantuan</a></li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/support/faq')?>" class="nav-sub-link"><i data-feather="file-text"></i> FAQ</a></li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/support/privasipolicy')?>" class="nav-sub-link"><i data-feather="file"></i> Kebijakan Privasi</a></li>
                  <li class="nav-sub-item"><a href="<?=base_url('admin/support/ketentuanlayanan')?>" class="nav-sub-link"><i data-feather="file"></i> Ketentuan Layanan</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="nav-item"><a href="<?=base_url('admin/blog')?>" class="nav-link"><i data-feather="book"></i> Blog</a></li>

          <?php }else{ ?>

          <!-- SHOW SEARCH AND KATEGORI -->

          <li class="nav-item with-sub">
            <a href="" class="nav-link"><i data-feather="folder"></i> Kategori</a>
            <div class="navbar-menu-sub">
              <div class="d-lg-flex">
                <ul>
                  <?php $categories=$this->MyModel->getKategori();
                  foreach($categories->result() as $ctg){ ?>
                  <li class="nav-sub-item mg-y-10"><a href="<?=base_url('welcome/kategori/'.$ctg->slug)?>" class="nav-sub-link"><?=$ctg->nama_kategori?></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </li>
          <li class="navbarSearch nav-item d-none d-lg-inline">
            <div class="search-form">
              <input name="keyword" type="search" value="<?=$this->input->get('keyword')?>" class="form-control" placeholder="Cari kelas" autocomplete="off">
              <button class="btn" type="submit"><i data-feather="search"></i></button>
            </div>
          </li>

          <?php } ?>
        </ul>
      </div><!-- navbar-menu-wrapper -->

      <div class="navbar-right">
        <a href="" class="navbarSearch search-link d-lg-none mg-r-15"><i data-feather="search"></i></a>
        <?php if (userdata('oasse-bimbel') == FALSE) { ?>
        <a href="<?=base_url('auth')?>" class="btn btn-buy"><i data-feather="log-in"></i> <span>Masuk</span></a>
        <?php } else {
          if(userdata('role') == 'Siswa'){ ?>
          <a href="<?=base_url('siswa/dashboard')?>" class="search-link tx-semibold">Kelas Saya</a>

          <?php } elseif(userdata('role') == 'Pengajar'){ ?>
          <a href="<?=base_url('pengajar/dashboard')?>" class="search-link tx-semibold">Kelola Kelas</a>

          <?php } elseif(userdata('role') == 'Administrator' && $this->uri->segment(1)!='admin'){ ?>
          <a href="<?=base_url('admin/dashboard')?>" class="search-link tx-semibold">Dashboard</a>
          <?php } ?>

        <div class="dropdown dropdown-notification">
          <a href="" class="dropdown-link new-indicator" data-toggle="dropdown">
            <i data-feather="bell"></i>
            <?php $where_notif = array('id_user_recipient'=>userdata('id_user'), 'unread'=>'Y');
            $notif=$this->MyModel->get('notifikasi', '*', $where_notif, 'waktu_post desc', 5); ?>
            <span><?=$notif->num_rows()?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header">Notifikasi</div>
            <?php if($notif->num_rows()==0){ echo '<p class="dropdown-item">Tidak ada notifikasi saat ini</p>'; }
            foreach($notif->result() as $ntf){ ?>
            <a href="<?=base_url('welcome/'.$ntf->type.'/'.$ntf->id_sumber)?>" class="dropdown-item">
              <div class="media">
                <div class="avatar avatar-sm avatar-online"><span class="avatar-initial rounded-circle bg-teal">$ntf->type[0]</span></div>
                <div class="media-body mg-l-15">
                  <p><?=$ntf->judul?></p>
                  <span><?=tgl_indo($ntf->waktu_post, 'l, j F H:i')?></span>
                </div><!-- media-body -->
              </div><!-- media -->
            </a>
            <?php } ?>
            <div class="dropdown-footer"><a href="<?=base_url('profile/notifikasi')?>">Lihat Semua Notifikasi</a></div>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <div class="dropdown dropdown-profile">
          <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
            <div class="avatar avatar-sm"><img src="<?=avatar(userdata('foto'))?>" class="rounded-circle" alt=""></div>
          </a><!-- dropdown-link -->
          <div class="dropdown-menu dropdown-menu-right tx-13">
            <div class="avatar avatar-lg mg-b-15"><img src="<?=avatar(userdata('foto'))?>" class="rounded-circle" alt=""></div>
            <h6 class="tx-semibold mg-b-5"><?=userdata('nama_user')?></h6>
            <p class="mg-b-25 tx-12 tx-color-03"><?=userdata('role')?></p>

            <a href="<?=base_url()?>profile" class="dropdown-item"><i data-feather="user"></i> Lihat Profile</a>
            <!-- <a href="<?=base_url()?>profile/pesan" class="dropdown-item"><i data-feather="message-square"></i> Lihat Pesan</a> -->
            <?php if(userdata('role')=='Siswa'){ ?>
            <a href="<?=base_url()?>profile/jadipengajar" class="dropdown-item"><i data-feather="shuffle"></i> Jadi Pengajar</a>
            <?php } elseif(userdata('role')=='Pengajar'){ ?>
            <a href="<?=base_url()?>profile/jadisiswa" class="dropdown-item"><i data-feather="shuffle"></i> Beralih Akun Siswa</a>
            <?php } ?>
            <div class="dropdown-divider"></div>
            <a href="<?=base_url()?>page/helpcenter" class="dropdown-item"><i data-feather="help-circle"></i>Bantuan</a>
            <a href="<?=base_url()?>auth/logout" class="dropdown-item"><i data-feather="log-out"></i>Keluar</a>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <?php } ?>
      </div><!-- navbar-right -->

      <div class="navbar-search">
        <div class="navbar-search-header">
          <input id="search-kelas-field" type="search" class="form-control" placeholder="Cari kelas disini..." value="<?=$this->input->get('keyword')?>">
          <button id="search-kelas-btn" class="btn"><i data-feather="search"></i></button>
          <form id="form-search-kelas" method="get" action="<?=base_url('welcome/carikelas')?>">
            <input id="search-kelas-input" type="hidden" name="keyword" value="<?=$this->input->get('keyword')?>">
          </form>
          <script type="text/javascript">
            $(function(){
              $('#search-kelas-field').keyup(function(){
                $('#search-kelas-input').val($(this).val());
              });
              $('#search-kelas-field').keypress(function(e){
                if(e.which == 13){
                  $('#form-search-kelas').submit();
                }
              });
              $('#search-kelas-btn').click(function(){
                $('#form-search-kelas').submit();
              })
            })
          </script>
          <a id="navbarSearchClose" href="" class="link-03 mg-l-5 mg-lg-l-10"><i data-feather="x"></i></a>
        </div><!-- navbar-search-header -->
        <div class="navbar-search-body">
          <label class="tx-10 tx-medium tx-uppercase tx-spacing-1 tx-color-03 mg-b-10 d-flex align-items-center">Kelas Rekomendasi</label>
          <ul class="list-unstyled" id="list-kelas-rekomendasi">
            <?php $rek = $this->MyModel->get('view_kelas', 'nama_kelas, slug', array('is_aktif'=>'y'), null, 3);
             foreach($rek->result() as $rek){ ?>
            <li><a href="<?=base_url('welcome/kelas/'.$rek->slug)?>"><?=$rek->nama_kelas?></a></li>
            <?php } ?>
          </ul>
          <hr class="mg-y-30 bd-0">
          <label class="tx-10 tx-medium tx-uppercase tx-spacing-1 tx-color-03 mg-b-10 d-flex align-items-center">Kelas Populer</label>
          <ul class="list-unstyled">
            <?php $pop = $this->MyModel->getKelasPopuler(3);
             foreach($pop->result() as $pop){ ?>
            <li><a href="<?=base_url('welcome/kelas/'.$pop->slug)?>"><?=$pop->nama_kelas?></a></li>
            <?php } ?>
          </ul>
        </div><!-- navbar-search-body -->
      </div><!-- navbar-search -->

    </header><!-- navbar -->
