$(document).ready(function(){
  $('.DtPicker').datepicker({
	 	format: "dd-mm-yyyy",
	  autoclose: true
	});

	$('form#myfrm').submit(function(event) 
	{		
		event.preventDefault();
		var formData = new FormData($(this)[0]);		
		var page = $('#page').val();
		var userid = $('#userid').val();
		var title = '';

		switch (page) {
	    case 'role':
	    	if (page=='role') title = 'Role';
				var cu_name = $('#cu_name').val();
				if(cu_name == "") 
				{
					alert(title+' is empty, Please Enter a value');
					return;
				}
      break;
	    case 'user':
				var id = $('#id').val();
	    	
	    	if (page=='quest') title = 'Kategori Soal';	
				var txtName = $('#txtName').val();
				if(txtName == "") 
				{
					alert(title+' name is empty, Please Enter a value');
					return;
				}
      break;
      case 'role_permission':
				var id = $('#ddRole').val();
      break;
		} 
					  
		$.ajax({
		    type: "POST",
		    url: "../model/UserManagement/um_crud.php",
		    data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function() {
            $("#loading-image-add").show();
        },
		
		}).done(function(data) {
			if (data =="ok" || data =="updateok")
			{
				$("#loading-image-add").show();
				alert('Save successfuly');
				window.location.href = "?page="+page+"&action=list&role_id="+$('#ddRole').val();
			}else {
				alert('Data Isexist');
				$("#loading-image-add").hide();
			}
		});
	});


});

function SelectRole(me)
{
	window.location.href = "?page="+$('#page').val()+"&mod=um&action=add&role_id="+$(me).val()+"&modul_id="+$('#ddModul').val();
}
function SelectModul(me)
{
	window.location.href = "?page="+$('#page').val()+"&mod=um&action=add&role_id="+$('#ddRole').val()+"&modul_id="+$(me).val();
}

function AddFeature(me)
{
	var page = $('#page').val();
	var action = 'add_feature';
	var role = $('#ddRole').val()
	var modul = $('#ddModul').val()
	var modul_a = $('#ddModul').find(':selected').attr("modul_a")
	var feature = $('#ddFeature').val()
	var feature_a = $('#ddFeature').find(':selected').attr("menu_a")
	
	var userid = $('#userid').val();
	var datas="id=&userid="+userid+"&page="+page+"&action="+action+
						"&role="+role+"&modul="+modul+"&modul_a="+modul_a+"&feature="+feature+"&feature_a="+feature_a;
    	$.ajax({
  	   	type: "POST",
   			url: "../model/UserManagement/um_crud.php",
   			data: datas
    	}).done(function( data ) {
    		if (data=='isexist' || data=='Please select modul'){
					alert(data)
				}else {
					alert('Add feature success');
					location.href = "?page="+page+"&mod=um&action=add&role_id="+$('#ddRole').val()+"&modul_id="+$('#ddModul').val();								
				}
    	});
}

