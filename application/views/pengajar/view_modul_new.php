
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
              <div class="row">
                <div class="col-md-12 col-xl-12 mg-t-10" id="listModul">

                  <?php foreach($modul->result_array() as $row){ ?>

                  <div data-id="<?=$row['id_modul']?>" class="card mg-b-20 <?= ($row['is_aktif']=='Y') ? '' : 'bg-gray-300' ?>">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h6 class="mg-b-0">Modul : <?=$row['nama_modul']?></h6>
                      <div class="d-flex align-items-center tx-18">
                        <a class="link-03 lh-0" data-toggle="collapse" href="#collapseDetail<?=$row['id_modul']?>" role="button" aria-expanded="false" aria-controls="collapseDetail"><i data-feather="edit-2" data-toggle="tooltip" data-placement="top" title="Ubah Modul"></i></a>
                        <a class="link-03 lh-0 mg-l-10" data-toggle="collapse" href="#collapseContent<?=$row['id_modul']?>" role="button" aria-expanded="false" aria-controls="collapseContent"><i data-feather="minimize-2" data-toggle="tooltip" data-placement="top" title="Minimize konten"></i></a>
                        <a href="javascript:;" class="link-03 lh-0 mg-l-10 toggleModulAktif" data-toggle="tooltip" data-placement="top" title="Publish Modul"><i data-feather="<?= ($row['is_aktif']=='Y') ? 'eye' : 'eye-off' ?>"></i></a>
                        <a href="javascript:;" class="link-03 lh-0 mg-l-10 hapusModul" data-id="<?=$row['id_modul']?>"><i data-feather="trash" data-toggle="tooltip" data-placement="top" title="Hapus modul"></i></a>
                        <a href="javascript:;" class="link-03 lh-0 mg-l-10 sortable-modul-handler" style="cursor: move; cursor: -webkit-grabbing;"><i data-feather="menu" data-toggle="tooltip" data-placement="top" title="Tahan dan Geser untuk Urutkan"></i></a>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="collapse mg-b-20" id="collapseDetail<?=$row['id_modul']?>">
                        <fieldset class="form-fieldset">
                          <legend>Ubah</legend>
                          <form class="formModulUbah">
                            <div class="form-group">
                              <label class="d-block">Judul Modul</label>
                              <input type="hidden" name="id_modul" value="<?=$row['id_modul']?>">
                              <input type="text" name="nama_modul" class="form-control" value="<?=$row['nama_modul']?>" placeholder="Misal. Pendahuluan" required>
                            </div>
                            <div class="form-group">
                              <label class="d-block">Apa yang akan dipelajari dari kelas ini?</label>
                              <textarea name="deskripsi_singkat" class="form-control" placeholder="Misal. PHP, Codeigniter, Konsep MVC"><?=$row['deskripsi_singkat']?></textarea>
                            </div>
                            <div class="text-right">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                          </form>
                        </fieldset>
                      </div>
                      <div class="collapse show" id="collapseContent<?=$row['id_modul']?>">
                        <ul class="list-group tx-13 listContent">
                          <li class="list-group-item d-flex pd-sm-x-20">
                            <a href="<?=base_url('modul/materidetail/'.$row['id_modul'])?>" class="btn btn-xs btn-outline-primary"><i class="fa fa-plus"></i> Materi</a>
                            <a href="<?=base_url('modul/latihandetail/'.$row['id_modul'])?>" class="btn btn-xs btn-outline-primary mg-l-10"><i class="fa fa-plus"></i> Latihan</a>
                            <a href="<?=base_url('modul/tugasdetail/'.$row['id_modul'])?>" class="btn btn-xs btn-outline-primary mg-l-10"><i class="fa fa-plus"></i> Tugas</a>
                            <div class="mg-l-auto d-flex align-self-center">
                              <nav class="nav nav-icon-only">
                                <a href="javascript:;" class="nav-link d-none collapseContentSave">Simpan Urutan <i data-feather="save"></i></a>
                              </nav>
                            </div>
                          </li>

                          <?php $modul_konten = $this->MyModel->get('modul_konten', 'id_konten, id_modul, judul_konten, jenis, no_urut, status, durasi_belajar', array('id_modul'=>$row['id_modul']), 'no_urut asc');
                          foreach($modul_konten->result_array() as $baris){ ?>

                          <li data-id="<?=$baris['id_konten']?>" class="list-group-item d-flex pd-sm-x-20 <?= ($baris['status']=='Y') ? '' : 'bg-gray-300' ?>">
                            <div class="avatar"><span class="avatar-initial rounded-circle bg-teal"><?=$baris['jenis'][0]?></span></div>
                            <div class="pd-l-10">
                              <p class="tx-medium mg-b-0"><?=$baris['judul_konten']?></p>
                              <small class="tx-12 tx-color-03 mg-b-0"><?=$baris['jenis']?></small>
                            </div>
                            <div class="mg-l-auto d-flex align-self-center">
                              <nav class="nav nav-icon-only">
                                <?php if($baris['jenis']=='Text' || $baris['jenis']=='Video'){ $page='materi'; }
                                else{ $page=$baris['jenis']; } ?>
                                <a href="<?=base_url('modul/'.$page.'Detail/'.$row['id_modul'].'/'.$baris['id_konten'])?>" class="nav-link" data-toggle="tooltip" data-placement="top" title="Ubah Konten"><i data-feather="edit-2"></i></a>
                                <a href="javascript:;" class="nav-link toggleKontenAktif" data-toggle="tooltip" data-placement="top" title="Publish Modul"><i data-feather="<?= ($baris['status']=='Y') ? 'eye' : 'eye-off' ?>"></i></a>
                                <a href="javascript:;" class="nav-link hapusKonten" data-id="<?=$baris['id_konten']?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i data-feather="trash"></i></a>
                                <a href="javascript:;" class="nav-link sortable-content-handler" style="cursor: move; cursor: -webkit-grabbing;" data-toggle="tooltip" data-placement="top" title="Tahan dan Geser untuk Urutkan"><i data-feather="menu"></i></a>
                              </nav>
                            </div>
                          </li>

                          <?php } ?>

                        </ul>
                      </div>
                    </div>
                  </div>

                  <?php } ?>

                </div>
                <div class="col-md-12 col-xl-12">
                  <fieldset class="form-fieldset" id="tambahModul">
                    <legend>Tambah Modul</legend>
                    <form method="post">
                      <div class="form-group">
                        <label class="d-block">Judul Modul</label>
                        <input type="text" name="nama_modul" class="form-control" placeholder="Misal. Pendahuluan" required="">
                      </div>
                      <div class="form-group">
                        <label class="d-block">Apa yang akan dipelajari dari modul ini?</label>
                        <textarea name="deskripsi_singkat" class="form-control" placeholder="Misal. PHP, Codeigniter, Konsep MVC"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                    </form>
                  </fieldset>
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
    <script src="<?=base_url()?>lib/sortable/Sortable.min.js"></script>
    <script src="<?=base_url()?>lib/sortable/jquery-sortable.js"></script>

    <script>

      $('.navbar-header').append('<a href="javascript:;" id="filemgrMenu" class="burger-menu d-lg-none"><i data-feather="arrow-left"></i></a>');

      $(function(){
        'use strict'

        if(window.matchMedia('(min-width: 1200px)').matches) {
          $('.aside').addClass('minimize');
        }

        // add save button on top
        $('.filemgr-content-header').children('nav').append(
          '<a href="#tambahModul" class="btn btn-outline-primary"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Modul Baru"></i> <span class="d-none d-md-inline">Modul Baru</span></a>'+
          '<a href="javascript:;" class="btn btn-outline-secondary d-none mg-l-10" id="collapseModulSave"><i class="fa fa-save" data-toggle="tooltip" data-placement="top" title="Simpan Urutan"></i> <span class="d-none d-md-inline">Simpan Urutan</span></a>');

        // List modul
        var sortableModul = Sortable.create(listModul, {
          handle: '.sortable-modul-handler',
          dataIdAttr: 'data-id',
          animation: 150,
          onEnd: function(evt) {
            $('#collapseModulSave').removeClass('d-none');
          }
        });

        // button save urutan
        $('#collapseModulSave').click(function(e) {
          e.preventDefault();
          var sorted = sortableModul.toArray();
          var $this = $(this);
          $.ajax({
            url: '<?=base_url('modul/urutkanModul')?>',
            type: 'POST',
            data: {'sorted': sorted.toString()},
            success: function (result) {
              swal('Berhasil!', "Data berhasil ditambah", "success");
              $this.addClass('d-none');
            },
            error: function (data){
              swal('Oops!', "Terjadi kesalahan", "error");
              console.log(data)
            }
          });
        });

        // toggle aktif
        $('.toggleModulAktif').click(function(e) {
          e.preventDefault();
          var $thisButton = $(this);
          var $thisCard = $(this).closest('.card');
          var is_aktif = 'N';
          if($thisCard.hasClass('bg-gray-300')){
            is_aktif = 'Y';
          }
          $.ajax({
            url: '<?=base_url('modul/toggleModulAktif')?>',
            type: 'POST',
            data: {'id_modul':$thisCard.data('id'), 'is_aktif':is_aktif },
            dataType: 'json',
            success: function (result) {
              swal('Publish Modul', result.message, result.status);
              $thisCard.toggleClass('bg-gray-300');
              if(is_aktif=='Y'){
                $thisButton.html('<i data-feather="eye"></i>');
                $thisButton.prop('title', 'Modul di Publish');
              }else{
                $thisButton.html('<i data-feather="eye-off"></i>');
                $thisButton.prop('title', 'Modul tidak Publish. Tekan untuk publish!');
              }
              feather.replace();
            },
            error: function (data){
              swal('Oops!', "Terjadi kesalahan", "error");
              console.log(data);
            }
          });
        });

        // list konten
        var listContent = $('.listContent');
        var saveContent = $('.collapseContentSave');
        var sortableContent = [];
        $('.listContent').each(function(i, obj) {
          var ind = i;
          var sc = Sortable.create(listContent[ind], {
            handle: '.sortable-content-handler',
            dataIdAttr: 'data-id',
            animation: 150,
            onEnd: function(evt) {
              $(saveContent[ind]).removeClass('d-none');
            }
          });
          sortableContent.push(sc);
        });

        // save urutan konten
        $('.collapseContentSave').each(function(i, obj) {
          var indice = i;
          var $this = $(this);
          $this.click(function(e) {
            var sorted = sortableContent[indice].toArray();
            $.ajax({
              url: '<?=base_url('modul/urutkanKonten')?>',
              type: 'POST',
              data: {'sorted': sorted.toString()},
              success: function (result) {
                swal('Berhasil!', "Data berhasil ditambah", "success");
                $this.addClass('d-none');
              },
              error: function (){
                swal('Oops!', "Terjadi kesalahan", "error");
              }
            });
          });
        });

        // toggle aktif
        $('.toggleKontenAktif').click(function(e) {
          e.preventDefault();
          var $thisButton = $(this);
          var $thisList = $(this).closest('.list-group-item');
          var status = 'N';
          if($thisList.hasClass('bg-gray-300')){
            status = 'Y';
          }
          $.ajax({
            url: '<?=base_url('modul/toggleKontenAktif')?>',
            type: 'POST',
            data: {'id_konten':$thisList.data('id'), 'status':status },
            dataType: 'json',
            success: function (result) {
              swal('Publish Konten', result.message, result.status);
              $thisList.toggleClass('bg-gray-300');
              if(status=='Y'){
                $thisButton.html('<i data-feather="eye"></i>');
              }else{
                $thisButton.html('<i data-feather="eye-off"></i>');
              }
              feather.replace();
            },
            error: function (data){
              swal('Oops!', "Terjadi kesalahan", "error");
              console.log(data);
            }
          });
        });

        // delete modul
        function deleteCard($this){
          $this.closest('.card').remove();
        }
        $('#listModul').on('click', '.hapusModul', function(e){
          e.preventDefault();
          var id = $(this).data('id');
          var url = '<?=base_url('modul/hapusModul')?>';
          var el = $(this);
          swalDelete(id, url, function(){
            deleteCard(el);
          });
        });

        // delete modul
        function deleteKonten($this){
          $this.closest('.list-group-item').remove();
        }
        $('.listContent').on('click', '.hapusKonten', function(e){
          e.preventDefault();
          var id = $(this).data('id');
          var url = '<?=base_url('modul/hapusKonten')?>';
          var el = $(this);
          swalDelete(id, url, function(){
            deleteKonten(el);
          });
        });

        $(".formModulUbah").submit(function(e) {
          e.preventDefault();
          var form = $(this);
          $.ajax({
            type: "POST",
            url: "<?=base_url('modul/simpanDetail')?>",
            data: form.serialize(),
            dataType:"json",
            success: function(result){
              swal('Ubah Modul', result.message, result.status);
            },
            error: function(data){
              swal('Oops!', "Terjadi kesalahan", "error");
            }
          });
        });

      });

    </script>

  </body>
</html>
