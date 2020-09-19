<?php
if(!empty($latihan)){
  $id_konten    = $latihan->id_konten;
  $judul_konten = $latihan->judul_konten;
  $latihan_jumlah_soal  = $latihan->latihan_jumlah_soal;
  $latihan_passing_grade= $latihan->latihan_passing_grade;
  $latihan_has_timer= $latihan->latihan_has_timer;
  $durasi_belajar= $latihan->durasi_belajar;
  $catatan      = $latihan->catatan;
}else{
  $id_konten = $judul_konten = $latihan_jumlah_soal = $latihan_passing_grade = $latihan_has_timer = $durasi_belajar = $catatan = "";
}
?>

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
              <div class="card mg-b-20">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="mg-b-0">Detail Latihan</h6>
                  <div class="d-flex align-items-center tx-18">
                    <a class="link-03 lh-0" data-toggle="collapse" href="#collapseDetail" role="button" aria-expanded="false" aria-controls="collapseDetail"><i data-feather="menu" data-toggle="tooltip" data-placement="top" title="Minimize"></i></a>
                  </div>
                </div>
                <div class="card-body collapse show" id="collapseDetail">
                  <form id="form-latihan" method="post">
                    <?= !empty(validation_errors()) ? '<label class="tx-danger">'.validation_errors().'</label>' : ''?>
                    <div class="form-group">
                      <label class="d-block">Judul Latihan</label>
                      <input type="hidden" name="id_konten" value="<?=input('id_konten',$id_konten)?>" />
                      <input type="text" name="judul_konten" value="<?=input('judul_konten',$judul_konten)?>" class="form-control" placeholder="Misal: Codeigniter for Beginner">
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-3">
                        <label class="d-block">Jumlah soal saat siswa latihan</label>
                        <input type="number" name="latihan_jumlah_soal" value="<?=input('latihan_jumlah_soal',$latihan_jumlah_soal)?>" class="form-control" placeholder="Misal: 10">
                      </div>
                      <div class="form-group col-lg-3">
                        <label class="d-block">Passing Grade (dalam %)</label>
                        <input type="number" name="latihan_passing_grade" value="<?=input('latihan_passing_grade',$latihan_passing_grade)?>" class="form-control" placeholder="Misal: 70">
                      </div>
                      <div class="form-group col-lg-3">
                        <label class="d-block">Durasi pengerjaan (dalam menit)</label>
                        <input type="number" name="durasi_belajar" value="<?=input('durasi_belajar',$durasi_belajar)?>" class="form-control" placeholder="Misal: 60">
                      </div>
                      <div class="form-group col-lg-3">
                        <label class="d-block">Timer Latihan</label>
                        <div class="custom-control custom-switch">
                          <input name="latihan_has_timer" value="Y" type="checkbox" <?= ($latihan_has_timer=='Y') ? 'checked':'' ?> class="custom-control-input" id="customSwitch1">
                          <label id="label-switch" class="custom-control-label tx-16" for="customSwitch1" data-toggle="tooltip" data-placement="top" title="Aktifkan jika saat ujian ada durasi pengerjaan"> &nbsp</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="d-block">Catatan Tambahan</label>
                      <textarea name="catatan" class="form-control summernote"><?=input('catatan',$catatan)?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                  </form>
                </div>
              </div>

              <?php if(!empty($latihan)){ ?>

              <div class="row mg-t-20">
                <div class="col-lg-12 col-xl-12">
                  <div class="card mg-b-20 pd-20">
                    <div class="card-header d-sm-flex align-items-start justify-content-between bd-b">
                      <h5>Soal Latihan</h5>
                      <div class="d-flex mg-t-20 mg-sm-t-0">
                        <div class="btn-group flex-fill">
                          <a href="javascript:;" class="btn btn-outline-primary btn-xs" id="btn-add"><i class="fa fa-plus"></i> <span class="d-none d-md-inline">Tambah Soal</span></a>
                          <a href="<?=base_url('modul/cetaksoal/'.$id_konten)?>" class="btn btn-outline-primary btn-xs"><i class="fa fa-print"></i> <span class="d-none d-md-inline">Cetak Semua Soal</span></a>
                        </div>
                      </div>
                    </div><!-- card-header -->
                    <div class="table-responsive mg-t-20">
                      <table class="table table-dashboard table-secondary mg-b-0" id="table-soal">
                        <thead>
                          <tr>
                            <th class="wd-5p">No</th>
                            <th>Pertanyaan</th>
                            <th>Jenis</th>
                            <th class="wd-10p">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- tr soal -->
                        </tbody>
                      </table>
                    </div><!-- table-responsive -->
                  </div><!-- card -->
                </div><!-- col -->
              </div>

              <?php
              if(!empty($soal_pertanyaan)){
                $id_soal    = $soal_pertanyaan->id_soal;
                $jenis_soal = $soal_pertanyaan->jenis_soal;
                $soal       = $soal_pertanyaan->soal;
                $pembahasan = $soal_pertanyaan->pembahasan;
              }else{
                $id_soal = $jenis_soal = $soal = $pembahasan = "";
              }
              ?>

              <form id="tambahSoal" method="post">
              <fieldset class="form-fieldset">
                <legend id="form-legend">Tambah Soal</legend>
                <div class="form-group wd-lg-40p">
                  <label class="d-block">Jenis Soal</label>
                  <select class="custom-select select2" name="jenis_soal" id="selectJenis" required="">
                    <option value="">Pilih Jenis Soal</option>
                    <option value="radio" <?= ($jenis_soal=='radio') ? 'selected' : '' ?> >Pilih Satu Benar (Radio Button)</option>
                    <option value="checkbox" <?= ($jenis_soal=='checkbox') ? 'selected' : '' ?> >Pilih Semua Benar (Checkbox)</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="d-block">Pertanyaan</label>
                  <input type="hidden" name="id_modul" value="<?=$id_modul?>"/>
                  <input type="hidden" name="id_konten" value="<?=input('id_konten',$id_konten)?>"/>
                  <input type="hidden" name="id_soal" value="<?=input('id_soal',$id_soal)?>" id="id_soal_tambah"/>
                  <textarea name="soal" class="form-control summernote" id="soal_tambah" required=""><?=input('soal',$soal)?></textarea>
                </div>
                <div id="jawabanList">
                  <!-- list jawaban -->
                </div>
                <button id="buttonAddMoreAnswer" type="button" class="btn btn-block btn-outline-primary mg-t-20 mg-b-20 d-none"><i class="fa fa-plus"></i> Tambah Jawaban Lain</button>
                <div class="form-group">
                  <label class="d-block">Pembahasan Jawaban</label>
                  <textarea name="pembahasan" class="form-control summernote" id="pembahasan_tambah"><?=input('pembahasan',$pembahasan)?></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-save"></i> Simpan</button>
              </fieldset>
              </form>

              <?php } ?>

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

        // minimize sidemenu
        if(window.matchMedia('(min-width: 1200px)').matches) {
          $('.aside').addClass('minimize');
        }

        // add back button on top
        $('.filemgr-content-header').children('nav').append(
          '<a href="<?=base_url('modul')?>" class="btn btn-white"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Kembali"></i> <span class="d-none d-md-inline">Kembali</span></a>');

        <?php if(!empty($latihan)){ ?>
        getSoal();
        <?php } ?>

        // get soal
        function getSoal(){
          $('#table-soal > tbody').empty();
          $.ajax({
            url: "<?=base_url('modul/getSoal/'.$id_konten)?>",
            success: function(result){
              $('#table-soal > tbody').append(result);
            },
            error: function(data){
              swal('Oops!', "Terjadi kesalahan saat mengambil data soal", "error");
            }
          });
        }

        function resetFormSoal(){
          $('#form-legend').html('Tambah Soal');
          $('#selectJenis').val('').trigger('change');
          $('#id_soal_tambah').val('');
          $('#soal_tambah').summernote('code', '');
          $('#pembahasan_tambah').summernote('code', '');
          $('#jawabanList').empty();
          $('#buttonAddMoreAnswer').addClass('d-none');
          $('body').animate({scrollTop: $('#tambahSoal').offset().top},'slow');
        }

        $('#btn-add').click(function(e){
          e.preventDefault();
          resetFormSoal();
        })

        // edit soal
        $('tbody').on('click', '.edit-btn', function(e){
          e.preventDefault();
          $('#buttonAddMoreAnswer').removeClass('d-none');
          var id = $(this).data('id');
          $.ajax({
            type: "POST",
            url: "<?=base_url('modul/getSoalById')?>",
            data: {id_soal:id},
            dataType:"json",
            success: function(result){
              $('#form-legend').html('Ubah Soal');
              $('#selectJenis').val(result.soal.jenis_soal).trigger('change');
              $('#id_soal_tambah').val(result.soal.id_soal);
              $('#soal_tambah').summernote('code', result.soal.soal);
              $('#pembahasan_tambah').summernote('code', result.soal.pembahasan);
              $('#jawabanList').empty().append(result.jawaban);
              initSummernoteJawaban();
              $('body').animate({scrollTop: $('#tambahSoal').offset().top},'slow');
            },
            error: function(data){
              swal('Oops!', "Terjadi kesalahan saat mengambil data soal", "error");
            }
          });
        });

        // delete soal
        function deleteRow($this){
          $this.closest('tr').remove();
        }
        $('tbody').on('click', '.delete-btn', function(e){
          e.preventDefault();
          var id = $(this).data('id');
          var url = '<?=base_url('modul/hapussoal')?>';
          var el = $(this);
          swalDelete(id, url, function(){
            deleteRow(el);
          });
        });

        // text editor
        $('.summernote').summernote({
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen']]
          ],
          height:"200",
          placeholder:"Tuliskan disini",
          dialogsInBody: true,
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

        // pilih jenis soal
        var jenis_soal, id;
        $('#selectJenis').change(function(){
          jenis_soal = $(this).val();
          id = 1;
          $('#jawabanList').empty();
          $('#buttonAddMoreAnswer').removeClass('d-none');
          $('#jawabanList').append(jawabanHTML(jenis_soal, id++));
          $('#jawabanList').append(jawabanHTML(jenis_soal, id++));
          initSummernoteJawaban();
        })
        
        // tambah field jawaban
        $('#buttonAddMoreAnswer').click(function() {
          $('#jawabanList').append(jawabanHTML(jenis_soal, id++));
          initSummernoteJawaban();
        });

        // hapus field jawaban
        $('#jawabanList').on('click', '.hapus-jawaban', function(){
          $(this).closest('.div-soal').remove();
        });

        // form tambah soal
        $(document).on('submit', '#tambahSoal', function(e){
          e.preventDefault();
          var form = $(this).serializeArray();
          $('.benar_tambah').each(function(i, obj) {
            var bnr = 'N';
            if($(this).is(':checked')) { bnr = 'Y'; }
            form.push({name: 'is_benar[]', value: bnr});
          });
          form = jQuery.param(form);
          $.ajax({
            type: "POST",
            url: "<?=base_url('modul/simpanLatihanSoal')?>",
            data: form,
            dataType:"json",
            success: function(result){
              if(result.status=='success'){
                getSoal();
                resetFormSoal();
              }
              swal('Detail Soal', result.message, result.status);
            },
            error: function(data){
              swal('Oops!', "Terjadi kesalahan", "error");
            }
          });
        });

        // Populate Jawaban Layout
        function jawabanHTML(jenis_soal, id){
          return '<div class="div-soal"><div class="d-flex justify-content-between mg-b-10">Jawaban<button class="btn btn-xs btn-icon btn-outline-danger hapus-jawaban"><i class="fa fa-trash"></i></button></div>'+
          '<div class="row mg-b-20">'+
            '<input type="hidden" name="id_jawaban[]" value="" required>'+
            '<div class="form-group col-xs-1 col-lg-1"><div class="custom-control custom-'+jenis_soal+'"><input type="'+jenis_soal+'" name="benar[]" value="Y" class="custom-control-input benar_tambah" id="custom'+id+'"><label class="custom-control-label" for="custom'+id+'"></label></div></div>'+
            '<div class="form-group col-xs-11 col-lg-11"><textarea name="jawaban_text[]" class="form-control summernote2"></textarea></div>'+
          '</div></div>';
        }

        function initSummernoteJawaban(){
          $('.summernote2').summernote({
            // airMode: true,
            toolbar: [
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['insert', ['link', 'picture', 'video']]
              ],
            height:"75",
            placeholder:"Tuliskan disini",
            dialogsInBody: true,
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
        }

      });

    </script>

  </body>
</html>
