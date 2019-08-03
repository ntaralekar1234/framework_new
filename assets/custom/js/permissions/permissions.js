//function to diaplay subscribed users
$(document).on('change', '#role', function() {
	//reset previous data
	$(".permissions-checkbox-list").html('');

    var role_id = $(this).val();
    var url = $("#base_url").val();

    var send_data = {
    	'role_id': role_id,
    };

    //add body loader class
	/*$body = $("body");
 	$body.addClass("loading");*/

    $.ajax({
        url: url + "get_permissions_by_role",
        type: 'POST',
        data: send_data,
        dataType: 'JSON',
        success:function(data){ 
            /*console.log(data);
            return false;
            */
        	count = data.length;
            var html = '';

            html += '<div class="permissions-checkbox-list">';
            html += '<div class="row">';
            html += '<div class="col-12 permissions-checkbox-list-module"> </div>';

            if(count){
                $.each(data, function(key,value)
                {
                    html += '<div class="col-3">';
                    html += '<div class="module-name">'+value.tab_name+'</div>';
                    html += '</div>';
                    html += '<div class="col-9">';
                    html += '<div class="m-checkbox-list-inline">';
                    html += '<div class="row">';

                    html += ' <div class="col-sm-2">';
                    html += '<label class="m-checkbox m-checkbox--solid">';

                    html += '<input class="set_permission" type="checkbox" '+(value.view == 1 ? 'checked' : '' )+' data-id="'+value.id_tab+'" data-action="view" >View<span></span>';

                    html += '</label>';
                    html += '</div>';

                    html += ' <div class="col-sm-2">';
                    html += '<label class="m-checkbox m-checkbox--solid">';
                    html += '<input class="set_permission" type="checkbox" '+(value.add == 1 ? 'checked' : '' )+' data-id="'+value.id_tab+'" data-action="add" >Add <span></span>';
                    html += '</label>';
                    html += '</div>';

                    html += ' <div class="col-sm-2">';
                    html += '<label class="m-checkbox m-checkbox--solid">';
                    html += '<input class="set_permission" type="checkbox" '+(value.edit == 1 ? 'checked' : '' )+' data-id="'+value.id_tab+'" data-action="edit" >Edit <span></span>';
                    html += '</label>';
                    html += '</div>';

                    html += ' <div class="col-sm-2">';
                    html += '<label class="m-checkbox m-checkbox--solid">';
                    html += '<input class="set_permission" type="checkbox" '+(value.delete == 1 ? 'checked' : '' )+' data-id="'+value.id_tab+'" data-action="delete" >Delete <span></span>';
                    html += '</label>';
                    html += '</div>';

                    html += ' <div class="col-sm-2">';
                    html += '<label class="m-checkbox m-checkbox--solid">';
                    html += '<input class="set_permission" type="checkbox" '+(value.allow_status == 1 ? 'checked' : '' )+' data-id="'+value.id_tab+'" data-action="allow_status" >Change Status <span></span>';
                    html += '</label>';
                    html += '</div>';

                    html += ' <div class="col-sm-2">';
                    html += '<label class="m-checkbox m-checkbox--solid">';

                    var checked_all = '';
                    if(value.view == 1 && value.add == 1 && value.edit == 1 && value.delete == 1 && value.allow_status == 1){
                        checked_all = 'checked';
                    }

                    html += '<input class="set_permission all"  type="checkbox" '+checked_all+' data-id="'+value.id_tab+'" data-action="all" >All <span></span>';
                    html += '</label>';
                    html += '</div>';

                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-12"><hr></div>';
  
                }); 
            }

            html += '</div>';
            html += '</div>';

            //remove body loader
			//$body.removeClass("loading");

            $(".permissions-checkbox-list").replaceWith(html);

          }
    });
  
    return false;
});



$(document).on('change', '.set_permission', function() {
    var self = $(this);
    var value = $(this).is(':checked');
    var id_tab = $(this).data('id');
    var action = $(this).data('action');
    var role_id = $("#role").val();
    var url = $("#base_url").val();

    var send_data = {
        'role_id': role_id,
        'id_tab': id_tab,
        'value': value,
        'action': action,
    };

    $.ajax({
        url: url + "set_permissions_by_role",
        type: 'POST',
        data: send_data,
        dataType: 'JSON',
        success:function(data){ 
            /*console.log(data);
            return false;*/
            if(data.success == true){
                //alert('success');
                if(data.action == 'all'){
                    if(data.value == 'true'){
                        self.parents('.m-checkbox-list-inline').find('.set_permission').prop('checked',true);
                    }else{
                        self.parents('.m-checkbox-list-inline').find('.set_permission').prop('checked',false);
                    }
                }else{
                    //check other conditions for all check or uncheck
                    if(data.all_permissions == true){
                        self.parents('.m-checkbox-list-inline').find('.all').prop('checked',true);
                    }else{
                        self.parents('.m-checkbox-list-inline').find('.all').prop('checked',false);
                    }
                }
                
            }else{
                //alert('Server not Responding, Please try again.');
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: data.message,
                });
                var chk = self.is(':checked');
                if(chk == true){
                    self.prop('checked',false);
                }else{
                    self.prop('checked',true);
                }

            }

        }
    });
  
    return false;

});