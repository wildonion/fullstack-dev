$(document).ready(function(){
    "use strict";
	$("#FormSubmit").click(function(e){
		e.preventDefault();
		if($("#mname").val()===''||
			$('#sname').val()===''||
			$('#genre').val()===''||
			$('#album').val()===''||
			$('#publishyear').val()===''||
			$('#artist').val()===''){
			alert("Please fill all the fields!");return false
		}
	var data={'mname':$("#mname").val(),
				'sname':$('#sname').val(),
				'genre':$('#genre').val(),
				'album':$('#album').val(),
				'publishyear':$('#publishyear').val(),
				'artist':$('#artist').val()
			};


$.ajax({
	type:"POST",
	url:"http://[::1]/cms/admin_dashboard/send_ajax",
	dataType:"text",
	data:data,
	beforeSend:function(){
		$("#FormSubmit").hide();
		$("#LoadingImage").show()
	},
	success:function(){
		$('.container-field').remove();
		$('#container-for-tinymce').show();
	},
	error:function(xhr,ajaxOptions,thrownError){
		$("#FormSubmit").show();
		$("#LoadingImage").hide();
		alert(thrownError);
	  }
	})
  })
});