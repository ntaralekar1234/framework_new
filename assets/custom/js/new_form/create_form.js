$(document).on('click', '#create-form', function () {
    var form_name = $('#form_name').val();

    var url = $("#base_url").val();
    if(form_name.trim() == '')
    {
        $('#form_name').focus();
        return false;
    }
    else
    {

        var postdata = {'form_name':form_name}

        swal({
            title: 'Are you sure?',
            text: "You want to Create this Form ?",
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
            //console.log(result);
            if (result) {

                  $.ajax({
                  url : url + "create_new_form",
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
                            window.location.href = url + "design/"+data.form_id;
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