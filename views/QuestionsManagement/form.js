$(document).ready(function(){


  $('.DtPicker').datepicker({
	 	format: "dd-mm-yyyy",
	  autoclose: true
	});

	var page = $('#page').val();
	switch (page) {
    case 'tryout':
			if ($('#cu_remedial').val()){
				$("#cu_remedial").attr("readonly", "true"); 
			}
	    
	    $('.RbRemedial').click(function () {
	    	if ($(this).val()==0){
					$("#cu_remedial").val($(this).val());
	  			$("#cu_remedial").attr("readonly", "true"); 
	    	} else {
					$("#cu_remedial").removeAttr("readonly", "true");
					$("#cu_remedial").val($(this).val());
	    	}
	    });
    break;
	}


	$('form#myfrm').submit(function(event) 
	{		
		tinyMCE.triggerSave();
		event.preventDefault();
		var formData = new FormData($(this)[0]);		
		var page = $('#page').val();
		var userid = $('#userid').val();
		var id = $('#id').val();
		var title = '';

		switch (page) {
		case 'quest_definition':

	    	if (page=='quest_definition') title = 'Definition Soal';
					
				var cu_definition_name = $('#cu_definition_name').val();
				if(cu_definition_name == "") 
				{
					alert(title+' Definition is empty, Please Enter a value');
					return;
				}

				var cu_correct_ammount = $('#cu_correct_ammount').val();				
				if(cu_correct_ammount == "") 
				{
					alert(title+' Jumlah Benar is empty, Please Enter a value');
					return;
				}
				var cu_wrong_ammount = $('#cu_wrong_ammount').val();			
				if(cu_wrong_ammount == "") 
				{
					alert(title+' Jumlah Salah is empty, Please Enter a value');
					return;
				}
				var cu_unworked = $('#cu_unworked').val();			
				if(cu_unworked == "") 
				{
					alert(title+' Tidak Di Kerjakan is empty, Please Enter a value');
					return;
				}
  
       break;
	   
		case 'tryout_kind':
	    	if (page=='tryout_kind') title = 'Kategori Tryout';
					
				var cu_name = $('#cu_name').val();
				if(cu_name == "") 
				{
					alert(title+' name is empty, Please Enter a value');
					return;
				}
       break;
	    case 'tryout':
	    	if (page=='tryout') title = 'Judul Ujian';
				var cu_title = $('#cu_title').val();
    			var cu_min_value = $('#cu_min_value').val();
				var cu_time = $('#cu_time').val();
				var cu_elearn_md_study_id = $('#cu_elearn_md_study_id').val();
				var cu_elearn_qm_quest_definition_id = $('#cu_elearn_qm_quest_definition_id').val();
				var classCheckbox = $("input[name='class[]']").serializeArray(); 
			    
		
				if(cu_title == "") 
				{
					alert(title+' is empty, Please Enter a value');
					return;
				}
				
				if(cu_elearn_md_study_id == "PILIH") 
				{
					alert('Please selected Matapelajaran');
					return;
				}


				if(cu_elearn_qm_quest_definition_id == "PILIH") 
				{
					alert('Please selected Definition Soal');
					return;
				}

				if(cu_min_value == "") 
				{
					alert('Minimum value is empty, Please Enter a value');
					return;
				}
				
				if(cu_time == "") 
				{
					alert('Processing time is empty, Please Enter a value');
					return;
				}

				if (classCheckbox.length === 0) 
			    { 
			        alert('Data kelas yang akan di Ujikan belum di pilih'); 
			        return false;
			    } 
      break;
      case 'quest':
	    	if (page=='quest') title = 'Soal';
	    	var cu_question = tinyMCE.get('cu_question').getContent() ;//CKEDITOR.instances.cu_question.document.getBody().getChild(0).getText() ;//$('#cu_question').val();
			
	    	if(cu_question.trim()=="") 
			{
				alert('Pertanyaan '+title+' is empty, Please Enter a ');
				return;
			}
			var cu_choice_a = tinyMCE.get('cu_choice_a').getContent() ;//CKEDITOR.instances.cu_choice_a.document.getBody().getChild(0).getText() ;//$('#cu_choice_a').val();
	    	
			if(cu_choice_a.trim() == "") 
			{
				alert('Pilihan A '+title+' is empty, Please Enter a value');
				return;
			}
			
			var cu_choice_b = tinyMCE.get('cu_choice_b').getContent() ;//CKEDITOR.instances.cu_choice_b.document.getBody().getChild(0).getText() ;//$('#cu_choice_b').val();
	    	if(cu_choice_b.trim() == "") 
			{
				alert('Pilihan B '+title+' is empty, Please Enter a value');
				return;
			}
			
			var cu_choice_c =  tinyMCE.get('cu_choice_c').getContent() ;//CKEDITOR.instances.cu_choice_c.document.getBody().getChild(0).getText() ;//$('#cu_choice_c').val();
	    	if(cu_choice_c.trim() == "") 
			{
				alert('Pilihan C '+title+' is empty, Please Enter a value');
				return;
			}
			
			var cu_choice_d = tinyMCE.get('cu_choice_d').getContent() ;//CKEDITOR.instances.cu_choice_d.document.getBody().getChild(0).getText() ;//$('#cu_choice_d').val();
	    	if(cu_choice_d.trim() == "") 
			{
				alert('Pilihan D '+title+' is empty, Please Enter a value');
				return;
			}
			
			var cu_choice_e = tinyMCE.get('cu_choice_e').getContent() ;//CKEDITOR.instances.cu_choice_e.document.getBody().getChild(0).getText() ;//$('#cu_choice_e').val();
	    	if(cu_choice_e.trim() == "") 
			{
				alert('Pilihan E '+title+' is empty, Please Enter a value');
				return;
			}
			
			var cu_explanation = tinyMCE.get('cu_explanation').getContent() ;//CKEDITOR.instances.cu_explanation.document.getBody().getChild(0).getText() ;//$('#cu_explanation').val();
	    	if(cu_explanation.trim() == "") 
			{
				alert('Pilihan Pembahasan '+title+' is empty, Please Enter a value');
				return;
			}
      break;
      case 'quest_backup':
	    	if (page=='quest_backup') title = 'Backup Soal';
	    	var cu_date_start = $('#cu_date_start').val();
	    	if(cu_date_start == "") 
				{
					alert('date start is empty, Please Enter a value');
					return;
				}
				var cu_date_end = $('#cu_date_end').val();
	    	if(cu_date_end == "") 
				{
					alert('date end is empty, Please Enter a value');
					return;
				}
      break;
	    case 'manage':
	    	if (page=='manage') title = 'Manajemen Soal';
        	
        	var cu_elearn_qm_tryout_id = $('#cu_elearn_qm_tryout_id').val();
			if(cu_elearn_qm_tryout_id == "") 
			{
				alert(title+' name is empty, Please Enter a value');
				return;
			}

			var fields2 = $("input[name='quest[]']").serializeArray(); 
		    if (fields2.length === 0) 
		    { 
		        alert('Soal belum di pilih'); 
		        return false;
		    } 
		    else if (parseInt(fields2.length) != parseInt($('#cu_elearn_qm_tryout_id').find(':selected').attr("amountquest"))) 
		    { 
		        alert(" Anda harus memilih "+$('#cu_elearn_qm_tryout_id').find(':selected').attr("amountquest")+" soal, anda memilih "+fields2.length+" soal"); 
		        return false;
		    }
			
      break;
		} 
					  
		$.ajax({
		    type: "POST",
		    url: "../model/QuestionsManagement/qm_crud.php",
		    data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function() {
            $("#loading-image-add").show();
        },
		
		}).done(function(data) {
			
			alert(data);
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


 function showSubMapel()
 {
	var cu_elearn_md_study_id_quest = document.getElementById("cu_elearn_md_study_id_quest").value;
	$.ajax({
	url: "../model/QuestionsManagement/data_ajax.php?cu_elearn_md_study_id_quest="+ cu_elearn_md_study_id_quest +"",
	success: function(response){
		
	$("#cu_elearn_md_sub_study_id").html(response);
	},
	dataType:"html"
	});
	return false;
 }

function SelectTeacher(me)
{
	// window.location.href = "?page="+$('#page').val()+"&mod=qm&action=list&teacher_id="+$('#teacher_id').val()+"&study_id="+$('#study_id').val()+"&level_id="+$('#level_id').val();
}

function SelectStudy(me)
{
	alert('study')
	// window.location.href = "?page="+$('#page').val()+"&mod=qm&action=list&teacher_id="+$('#teacher_id').val()+"&study_id="+$('#study_id').val()+"&level_id="+$('#level_id').val();
}

function SelectLevel(me)
{
	// var datas="id="+id+"&userid="+userid+"&page="+page+"&action="+action;
	var page = $('#page').val();
	var action = $('#action').val();
	var id = $('#id').val();
	var datas = 'page='+page+'&mod=qm&action='+action+'&id=3';
	alert(datas);
	
	$.ajax({
	   type: "POST",
	  url: "../backend/index.php",
	  data: datas
	}).done(function(data) {
		
		// alert('Delete successfuly');
		// location.href = "?page="+page+"&action=list";
	});
	// window.location.href = "?page="+$('#page').val()+"&mod=qm&action=list&teacher_id="+$('#teacher_id').val()+"&study_id="+$('#study_id').val()+"&level_id="+$('#level_id').val();
}