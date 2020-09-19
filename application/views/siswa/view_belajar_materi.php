
            <div id="materi" class="tab-pane mg-x-auto show active pd-20 pd-xl-25" style="max-width: 992px;">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><a href="<?=base_url('siswa/dashboard')?>">Kelas Saya</a></li>
                  <li class="breadcrumb-item"><a href="<?=base_url('siswa/kelas')?>"><?=userdata('nama_kelas')?></a></li>
                </ol>
              </nav>
              <h4 class="mg-b-30"><?=$konten->judul_konten?></h4>

              <!-- LATIHAN -->

              <?php if($konten->jenis=='Latihan'){ ?>

              <div class="card mg-b-20 mg-lg-b-25">
                <div class="card-body pd-20 pd-lg-25 bd-b">
                  <h5>LATIHAN <?= ($konten->latihan_has_timer=='Y') ? '- '.$konten->durasi_belajar.' MENIT':'' ?></h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="mg-y-auto mg-b-0 mg-r-20 tx-16">Jumlah Soal<h3><?=$konten->latihan_jumlah_soal?></h3>
                    </div>
                    <div class="mg-y-auto mg-b-0 mg-r-20 tx-16">Passing Grade<h3><?=$konten->latihan_passing_grade?> %</h3>
                    </div>
                    <div class="mg-y-auto mg-b-0 mg-r-20 tx-16">Nilai Kamu<h3><?=$konten->nilai?></h3>
                    </div>
                    <div class="mg-y-auto mg-b-0 mg-r-20 tx-16">Status<h3><?=!empty($konten->status) ? $konten->status:'-'?></h3>
                    </div>
                    <a href="<?=base_url('siswa/kelas/latihan/'.$konten->id_konten)?>" class="btn btn-primary">Mulai</a>
                  </div>
                </div>
              </div>

              <div class="card mg-b-20 mg-lg-b-25">
                <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between position-relative">
                  <h6 class="tx-16 tx-spacing-1 tx-uppercase mg-b-0" id="diskusi-list-title">Riwayat</h6>
                </div>
                <div class="card-body pd-20 pd-lg-25 bd-b">
                  <div class="table-responsive">
                    <table class="table table-hover mg-b-0">
                      <thead>
                        <th>Waktu Pengerjaan</th>
                        <th>Nilai</th>
                        <th>Passing Grade</th>
                        <th>Status</th>
                        <th></th>
                      </thead>
                      <tbody>
                      <?php $where = array('id_konten'=>$konten->id_konten, 'id_user_siswa'=>userdata('id_user'));
                      $riwayat = $this->MyModel->get('sesi_latihan', '*', $where, 'waktu_selesai desc');
                      foreach($riwayat->result() as $rwt){ ?>
                        <tr>
                          <td><?=tgl_indo($rwt->waktu_selesai, 'l, j F Y H:i')?></td>
                          <td><?=$rwt->nilai?></td>
                          <td><?=$rwt->passing_grade?> %</td>
                          <td><?=$rwt->status?></td>
                          <td><?= ($rwt->status=="Berhasil") ? '<a href="'.base_url('siswa/kelas/bahas/'.$rwt->id).'" class="btn btn-xs btn-outline-primary">Bahas</a>':'' ?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- VIDEO -->

              <?php }elseif($konten->jenis=='Video'){ ?>

              <div class="embed-responsive embed-responsive-16by9 mg-x-auto wd-90p">
                <iframe class="embed-responsive-item" src="<?=$konten->video_url?>" allowfullscreen></iframe>
              </div>

              <!-- TEXT -->

              <?php }elseif($konten->jenis=='Text'){ ?>

              <div class="card mg-b-20 mg-lg-b-25">
                <div class="card-body pd-20 pd-lg-25 bd-b">
                  <?=$konten->isi?>
                </div>
              </div>

              <!-- TUGAS -->

              <?php }elseif($konten->jenis=='Tugas'){ ?>

              <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="instruksi-tab" data-toggle="tab" href="#instruksi" role="tab" aria-controls="instruksi" aria-selected="true">Instruksi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="jwb-kamu-tab" data-toggle="tab" href="#jwb-kamu" role="tab" aria-controls="jwb-kamu" aria-selected="false">Jawaban Kamu</a>
                </li>
              </ul>
              <div class="tab-content bg-white bd bd-gray-300 bd-t-0 pd-20" id="myTabContent">
                <div class="tab-pane fade show active" id="instruksi" role="tabpanel" aria-labelledby="instruksi-tab">
                  <?=$konten->isi?>
                </div>
                <div class="tab-pane fade" id="jwb-kamu" role="tabpanel" aria-labelledby="jwb-kamu-tab">
                  <div class="d-flex justify-content-between align-items-end mg-b-20">
                    <h5>Riwayat</h5>
                    <button id="btn-add-tugas" type="button" class="btn btn-icon btn-outline-primary"><i data-feather="upload"></i> Kirim Jawaban</button>
                  </div>
                  <div class="table-responsive bd-b">
                    <table class="table table-hover mg-b-0" id="table-tugas">
                      <thead>
                        <th>Waktu Pengerjaan</th>
                        <th>Nilai</th>
                        <th>Status</th>
                        <th></th>
                      </thead>
                      <tbody>
                      <?php $where2 = array('id_konten'=>$konten->id_konten, 'id_user_siswa'=>userdata('id_user'));
                      $tugas = $this->MyModel->get('sesi_tugas', 'id, waktu_post, nilai, status', $where2, 'waktu_post desc');
                      foreach($tugas->result() as $tgs){ ?>
                        <tr>
                          <td><?=tgl_indo($tgs->waktu_post, 'l, j F Y H:i')?></td>
                          <td><?=$tgs->nilai?></td>
                          <td><?=$tgs->status?></td>
                          <td><button type="button" data-id="<?=$tgs->id?>" class="btn btn-xs btn-white btn-detail-tugas">Detail</button></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <form id="form-tugas" class="d-none mg-t-30">
                    <fieldset class="form-fieldset">
                      <legend>Jawaban</legend>
                      <div class="d-none mg-b-20" id="nilai-tugas">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="mg-y-auto mg-b-0 mg-r-20 tx-16">Nilai Kamu<h3 id="tgs-nilai">-</h3></div>
                          <div class="mg-y-auto mg-b-0 mg-r-20 tx-16">Status<h3 id="tgs-status">-</h3></div>
                          <div class="mg-y-auto mg-b-0 mg-r-20 tx-16">Reveiwer<h3 id="tgs-reviewer">-</h3></div>
                          <div class="mg-y-auto mg-b-0 mg-r-20 tx-16">Passing Grade<h3 id="tgs-waktu">-</h3></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <input id="id-sesi-tugas" type="hidden" name="id" value="">
                        <input type="hidden" name="id_konten" value="<?=$konten->id_konten?>">
                        <textarea id="summernote-tugas" name="jawaban" class="form-control"></textarea>
                      </div>
                      <button id="submit-tugas" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </fieldset>
                  </form>
                </div>
              </div>

              <?php } ?>

              <div class="d-flex justify-content-end align-items-center mg-t-30">
                <label id="label-selesai" class="mg-y-auto bg-white mg-b-0 pd-x-15 pd-y-10 tx-16 bd <?= ($konten->is_finished=='Y') ? '':'d-none' ?>"><i class="fa fa-check tx-18 tx-success"></i> Selesai</label>
                <?php if($konten->jenis=='Text'||$konten->jenis=='Video'){ ?>
                <button id="btn-selesai" class="btn btn-primary mg-l-20 <?= ($konten->is_finished=='Y') ? 'd-none':'' ?>">Tandai Sudah Selesai</button>
                <?php } ?>
              </div>
            </div>