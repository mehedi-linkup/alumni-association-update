$(function (){
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
    $("#phone").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            alert("Phone number allows digit only");
            return false;
        }
    });
})
function aboutussubmit(){


    // $('.alert').setTimeout(function() {
    // }, 1000);

    $("#frmCheckout").validate({
        rules: {
            title: {
                required: true,
                minlength: 3
            },
            description: {
                required: true,
            }
        },
        onfocusout: function(element) {
            this.element(element); // triggers validation
        },
        onkeyup: function(element, event) {
            this.element(element); // triggers validation
        },
        messages: {
            title: {
                required: "Please enter your About Title",
                minlength: "Name requires at least 3 characters"
            },
            description: {
                required: "About Description Cannot be Empty",
            },
        },
        submitHandler: function (form) {
            // var data = $("#frmCheckout").serialize();
            var locate = window.location.origin+"/"
            var APP_URL = $('meta[name="_base_url"]').attr('content');
            var formData= new FormData(form);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: APP_URL + '/save-about-us',
                method: "post",
                data: formData,
                success: function (data) {
                    if(data){
                        // $("#list").append(data);
                        $output = "";
                        var length = data.length;
                        for (var i = 0; i < length; i++) {
                            $output += '<tr>';
                            $output += '<td class="text-center">' + i + '</td>';
                            $output += '<td class="text-center">' + data[i].title + '</td>';
                            $output += '<td class="text-center">' + data[i].date + '</td>';
                            $output += '<td class="text-center">' + data[i].about_type + '</td>';
                            $output += '<td class="text-center">' + data[i].description + '</td>';
                            $output += '<td class="text-center">' +'<img height="60" width="110" src="'+locate + (data[i].image) +'">'+ '</td>';
                            $output += '<td class="text-center"> <a class="btn btn-primary btn-xs" id="'+data[i].id+'" onclick="editaboutus(this.id)" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a class="btn btn-danger btn-xs" name="'+data[i].id+'" onclick="deletenews(this.name,event)" style="color: #ffffff"> <i class="fas fa-remove"></i> Delete </a></td>';
                            $output += '</tr>';
                        }
                        $("#frmCheckout").trigger("reset");
                        $("#show_photo").attr("src","http://localhost/aliazam/admin/img/no_image_found.png");
                        $("#news_id").val("");
                        $("#news_list_data").empty();
                        $("#news_list_data").append($output);
                    }
                },
                contentType: false,
                processData: false
            })
        }

    });
}
function imageUpload(input) {
    $("#image_check").val($("#image").val());
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
        reader.onload = function (e) {
            $('#' + "show_photo").attr('src', e.target.result);
            // $('#' + img_preview_id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
function editaboutus(id)
{
    var locate = window.location.origin+"/"
    var APP_URL = $('meta[name="_base_url"]').attr('content');
    $.ajax({
        url: APP_URL + '/edit-about-us',
        method: "get",
        dataType: "json",
        data: {id:id},
        success: function (data) {
            $("#title").val(data.title);
            $("#date").val(data.date);
            $("#about_type").val(data.about_type);
            $("#cke_description").val(data.description);
            CKEDITOR.instances['description'].setData(data.description)
            $("#aboutus_id").val(data.id);
            $("#image_check").val(data.image);
            $("#show_photo").attr("src", locate+data.image);
            $('#id').attr('src', locate+data.image);
            $("#aboutus_button").prop("disabled", false);
            

        }
    })
}
function deleteaboutus(id)
{
    var APP_URL = $('meta[name="_base_url"]').attr('content');
    var message = confirm("Are you sure you want to Delete this About Us??");
    if(message == true) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: APP_URL + '/delete-about-us',
            method: "post",
            dataType: "json",
            data: {id: id},
            success: function (data) {
                // console.log(data);
                location.reload(true);

            }
        })
    }
}
