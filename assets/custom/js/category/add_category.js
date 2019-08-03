$(document).on('click', '#new_category', function(){

	$("#add-new-category").toggle('slow');
});

$('#add_category_form').submit(function(e){
    var category_title = $('#category_title').val();

    var url = $("#base_url").val();
    if(category_title.trim() == '')
    {
        $('#category_title').focus();
        return false;
    }
    else
    {
        var postdata = {'category':category_title}

        swal({
            title: 'Are you sure?',
            text: "You want to Create this new category ?",
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
                  url : url + "category",
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
	var id_category = self.data('id');
	var status = self.data('status');

	var send_data = {
			'id_category' :	id_category ,
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
			url : url + "change_category_status",
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