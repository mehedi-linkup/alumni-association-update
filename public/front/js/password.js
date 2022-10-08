function emailsubmit()
{
    var email = $("#email").val();
    $.ajax({
        url: 'password_email',
        method: 'get',
        dataType: 'json',
        data: {email: email},
        success: function(data){
            console.log(data);
            if(data == "success"){
                $("#login_form").css("display","none");
                $("#given_email").val(email);
                $("#code_form").css("display","block");
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