$('#role').on('change', function() {
        $('#role_form').submit();
    });

function view(idmodule,roleid)
{
     var base_url = $("#base_url").val();  
	var check = document.getElementById("view_"+idmodule).checked;
	var status = 0;
	if(check)
	{
		status = 1;
	}
	var url = base_url+"addviewpermission";
	var data = {idmodule:idmodule,role_id:roleid,status:status};

	$.ajax({
		type: "POST",
		url: url,
		data:data,
		dataType: "json",
		success: function(data){
			$('#role_form').submit();
		}
	});
}
function add(idmodule,roleid)
{
     var base_url = $("#base_url").val();  
	var check = document.getElementById("add_"+idmodule).checked;
	var status = 0;
	if(check)
	{
		status = 1;
	}
	var url = base_url+"addpermission";
	var data = {idmodule:idmodule,role_id:roleid,status:status};

	$.ajax({
		type: "POST",
		url: url,
		data:data,
		dataType: "json",
		success: function(data){
			$('#role_form').submit();
		}
	});
}
function edit(idmodule,roleid)
{
     var base_url = $("#base_url").val();  
	var check = document.getElementById("edit_"+idmodule).checked;
	var status = 0;
	if(check)
	{
		status = 1;
	}
	var url = base_url+"editpermission";
	var data = {idmodule:idmodule,role_id:roleid,status:status};

	$.ajax({
		type: "POST",
		url: url,
		data:data,
		dataType: "json",
		success: function(data){
			$('#role_form').submit();
		}
	});
}
function delete_permission(idmodule,roleid)
{
     var base_url = $("#base_url").val();  
	var check = document.getElementById("delete_"+idmodule).checked;
	var status = 0;
	if(check)
	{
		status = 1;
	}
	var url = base_url+"deletepermission";
	var data = {idmodule:idmodule,role_id:roleid,status:status};

	$.ajax({
		type: "POST",
		url: url,
		data:data,
		dataType: "json",
		success: function(data){
			$('#role_form').submit();
		}
	});
}
function status(idmodule,roleid)
{
     var base_url = $("#base_url").val();  
	var check = document.getElementById("status_"+idmodule).checked;
	var status = 0;
	if(check)
	{
		status = 1;
	}
	var url = base_url+"statuschangepermission";
	var data = {idmodule:idmodule,role_id:roleid,status:status};

	$.ajax({
		type: "POST",
		url: url,
		data:data,
		dataType: "json",
		success: function(data){
			$('#role_form').submit();
		}
	});
}
function all_permission(idmodule,roleid)
{
     var base_url = $("#base_url").val();  
	var check = document.getElementById("all_"+idmodule).checked;
	
	var status = 0;
	if(check)
	{
		status = 1;
	}
	var url = base_url+"addallpermission";
	var data = {idmodule:idmodule,role_id:roleid,status:status};

	$.ajax({
		type: "POST",
		url: url,
		data:data,
		dataType: "json",
		success: function(data){
			$('#role_form').submit();
		}
	});
}