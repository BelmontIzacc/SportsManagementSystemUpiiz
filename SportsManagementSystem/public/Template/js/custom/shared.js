//function to create cropper on modal dialog
$(function () {
  var $image = $('#image');
  var cropBoxData;
  var canvasData;

  $('#photoModalEdit').on('shown.bs.modal', function () {
    $image.cropper({
      autoCropArea: 0.5,
      aspectRatio: 1 / 1,
      viewMode: 1,
      movable: true,
      zoomable: true,
      zoomOnTouch: true,
      zoomOnWheel: true,
      rotatable: true,
      scalable: true,
      center: true,
      minCropBoxWidth: 100,
      minCropBoxHeight: 100,
      checkOrientation: true,

      ready: function () {
        $image.cropper('setCanvasData', canvasData);
        $image.cropper('setCropBoxData', cropBoxData);
      }
    });
  }).on('hidden.bs.modal', function () {
    cropBoxData = $image.cropper('getCropBoxData');
    canvasData = $image.cropper('getCanvasData');
    $image.cropper('destroy');
  });
});

// Import image
var $inputImage = $('#inputImage');
var URL = window.URL || window.webkitURL;
var blobURL;
var $image = $('#image');

if (URL) {
  $inputImage.change(function () {
    var files = this.files;
    var file;

    if (!$image.data('cropper')) {
      return;
    }

    if (files && files.length) {
      file = files[0];

      if (/^image\/\w+$/.test(file.type)) {
        blobURL = URL.createObjectURL(file);
        $image.one('built.cropper', function () {

          // Revoke when load complete
          URL.revokeObjectURL(blobURL);
        }).cropper('reset').cropper('replace', blobURL);
        $inputImage.val('');
      } else {
        window.alert('Error escoja otro archivo.');
      }
    }
  });

  $('#crop').on('click', function(){
    //   alert(UrlToPostForm);
    $('#image').cropper('getCroppedCanvas', {
      width: 300,
      height: 300,
      fillColor: '#fff',
      imageSmoothingEnabled: true,
      imageSmoothingQuality: 'low',
    }).toBlob(function (blob) {
      var formData = new FormData();

      formData.append('croppedImage', blob);

      $.ajax(UrlToPostForm, {
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          alerts(1);
          window.setTimeout(function(){
            location.href = UrlToRedirectPage;
        } ,1500);
        },
        error: function (xhr, status, error) {
            alert(error);
          alerts(2);
        }
      });
    });
  });

  $('#rotateRight').on('click', function(){
    $('#image').cropper('rotate', 45);
  });
  $('#rotateLeft').on('click', function(){
    $('#image').cropper('rotate', -45);
  });
  $('#reset').on('click', function(){
    $('#image').cropper('reset');
  });

} else {
  $inputImage.prop('disabled', true).parent().addClass('disabled');
}
//END function to create cropper on modal dialog

// function to change img size on mobiles
function checkPosition() {
    if (window.matchMedia('(max-width: 768px)').matches) {
        $('.img-size').css({
            'height':'170px',
            'width':'auto',
            'margin':'auto',
        });
    } else {
        $('.img-size').css({
            'height':'350px',
            'width':'auto',
            'margin':'auto',
        });
    }
}
//END function to change img size on mobiles

//function to show the SweetAlert
function alerts(opc){
    switch(opc){
        case 1:
            swal({
                title: "Actualizado",
                text: "Se ha cambiado la imagen.",
                type: "success",
                //confirmButtonClass: "btn-success"
                timer: 1500,
                showConfirmButton: false
            });
        break;
        case 2:
            swal({
                title: "¡Error!",
                text: "No se pudo completar la operación.",
                type: "error",
                //confirmButtonClass: "btn-danger"
                timer: 1500,
                showConfirmButton: false
            });
        break;
    }
}
//END function to show the SweetAlert
