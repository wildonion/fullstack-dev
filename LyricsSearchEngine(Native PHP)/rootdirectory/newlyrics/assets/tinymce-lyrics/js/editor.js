function umce(){tinyMCE.triggerSave()};
function ut(){
	$.ajax({
		type:"POST",
		url:'assets/tinymce-lyrics/save.php',
		data:"text="+encodeURIComponent($("#main_editor").val()),
		success:function(){
			$('.form').hide();
			$('#loadgif').html("<img src='assets/load.gif' alt='loading' width='200' height='200'/>")
			.fadeIn(750).delay(100).fadeOut(100);
			$('.form').show();
			$("#h1").html("Now You Can Edit Your Lyrics Here ;-)");
			$("#info").html("If you want, try to edit the lyrics in the editor and click Save");
		    setTimeout(function(){$('#main_editor').load('fetchlyrics.php');},2000);
	   }
	});
    return false;
};