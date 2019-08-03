//select state based on its country

$(document).on('change', '#select_country', function() {

    var country_id = $('#select_country').val();
  
   	var url = $("#base_url").val();
    var send_data = {
				    	'country_id': country_id
				    };

    $.ajax({
        url: url + 'get_state',
        type: 'POST',
        data: send_data,
        dataType: 'JSON',
        success:function(data){ 

        	/*console.log(data);
        	return false;*/
            
            
             count = data.length;
             var html = '<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="state_id" id="select_state"><option value="" selected disabled>Select State</option>';

            if(count){
                $.each(data, function(key,value)
                {
                    //console.log(value.city_name);
                    html += '<option value="'+value.state_id+'">'+value.state_name+'</option>';
                }); 
            }
           	html +='</select>';
            $("#state_div").html('');
           	// console.log(html);
           	// return false;

             $("#state_div").html(html);
            
            $(".m_selectpicker").selectpicker('refresh');
          }
    });
    
    return false;
});


//select cities based on its state

$(document).on('change', '#select_state', function() {

    var state_id = $('#select_state').val();
    //var search_for = $("#search_for").val();
   	
   	var url = $("#base_url").val();
    var send_data = {
				    	'state_id': state_id
				    };

    $.ajax({
        url: url + 'get_city',
        type: 'POST',
        data: send_data,
        dataType: 'JSON',
        success:function(data){ 
            
            count = data.length;
            var html = '<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="select_city" name="city_id"><option value="" disabled="" selected="">Select City</option>';

            if(count){
                $.each(data, function(key,value)
                {
                    //console.log(value.city_name);
                    html += '<option value="'+value.city_id+'">'+value.city_name+'</option>';
                }); 
            }
           	html +='</select>';
            $("#city_div").html('');
           	// console.log(html);
           	// return false;
             $("#city_div").html(html);
            
            $(".m_selectpicker").selectpicker('refresh');
          }
    });
    
    return false;
});


//function for verify exists mobile number for user

function verify_mobile(){
    var url = $("#base_url").val();
    var contact = $("#contact").val();
    var phoneno = new RegExp(/^\d{10}$/);
    if(contact == '' || !phoneno.test(contact)){
        $('#contact').focus();
        return false;
    }else{
        var send_data = {
            'contact': contact
        };
        $.ajax({
            url: url + "verify_user_mobile",
            type: 'POST',
            data: send_data,
            dataType: 'JSON',
            success:function(data){ 
                //console.log(data);
                if(data == 'exists'){
                    //alert('Mobile is already Registered With Us.');
                    $("#mobile_exist_err").show();
                    $("#contact").val('');
                    setTimeout(function() {
                        $('#mobile_exist_err').fadeOut('fast');
                    }, 5000);    
                    return false;
                }else{
                    //alert('New Mobile Number');
                    $("#mobile_exist_err").hide();
                }
              }
        });    
    }
    return false;
}


//function for verify exists email id for user

function verify_email(){
    var url = $("#base_url").val();
    var email = $("#email").val();
    var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
    if(email == '' || !pattern.test(email)){
        $('#email').focus();
        return false;
    }else{
        var send_data = {
            'email': email
        };
        $.ajax({
            url: url + "verify_user_email",
            type: 'POST',
            data: send_data,
            dataType: 'JSON',
            success:function(data){ 
                //console.log(data);
                if(data == 'exists'){
                    //alert('Email is already Registered With Us.');
                    $("#email_exist_err").show();
                    $("#email").val('');
                    setTimeout(function(){
                        $('#email_exist_err').fadeOut('fast');
                    }, 5000);    
                    return false;
                }else{
                    //alert('New Mobile Number');
                    $("#email_exist_err").hide();
                }
              }
        });    
    }
    return false;
}

//function for verify exists employee id for user

