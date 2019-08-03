//show forgot password and hide sign in div
$(document).on('click', '#forget_password_link', function(){
    //var url = $("#base_url").val();
    $("#forgot").show();
    $("#login").hide();
});

//show sign in div and hide forget password
$(document).on('click', '#forget_password_cancel', function(){
    //var url = $("#base_url").val();
    $("#f_email").val('');
    $("#forgot").hide();
    $("#login").show();
});


$('#forgot').submit(function(e){

    var url = $("#base_url").val();
    var email = $("#f_email").val();
    var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
    var f_email_invalid = 'Please Enter Valid Email ID.';
    var f_email_not_found = 'Email ID is not Registered with us.';

    if(email == '' || !pattern.test(email)){
        $('#f_email').focus();
        $(".f-email-error").html(f_email_invalid).show();
        setTimeout(function(){
         $(".f-email-error").hide();
        },2000);
        return false;
    }

    if(email != '' && pattern.test(email)){
        e.preventDefault();
        var formData = new FormData($(this)[0]);

        //console.log(formData);


        //add loader class
        $("#forgot-submit").addClass("m-loader m-loader--light m-loader--left");

        $.ajax({
                type : 'POST',
                url : url + "verify_forgot_email",
                data : formData,
                dataType: "json",
                contentType : false,
                processData : false,
                async : false,
                success : function(data){
                    //remove loader class
                    $("#forgot-submit").removeClass("m-loader m-loader--light m-loader--left");

                    if(data.success == true){
                        swal({
                          position: 'top',
                          type: 'success',
                          title: data.message,
                          Button: true,
                        }).then((result) => {
                           //reset forgor password email field
                           $("#f_email").val('');
                           $(".m-login__forget-password").hide();
                           $(".m-login__signin").show();
                        });

                    }else{
                        $(".f-email-error").html(data.message).show();
                        setTimeout(function(){
                         $(".f-email-error").hide();
                        },2000);
                        return false;
                    }
                }
            });
        }
    return false;
});


//function to reset password

$('#reset_password_form').submit(function(e){
    var url = $("#base_url").val();
    var n_password = $("#n_password").val();
    var c_password = $("#c_password").val();

    if(n_password.trim() == ''){
        $('#n_password').focus();
        $("#n-password-error").html('Enter New Password First').show();
        setTimeout(function(){
         $("#n-password-error").hide();
        },2000);
        return false;
    }
    if(c_password.trim() == ''){
        $('#c_password').focus();
        $("#c-password-error").html('Enter Confirm Password First').show();
        setTimeout(function(){
         $("#c-password-error").hide();
        },2000);
        return false;
    }

    if(c_password.trim() != n_password.trim()){
        $('#c_password').focus();
        $("#c-password-error").html('New and Confirm Password Does not Match').show();
        setTimeout(function(){
         $("#c-password-error").hide();
        },2000);
        return false;
    }

    if(n_password.trim() != '' && c_password.trim() != ''){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        //add loader class
        $("#reset-submit").addClass("m-loader m-loader--light m-loader--left");

        $.ajax({
                type : 'POST',
                url : url + "insert_reset_password",
                data : formData,
                dataType: "json",
                contentType : false,
                processData : false,
                async : false,
                success : function(data){
                    //remove loader class
                    $("#reset-submit").removeClass("m-loader m-loader--light m-loader--left");
                    if(data.success == true){
                        swal({
                          position: 'top',
                          type: 'success',
                          title: data.message,
                          showConfirmButton: true,
                        }).then((result) => {
                           window.location.href = url;
                        });
                    }else{
                        $("#c-password-error").html(data.message).show();
                        setTimeout(function(){
                         $("#c-password-error").hide();
                        },2000);
                        return false;
                    }
                }
            });
        }
    return false;
});