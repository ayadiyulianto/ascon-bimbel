<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>
    <link href="<?=base_url()?>lib/cropper/cropper.min.css" rel="stylesheet">

  </head>
  <body>

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>
    
    <!-- CONTENT -->
    <div class="content content-fixed">
      <div class="container pd-x-0 tx-13">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Penjualan</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
              </ol>
            </nav>
            <h3 class="mg-b-20 tx-spacing--1"><?=$title?></h3>
          </div>
          <a href="<?=base_url()."admin/penjualan/metode#metode"?>" class="btn btn-sm pd-x-15 btn-outline-primary btn-uppercase mg-l-5"><i data-feather="plus" class="wd-10 mg-r-5"></i> Tambah</a>
        </div>

        <div class="card pd-20 mg-t-20">
          <div class="df-example demo-table">
            <table id="myDataTable" class="table">
              <thead>
                <tr>
                  <th class="wd-5p"></th>
                  <th>Jenis</th>
                  <th>Rekening</th>
                  <th>Atas Nama</th>
                  <th>Status</th>
                  <th>Logo</th>
                  <th class="wd-12p">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($metode->result() as $row){
                $aktif = $nonaktif = '';
                if($row->status=='Y'){ $status='<span class="tx-success">Y</span>'; $aktif='active'; }
                else{ $status='<span class="tx-danger">N</span>'; $nonaktif='active'; } ?>
                <tr>
                  <td><?=$i++?></td>
                  <td><?=$row->jenis?></td>
                  <td><?=$row->rekening?></td>
                  <td><?=$row->atas_nama?></td>
                  <td><?=$status?></td>
                  <td><img class="ht-50" src="<?=base_url('assets/images/pembayaran/'.$row->logo)?>"></td>
                  <td>
                    <a href="<?=base_url()."admin/penjualan/metode/".$row->id.'#metode'?>" class='btn btn-outline-primary btn-xs btn-icon' data-toggle='tooltip' data-placement='top' title='Ubah'><i class='fa fa-pencil'></i></a>
                    <div class="dropdown d-inline">
                      <button class="btn btn-outline-secondary btn-xs btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flag"></i></button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item <?=$aktif?>" href="<?=base_url("admin/penjualan/flagmetode/".$row->id."/Y")?>">Y</a>
                        <a class="dropdown-item <?=$nonaktif?>" href="<?=base_url("admin/penjualan/flagmetode/".$row->id."/N")?>">N</a>
                      </div>
                    </div>
                    <a href="<?=base_url()."admin/penjualan/hapusmetode/".$row->id?>" class='btn btn-outline-danger btn-xs btn-icon' data-toggle='tooltip' data-placement='top' title='Hapus'><i class='fa fa-trash'></i></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

        <?php
        if(!empty($detail)){
          $id       = $detail->id;
          $jenis    = $detail->jenis;
          $rekening = $detail->rekening;
          $atas_nama= $detail->atas_nama;
          $logo     = $detail->logo;
        }else{
          $id = $jenis = $rekening = $atas_nama = $logo = '';
        } ?>

        <div id="metode" class="card mg-t-20">
          <div class="card-header">
            <h5 class="mg-b-0">Metode Pembayaran</h5>
          </div>
          <div class="card-body">
            <form method="post"  enctype="multipart/form-data">
              <?= !empty(validation_errors()) ? '<label class="tx-danger">'.validation_errors().'</label>' : ''?>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Jenis *</label>
                  <input type="hidden" name="id" value="<?=$id?>">
                  <select name="jenis" class="form-control select2" required="">
                    <option value="TRANSFER BANK" <?=$jenis=='TRANSFER BANK'?'selected':''?>>TRANSFER BANK</option>
                    <option value="KARTU KREDIT" <?=$jenis=='KARTU KREDIT'?'selected':''?>>KARTU KREDIT</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Rekening *</label>
                  <input type="text" name="rekening" value="<?=input('rekening', $rekening)?>" class="form-control" placeholder="Ketik nomor rekening" required="">
                </div>
                <div class="form-group col-md-4">
                  <label>Atas Nama *</label>
                  <input type="text" name="atas_nama" value="<?=input('atas_nama', $atas_nama)?>"  class="form-control" placeholder="Ketik atas nama rekening" required="">
                </div>
              </div>
                <div class="form-group">
                  <label class="d-block">Logo *</label>
                  <div class="form-row">
                    <div class="form-group col-md-8">
                      <div class="img-container">
                        <img id="image" src="<?php if(!empty($logo)){echo base_url().'assets/images/pembayaran/'.$logo;}?>" alt="Browse Gambarmu">
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-group text-center img-preview" style="height: 200px; overflow: hidden;"></div>
                      <div class="form-group text-center">
                        <div class="btn-group" role="group">
                          <button class="btn btn-primary tooltips" data-original-title="Zoom In" data-toggle="tooltip" data-placement="top" title="" id="zoomIn" type="button"><i class="fa fa-search-plus"></i></button>
                          <button class="btn btn-primary tooltips" data-original-title="Zoom Out" data-toggle="tooltip" data-placement="top" title="" id="zoomOut" type="button"><i class="fa fa-search-minus"></i></button>
                        </div>
                        <div class="btn-group" role="group">
                          <button class="btn btn-primary tooltips" data-original-title="Rotate Left" data-toggle="tooltip" data-placement="top" title="" id="rotateLeft" type="button"><i class="fa fa-rotate-left"></i></button>
                          <button class="btn btn-primary tooltips" data-original-title="Rotate Right" data-toggle="tooltip" data-placement="top" title="" id="rotateRight" type="button"><i class="fa fa-rotate-right"></i></button>
                        </div>
                        <div class="btn-group" role="group">
                          <button class="btn btn-primary tooltips" data-original-title="Flip Horizontal" data-toggle="tooltip" data-placement="top" title="" id="fliphorizontal" type="button"><i class="fa fa-arrows-h"></i></button>
                          <button class="btn btn-primary tooltips" data-original-title="Flip Vertical" data-toggle="tooltip" data-placement="top" title="" id="flipvertical" type="button"><i class="fa fa-arrows-v"></i></button>
                        </div>
                      </div>
                      <div class="form-group text-center">
                        <div class="btn-group" role="group">
                          <label class="btn btn-outline-danger" for="inputImage" title="Upload image file">
                            <span data-toggle="tooltip" data-animation="false" title="Pilih Gambar">
                              <input name="covers" type="hidden" value="<?php if (!empty($logo)) {echo $logo;}?>">
                              <input name="cover" onchange="cek_file('2MB','image','inputImage')" type="file" class="sr-only" id="inputImage" accept=".jpg,.jpeg,.png,.bmp">
                              <span class="fa fa-upload"></span> Browse
                            </span>
                          </label>
                          <label class="btn btn-danger tooltips" data-toggle="tooltip" data-placement="top" title="Reset" id="reset" type="button"><i class="fa fa-refresh"></i> Reset</label>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" id="dataX" name="x">
                    <input type="hidden" id="dataY" name="y">
                    <input type="hidden" id="dataWidth" name="width">
                    <input type="hidden" id="dataHeight" name="height">
                    <input type="hidden" id="dataRotate" name="rotate">
                    <input type="hidden" id="dataScaleX" name="flipx">
                    <input type="hidden" id="dataScaleY" name="flipy">
                  </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block btn-uppercase"><i data-feather="save" class="wd-10 mg-r-5"></i> Simpan</button>
            </form>
          </div>
        </div>

      </div><!-- container -->
    </div><!-- content-body -->

    <!-- footer -->
    <?php $this->load->view('template/_foot') ?>
    <script src="<?=base_url()?>lib/cropper/cropper.min.js"></script>
    <script src="<?=base_url()?>assets/js/cropper.js"></script>

    <!-- another js -->

    <script>
      $(function(){
        'use strict'

        $('#myDataTable').DataTable({
          "responsive": true,
          // "bProcessing": true,
          // "bServerSide": true,
          // "sAjaxSource": "<?=base_url('admin/penjualan/getData/'.$status)?>",
          // "order": [[ 4, "asc" ]],
          language: {
            searchPlaceholder: 'Cari...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        cropper(1, 0);

      })
    </script>

  </body>
</html>
