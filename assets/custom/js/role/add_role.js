$(document).on('click', '#new_role', function(){

	$("#add-new-role").toggle('slow');
});

$('#add_role_form').submit(function(e){
    var role_title = $('#role_title').val();

    var url = $("#base_url").val();
    if(role_title.trim() == '')
    {
        $('#role_title').focus();
        return false;
    }
    else
    {
        var postdata = {'role':role_title}

        swal({
            title: 'Are you sure?',
            text: "You want to Create this new role ?",
            icon: "warning",
            buttons: {
              catch: {
                text: "Yes, Create it!",
                value: "true",
              },
              cancel: "No, Cancel!",

            },


            dangerMode: true,
            //reverseButtons: true
          }).then((result) => {

            if (result) {

                  $.ajax({
                  url : url + "roles",
                  data : postdata,
                  dataType:'json',
                  type : 'post',
                  success : function(data){
                      if(data.success == true){

                          swal({
                            position: 'top',
                            type: 'success',
                            title: data.message,
                            showConfirmButton: true,
                          }).then((result) => {
                           location.reload();
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

            } else  {
              swal(
                'Cancelled',
                'Nothing has been Changed :)',
                'error'
              )
            }

          });
    }
});

$(document).on('click', '.change_status', function(){

	var url = $("#base_url").val();
	var self = $(this);
	var id_role = self.data('id');
	var status = self.data('status');

	var send_data = {
			'id_role' :	id_role ,
			'status' : status
		};

	swal({
	  title: 'Are you sure?',
	  text: "You want to Change this Status ?",
      icon: "warning",
      buttons: {
            catch: {
            text: "Yes, Change it!",
            value: "true",
            },
            cancel: "No, Cancel!",

        }

	}).then((result) => {
        //add body loader class
  	   $(".modal-body-loader").show();
	  if (result) {

	  		$.ajax({
			url : url + "change_role_status",
			data : send_data,
			dataType:'json',
			type : 'post',
			//async : false,
			success : function(data){
			    //remove body loader
              	$(".modal-body-loader").hide();
				if(data.success == true){

                    swal({
                      position: 'top',
                      type: 'success',
                      title: data.message,
                      showConfirmButton: true,
                    }).then((result) => {

                      location.reload();
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

	  } else {
	    swal(
	      'Cancelled',
	      'Nothing has been Changed :)',
	      'error'
	    )
	  }

	});

});