<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dashforge.learning.css">

  </head>
  <body class="app-contact contact-content-visible2">

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>

    <!-- CONTENT -->
    <div class="contact-wrapper">
      <div class="contact-sidebar">
        <div class="contact-sidebar-header">
          <a href="<?=base_url('siswa/kelas')?>" class="btn btn-white btn-icon mg-r-10"><i data-feather="home"></i></a>
          <i data-feather="search"></i>
          <div class="search-form">
            <input type="search" class="form-control" placeholder="Cari modul">
          </div>
        </div>
        <div class="contact-sidebar-body">
          <div class="tab-content">
            <div id="tabContact" class="tab-pane fade active show">
              <div class="pd-y-20 pd-x-10 contact-list">
                <?php foreach($modul->result() as $row){ ?>
                <h5 class="mg-l-5" data-toggle="collapse" href="#collapse<?=$row->id_modul?>" role="button" aria-expanded="false" aria-controls="collapse<?=$row->id_modul?>" style="cursor: pointer;"><?=$row->nama_modul?></h5>
                <div class="collapse mg-t-5 show" id="collapse<?=$row->id_modul?>">
                  <?php $modul_konten=$this->SiswaModel->getKonten($row->id_modul, userdata('id_user'));
                  foreach($modul_konten->result() as $baris){ 
                    if($baris->jenis=='Text'){ $icon='fa-file-text-o'; }
                    elseif($baris->jenis=='Video'){ $icon='fa-play-circle-o'; }
                    elseif($baris->jenis=='Latihan'){ $icon='fa-file-excel-o'; }
                    elseif($baris->jenis=='Tugas'){ $icon='fa-briefcase'; } ?>
                    <div class="media position-relative media-body d-flex align-items-center bd-l bd-b <?= ($baris->id_konten==$konten->id_konten) ? 'active':'' ?>">
                      <i class="fa <?=$icon?> mg-r-10 tx-18"></i>
                      <label class="tx-13 mg-b-0 flex-grow-1"><?=$baris->judul_konten?><a href="<?= ($baris->id_konten==$konten->id_konten||empty($baris->is_finished)) ? 'javascript:;':base_url('siswa/kelas/belajar/'.$baris->id_konten)?>" class="stretched-link" style="<?=(empty($baris->is_finished)&&$baris->id_konten!=$konten->id_konten)?'cursor:not-allowed':''?>"></a></label>
                      <?=($baris->is_finished=='Y')?'<i data-feather="check-circle" class="mg-r-10 tx-16 tx-success"></i>':'<i data-feather="circle" class="mg-r-10 tx-16 tx-gray-500"></i>'?>
                    </div>
                  <?php } ?>
                </div>
                <label class="contact-list-divider"></label>
                <?php } ?>
              </div>
            </div>
          </div>
        </div><!-- contact-sidebar-body -->
      </div><!-- contact-sidebar -->

      <div class="contact-content" id="refresh-width">
        <div class="contact-content-header">
          <a href="javascript:;" id="contactContentHide2" class="btn btn-icon btn-primary"><i data-feather="book-open"></i></a>
          <nav class="nav mg-l-20">
            <a href="#materi" class="nav-link active" data-toggle="tab">Materi</a>
            <a href="#catatan" class="nav-link" data-toggle="tab">Catatan</a>
            <a href="#diskusi" class="nav-link" data-toggle="tab">Diskusi</a>
          </nav>
          <div class="mg-l-auto d-none d-sm-block">
            <?=$prev_button.$next_button?>
          </div>
        </div><!-- contact-content-header -->

        <div class="contact-content-body">
          <div class="tab-content">

            <?php $this->load->view('siswa/view_belajar_materi'); ?>

            <?php $this->load->view('siswa/view_belajar_catatan'); ?>

            <?php $this->load->view('siswa/view_belajar_diskusi'); ?>

          </div><!-- tab-content -->
        </div><!-- contact-content-body -->

      </div><!-- contact-content -->

    </div><!-- contact-wrapper -->

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>
    <script src="<?=base_url()?>assets/js/dashforge.learning.js"></script>

    <script>

      $(function(){
        'use strict'

        // MATERI--------------------------------------------------------------------------

        $('#btn-selesai').click(function(e){
          e.preventDefault();
          var $this = $(this);
          $.ajax({
            url: '<?=base_url('siswa/kelas/tandaiselesai')?>',
            type: 'POST',
            data: {id_konten:'<?=$konten->id_konten?>'},
            success: function (result) {
              $this.addClass('d-none');
              $('#label-selesai').removeClass('d-none');
            },
            error: function (data){
              swal('Oops', 'Terjadi Kesalahan', 'error');
              console.log(data);
            }
          });
        });

        // button upload tugas
        $('#btn-add-tugas').click(function(e){
          e.preventDefault();
          $('#form-tugas').toggleClass('d-none');
          $('#nilai-tugas').addClass('d-none');
          $('#submit-tugas').removeClass('d-none');
        })

        $('#table-tugas').on('click', '.btn-detail-tugas', function(){
          var id = $(this).data('id');
          $.ajax({
            url: '<?=base_url('siswa/kelas/getTugas')?>',
            type: 'POST',
            data: {id:id},
            dataType: 'json',
            success: function (result) {
              $('#form-tugas').removeClass('d-none');
              $('#nilai-tugas').removeClass('d-none');
              $('#tgs-nilai').html(result.nilai);
              $('#tgs-status').html(result.status);
              $('#tgs-reviewer').html(result.reviewer);
              $('#tgs-waktu').html(result.waktu);
              $('#id-sesi-tugas').val(result.id);
              $('#summernote-tugas').summernote("code", result.jawaban);
              if(result.nilai>0){ $('#submit-tugas').addClass('d-none'); }
              else{ $('#submit-tugas').removeClass('d-none'); }
            },
            error: function (data){
              swal('Oops', 'Terjadi Kesalahan saat mengambil data', 'error');
              console.log(data);
            }
          });
        })

        $('#summernote-tugas').summernote({
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']]
            ],
          height:"450",
          dialogsInBody: true,
          placeholder:"Tuliskan jawaban kamu disini",
          callbacks: {
            onImageUpload: function(images) {
              var $images = $(images);
              var $this = $(this);
              uploadImage($images, $this);
            },
            onMediaDelete: function(target) {
              deleteImage(target);
            }
          }
        });

        $('#form-tugas').submit(function(e){
          e.preventDefault();
          var form = $(this);
          $.ajax({
            type: "POST",
            url: "<?=base_url('siswa/kelas/simpanTugas')?>",
            data: form.serialize(),
            dataType:"json",
            success: function(result){
              swal('Tambah Tugas', result.message, result.status);
              if(result.status=='success'){
                $(result.html).prependTo("#table-tugas > tbody");
                form.addClass('d-none');
              }
            },
            error: function(data){
              swal('Oops!', "Terjadi kesalahan", "error");
              console.log(data);
            }
          });
        })

        // CATATAN ---------------------------------------------------------------------------

        $('.summernote').summernote({
          toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']]
            ],
          height:"100",
          dialogsInBody: true,
          placeholder:"Tuliskan catatan disini"
        });

        $('#save-catatan').click(function(e){
          e.preventDefault();
          $.ajax({
            url: '<?=base_url('siswa/kelas/simpancatatan')?>',
            type: 'POST',
            data: {id_konten:'<?=$konten->id_konten?>', catatan_siswa:$('#catatan_siswa').summernote('code')},
            dataType: 'json',
            success: function (result) {
              swal('Simpan Catatan', result.message, result.status);
            },
            error: function (data){
              swal('Oops!', "Terjadi kesalahan", "error");
            }
          });
        });

        // DISKUSI--------------------------------------------------------------------------

        var offset = 0;
        var id_kelas = '<?=userdata("id_kelas")?>';
        var id_konten = '<?=$konten->id_konten?>';
        var keyword = '';
        var sort_by = $('#sort-by').val();
        getDiskusi();

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

        function getDiskusi(){
          $.ajax({
            url: '<?=base_url('welcome/getDiskusi')?>',
            type: 'POST',
            data: {id_konten:id_konten, id_kelas:id_kelas, offset:offset, keyword:keyword, sort_by:sort_by},
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

        $('#show-more').click(function(e) {
          e.preventDefault();
          getDiskusi();
        });

        $('#btn-diskusi-new').click(function(e){
          e.preventDefault();
          $('#form-diskusi').toggleClass('d-none');
        })

        $('.summernote2').summernote({
          toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']]
            ],
          height:"100",
          dialogsInBody: true,
          placeholder:"Tuliskan diskusi disini",
          callbacks: {
            onImageUpload: function(images) {
              var $images = $(images);
              var $this = $(this);
              uploadImage($images, $this);
            },
            onMediaDelete: function(target) {
              deleteImage(target);
            }
          }
        });

        $('#form-diskusi').submit(function(e){
          e.preventDefault();
          var form = $(this);
          $.ajax({
            type: "POST",
            url: "<?=base_url('welcome/simpanDiskusi')?>",
            data: form.serialize(),
            dataType:"json",
            success: function(result){
              swal('Tambah Diskusi', result.message, result.status);
              if(result.status=='success'){
                form.addClass('d-none');
                form.trigger("reset");
              }
            },
            error: function(data){
              swal('Oops!', "Terjadi kesalahan", "error");
            }
          });
        })

      });
    </script>

  </body>
</html>
