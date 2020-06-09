$(document).ready(function(){
    "use strict";
		jQuery.ajax({
			type: "POST", 
			url: "http://[::1]/cms/admin_dashboard/show_todo", 
			success:function(response){
				$("#responds").append(response);
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
		 });

	});