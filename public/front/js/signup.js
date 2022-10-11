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
   
    $("#other").click(function() {
        if ($(this).is(":checked")) {
            console.log("yes");
            $("#passing_year_field").css("display", "none");
            $("#others_field").css("display", "block");
        } else {
            console.log("no");
            $("#passing_year_field").css("display", "block");
            $("#others_field").css("display", "none");
        }
    })
})

jQuery.validator.addMethod("checkPhoneFront", 
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
        url: location.origin+"/check-phone-front", // script to validate in server side
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
});



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
                checkPhoneFront:true,
                // matches: "[0-9]+",  // <-- no such method called "matches"!
                minlength: 10,
                maxlength: 16
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
            dress: {
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
                checkPhoneFront:'Phone Number Exist!',
                // matches: "Phone number cannot be string",
                minlength: "Phone Number requires at least 10 characters",
                maxlength: "Phone Number cannot exceed 16 characters",
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
            dress: {
                required: 'Enter Your Size',
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
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#' + "show_photo").attr('src', e.target.result);
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
    frameDoc.document.write('<!DOCTYPE html>')
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