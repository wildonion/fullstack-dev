function umce(){tinyMCE.triggerSave()};
function ut(){
    "use strict";
	$.ajax({
		type:"POST",
		url:'http://[::1]/cms/admin_dashboard/save_lyrics',
		data:"text="+encodeURIComponent($("#lyrics").val()),
		success:function(){
			$('#container-for-tinymce').hide();
			$('#load_gif').html("<img src='http://[::1]/cms/assets/images/load.gif' alt='loading' width='200' height='200'/>")
			.fadeIn(750).delay(100).fadeOut(100);
			$('#container-for-tinymce').show();
			$("#h3").remove();
			$("#info").html("try to edit the lyrics in the editor and click Save again or click on refresh button to add another lyrics ;-)");
	   },
	   error:function(xhr,ajaxOptions,thrownError){
		alert(thrownError);
	  }
	});
    return false;
};