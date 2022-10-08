$(function() {
    jQuery.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            if (regexp.constructor != RegExp)
                regexp = new RegExp(regexp);
            else if (regexp.global)
                regexp.lastIndex = 0;
            return this.optional(element) || regexp.test(value);
        },
    );
    $("#phone").keypress(function(e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            alert("Phone number allows digit only");
            return false;
        }
    });
})

function massagesubmit() {

    // $('.alert').setTimeout(function() {
    // }, 1000);

    $("#frmCheckout").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },

        },
        onfocusout: function(element) {
            this.element(element); // triggers validation
        },
        onkeyup: function(element, event) {
            this.element(element); // triggers validation
        },
        messages: {
            name: {
                required: "Please Enter Massage Name",
                minlength: "Name requires at least 3 characters"
            },

        },
        submitHandler: function(form) {
              var locate = window.location.origin+"/"
            var APP_URL = $('meta[name="_base_url"]').attr('content');
            var formData = new FormData(form);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: APP_URL + '/save-massage',
                method: "post",
                dataType: "json",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        $output = "";
                        var length = data.length;
                        for (var i = 0; i < length; i++) {
                            $output += '<tr>';
                            $output += '<td class="text-center">' + i + '</td>';
                            $output += '<td class="text-center">' + data[i].desingnation + '</td>';
                            $output += '<td class="text-center">' + data[i].name + '</td>';
                            $output += '<td class="text-center">' + data[i].description + '</td>';
                            $output += '<td class="text-center">' + '<img height="60" width="110" src="'+locate + (data[i].image) + '">' + '</td>';
                            $output += '<td class="text-center"> <a class="btn btn-primary btn-xs" id="' + data[i].id + '" onclick="editmassage(this.id)" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a class="btn btn-danger btn-xs" name="' + data[i].id + '" onclick="deletemassage(this.name,event)" style="color: #ffffff"> <i class="fas fa-remove"></i> Delete </a></td>';
                            $output += '</tr>';
                        }
                        $("#frmCheckout").trigger("reset");
                        $(".mb-2.first").empty();
                        $("#show_photo").attr("src", "http://localhost/School-event/public/admin/img/no_image_found.png");
                        $("#massage_id").val("");
                        $("#massage_list_data").empty();
                        $("#massage_list_data").append($output);
                    }
                },
            })
        }

    });
}

function imageUpload(input) {
    $("#image_check").val($("#image").val());
    var img_preview_id = input.id + '_preview';
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
            // $('#' + img_preview_id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

function fileUpload(input) {

    // var img_preview_id = input.id + '_preview';
    // console.log(img_preview_id);
    if (input.files && input.files[0]) {
        var file = input.files[0];
        //image type validation
        var mime_type = input.files[0].type;
        if (!(mime_type == 'application/pdf' || mime_type == 'application/vnd.ms-excel' || mime_type == 'application/msword' || mime_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || mime_type == 'application/vnd.ms-powerpoint' || mime_type == 'application/vnd.openxmlformats-officedocument.presentationml.presentation' || mime_type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')) {
            input.value = '';
            Swal.fire({
                title: 'Oops...',
                text: 'Invalid file format! Only document types are allowed.',
                icon: 'warning'
            })
            return false;
        }
        //image size validation
        var max_size = 5;
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

        // var reader = new FileReader();
        // reader.fileName = file.name;
        // reader.onload = function (e) {
        //     // $('#' + "show_photo").attr('src', e.target.result);
        //     // $('#' + img_preview_id).attr('src', e.target.result);
        $(".mb-2.first").empty();
        $(".mb-2.first").append("<i class='fa fa-file-archive-o fa-4x'></i>" + file.name);
        // console.log(e.target.fileName);
        // }
        //
        // reader.readAsText(file.name); // convert to base64 string
    }
}

function editmassage(id) {
    var locate = window.location.origin+"/"
    var APP_URL = $('meta[name="_base_url"]').attr('content');
    $.ajax({
        url: APP_URL + '/edit-massage',
        method: "get",
        dataType: "json",
        data: { id: id },
        success: function(data) {
            $("#name").val(data.name);
            $("#desingnation").val(data.desingnation);
            $("#description").val(data.description);
            $("#massage_id").val(data.id);
            $("#image_check").val(data.image);
            $("#show_photo").attr("src", locate + data.image);
            $('#id').attr('src', locate + data.image);
            $(".mb-2.first").empty();
            var str = data.file.split('/').pop();
            var fileNameIndex = str.lastIndexOf("/") + 1;
            var filename = str.substr(fileNameIndex);
            $(".mb-2.first").append("<i class='fa fa-file-archive-o fa-4x'></i>" + str);  
        }
    })
}

function deletemassage(id) {
    var APP_URL = $('meta[name="_base_url"]').attr('content');
    var message = confirm("Are you sure you want to Delete this Data??");
    if (message == true) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: APP_URL + '/delete-massage',
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