function verify_employee_id(){
    var url = $("#base_url").val();
    var employee_id = $("#employee_id").val();
    if(employee_id.trim() == ''){
        /*$("#employee_id").focus();
        swal('Enter Employee ID First !');
        return false;*/
    }else{
        var send_data = {
            'employee_id': employee_id
        };
        $.ajax({
            url: url + "verify_employee_id",
            type: 'POST',
            data: send_data,
            dataType: 'JSON',
            success:function(data){ 
                //console.log(data);
                if(data == 'exists'){
                    //alert('Employee ID is already Exist.');
                    $("#employee_id_exist_err").show();
                    $("#employee_id").val('');
                    setTimeout(function(){
                        $('#employee_id_exist_err').fadeOut('fast');
                    }, 5000);    
                    return false;
                }else{
                    //alert('New Employee ID');
                    $("#employee_id_exist_err").hide();
                }
              }
        });    
    }
    return false;
}

 $(document).on('click', '#add_user', function(){
    var url = $("#base_url").val();

    var name = $("#name").val();
    var contact = $("#contact").val();
    var email = $("#email").val();

    var employee_id = $("#employee_id").val();
    var select_department = $("#select_department").val();
    var select_manager = $("#select_manager").val();

    var select_country = $("#select_country").val();
    var select_state = $("#select_state").val();
    var select_city = $("#select_city").val();
    var select_role = $("#select_role").val();
    var password = $("#password").val();
    var select_status = $("#select_status").val();
    var profile = $("#profile").val();

    var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
    var phoneno = new RegExp(/^\d{10}$/);

    if(name.trim() == ''){
        $("#name").focus();
        swal('Enter User Name First !');
        return false;
    }else if(contact == '' || !phoneno.test(contact)){
        $('#contact').focus();
        swal('Enter Valid Contact Number !');
        return false;
    }else if(email == '' || !pattern.test(email)){
        $('#email').focus();
        swal('Enter Valid Email ID !');
        return false;
    }/*else if(employee_id.trim() == ''){
        $("#employee_id").focus();
        swal('Enter Employee ID First !');
        return false;
    }else if(!select_department || select_department == ''){
        $('#select_department').focus();
        swal('Select Department First !');
        return false;
    }else if(!select_manager || select_manager == ''){
        $('#select_manager').focus();
        swal('Select Manager First !');
        return false;
    }*/else if(!select_country){
        $("#select_country").focus();
        swal('Select Country First !');
        return false;
    }else if(!select_state){
        $("#select_state").focus();
        swal('Select State First !');
        return false;
    }else if(!select_city || select_city == ''){
        $("#select_city").focus();
        swal('Select City First !');
        return false;
    }else if(!select_role){
        $("#select_role").focus();
        swal('Select Role of User First !');
        return false;
    }else if(password.trim() == ''){
        $("#password").focus();
        swal('Enter Password First !');
        return false;
    }else if(!select_status){
        $("#select_status").focus();
        swal('Select Status First !');
        return false;
    }/*else if(profile.trim() == ''){
        $("#profile").focus();
        swal('Select Profile Image First !');
        return false;
    }*/
});

 $('#user_form').submit(function(e){
    var url = $("#base_url").val();
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    
    //add body loader class
    $body = $("body");
    $body.addClass("loading");

    $.ajax({
            type : 'POST',
            url : url + "insert_user",
            data : formData,
            dataType: "json",
            contentType : false,
            processData : false,
            async : false,
            success : function(data){

                /*console.log(data);
                return false;*/

                //remove body loader
                $body.removeClass("loading");

                if(data.success == true){
                    //alert('User Added Successfully');
                    swal({
                      position: 'top',
                      type: 'success',
                      title: data.message,
                      showConfirmButton: true,
                    }).then((result) => {
                      if (result.value) {
                        window.location.href = url + "user_management";
                      }else{
                        window.location.href = url + "user_management";
                      }
                    });

                }else{
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: data.message,
                    });
                }
                
            }
        });
    return false;
});
