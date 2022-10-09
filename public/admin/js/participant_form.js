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


jQuery.validator.addMethod("checkPhone",
function(value, element) {
    var inputElem = $('#frmCheckout :input[name="participant_id"]');
        participant_id =  inputElem.val();

    var result = false;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:"POST",
        async: false,
        url: "check-phone", // script to validate in server side
        data: {
            phone: value,
            participant_id: participant_id
        },
        success: function(data) {
            console.log(data)
            result = (data['data'] == true) ? true : false;
        }
    });
    return result; 
}, 
);


function openbarcode(id) {
    $.ajax({
        url: '/participant/get_participant_details',
        method: 'get',
        data: { id: id },
        dataType: 'json',
        success: function(data) {
            $("#barcode_data").append(data);
            $("#barcodemodal").modal("show");
        }
    })
}

function participantsubmit() {

    $("#frmCheckout").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            phone: {
                required: true,
                checkPhone: true,
                // matches: "[0-9]+",  // <-- no such method called "matches"!
                minlength: 10,
                maxlength: 16
            },
            address: {
                required: true,
            },
            passing_year: {
                required: true,
            },
            occupation: {
                required: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
            confirm_password: {
                minlength: 6,
                equalTo: "#password"
            },
            dress: {
                required: true,
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
                required: "Please enter your Name",
                minlength: "Name requires at least 3 characters"
            },

            phone: {
                checkPhone: "This phone number is already exists! Try another.",
                required: "Enter your Phone number",
                minlength: "Phone Number requires at least 10 characters",
                maxlength: "Phone Number cannot exceed 16 characters",
            },
            address: {
                required: "Address cannot be Empty",
            },
            passing_year: {
                required: "Select Passing Year",
            },
            occupation: {
                required: "Enter Your Occupation",
            },
            password: {
                required: "password cannot be Empty",
                minlength: "password must be contain at least 6 characters"
            },
            confirm_password: {
                minlength: "Confirm password must be contain at least 6 characters",
                equalTo: "Confirm password must be same as password"
            },
            dress: {
                required: 'Dress is required',
            },
        },
        submitHandler: function(form) {
            var locate = window.location.origin+"/"
            // var data = $("#frmCheckout").serialize();
            var APP_URL = $('meta[name="_base_url"]').attr('content');
            var formData = new FormData(form);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: APP_URL + '/participant/save-participant',
                method: "post",
                dataType: "json",
                // data: {title:title,description:description,image:image,content_id:content_id},
                data: formData,
                success: function(data) {
                    if (data) {
                        // $("#list").append(data);
                        $output = "";
                        var length = data.length;
                        for (var i = 0; i < length; i++) {
                            $output += '<tr>';
                            $output += '<td class="text-center">' + (i+1) + '</td>';
                            $output += '<td class="text-center">' + data[i].id + '</td>';
                            $output += '<td class="text-center">' + data[i].registration_id + '</td>';
                            $output += '<td class="text-center">' + data[i].name + '</td>';
                            $output += '<td class="text-center">' + data[i].email + '</td>';
                            $output += '<td class="text-center">' + data[i].phone + '</td>';
                            $output += '<td class="text-center">' + data[i].passing_year + '</td>';
                            $output += '<td class="text-center">' + data[i].present_address + '</td>';
                            $output += '<td class="text-center">' + '<img height="auto" width="100" src="'+locate + (data[i].image?data[i].image:(data[i].gender=="Male"?"front/images/male.png":"front/images/female.png")) + '">' + '</td>';
                            $output += '<td class="text-center">' + (data[i].status==1 ? '<span class="badge badge-primary">Active':'<span class="badge badge-danger">pending') +'</span>' + '</td>';

                            $output += '<td class="text-center"> <a class="btn btn-primary btn-xs" id="' + data[i].id + '" onclick="editparticipant(this.id)" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a class="btn btn-danger btn-xs" name="' + data[i].id + '" onclick="deleteparticipant(this.name,event)" style="color: #ffffff"> <i class="fas fa-remove"></i> Delete </a></td>';
                            $output += '</tr>';
                        }
                        $("#frmCheckout").trigger("reset");
                        $(".mb-1.first").html("");
                        $("#participant_list_data").empty();
                        $("#participant_list_data").append($output);
                    }
                },
                // cache: false,
                contentType: false,
                processData: false
            })
        }

    });
}

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
            // $('#' + img_preview_id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

