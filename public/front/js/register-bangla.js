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
    // $("#phone").keypress(function(e) {
    //     //if the letter is not digit then display error and don't type anything
    //     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    //         //display error message
    //         alert("Phone number allows digit only");
    //         return false;
    //     }
    // });
    $("#other").click(function() {
        if ($(this).is(":checked")) {
            console.log("yes");
            $("#passing_year_field").css("display", "none");
            $("#others_field").css("display", "flex");
        } else {
            console.log("no");
            $("#passing_year_field").css("display", "block");
            $("#others_field").css("display", "none");
        }
    })
})

function participantsubmit() {


    // $('.alert').setTimeout(function() {
    // }, 1000);
    $("#frmCheckout").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            phone: {
                required: true,
                // matches: "[0-9]+",  // <-- no such method called "matches"!
                minlength: 10,
                maxlength: 11
            },
            fathers_name: {
                required: true,
            },
            mother_name: {
                required: true,
            },
            present_address: {
                required: true,
            },
            present_address: {
                required: true,
            },
            permanent_address: {
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
        },
        onfocusout: function(element) {
            this.element(element); // triggers validation
        },
        onkeyup: function(element, event) {
            this.element(element); // triggers validation
        },
        messages: {
            name: {
                required: "Please Enter Your Name",
                minlength: "Name requires at least 3 characters"
            },
            phone: {
                required: "Enter your Phone number",
                // matches: "Phone number cannot be string",
                minlength: "Phone Number requires at least 10 characters",
                maxlength: "Phone Number cannot exceed 11 characters",
            },
            present_address: {
                required: "Enter Your Present Address",
            },
            permanent_address: {
                required: "Enter Your Permanet Address",
            },
            fathers_name: {
                required: "Enter your Father Name"
            },
            mother_name: {
                required: "Enter Your Mother Name"
            },
            occupation: {
                required: "Enter Your Occupation"
            },
            password: {
                required: "Password cannot be Empty",
                minlength: "password must be contain at least 6 characters"
            },
            confirm_password: {
                minlength: "Confirm password must be contain at least 6 characters",
                equalTo: "Confirm password must be same as password"
            },
        },
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
        // var max_size = .3;
        // var file_size = parseFloat(input.files[0].size / (1024 * 1024)).toFixed(1); // MB calculation
        // if (file_size > max_size) {
        //     input.value = '';
        //     Swal.fire({
        //         title: 'Oops...',
        //         text: 'Max file size ' + max_size + ' MB. You have uploaded ' + file_size + ' MB.',
        //         icon: 'warning'
        //     })
        //     return false;
        // }

        var reader = new FileReader();
        reader.onload = function(e) {
            // var image = new Image();
            // image.src = e.target.result;

            //     var canvas = document.createElement("canvas");
            //     var ctx = canvas.getContext("2d");
            //     ctx.drawImage(image, 0, 0);

            //     var MAX_WIDTH = 400;
            //     var MAX_HEIGHT = 400;
            //     var width = image.width;
            //     var height = image.height;

            //     if (width > height) {
            //         if (width > MAX_WIDTH) {
            //             height *= MAX_WIDTH / width;
            //             width = MAX_WIDTH;
            //         }
            //     } else {
            //         if (height > MAX_HEIGHT) {
            //             width *= MAX_HEIGHT / height;
            //             height = MAX_HEIGHT;
            //         }
            //     }
            //     canvas.width = width;
            //     canvas.height = height;
            //     var ctx = canvas.getContext("2d");
            //     ctx.drawImage(image, 0, 0, width, height);

            //     dataurl = canvas.toDataURL(input.files.type);
            $('#' + "show_photo").attr('src', e.target.result);
            // $(".mb-1.first img").attr('src', e.target.result);
            // $('#' + img_preview_id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

function invoiceprint() {
    var contents = $("#print_section").html();
    var frame1 = $('<iframe />');
    frame1[0].name = "frame1";
    frame1.css({ "position": "absolute", "top": "-1000000px" });
    $("body").append(frame1);
    var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
    frameDoc.document.open();
    //Create a new HTML document.
    frameDoc.document.write('<html><head><title>Student Payment Invoice</title>');
    frameDoc.document.write('</head><body>');
    //Append the external CSS file.
    frameDoc.document.write('<link href="/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />');
    frameDoc.document.write('<link href="/front/css/dashboard.css" rel="stylesheet" type="text/css" />');
    //Append the DIV contents.
    frameDoc.document.write(contents);
    frameDoc.document.write('</body></html>');
    frameDoc.document.close();
    setTimeout(function() {
        window.frames["frame1"].focus();
        window.frames["frame1"].print();
        frame1.remove();
    }, 500);
}