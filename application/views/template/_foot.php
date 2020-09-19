    
    <?php
      $notif = $this->session->flashdata('notif');
      echo !empty($notif) ? $notif : '';
    ?>
    
    <script src="<?=base_url()?>lib/jqueryui/jquery-ui.min.js"></script>
    <script src="<?=base_url()?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>lib/feather-icons/feather.min.js"></script>
    <script src="<?=base_url()?>lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?=base_url()?>lib/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?=base_url()?>lib/prismjs/prism.js"></script>
    <script src="<?=base_url()?>lib/cleave.js/cleave.min.js"></script>
    <script src="<?=base_url()?>lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="<?=base_url()?>lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script src="<?=base_url()?>lib/select2/js/select2.min.js"></script>
    <script src="<?=base_url()?>lib/summernote/summernote-bs4.min.js"></script>
    
    <!-- dashforge js -->
    <script src="<?=base_url()?>assets/js/dashforge.js"></script>

    <script type="text/javascript">

      // sweet alert

      function swalRedirect(title, text, url){
        swal({
          title: title,
          text: text,
          type: "warning",
          showCancelButton: true,
          confirmButtonText: 'Ya, saya yakin!',
          cancelButtonText: "Tidak, kembali!"
        }).then(function(isConfirm) {
          if (isConfirm) {
            window.location = url;
          }
        });
      }

      function swalDelete(id, url, onDeleted=null){
        swal({
          title: 'Yakin mau di Hapus?',
          text: "Data akan terhapus permanen!",
          type: 'warning',
          showCancelButton: true,
          showLoaderOnConfirm: true,
          preConfirm: function() {
            return new Promise(function(resolve) {
              $.ajax({
                url: url,
                type: 'POST',
                data: {'id':id},
                dataType: 'json'
              }).done(function(response){
                if(onDeleted!=null){
                  onDeleted();
                }
                swal('Hapus Data', response.message, response.status);
              }).fail(function(){
                swal('Oops...', 'Terjadi Kesalahan !', 'error');
              });
            });
          },
          allowOutsideClick: false
        }).catch(swal.noop);
      }

      // image upload

      function uploadImage($images, $this, $controller){
        $images.each(function () {
          var image = this;
          var data = new FormData();
          data.append("image", image);
          $.ajax({
            url: "<?=base_url('tools/uploadImage')?>",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(imageurl) {
              $this.summernote('insertImage', imageurl, function ($image) {});
            },
            error: function(data) {
              console.log(data);
            }
          });
        });
      }

      function deleteImage(target, controller){
        $.ajax({
          data: {src : target[0].src},
          type: "POST",
          url: "<?=base_url('tools/deleteImage')?>",
          cache: false,
          success: function(response) {
            console.log(response);
          },
          error: function(data) {
            console.log(data);
          }
        });
      }
    </script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5eb52c01a1bad90e54a2df60/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->