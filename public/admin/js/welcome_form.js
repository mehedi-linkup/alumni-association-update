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
function welcomesubmit(){


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
                required: "Welcome Notes Description Cannot be Empty",
            },
        },

    });
}
function imageUpload(input) {
    // $("#image_check").val($("#image").val());
    var img_preview_id = input.id + '_preview';
    console.log(img_preview_id);
    if (input.files && input.files[0]) {
        //image type validation
        var mime_type = input.files[0].type;
        // if (!(mime_type == 'image/jpeg' || mime_type == 'image/jpg' || mime_type == 'image/png')) {
        //     input.value = '';
        //     Swal.fire({
        //         title: 'Oops...',
        //         text: 'Invalid image format! Only JPEG or JPG or PNG image types are allowed.',
        //         icon: 'warning'
        //     })
        //     return false;
        // }
        //image size validation

        var reader = new FileReader();
        reader.onload = function (e) {
            $('#' + "show_photo").attr('src', e.target.result);
            $('#' + img_preview_id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

