//preview image before upload
function imageUpload(input) {

    var img_preview_id = input.id + '_preview';
    console.log(img_preview_id);
    if (input.files && input.files[0]) {
        //image type validation
        var mime_type = input.files[0].type;
        if (!(mime_type == 'image/jpeg' || mime_type == 'image/jpg' || mime_type == 'image/png')) {
            input.value = '';
            Swal.fire({
                title: 'Oops...',
                text: 'Invalid image format! Only JPEG or JPG or PNG image types are allowed.',
                icon: 'warning'
            })
            return false;
        }
        //image size validation
        var max_size = .3;
        var file_size = parseFloat(input.files[0].size / (1024 * 1024)).toFixed(1); // MB calculation
        if (file_size > max_size) {
            input.value = '';
            Swal.fire({
                title: 'Oops...',
                text: 'Max file size ' + max_size + ' MB. You have uploaded ' + file_size + ' MB.',
                icon: 'warning'
            })
            return false;
        }

        var reader = new FileReader();
        reader.onload = function(e) {
            $('#' + "show_photo").attr('src', e.target.result);
            $('#' + img_preview_id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

// function gallerySubmit() {

//     $("#frmCheckout").validate({
//         rules: {

//         },
//         onfocusout: function(element) {
//             this.element(element); // triggers validation
//         },
//         onkeyup: function(element, event) {
//             this.element(element); // triggers validation
//         },
//         messages: {
//             name: {

//             },
//         },
//         submitHandler: function(form) {
//             // var data = $("#frmCheckout").serialize();
//             var APP_URL = $('meta[name="_base_url"]').attr('content');
//             var formData = new FormData($("#frmCheckout")[0]);
//             var imgFile = $("#image")[0]; // change your delector here
//             console.log($(".input-images-1").val());
//             formData.append("photo", imgFile.files[0]);

//             $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
//             });
//             $.ajax({
//                 url: APP_URL + '/save-gallery',
//                 method: "post",
//                 // dataType: "json",
//                 // data: {title:title,description:description,image:image,content_id:content_id},
//                 data: formData,
//                 success: function(data) {
//                     location.reload(true);
//                 },
//                 // cache: false,
//                 contentType: false,
//                 processData: false
//             })
//         }

//     });
// }

function editgallery(id) {
    var locate = window.location.origin+"/"
    var APP_URL = $('meta[name="_base_url"]').attr('content');
    $.ajax({
        url: APP_URL + '/event/edit-gallery',
        method: "get",
        dataType: "json",
        data: { id: id },
        success: function(data) {
            $("#event_name").val(data.event_name);
            $("#event_type").val(data.event_type);
            $("#date").val(data.date);
            $("#gallery_id").val(data.id);
            $("#image_check").val(data.image);
            $("#show_photo").attr("src", locate + data.image);
            $('#id').attr('src', locate + data.image);

        }
    })
}

function deletegallery(id) {
    var APP_URL = $('meta[name="_base_url"]').attr('content');
    var message = confirm("Are you sure you want to Delete this Data??");
    if (message == true) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: APP_URL + '/event/delete-gallery',
            method: "post",
            dataType: "json",
            data: { id: id },
            success: function(data) {
                // console.log(data);
                location.reload(true);

            }
        })
    }
}

// function addphotorow() {
//     var result = $(".mb-1.first").html();
//     var upload = '<div class="row">';
//     upload += '<div class="col-md-6">';
//     upload += '<div class="form-group">';
//     upload += '<label for="photo" class="form-label">Photo</label>';
//     upload += '<div class="input-group mb-1" >';
//     upload += '<div class="custom-file">' +
//         '<input type="file" value="" name="photo[]" class="form-control-file" accept="image/jpeg, image/png" onChange="imageUpload(this, "show_photo")>' +
//         '<label class="custom-file-label" for="photo">Choose file</label>' +
//         '</div>';
//     upload += '</div>';
//     upload += '</div>';
//     upload += '</div>';
//     upload += '</div>';
//     upload += '<div class="col-md-6">';
//     upload += '<div class="mb-1">';
//     upload += result;
//     upload += '</div>';
//     upload += '</div>';
//     upload += '</div>';
//     $("#photo_section").append(upload)
// }