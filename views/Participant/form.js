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
		var id = $('#id').val();
		var title = '';

		switch (page) {
			case 'participant':
	    	if (page=='participant') title = 'Peserta';
					
				var cu_name = $('#cu_name').val();
				if(cu_name == "") 
				{
					alert(title+' name is empty, Please Enter a value');
					return;
				}
			break;
		} 
					  
		$.ajax({
		    type: "POST",
		    url: "../model/Participant/pc_crud.php",
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
				window.location.href = "?page="+page+"&action=list";
			}else {
				alert('Data Isexist');
				$("#loading-image-add").hide();
			}
		});
	});


});




