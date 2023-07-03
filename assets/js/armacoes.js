$(document).ready(function() {
    $('.file-input').change(function() {
      var inputId = $(this).attr('id');
      var file = this.files[0];
      var reader = new FileReader();
      reader.onload = function(event) {
        $('#' + inputId.replace('image', 'img')).attr('src', event.target.result);
      }
      reader.readAsDataURL(file);
    });

    $('#btnClear').click(function() {
      $('.file-input').val('');
      $('.image-container img').attr('src', '');
    });
  });