function editparticipant(id) { 
    var APP_URL = $('meta[name="_base_url"]').attr('content');
    $.ajax({
        url: APP_URL + '/participant/edit-participant',
        method: "get",
        dataType: "json",
        data: { id: id },
        success: function(data) {
            $("#name").val(data.name);
            $("#fathers_name").val(data.fathers_name);
            $("#mother_name").val(data.mother_name);
            $("#email").val(data.email);
            $("#phone").val(data.phone);
            $("#present_address").val(data.present_address);
            $("#permanent_address").val(data.present_address);
            $("#dress").val(data.dress);
            $("#passing_year").val(data.passing_year);
            $("#blood_group").val(data.blood_group);
            $("#gender").val(data.gender);
            $("#occupation").val(data.occupation);
            $("#participant_id").val(data.id);
            $(".mb-1.first img").attr('src','/admin/img/no_image_found.png');
            $("#name").focus();
            // $("#image").val(data.image);
            // $("#show_photo").attr("src","http://localhost/School-event/public/"+data.image);

        }
    })
}

function deleteparticipant(id) {
    var locate = window.location.origin+"/"
    var APP_URL = $('meta[name="_base_url"]').attr('content');
    var message = confirm("Are you sure you want to Delete this Participant??");
    if (message == true) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: APP_URL + '/participant/delete-participant',
            method: "post",
            dataType: "json",
            data: { 
                id: id,
            },
            success: function(res) {
                console.log(res)
                // location.reload(true);
                if (res) {
                    $output = "";
                    var length = res.length;
                    for (var i = 0; i < length; i++) {
                        $output += '<tr>';
                        $output += '<td class="text-center">' + (i+1) + '</td>';
                        $output += '<td class="text-center">' + data[i].id + '</td>';
                        $output += '<td class="text-center">' + res[i].registration_id + '</td>';
                        $output += '<td class="text-center">' + res[i].name + '</td>';
                        $output += '<td class="text-center">' + res[i].email + '</td>';
                        $output += '<td class="text-center">' + res[i].phone + '</td>';
                        $output += '<td class="text-center">' + res[i].passing_year + '</td>';
                        $output += '<td class="text-center">' + res[i].present_address + '</td>';
                        $output += '<td class="text-center">' + '<img height="auto" width="100" src="'+locate + (res[i].image?res[i].image:(res[i].gender=="Male"?"front/images/male.png":"front/images/female.png")) + '">' + '</td>';
                        $output += '<td class="text-center">' + (res[i].status==1 ? '<span class="badge badge-primary">Active':'<span class="badge badge-danger">pending') +'</span>' + '</td>';

                        $output += '<td class="text-center"> <a class="btn btn-primary btn-xs" id="' + res[i].id + '" onclick="editparticipant(this.id)" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a class="btn btn-danger btn-xs" name="' + res[i].id + '" onclick="deleteparticipant(this.name,event)" style="color: #ffffff"> <i class="fas fa-remove"></i> Delete </a></td>';
                        $output += '</tr>';
                    }
                    $("#participant_list_data").empty();
                    $("#participant_list_data").append($output);
                }
            }, 
             // cache: false,
            //  contentType: false,
            //  processData: false
        })
    }
}

function deleteparticipanttr(id) {
    var APP_URL = $('meta[name="_base_url"]').attr('content');
    var message = confirm("Are you sure you want to Delete this Participant??");
    if (message == true) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: APP_URL + '/participant/delete-participant-tr',
            method: "post",
            dataType: "json",
            data: { id: id },
            success: function(data) {
                // location.reload(true);
                console.log(data)

            }
        })
    }
}

function appendid(id) {
    $("#user_id").val(id);
}

function statuschange(id) {
    var t = confirm("Are you Sure you want to active this participant??");
    if (t == true) {
        $.ajax({
            url: "participant-status",
            method: "get",
            dataType: "json",
            data: { id: id },
            success: function(data) {
                $("#barcode").html(data);
                // location.reload(true);
            }
        })
    } else {

    }
}