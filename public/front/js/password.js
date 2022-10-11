function emailsubmit()
{
    var email = $("#email").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'password_email',
        method: 'post',
        dataType: 'json',
        data: {email: email},
        success: function(data){
            console.log(data);
            if(data == "success"){
                $("#login_form").css("display","none");
                $("#given_email").val(email);
                $("#code_form").css("display","block");
            } else if(data == "false") {
                $('#error_email').html('Email Doesn\'t Exist!');
            } else {
                $('#error_email').html('Something went wrong!');
            }
        }
    })
}
function resetsubmit()
{
    var email = $("#final_email").val();
    var password = $("#password").val();
    var confirm_password = $("#confirm_password").val();
    if(password != confirm_password){
        alert("confirm password must be same with given password");
        return;
    }
    $.ajax({
        url: 'change_password',
        method: 'get',
        dataType: 'json',
        data: {email: email,password:password},
        success: function(data){
            if(data == "success"){
                let url = "/participant/login";
                window.location.replace(url);
            }
        }
    })
}