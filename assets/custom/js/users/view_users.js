$(document).ready(function(e){
	$(".ckb-hidden").removeClass("dt-checkboxes-select-all");
});


$(document).on('click', '.change_status', function(){

	var url = $("#base_url").val();
	var self = $(this);
	var id_user = self.data('id');
	var status = self.data('status');

	var send_data = {
			'id_user' :	id_user , 
			'status' : status
		};
	
	swal({
	  title: 'Are you sure?',
	  text: "You want to Change this Status ?",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonText: 'Yes, Change it!',
	  cancelButtonText: 'No, Cancel!',
	  reverseButtons: true
	}).then((result) => {

	  if (result.value) {

	  		$.ajax({
			url : url + "change_users_status",
			data : send_data,
			dataType:'json',
			type : 'post',
			async : false,
			success : function(data){
				if(data.success == true){
                    //alert('User Added Successfully');
                    swal({
                      position: 'top',
                      type: 'success',
                      title: data.message,
                      showConfirmButton: true,
                    }).then((result) => {
                      /*if (result.value) {
                        location.reload();
                      }*/
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
	    
	  } else if (
	    // Read more about handling dismissals
	    result.dismiss === swal.DismissReason.cancel
	  ) {
	    swal(
	      'Cancelled',
	      'Nothing has been Changed :)',
	      'error'
	    )
	  }
	  
	});	

});