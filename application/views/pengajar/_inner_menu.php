
      <div class="filemgr-wrapper">
        <div class="filemgr-sidebar">
          <div class="filemgr-sidebar-header">
            <div class="dropdown dropdown-icon flex-fill mg-r-10">
              <?php
                if (userdata('role') == 'Pengajar'){ $redirect = base_url("pengajar/dashboard"); }
                elseif (userdata('role') == 'Administrator'){ $redirect = base_url("admin/kelas"); }
              ?>
              <button onclick="location.href='<?=$redirect?>';" class="btn btn-xs btn-block btn-white"><i data-feather="arrow-left"></i> kelas</button>
            </div>
            <div class="dropdown dropdown-icon flex-fill">
              <button class="btn btn-xs btn-block btn-primary" data-toggle="dropdown">Baru <i data-feather="chevron-down"></i></button>
              <div class="dropdown-menu tx-13">
                <a href="<?=base_url()?>modul#tambahModul" class="dropdown-item"><i data-feather="book"></i><span>Modul</span></a>
                <a href="<?=base_url()?>komunikasi/pengumuman#tambahPengumuman" class="dropdown-item"><i data-feather="file-text"></i><span>Pengumuman</span></a>
                <!-- <div class="dropdown-divider"></div>
                <a href="<?=base_url()?>file/saya#uploadFile" class="dropdown-item"><i data-feather="file"></i><span>Upload File</span></a> -->
              </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
          </div><!-- filemgr-sidebar-header -->
          <div class="filemgr-sidebar-body">
            <div class="pd-t-20 pd-b-10 pd-x-10">
              <label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">General</label>
              <nav class="nav nav-sidebar tx-13">
                <a href="<?=base_url()?>kelas" class="nav-link"><i data-feather="monitor"></i> <span>Ringkasan</span></a>
                <a href="<?=base_url()?>kelas/monitoring" class="nav-link"><i data-feather="trending-up"></i> <span>Monitoring</span></a>
                <a href="<?=base_url()?>kelas/pengaturan" class="nav-link"><i data-feather="settings"></i> <span>Pengaturan</span></a>
                <a href="<?=base_url()?>kelas/promosi" class="nav-link"><i data-feather="shopping-bag"></i> <span>Promosi</span></a>
              </nav>
            </div>
            <div class="pd-10">
              <label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">Informasi Kelas</label>
              <nav class="nav nav-sidebar tx-13">
                <a href="<?=base_url()?>kelas/detail" class="nav-link"><i data-feather="file-text"></i> <span>Detail</span></a>
                <a href="<?=base_url()?>modul" class="nav-link"><i data-feather="book"></i> <span>Modul</span></a>
                <a href="<?=base_url()?>siswakelas" class="nav-link"><i data-feather="users"></i> <span>Siswa</span></a>
                <a href="<?=base_url()?>tugas" class="nav-link"><i data-feather="briefcase"></i> <span>Tugas</span></a>
              </nav>
            </div>
            <div class="pd-10">
              <label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">Komunikasi</label>
              <nav class="nav nav-sidebar tx-13">
                <a href="<?=base_url()?>komunikasi/pengumuman" class="nav-link"><i data-feather="cast"></i> <span>Pengumuman</span></a>
                <a href="<?=base_url()?>komunikasi/diskusi" class="nav-link"><i data-feather="message-circle"></i> <span>Diskusi</span></a>
                <a href="<?=base_url()?>komunikasi/review" class="nav-link"><i data-feather="star"></i> <span>Ulasan Siswa</span></a>
              </nav>
            </div>
          </div><!-- filemgr-sidebar-body -->
        </div><!-- filemgr-sidebar -->

        <div class="filemgr-content">
          <div class="filemgr-content-header">
            <h4 class="mg-b-0"><?=$title?></h4>
            <nav class="nav d-flex mg-l-auto">
              <!-- <a href="" class="nav-link"><i data-feather="list"></i></a> -->
            </nav>
          </div><!-- filemgr-content-header -->
          <div class="filemgr-content-body">
            <div class="pd-20 pd-lg-25 pd-xl-30">