<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>

  </head>
  <body>

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>

    <!-- CONTENT -->
    <div class="content content-fixed bd-b">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="<?=base_url('siswa/kelas')?>"><?=userdata('nama_kelas')?></a></li>
                <?php if($diskusi->id_konten>0){ ?>
                <li class="breadcrumb-item"><a href="<?=base_url('siswa/kelas/belajar/'.$diskusi->id_konten)?>"><?=$diskusi->judul_konten?></a></li>
                <?php } ?>
                <li class="breadcrumb-item active" aria-current="page">Diskusi</li>
              </ol>
            </nav>
            <h4 class="mg-b-0">Detail Diskusi</h4>
          </div>
        </div>
      </div><!-- container -->
    </div><!-- content -->

    <div class="content">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">

        <div class="card">
          <div class="card-body pd-20 pd-lg-25 bd-b">
            <div class="media align-items-center mg-b-20">
              <div class="avatar"><img src="<?=avatar($diskusi->foto)?>" class="rounded-circle" alt=""></div>
              <div class="media-body pd-l-15">
                <h6 class="mg-b-3"><?=$diskusi->nama_user?></h6>
                <span class="d-block tx-13 tx-color-03"><?=$diskusi->role?></span>
              </div>
              <div class="d-flex align-items-center">
                <span class="tx-12 tx-color-03 text-right">
                  <?= tgl($diskusi->waktu_post) ?><br>
                  <?= $diskusi->status=='N' ? '(diskusi ini disembunyikan dari publik)':'' ?>
                </span>
                <?php if($diskusi->id_user_post==userdata('id_user')){ ?>
                <a href="#ubah" id="btn-ubah" class="tx-color-03 mg-l-20 button-edit" data-toggle="tooltip" data-placement="top" title="Ubah"><i data-feather="edit"></i></a>
                <?php }
                if(userdata('role')=='Pengajar' OR userdata('role')=='Administrator'){
                  $aktif = $nonaktif = '';
                  if($diskusi->status=='Y'){ $aktif='active'; }elseif($diskusi->status=='N'){ $nonaktif='active'; } ?>
                  <div class="dropdown d-inline mg-l-20">
                    <button class="btn btn-outline-secondary btn-xs btn-icon dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flag"></i> </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item <?=$aktif?>" href="<?=base_url("komunikasi/flagdiskusi/".$diskusi->id_diskusi."/Y")?>">Tampil</a>
                      <a class="dropdown-item <?=$nonaktif?>" href="<?=base_url("komunikasi/flagdiskusi/".$diskusi->id_diskusi."/N")?>">Sembunyikan</a>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
            <form id="form-diskusi" class="d-none">
              <fieldset class="form-fieldset" id="tambahModul">
                <legend>Ubah Diskusi</legend>
                <input type="hidden" name="id_diskusi" value="<?=$diskusi->id_diskusi?>">
                <div class="form-group">
                  <input type="text" name="judul" class="form-control" placeholder="Judul diskusi" value="<?=$diskusi->judul?>">
                </div>
                <div class="form-group">
                  <textarea name="isi" class="form-control summernote"><?=$diskusi->isi?></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
              </fieldset>
            </form>
            <div id="detail">
              <h5><?=$diskusi->judul?></h5>
              <?=$diskusi->isi?>
            </div>
          </div>
          <div class="card-body pd-20 pd-lg-25">
            <div id="disqus_thread"></div>
            <script>
              var disqus_config = function () {
              this.page.url = '<?= base_url('welcome/diskusi/'.$diskusi->id_diskusi) ?>';  // Replace PAGE_URL with your page's canonical URL variable
              this.page.identifier = '<?='diskusi_'.$diskusi->id_diskusi?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
              };
              (function() { // DON'T EDIT BELOW THIS LINE
              var d = document, s = d.createElement('script');
              s.src = 'https://oasse-bimbel.disqus.com/embed.js';
              s.setAttribute('data-timestamp', +new Date());
              (d.head || d.body).appendChild(s);
              })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          </div>
        </div>

      </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('template/_footer') ?>
    <?php $this->load->view('template/_foot') ?>

    <!-- another js -->

    <script>
      $(function(){
        'use strict'

        $('#btn-ubah').click(function(e){
          e.preventDefault();
          $('#form-diskusi').removeClass('d-none');
          $('#detail').addClass('d-none');
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
              swal('Ubah disksui', result.message, result.status);
              if(result.status=='success'){
                window.location.replace('<?=base_url(uri_string())?>');
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
