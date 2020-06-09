$(document).ready(function() {
    "use strict";
	$("#add_todo").click(function (e) {
			e.preventDefault();
			if($("#todo").val()===''){
				alert("Please enter some text!");
				return false;
			}
			
			$("#add_todo").hide(); 
			$("#Loadingimage").show(); 
			
		 	var myData = 'content_txt='+ $("#todo").val(); 
			jQuery.ajax({
			type: "POST", 
			url: "http://[::1]/cms/admin_dashboard/save_todo", 
			dataType:"text", 
			data:myData, 
			success:function(response){
				$("#responds").append(response);
				$("#todo").val(''); 
				$("#add_todo").show(); 
				$("#Loadingimage").hide(); 

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#add_todo").show(); 
				$("#Loadingimage").hide(); 
				alert(thrownError);
			}
		 });
	});

	$("body").on("click", "#responds .del_button", function(e) {
		 e.preventDefault();
		 var clickedID = this.id.split('-'); 
		 var DbNumberID = clickedID[1]; 
		 var myData = 'recordToDelete='+ DbNumberID; 
		 
		$('#item_'+DbNumberID).addClass( "sel" ); 
		$(this).hide(); 
		 
			jQuery.ajax({
			type: "POST", 
			url: "http://[::1]/cms/admin_dashboard/delete_todo/", 
			dataType:"text", 
			data:myData, 
			success:function(response){
				$('#item_'+DbNumberID).fadeOut();
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
	});

    $("body").on("click", "#responds .content", function(e) {
		 e.preventDefault();
		 var clickedID = this.id.split('-'); 
		 var DbNumberID = clickedID[1]; 
		 //$('#content-'+DbNumberID).css("text-decoration", "line-through");
		 
			$('#item_'+DbNumberID).addClass( "st" ); 
			$(this).css("text-decoration", "line-through"); 
	});
			
});