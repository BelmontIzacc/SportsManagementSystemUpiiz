
// Import image
var $inputImage = $('#inputImage');
var URL = window.URL || window.webkitURL;
var blobURL;
var $image = $('#image');

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

//END function to create cropper on modal dialog

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
