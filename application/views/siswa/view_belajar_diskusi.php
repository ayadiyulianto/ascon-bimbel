
              <!-- Diskusi -->
            <div id="diskusi" class="tab-pane mg-x-auto pd-20 pd-xl-25"  style="max-width: 992px;">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><a href="<?=base_url('siswa/dashboard')?>">Kelas Saya</a></li>
                  <li class="breadcrumb-item"><a href="<?=base_url('siswa/kelas')?>"><span class="d-sm-none">...</span><span class="d-none d-sm-inline"><?=userdata('nama_kelas')?></span></a></li>
                </ol>
              </nav>
              <h4 class="mg-b-30"><?=$konten->judul_konten?></h4>

              <div class="profile-update-option bg-white ht-50 bd d-flex justify-content-start mg-lg-b-25 rounded">
                <div class="wd-50 bd-r d-flex align-items-center justify-content-center">
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
                  <h6 class="tx-16 tx-spacing-1 tx-uppercase mg-b-0" id="diskusi-list-title">Buat Diskusi</h6>
                </div>
                <div class="card-body pd-20 pd-lg-25 bd-b">
                  <input type="hidden" name="id_kelas" value="<?=userdata('id_kelas')?>">
                  <input type="hidden" name="id_konten" value="<?=$konten->id_konten?>">
                  <div class="form-group">
                    <label class="d-block">Judul Diskusi *</label>
                    <input type="text" name="judul" class="form-control" placeholder="Tuliskan judul diskusi">
                  </div>
                  <div class="form-group">
                    <label class="d-block">Isi Diskusi *</label>
                    <textarea name="isi" class="form-control summernote2"></textarea>
                  </div>
                  <button type="submit" class="btn btn-white"><i data-feather="save"></i> Simpan</button>
                </div>
              </div>
              </form>

              <div class="card mg-b-20 mg-lg-b-25">
                <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between position-relative">
                  <h6 class="tx-16 tx-spacing-1 tx-uppercase mg-b-0" id="diskusi-list-title">Diskusi</h6>
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
            </div><!-- tab-pane -->