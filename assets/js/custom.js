function readURL(input, selector) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $(selector).attr("src", e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
}
function validate(input_element,img_element) {
    var fileName = input_element.value;
    var allowed_extensions = new Array("jpg", "png", "jpeg");
    var file_extension = fileName.split(".").pop();
    for (var i = 0; i < allowed_extensions.length; i++) {
        if (allowed_extensions[i] == file_extension) {
            return true;
        }    
    }
    Swal.fire(
        'Gagal',
        'Diupload harus gambar',
        'error'
    )
    $(input_element).val("");
    $(img_element).attr('src','');
    return true;
}
function clone(element) {
    let button = $(element).clone().attr('class','form-copy');
    // console.log($(element).parents('.upload-foto'));
    $('.form-clone').append(button);
    // button.parents('.upload-foto').appendTo('.form-clone');
}
function minus(element) {
    console.log(element);
    $(element).remove();
    // console.log($(element).parents('.upload-foto'));
    // $('.form-clone').append(button);
    // button.parents('.upload-foto').appendTo('.form-clone');
}