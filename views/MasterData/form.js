$(document).ready(function(){
	$('form#myfrm').submit(function(event) 
	{		
		event.preventDefault();
		var formData = new FormData($(this)[0]);		
		var page = $('#page').val();
		var userid = $('#userid').val();
		var id = $('#id').val();
		var title = '';

		switch (page) {
	    case 'class':
	    	if (page=='class') title = 'Kelas';
	    case 'major':
	    	if (page=='major') title = 'Jurusan';
	    case 'study':
	    	if (page=='study') title = 'Mata Pelajaran';
					
				var cu_name = $('#cu_name').val();
				if(cu_name == "") 
				{
					alert(title+' name is empty, Please Enter a value');
					return;
				}
      break;
	    case 'class_sub':
	    	if (page=='class_sub') title = 'Sub Kelas';
        var cu_elearn_md_class_id = $('#cu_elearn_md_class_id').val();
        var cu_elearn_md_major_id = $('#cu_elearn_md_major_id').val();
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
		    url: "../model/MasterData/md_crud.php",
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




