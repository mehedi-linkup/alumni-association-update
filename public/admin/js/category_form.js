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
function categorysubmit(){


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
                required: "Please Enter Teacher Name",
                minlength: "Name requires at least 3 characters"
            },
        },
        submitHandler: function (form) {
            // var data = $("#frmCheckout").serialize();
            var APP_URL = $('meta[name="_base_url"]').attr('content');
            var formData= new FormData($("#frmCheckout")[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: APP_URL + '/save-category',
                method: "post",
                // dataType: "json",
                // data: {title:title,description:description,image:image,content_id:content_id},
                data: formData,
                success: function (data) {
                    if(data){
                        // $("#list").append(data);
                        $output = "";
                        var length = data.length;
                        for (var i = 0; i < length; i++) {
                            $output += '<tr>';
                            $output += '<td class="text-center">' + i + '</td>';
                            $output += '<td class="text-center">' + data[i].name + '</td>';
                            $output += '<td class="text-center">' + data[i].parent_id + '</td>';
                            $output += '<td class="text-center">' + data[i].url + '</td>';
                            $output += '<td class="text-center">' + data[i].description + '</td>';
                            $output += '<td class="text-center"> <a class="btn btn-primary btn-xs" id="'+data[i].id+'" onclick="editcategory(this.id)" style="color: #fff"> <i class="fa fa-edit"></i> Edit </a> <a class="btn btn-danger btn-xs" name="'+data[i].id+'" onclick="deletecategory(this.name,event)" style="color: #ffffff"> <i class="fas fa-remove"></i> Delete </a></td>';
                            $output += '</tr>';
                        }
                        $("#frmCheckout").trigger("reset");
                        $("#category_id").val("");
                        $("#category_list_data").empty();
                        $("#category_list_data").append($output);
                    }
                },
                // cache: false,
                contentType: false,
                processData: false
            })
        }

    });
}

function editcategory(id)
{
    var APP_URL = $('meta[name="_base_url"]').attr('content');
    $.ajax({
        url: APP_URL + '/edit-category',
        method: "get",
        dataType: "json",
        data: {id:id},
        success: function (data) {
            $("#name").val(data.name);
            $("#parent_id").val(data.parent_id);
            $("#description").val(data.description);
            $("#url").val(data.url);
            $("#category_id").val(data.id);
            // $(".mb-1.first .first").html('<img class="img-thumbnail" src="http://localhost/School-event/public/'+data.image+'" alt="Something" style="width: 100px; height: 100px;" id=".$id." />')
            //$('#id').attr('src', "http://localhost/School-event/public/"+data.image);
            // $("#show_photo").attr("src","http://localhost/School-event/public/"+data.image);

        }
    })
}
function deletecategory(id)
{
    var APP_URL = $('meta[name="_base_url"]').attr('content');
    var message = confirm("Are you sure you want to Delete this Data??");
    if(message == true) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: APP_URL + '/delete-category',
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
