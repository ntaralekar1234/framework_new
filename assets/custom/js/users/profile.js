$(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

        var input = $(this).parents('.input-group').find(':text'),
        log = label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

    $("#clear-upload").click(function(){
        $('#uploaded-file-name').val('');
        $('#img-upload').removeAttr('src');
        return false;
    });

    $(".change-pp-span").click(function(){
        $("#change-pp-sec").toggle('slow');
        return false;
    });
});

//function for verify old password for user

function verify_old_password(){
    var url = $("#base_url").val();
    var user_id = $("#uid").val();
    var old_password = $("#old_password").val();
    if(old_password.trim() == ''){
        $("#old_password").focus();
        swal('Enter Old Password First !');
        return false;
    }else{
        var send_data = {
        	'user_id': user_id,
            'old_password': old_password
        };
        $.ajax({
            url: url + "verify_old_password",
            type: 'POST',
            data: send_data,
            dataType: 'JSON',
            success:function(data){
                if(data == false){
                    //alert('Password Does not Match.');
                    $("#old_password_err").show();
                    $("#old_password").val('');
                    setTimeout(function() {
                        $('#old_password_err').fadeOut('fast');
                    }, 3000);
                    return false;
                }else{
                    //alert('Password Match');
                    $("#old_password_err").hide();
                    $("#old_password_success").show();
                    setTimeout(function() {
                        $('#old_password_success').fadeOut('fast');
                    }, 3000);
                }
              }
        });
    }
    return false;
}


$(document).on('click', '#change_password', function(){
    var url = $("#base_url").val();

    var old_password = $("#old_password").val();
    var new_password = $("#new_password").val();
    var confirm_password = $("#confirm_password").val();

    if(old_password.trim() == ''){
        $("#old_password").focus();
        swal('Enter Old Password First !');
        return false;
    }else if(new_password.trim() == ''){
        $("#new_password").focus();
        swal('Enter New Password First !');
        return false;
    }else if(confirm_password.trim() == ''){
        $("#confirm_password").focus();
        swal('Enter Confirm Password First !');
        return false;
    }else if(new_password.trim() != confirm_password.trim()){
        $("#confirm_password").focus();
        swal('New and Confirm Password Does Not Match !');
        return false;
    }
});


$('#password_form').submit(function(e){
    var url = $("#base_url").val();
    e.preventDefault();
    var formData = new FormData($(this)[0]);

    //add body loader class
    $body = $("body");
    $body.addClass("loading");

    $.ajax({
            type : 'POST',
            url : url + "change_user_password",
            data : formData,
            dataType: "json",
            contentType : false,
            processData : false,
            //async : false,
            success : function(data){
                //console.log(data);
                //return false;
                //remove body loader
                $body.removeClass("loading");

                if(data.success == true){
                    //alert('Password Updated Successfully');
                    swal({
                      position: 'top',
                      icon: 'success',
                      title: data.message,
                      showConfirmButton: true,
                    }).then((result) => {
                      location.reload();
                    });

                }else{
                    swal({
                      icon: 'error',
                      title: 'Oops...',
                      text: data.message,
                    });
                }

            }
        });
    return false;
});



$(document).on('click', '#upload_profile', function(){
    var url = $("#base_url").val();

    var profile = $("#imgInp").val();

    if(profile.trim() == ''){
        $("#imgInp").focus();
        swal('Please Select Profile Image First !');
        return false;
    }else{
        //validate image file extension
        var ext = profile.split('.').pop().toLowerCase();
        if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
            $("#imgInp").focus();
            swal("Invalid File Format", "Note : Only [.jpg, .jpeg, .png] file format allowed  :)", "error");
            return false;
        }
    }
});


 $('#upload_form').submit(function(e){
    var url = $("#base_url").val();
    e.preventDefault();
    var formData = new FormData($(this)[0]);

    //add body loader class
    $body = $("body");
    $body.addClass("loading");

    $.ajax({
            type : 'POST',
            url : url + "upload_user_profile",
            data : formData,
            dataType: "json",
            contentType : false,
            processData : false,
            //async : false,
            success : function(data){
                //return false;
                //remove body loader
                $body.removeClass("loading");

                if(data.success == true){
                    //alert('Profile Picture Uploaded Successfully');
                    swal({
                      position: 'top',
                      icon: 'success',
                      title: 'Profile Picture Uploaded Successfully',
                      showConfirmButton: true,
                    }).then((result) => {
                      location.reload();
                    });

                }else{
                    swal({
                      icon: 'error',
                      title: 'Oops...',
                      text: data.message,
                    });
                }

            }
        });
    return false;
});