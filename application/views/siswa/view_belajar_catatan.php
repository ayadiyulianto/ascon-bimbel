
            <!-- Catatan -->
            <div id="catatan" class="tab-pane mg-x-auto pd-20 pd-xl-25" style="max-width: 992px;">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><a href="<?=base_url('siswa/dashboard')?>">Kelas Saya</a></li>
                  <li class="breadcrumb-item"><a href="<?=base_url('siswa/kelas')?>"><span class="d-sm-none">...</span><span class="d-none d-sm-inline"><?=userdata('nama_kelas')?></span></a></li>
                </ol>
              </nav>
              <h4 class="mg-b-30"><?=$konten->judul_konten?></h4>

              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="ctt-pengajar-tab" data-toggle="tab" href="#ctt-pengajar" role="tab" aria-controls="ctt-pengajar" aria-selected="true">Catatan Pengajar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="ctt-kamu-tab" data-toggle="tab" href="#ctt-kamu" role="tab" aria-controls="ctt-kamu" aria-selected="false">Catatan Kamu</a>
                </li>
              </ul>
              <div class="tab-content bg-white bd bd-gray-300 bd-t-0 pd-20" id="myTabContent">
                <div class="tab-pane fade show active" id="ctt-pengajar" role="tabpanel" aria-labelledby="ctt-pengajar-tab">
                  <?=$konten->catatan?>
                </div>
                <div class="tab-pane fade" id="ctt-kamu" role="tabpanel" aria-labelledby="ctt-kamu-tab">
                  <textarea id="catatan_siswa" class="form-control summernote"><?=$konten->catatan_siswa?></textarea>
                  <button type="button" id="save-catatan" class="btn btn-primary mg-t-20"><i data-feather="save"></i> Simpan</button>
                </div>
              </div>
            </div>