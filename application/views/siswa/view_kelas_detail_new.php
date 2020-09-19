<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>

  </head>
  <body>

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>

    <!-- CONTENT -->
    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="<?=base_url('siswa/dashboard')?>">Kelas Saya</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Kelas</li>
              </ol>
            </nav>
            <h3 class="mg-b-0"><?=$about->nama_kelas?></h3>
            <p class="tx-16 tx-color-08 mg-b-0 mg-t-5 mg-lg-r-20"><?=$about->deskripsi_singkat?></p>
            <a href="<?=base_url('welcome/kelas/'.$about->slug)?>" target="_blank"><i><u>Lihat Informasi Kelas</u></i></a>
          </div>
        </div>
      </div><!-- container -->
    </div><!-- content -->

    <div class="content">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">

        <ul class="nav nav-line mg-b-30 tx-md-20">
          <li class="nav-item">
            <a class="nav-link active tx-semibold" id="modul-tab" data-toggle="tab" href="#modul" role="tab" aria-controls="modul" aria-selected="true">MODUL</a>
          </li>
          <li class="nav-item">
            <a class="nav-link tx-semibold" id="nilai-tab" data-toggle="tab" href="#nilai" role="tab" aria-controls="nilai" aria-selected="false">NILAI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link tx-semibold" id="diskusi-tab" data-toggle="tab" href="#diskusi" role="tab" aria-controls="diskusi" aria-selected="false">DISKUSI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link tx-semibold" id="pengumuman-tab" data-toggle="tab" href="#pengumuman" role="tab" aria-controls="pengumuman" aria-selected="false">PENGUMUMAN</a>
          </li>
        </ul>

        <div class="tab-content mg-t-20" id="myTabContent5">

          <div class="tab-pane fade show active" id="modul" role="tabpanel" aria-labelledby="modul-tab">
            <div class="card mg-b-10">
              <div class="card-header pd-t-20 pd-b-20 d-sm-flex align-items-start justify-content-between">
                <div class="wd-md-50p d-sm-flex align-items-start">
                  <i class="fa tx-48 fa-file-text-o mg-r-20"></i>
                  <div class="flex-grow-1 mg-r-20">
                    <h4 class="mg-b-5">Progres Belajar</h4>
                    <div class="progress ht-15">
                      <div class="progress-bar" style="width: <?=$progress?>%" role="progressbar" aria-valuenow="<?=$progress?>" aria-valuemin="0" aria-valuemax="100"><?=$progress?>%</div>
                    </div>
                  </div>
                </div>
                <div class="d-flex mg-t-20 mg-sm-t-0">
                  <?php if(!empty($last_id_konten)){ ?>
                  <a href="<?=base_url('siswa/kelas/belajar/'.$last_id_konten)?>" class="btn btn-primary">Lanjutkan Belajar Terakhir Kali</a>
                  <?php } ?>
                </div>
              </div><!-- card-header -->

              <?php foreach($modul->result() as $row){ ?>
              <div class="card-body pd-t-30">
                <h4><?=$row->nama_modul?></h4>
                <div class="table-responsive">
                  <table class="table table-hover mg-b-0">
                    <tbody>
                      <?php
                      $konten = $this->SiswaModel->getKonten($row->id_modul, userdata('id_user'));
                      foreach($konten->result() as $baris){
                        if($baris->jenis=='Text'){ $icon='fa-file-text-o'; }
                        elseif($baris->jenis=='Video'){ $icon='fa-play-circle'; }
                        elseif($baris->jenis=='Latihan'){ $icon='fa-file-excel-o'; }
                        elseif($baris->jenis=='Tugas'){ $icon='fa-briefcase'; } ?>
                        <tr>
                          <td style="vertical-align: middle; text-align: right;" class="wd-5p">
                            <?=($baris->is_finished=='Y')?'<i class="tx-success" data-feather="check-circle"></i>':'<i class="tx-gray-500" data-feather="circle"></i>'?>
                          </td>
                          <td style="vertical-align: middle;"><i class="fa <?=$icon?> tx-22 tx-primary mg-r-20"></i><span class="tx-18 mg-r-20"><?=$baris->jenis.' : '.$baris->judul_konten?></span> <span class="tx-gray-500">(<?=$baris->durasi_belajar?> menit)</span></td>
                          <td style="text-align: right;"><a href="<?=base_url('siswa/kelas/belajar/'.$baris->id_konten)?>" class="btn btn-outline-primary">Pelajari</a></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php } ?>

            </div>
          </div>

          <!-- TAB NILAI -->
          <div class="tab-pane fade" id="nilai" role="tabpanel" aria-labelledby="nilai-tab">
            <div class="card mg-b-10">
              <div class="card-header pd-t-20 pd-b-0 d-sm-flex align-items-start">
                <i class="fa tx-48 fa-file-excel-o mg-r-20 mg-b-10"></i>
                <div class="mg-r-20">
                  <h4 class="mg-b-5">Nilai Kamu pada Kelas Ini</h4>
                  <p class="tx-16 tx-gray-500">Kamu belum menyelesaikan semua latihan dan tugas di kelas ini</p>
                </div>
              </div>
              <div class="card-body pd-t-30">
                <div class="table-responsive">
                  <table class="table table-hover mg-b-0">
                    <thead>
                      <th class="wd-5p"></th>
                      <th>Judul</th>
                      <th>Status</th>
                      <th>Waktu</th>
                      <th>Nilai</th>
                    </thead>
                    <tbody>
                      <?php foreach($nilai->result() as $n){ 
                      if($n->jenis=='Latihan'){ $icon='fa-file-excel-o'; }
                      elseif($n->jenis=='Tugas'){ $icon='fa-briefcase'; } ?>
                      <tr>
                        <td style="text-align: right; vertical-align: middle;"><?=($n->is_finished=='Y')?'<i class="tx-success" data-feather="check-circle"></i>':''?></td>
                        <td class="tx-semibold" style="vertical-align: middle;"><i class="fa <?=$icon?> tx-22 tx-primary mg-r-10"></i> <?=$n->jenis.' : '.$n->judul_konten?></td>
                        <td style="vertical-align: middle;"><?= empty($n->status) ? 'Belum':$n->status ?></td>
                        <td><?=tgl_indo($n->waktu_selesai, 'j F Y')?><br><?=tgl_indo($n->waktu_selesai, 'H:i')?> WIB</td>
                        <td class="tx-semibold" style="vertical-align: middle;"><?= empty($n->nilai) ? '--':$n->nilai ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- TAB DISKUSI -->
          <div class="tab-pane fade" id="diskusi" role="tabpanel" aria-labelledby="diskusi-tab">

            <div class="card mg-b-10" id="diskusi-home">
              <div class="card-header pd-t-20 pd-b-0 d-sm-flex align-items-start">
                <i class="fa tx-48 fa-comments-o mg-b-10"></i>
                <div class="mg-l-20">
                  <h4 class="mg-b-5">Forum Diskusi</h4>
                  <p class="tx-16 tx-gray-500">Kamu dapat bertanya, memberi jawaban dan melihat topik yang dibahas dalam kelas ini</p>
                </div>
              </div>
              <div class="card-body pd-20 pd-lg-25 position-relative d-flex align-items-center">
                <div class="wd-80p">
                  <h5 class="tx-lato">Diskusi Umum</h5>
                  <p class="mg-b-0 wd-90p">Diskusi dan tanyakan sesuatu tentang informasi umum di kelas ini.</p>
                  <p class="mg-b-0 tx-14 tx-gray-500">Terbaru <?=tgl($diskusi_kelas->latest_post)?></p>
                </div>
                <p class="wd-10p mg-b-0" style="text-align: center;"><?=$diskusi_kelas->total?><br>topik</p>
                <a href="#diskusi-show" data-id="0" data-nama="<?=$about->nama_kelas?>" class="stretched-link wd-10p btn-diskusi"><i class="fa fa-chevron-right tx-36"></i></a>
              </div>
              <div class="card-header d-sm-flex align-items-start bd-t">
                <h5 class="mg-b-0">Forum Diskusi Per Modul</h5>
              </div>
              <?php foreach($diskusi_modul->result() as $row){ ?>
              <div class="card-body pd-20 pd-lg-25 position-relative d-flex align-items-center bd-b">
                <div class="wd-80p">
                  <h5 class="tx-lato">Modul : <?=$row->nama_modul?></h5>
                  <p class="mg-b-0 wd-90p">Diskusi dan tanyakan sesuatu tentang modul ini.</p>
                  <p class="mg-b-0 tx-14 tx-gray-500">Terbaru <?=tgl($row->latest_post)?></p>
                </div>
                <p class="wd-10p mg-b-0" style="text-align: center;"><?=$row->total?><br>topik</p>
                <a href="#diskusi-show" data-id="<?=$row->id_modul?>" data-nama="<?=$row->nama_modul?>" class="stretched-link wd-10p btn-diskusi"><i class="fa fa-chevron-right tx-36"></i></a>
              </div>
              <?php } ?>
            </div>

            <div id="diskusi-show" class="d-none mg-t-20">
              <div class="profile-update-option bg-white ht-50 bd d-flex justify-content-start mg-lg-b-25 rounded">
                <div class="wd-50 bd-r d-flex align-items-center justify-content-center">
                  <a id="btn-diskusi-back" href="javascript" class="link-03" data-toggle="tooltip" title="Kembali"><i data-feather="arrow-left"></i></a>
                </div>
                <div class="d-none wd-50 bd-r d-flex align-items-center justify-content-center">
                  <a id="btn-diskusi-new" href="javascript:;" class="link-03" data-toggle="tooltip" title="Buat Diskusi Baru"><i data-feather="plus"></i></a>
                </div>
                <div class="d-flex align-items-center pd-x-10 mg-r-auto">
                  <div class="search-form">
                    <input id="keyword" type="search" class="form-control" placeholder="Cari topik diskusi">
                    <button id="btn-search" class="btn" type="button"><i data-feather="search"></i></button>
                  </div>
                </div>
                <div class="d-flex align-items-center mg-r-10">
                  <select id="sort-by" class="form-control select2">
                    <option value="desc">Terbaru</option>
                    <option value="asc">Terlama</option>
                  </select>
                </div>
              </div>

              <form id="form-diskusi" class="d-none">
              <div class="card mg-b-20 mg-lg-b-25">
                <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between position-relative">
                  <h6 class="tx-16 tx-spacing-1 tx-uppercase mg-b-0">Buat Diskusi</h6>
                </div>
                <div class="card-body pd-20 pd-lg-25 bd-b">
                  <input type="hidden" name="id_kelas" value="<?=userdata('id_kelas')?>">
                  <input type="hidden" name="id_konten" value="0">
                  <div class="form-group">
                    <label class="d-block">Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="Judul diskusi">
                  </div>
                  <div class="form-group">
                    <label class="d-block">Isi</label>
                    <textarea name="isi" class="form-control summernote"></textarea>
                  </div>
                  <button type="submit" class="btn btn-outline-primary"><i data-feather="save"></i> Simpan</button>
                </div>
              </div>
              </form>

              <div class="card mg-b-20 mg-lg-b-25">
                <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between position-relative">
                  <h6 class="tx-16 tx-spacing-1 tx-uppercase mg-b-0" id="diskusi-list-title">Diskusi Kelas Ini</h6>
                </div>
                <div id="diskusi-list-body">
                  <!-- list diskusi -->
                </div>
                <div class="card-footer bg-transparent pd-y-15 pd-x-20" id="diskusi-list-footer">
                  <nav class="nav nav-with-icon tx-13">
                    <a href="javascript:;" class="nav-link" id="show-more">
                      Tampilkan lain<i data-feather="chevron-down" class="mg-l-2 mg-r-0 mg-t-2"></i>
                    </a>
                  </nav>
                </div>
              </div>
            </div>

          </div>

          <!-- TAB PENGUMUMAN -->

          <div class="tab-pane fade" id="pengumuman" role="tabpanel" aria-labelledby="pengumuman-tab">
            <div class="card mg-b-10" id="pengumuman-home">
              <div class="card-header pd-t-20 pd-b-0 d-sm-flex align-items-start">
                <i class="fa tx-48 fa-bullhorn mg-b-10"></i>
                <div class="mg-l-20">
                  <h4 class="mg-b-5">Pengumuman</h4>
                  <p class="tx-16 tx-gray-500">Lihat pengumuman terbaru dari pengajar di kelas ini</p>
                </div>
              </div>
              <?php if($pengumuman->num_rows()==0){
                echo '<div class="pd-20">Tidak ada pengumuman saat ini</div>';
              } foreach($pengumuman->result() as $png){ ?>
              <div class="card-body pd-20 pd-lg-25 position-relative bd-b">
                <div class="media align-items-center mg-b-20">
                  <div class="avatar"><img src="<?=avatar($png->foto)?>" class="rounded-circle" alt=""></div>
                  <div class="media-body pd-l-15">
                    <h6 class="mg-b-3"><?=$png->nama_user?></h6>
                    <span class="d-block tx-13 tx-color-03"><?=$png->role='Siswa'?'Pengajar':$png->role?></span>
                  </div>
                  <span class="d-none d-sm-block tx-12 tx-color-03 align-self-start"><?=tgl($png->waktu_post)?></span>
                </div>
                <h6 class="tx-16"><?=$png->judul?></h6>
                <?php // show first paragraph
                preg_match("/<p ?.*>(.*)<\/p>/", $png->isi, $isi);
                echo $isi[1]; ?> <a target="_blank" href="<?=base_url('welcome/pengumuman/'.$png->id_pengumuman)?>" class="stretched-link">Selengkapnya</a>
              </div>
              <?php } ?>
            </div>
          </div>

        </div> <!-- tab-content -->

      </div><!-- container -->
    </div><!-- content-body -->

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>

    <script>
      $(function(){
        'use strict'

        // DISKUSI

        var id_kelas = '<?=userdata('id_kelas')?>';
        var offset = 0;
        var id_modul = 0;
        var keyword = '';
        var sort_by = $('#sort-by').val();

        // choose topik
        $('.btn-diskusi').click(function(e){
          e.preventDefault();
          $('#diskusi-show').removeClass('d-none');
          $('#diskusi-home').addClass('d-none');
          $('#diskusi-list-title').html($(this).data('nama'));
          $('#diskusi-list-body').empty();
          $('#diskusi-list-footer').removeClass('d-none');
          id_modul = $(this).data('id');
          console.log(id_modul);
          offset = 0;
          getDiskusi();
        });

        // search diskusi
        $('#btn-search').click(function(e){
          e.preventDefault();
          keyword = $('#keyword').val();
          offset = 0;
          $('#diskusi-list-body').empty();
          getDiskusi();
        });

        $('#sort-by').change(function(){
          sort_by = $(this).val();
          offset = 0;
          $('#diskusi-list-body').empty();
          getDiskusi();
        });

        // ajax get diskusi
        function getDiskusi(){
          $.ajax({
            url: '<?=base_url('welcome/getDiskusi')?>',
            type: 'POST',
            data: {id_modul:id_modul, id_kelas:id_kelas, offset:offset, keyword:keyword, sort_by:sort_by},
            success: function (result) {
              if(result=='' && offset==0) $('#diskusi-list-body').append('<div class="pd-20">Tidak ada diskusi saat ini</div>');
              $('#diskusi-list-body').append(result);
              if(result=='') $('#diskusi-list-footer').addClass('d-none');
              offset+=10;
            },
            error: function (data){
              swal('Oops', 'Terjadi Kesalahan saat mengambil data diskusi', 'error');
            }
          });
        }

        // button show more
        $('#show-more').click(function(e) {
          e.preventDefault();
          getDiskusi();
        });

        // button back to topik
        $('#btn-diskusi-back').click(function(e){
          e.preventDefault();
          $('#diskusi-show').addClass('d-none');
          $('#diskusi-home').removeClass('d-none');
        });

        // button add new diskusi
        $('#btn-diskusi-new').click(function(e){
          e.preventDefault();
          $('#form-diskusi').toggleClass('d-none');
        })

        // new diskusi submit
        $('#form-diskusi').submit(function(e){
          e.preventDefault();
          var form = $(this);
          $.ajax({
            type: "POST",
            url: "<?=base_url('welcome/simpanDiskusi')?>",
            data: form.serialize(),
            dataType:"json",
            success: function(result){
              swal('Tambah disksui', result.message, result.status);
              if(result.status=='success'){
                form.addClass('d-none');
              }
            },
            error: function(data){
              swal('Oops!', "Terjadi kesalahan", "error");
              console.log(data);
            }
          });
        });

        // text editor
        $('.summernote').summernote({
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen']]
          ],
          height:"200",
          dialogsInBody: true,
          placeholder:"Tuliskan isi disini"
        });

      })
    </script>

  </body>
</html>
