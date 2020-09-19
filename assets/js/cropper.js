
      function cek_file(mb="",type="",id=""){
          var ukuran = '';
          if (mb=='1MB') {
              var ukuran = '1242880';
          }else if(mb=='2MB'){
              var ukuran = '2242880';
          }else if(mb=='3MB'){
              var ukuran = '3242880';
          }
          var x = document.getElementById(id);
          if ('files' in x) {
              if (x.files.length > 0) {
                  var file = x.files[0];
                  if ('size' in file) {
                      if (file.size >= ukuran) {
                          swal("Maaf!", "Ukuran file > "+mb+", silahkan ubah file dengan ukuran lebih kecil!", "error");
                          document.getElementById(id).value="";
                      };
                  };
              };
          };
          if (type=="image") {
              var ext  = /\.(jpe?g|png|jpg|bmp|ico)$/i;
              if (ext.test(x.files[0].name) === false) { 
                  swal("Maaf!", "File yang anda masukan bukan gambar. Silahkan masukan file dengan ekstensi *.jpeg, *.png, *.jpg, *.bmp ", "error"); 
                  document.getElementById(id).value = "";
              }   
          }
          if(type=="doc"){
              var ext  = /\.(doc|docx|pdf|xls|xlsx)$/i;
              if (ext.test(x.files[0].name) === false) { 
                  swal("Maaf!", "File yang anda masukan bukan dokumen. Silahkan masukan file dengan ekstensi *.doc, *.docx, *.pdf, *.xls, *xlsx ", "error"); 
                  document.getElementById(id).value = "";
              }
          }
          if(type=="pdf"){
              var ext  = /\.(pdf)$/i;
              if (ext.test(x.files[0].name) === false) { 
                  swal("Maaf!", "File yang anda masukan bukan tipe PDF. Silahkan masukan file PDF ", "error"); 
                  document.getElementById(id).value = "";
              }
          }
          if (type=="all") {
              var ext  = /\.(doc|docx|pdf|xls|xlsx|jpe?g|png|jpg|bmp|rar|zip)$/i;
              if (ext.test(x.files[0].name) === false) { 
                  swal("Maaf!", "File yang anda masukan salah. Silahkan masukan file dengan ekstensi *.doc, *.docx, *.pdf, *.xls, *xlsx, *.jpeg, *.png, *.jpg, *.bmp, *.rar,. *zip ", "error");
                  document.getElementById(id).value = ""; 
              }   
          }
      }

      function cropper(vm,ar) {
        var $image = $('#image');
        var uploadedImageURL;
        var URL = window.URL || window.webkitURL;var $inputImage = $('#inputImage');
        var options = {
            viewMode: vm, // 0, 1, 2, 3  
            aspectRatio: ar, //16:9 = 1.7777777777777777 | 4:3 = 1.3333333333333333 | 1:1 = 1 | 2:3 = 0.6666666666666666 | free = NaN
            preview: '.img-preview',
            crop: function (e) {$('#dataX').val(Math.round(e.x));$('#dataY').val(Math.round(e.y));$('#dataHeight').val(Math.round(e.height));$('#dataWidth').val(Math.round(e.width));$('#dataRotate').val(e.rotate);$('#dataScaleX').val(e.scaleX);$('#dataScaleY').val(e.scaleY);}
        };$image.cropper(options);
        if (URL) {$inputImage.change(function () {var files = this.files;var file;if (!$image.data('cropper')) {return;}if (files && files.length) {file = files[0];if (/^image\/\w+$/.test(file.type)) {if (uploadedImageURL) {URL.revokeObjectURL(uploadedImageURL);}uploadedImageURL = URL.createObjectURL(file);$image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);}else{window.alert('Please choose an image file.');}}});}else{$inputImage.prop('disabled', true).parent().addClass('disabled');}

        $("#reset").click(function() {$image.cropper("reset");});
        $("#zoomIn").click(function() {$image.cropper("zoom", 0.1);});
        $("#zoomOut").click(function() {$image.cropper("zoom", -0.1);});
        $("#rotateLeft").click(function() {$image.cropper("rotate", 90);});
        $("#rotateRight").click(function() {$image.cropper("rotate", -90);});
        $("#fliphorizontal").click(function() {if ($('#dataScaleX').val() == 1) {var x = -1;}else{var x = 1;}$image.cropper("scaleX", x);});
        $("#flipvertical").click(function() {if ($('#dataScaleY').val() == 1) {var y = -1;}else{var y = 1;}$image.cropper("scaleY", y);});
      }