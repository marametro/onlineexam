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
	   url: "../model/QuestionsManagement/qm_crud.php",
	   data: datas
    	}).done(function( data ) {
				alert('Delete successfuly');
				location.href = "?page="+page+"&action=list";
    	});
}


function SelectTeacher(me)
{
	window.location.href = "?page="+$('#page').val()+"&mod=qm&action=list&teacher_id="+$('#teacher_id').val()+"&study_id="+$('#study_id').val()+"&level_id="+$('#level_id').val();
}

function SelectStudy(me)
{
	window.location.href = "?page="+$('#page').val()+"&mod=qm&action=list&teacher_id="+$('#teacher_id').val()+"&study_id="+$('#study_id').val()+"&level_id="+$('#level_id').val();
}

function SelectLevel(me)
{
	window.location.href = "?page="+$('#page').val()+"&mod=qm&action=list&teacher_id="+$('#teacher_id').val()+"&study_id="+$('#study_id').val()+"&level_id="+$('#level_id').val();
}