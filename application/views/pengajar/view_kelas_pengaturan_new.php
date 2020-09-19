<?php
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
              <div class="row">

                <div class="col-lg-6">
                  <div class="card mg-b-20">
                    <div class="card-header bd-b">
                      <h5 class="mg-b-0">Informasi Umum</h5>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between pd-b-10 mg-b-10 bd-b">
                        <div>
                          <span class="mg-b-0 tx-16">Aktifkan Kelas <i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="right" title="Aktif = Tampil di pencarian kelas"></i></span>
                          <span id="aktif-info" class="tx-danger d-none <?= ($kelas->is_aktif=='N') ? 'd-md-block':'' ?>">Kelas saat ini non-aktif (tidak tampil di pencarian kelas)</span>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" <?= ($kelas->is_aktif=='Y') ? 'checked':'' ?> class="custom-control-input" id="customSwitch1">
                          <label id="label-switch" class="custom-control-label tx-16" for="customSwitch1"> &nbsp</label>
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between pd-b-10 mg-b-10 bd-b">
                        <div>
                          <span class="mg-b-0 tx-16">Buka Pendaftaran</span>
                          <span id="pendaftaran-info" class="tx-danger d-none <?= ($kelas->is_buka_pendaftaran=='N') ? 'd-md-block':'' ?>">Kelas saat ini tidak buka pendaftaran siswa baru</span>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" <?= ($kelas->is_buka_pendaftaran=='Y') ? 'checked':'' ?> class="custom-control-input" id="customSwitch2">
                          <label id="label-switch" class="custom-control-label tx-16" for="customSwitch2"> &nbsp</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card mg-b-20">
                    <div class="card-header bd-b">
                      <h5 class="mg-b-0">Harga</h5>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="mg-b-0 form-row">
                        <div class="form-group col-sm-5">
                          <label>Harga</label>
                          <input type="text" id="harga" name="harga" value="<?=$kelas->harga?>" class="form-control" placeholder="Misal. 200000">
                        </div>
                        <div class="form-group col-sm-3">
                          <label>Diskon (%)</label>
                          <input type="number" id="diskon" name="diskon" value="<?=$kelas->diskon?>" class="form-control" placeholder="Misal 20">
                        </div>
                        <div class="form-group col-sm-3">
                          <label class="d-none d-sm-block">&nbsp;</label>
                          <input type="submit" id="btn-submit-harga" class="btn btn-primary" name="submit" value="Simpan">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="card mg-b-20">
                    <div class="card-header bd-b">
                      <h5 class="mg-b-0">Pengajar</h5>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-dashboard table-primary mg-b-0" id="table-pengajar">
                          <thead>
                            <tr>
                              <th>Nama</th>
                              <th>Ditambahkan</th>
                              <th>Role</th>
                              <th>Akses</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($pengajar->result_array() as $row){ ?>
                            <tr>
                              <td class="tx-medium"><?=$row['nama_user']?></td>
                              <td class="tx-color-03"><?=tgl($row['waktu_post'])?></td>
                              <td class=""><?=$row['role']?></td>
                              <td class="tx-color-03"><?=$row['has_access']?></td>
                              <td>
                                <?php if($row['role']!='Utama'){ ?>
                                  <div class="dropdown d-inline">
                                    <button class="btn btn-secondary btn-xs btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flag"></i> </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item <?=$row['has_access']=='Y'?'active':''?>" href="<?=base_url('kelas/aksespengajar/'.$row['id'].'/Y')?>">Y</a>
                                      <a class="dropdown-item <?=$row['has_access']=='N'?'active':''?>" href="<?=base_url('kelas/aksespengajar/'.$row['id'].'/N')?>">N</a>
                                    </div>
                                  </div>
                                  <button type="button" class="btn btn-icon btn-danger btn-xs delete-btn" data-id="<?=$row['id']?>"><i class="fa fa-trash"></i></button>
                                <?php } ?>
                              </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <form id="tambahPengajar" class="mg-t-20">
                        <fieldset class="form-fieldset">
                          <legend>Tambah Pengajar</legend>
                          <div class="form-group">
                            <div class="search-form">
                              <input type="hidden" id="id_user" name="id_user">
                              <input id="bloodhound" type="search" class="form-control" placeholder="Cari nama pengajar">
                            </div>
                          </div>
                          <button type="submit" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah</button>
                        </fieldset>
                      </form>
                    </div>
                  </div><!-- card -->
                </div>

              </div> <!-- row -->

              <!-- Inner Menu Closed Tag-->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>
    <script src="<?=base_url()?>lib/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="<?=base_url()?>lib/handlebars/handlebars.min.js"></script>
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
        // $('.filemgr-content-header').children('nav').append('<a href="'+url+'" class="btn btn-outline-danger"><i class="fa fa-times"></i> Kembali</a>');

        // switch is_aktif
        $("#customSwitch1").change(function() {
          var is_aktif = 'N';
          if(this.checked) { 
            is_aktif = 'Y';
          }
          $.ajax({
            data: {is_aktif : is_aktif},
            type: "POST",
            url: "<?=base_url('kelas/nonaktifkan')?>",
            success: function(response) {
              swal('Berhasil', 'Perubahan disimpan', 'success');
              $('#aktif-info').toggleClass('d-md-block');
              console.log(response);
            },
            error: function(data) {
              swal('Oops', 'Terjadi kesalahan, coba lagi!', 'error');
              console.log(data);
            }
          });
        });

        // switch buka_pendaftaran
        $("#customSwitch2").change(function() {
          var is_buka_pendaftaran = 'N';
          if(this.checked) { 
            is_buka_pendaftaran = 'Y';
          }
          $.ajax({
            data: {is_buka_pendaftaran : is_buka_pendaftaran},
            type: "POST",
            url: "<?=base_url('kelas/bukapendaftaran')?>",
            success: function(response) {
              swal('Berhasil', 'Perubahan disimpan', 'success');
              $('#pendaftaran-info').toggleClass('d-md-block');
              console.log(response);
            },
            error: function(data) {
              swal('Oops', 'Terjadi kesalahan, coba lagi!', 'error');
              console.log(data);
            }
          });
        });

        $('#btn-submit-harga').click(function(e){
          e.preventDefault();
          var harga = $('#harga').val();
          var diskon = $('#diskon').val();
          $.ajax({
            data: {harga:harga, diskon:diskon},
            type: "POST",
            url: "<?=base_url('kelas/ubahHarga')?>",
            dataType:"json",
            success: function(response) {
              swal('Ubah Harga', response.message, response.status);
            },
            error: function(data) {
              swal('Oops', 'Terjadi kesalahan, coba lagi!', 'error');
              console.log(data);
            }
          });
        });

        // Blood Hound suggestion engine
        var pengajar = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('nama_user'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch: '<?=base_url()?>kelas/getpengajar'
        });
        $('#bloodhound').typeahead(null, {
          // name: 'states',
          display: 'nama_user',
          source: pengajar,
          templates: {
            empty: [
              '<div class="empty-message">',
                'Tidak mendapat hasil dengan pencarian ini',
              '</div>'
            ].join('\n'),
            suggestion: Handlebars.compile('<div><strong>{{nama_user}}</strong></div>')
          }
        }).on('typeahead:selected', function(event, data){
          $('#id_user').val(data.id_user);
        });

        // delete pengajar
        function deleteRow($this){
          $this.closest('tr').remove();
        }
        $('tbody').on('click', '.delete-btn', function(e){
          e.preventDefault();
          var id = $(this).data('id');
          var url = '<?=base_url('kelas/hapuspengajar')?>';
          var el = $(this);
          swalDelete(id, url, function(){
            deleteRow(el);
          });
        });

        // tambah pengajar

        $('#tambahPengajar').submit(function(e){
          e.preventDefault();
          $.ajax({
            data: $(this).serialize(),
            type: "POST",
            url: "<?=base_url('kelas/tambahPengajar')?>",
            dataType:"json",
            success: function(response) {
              if(response.status=='success'){
                $('#table-pengajar > tbody:last-child').append(response.html);
              }
              swal('Tambah Pengajar', response.message, response.status);
            },
            error: function(data) {
              swal('Oops', 'Terjadi kesalahan, coba lagi!', 'error');
              console.log(data);
            }
          });
        });

        var cleaveG = new Cleave('#harga', {
          numeral: true,
          numeralThousandsGroupStyle: 'thousand'
        });

      });

    </script>

  </body>
</html>
