<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.filemgr.css">

  </head>
  <body class="app-filemgr">

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>
    
    <!-- CONTENT -->
      <!-- Inner Menu -->
      <?php $this->load->view('pengajar/_inner_menu') ?>

              <!-- Content -->
              <div class="card mg-b-10" id="diskusi-home">
                <div class="card-body pd-20 pd-lg-25 position-relative d-flex align-items-center">
                  <div class="wd-80p">
                    <h5 class="tx-lato">Diskusi Umum</h5>
                    <p class="mg-b-0 wd-90p">Diskusi dan tanyakan sesuatu tentang informasi umum di kelas ini.</p>
                    <p class="mg-b-0 tx-14 tx-gray-500">Terbaru <?=tgl($diskusi_kelas->latest_post)?></p>
                  </div>
                  <p class="wd-10p mg-b-0" style="text-align: center;"><?=$diskusi_kelas->total?><br>topik</p>
                  <a href="#diskusi-show" data-id="0" data-nama="<?=userdata('nama_kelas')?>" class="stretched-link wd-10p btn-diskusi"><i class="fa fa-chevron-right tx-36"></i></a>
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

              <div id="diskusi-show" class="d-none">
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
                        <input type="text" name="judul" class="form-control" placeholder="Judul diskusi">
                      </div>
                      <div class="form-group">
                        <textarea name="isi" class="form-control summernote"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
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

              <!-- Inner Menu Closed Tag-->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>
    <script src="<?=base_url()?>assets/js/dashforge.filemgr.js"></script>

    <script>
      
      $('.navbar-header').append('<a href="" id="filemgrMenu" class="burger-menu d-lg-none"><i data-feather="arrow-left"></i></a>');

      $(function(){
        'use strict'

        // add save button on top
        // $('.filemgr-content-header').children('nav').append(
        //   '<a href="<?=base_url()?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus"></i> Buat Baru</a>');

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
            url: '<?=base_url('welcome/getDiskusi/all')?>',
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
