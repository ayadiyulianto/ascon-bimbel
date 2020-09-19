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
                <div class="card">
                  <div class="card-header">
                    <h5 class="mg-b-0">Kupon Aktif</h5>
                  </div>
                  <div class="df-example demo-table pd-20">
                    <table class="table myDataTable">
                      <thead>
                        <tr>
                          <th class="wd-5p"></th>
                          <th>Kode</th>
                          <th>Potongan</th>
                          <th>Berakhir</th>
                          <th>Kuota</th>
                          <th>Status</th>
                          <th class="wd-10p">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; foreach($aktif->result() as $row){
                          $aktif = $nonaktif = '';
                          if($row->status=='Y'){ $status='<span class="tx-primary">Aktif</span>'; $aktif='active'; }
                          elseif($row->status=='N'){ $status='<span class="tx-danger">Non Aktif</span>'; $nonaktif='active'; } ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?=$row->code?></td>
                          <td><?=rupiah($row->value)?></td>
                          <td><?=tgl($row->waktu_expired)?></td>
                          <td><?=$row->quota>0 ? $row->quota:'Tidak Terbatas' ?></td>
                          <td><?=$status?></td>
                          <td>
                            <div class="dropdown d-inline">
                              <button class="btn btn-secondary btn-xs btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flag"></i> </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item <?=$aktif?>" href="<?=base_url("kelas/flagkupon/".$row->id."/Y")?>">Aktif</a>
                                <a class="dropdown-item <?=$nonaktif?>" href="<?=base_url("kelas/flagkupon/".$row->id."/N")?>">Non Aktif</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="card mg-t-20" id="add-kupon">
                  <div class="card-header">
                    <h5 class="mg-b-0">Buat Kupon</h5>
                  </div>
                  <div class="card-body">
                    <form method="post">
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          <label>Kode (maks 20 karakter)</label>
                          <input type="text" name="code" class="form-control" value="<?=input('code', '')?>" placeholder="Ketik kode kupon">
                        </div>
                        <div class="form-group col-sm-6">
                          <label>Potongan Harga</label>
                          <input type="number" name="value" class="form-control" value="<?=input('value', '')?>" placeholder="Ketik potongan harga">
                        </div>
                        <div class="form-group col-sm-6">
                          <label>Kuota / maksimum penggunaan</label>
                          <input type="number" name="quota" class="form-control" value="<?=input('quota', '')?>" placeholder="Kosongkan jika tidak ada maksimum">
                        </div>
                        <div class="form-group col-sm-6">
                          <label>Durasi berlaku (mulai berlaku hari ini)</label>
                          <select name="durasi" class="form-control select2">
                            <option value="3">3 hari</option>
                            <option value="7">1 minggu</option>
                            <option value="30">1 bulan</option>
                          </select>
                        </div>
                        <div class="col-sm-6">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="card mg-t-20">
                  <div class="card-header">
                    <h5 class="mg-b-0">Riwayat Kupon</h5>
                  </div>
                  <div class="df-example demo-table pd-20">
                    <table class="table myDataTable">
                      <thead>
                        <tr>
                          <th class="wd-5p"></th>
                          <th>Kode</th>
                          <th>Potongan</th>
                          <th>Berakhir</th>
                          <th>Kuota</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; foreach($expired->result() as $row){ ?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?=$row->code?></td>
                          <td><?=rupiah($row->value)?></td>
                          <td><?=tgl($row->waktu_expired)?></td>
                          <td><?=$row->quota>0 ? $row->quota:'Tidak Terbatas' ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
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
        $('.filemgr-content-header').children('nav').append(
          '<a href="#add-kupon" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Buat"></i> <span class="d-none d-md-inline">Buat Kupon</span></a>');

        $('.myDataTable').DataTable({
          "responsive": true,
          // "bProcessing": true,
          // "bServerSide": true,
          // "sAjaxSource": "<?=base_url().'kelas/getData'?>",
          // "order": [[ 3, "desc" ]],
          language: {
            searchPlaceholder: 'Cari...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });

    </script>

  </body>
</html>
