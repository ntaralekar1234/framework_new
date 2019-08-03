$(document).on('click', '.change_status', function(){

    var url = $("#base_url").val();
    var self = $(this);
    var id = self.data('id');
    var status = self.data('status');

    var send_data = {
                        'id' : id ,
                        'status' : status
                    };

    swal({
      title: 'Are you sure?',
      text: "You want to Change this Status ?",
      icon: 'warning',
      buttons: {
        catch: {
        text: "Yes, Change it!",
        value: "true",
        },
        cancel: "No, Cancel!",

    }
    }).then((result) => {

      if (result) {

            $.ajax({
            url : url + "change_user_status",
            data : send_data,
            dataType:'json',
            type : 'post',
            async : false,
            success : function(data){
                if(data.success == true){
                    //alert('Changed Successfully');
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

      } else {
        swal(
          'Cancelled',
          'Nothing has been Changed :)',
          'error'
        )
      }

    });

});

$(document).on('click', '.delete_user', function(){

    var url = $("#base_url").val();
    var self = $(this);
    var id = self.data('id');
    var send_data = {
                        'id' : id ,
                    };

    swal({
      title: 'Are you sure?',
      text: "You want to Delete this User ?",
      icon: 'warning',
      buttons: {
        catch: {
        text: "Yes, Delete it!",
        value: "true",
        },
        cancel: "No, Cancel!",

    }
    }).then((result) => {

      if (result) {

            $.ajax({
            url : url + "delete_user",
            data : send_data,
            dataType:'json',
            type : 'post',
            async : false,
            success : function(data){
                if(data.success == true){
                    //alert('Deleted Successfully');
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

      } else {
        swal(
          'Cancelled',
          'Nothing has been Deleted :)',
          'error'
        )
      }

    });

});

