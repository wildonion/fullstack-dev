$(document).ready(function() {

	//##### send add record Ajax request to response.php #########
	$("#FormSubmit").click(function (e) {
			e.preventDefault();
			if($("#mname").val()==='' || 
			   $('#sname').val() === '' || 
			   $('#genre').val()==='' || 
			   $('#album').val()==='' ||
			   $('#publishyear').val() ==='' ||
			   $('#artist').val()==='')
			{
				alert("Please fill all the fields!");
				return false;
			}
			
			$("#FormSubmit").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
		 	var myData = 'mname='+ $("#mname").val() + 
		 	             '&sname='+ $('#sname').val() +
		 	             '&genre='+ $('#genre').val() +
		 	             '&album='+ $('#album').val() +
		 	             '&publishyear='+ $('#publishyear').val() +
		 	             '&artist='+ $('#artist').val(); //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				setTimeout(function(){$('.form').load('assets/tinymce-lyrics/index.php');},2000);

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#FormSubmit").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});

});