$(document).ready(function(){



});

function deletedata(id, title, object)
{
	var page = $('#page').val();
	var  messaage=confirm("Are you sure to delete "+title+" "+object+" permanently ?");
	if(messaage!=true)
	{
		return false;
	}
	var action = 'delete';
	var userid = $('#userid').val();
	var datas="id="+id+"&userid="+userid+"&page="+page+"&action="+action;
  	$.ajax({
		  type: "POST",
		  url: "../model/UserManagement/um_crud.php",
		  data: datas
  	}).done(function( data ) {
				alert('Delete successfuly');
				location.href = "?page="+page+"&action=list"+"&role_id="+$('#ddRole').val();
  	});
}

function resetPassword(id, title, object)
{
	var page = $('#page').val();
	var  messaage=confirm("Are you sure to reset password "+title+" "+object+" permanently ?");
	if(messaage!=true)
	{
		return false;
	}
	var action = 'reset';
	var userid = $('#userid').val();
	var datas="id="+id+"&userid="+userid+"&page="+page+"&action="+action;
  	$.ajax({
		  type: "POST",
		  url: "../model/UserManagement/um_crud.php",
		  data: datas
  	}).done(function( data ) {
				alert('reset password successfuly');
				location.href = "?page="+page+"&action=list"+"&role_id="+$('#ddRole').val();
  	});
}

function SelectRole(me)
{
	window.location.href = "?page="+$('#page').val()+"&mod=um&action=list&role_id="+$(me).val();
}