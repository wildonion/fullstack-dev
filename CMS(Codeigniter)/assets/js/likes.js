function addLikes(id,action) {
	$('.demo-table #lyrics-'+id+' li').each(function(index) {
		$(this).addClass('selected');
		$('#lyrics-'+id+' #rating').val((index+1));
		if(index == $('.demo-table #lyrics-'+id+' li').index(obj)) {
			return false;	
		}
	});
	$.ajax({
	url: "http://[::1]/cms/admin_dashboard/add_likes",
	data:'id='+id+'&action='+action,
	type: "POST",
	beforeSend: function(){
		$('#lyrics-'+id+' .btn-likes').html("<img src='http://[::1]/cms/assets/images/LoaderIcon.gif' />");
	},
	success: function(data){
	var likes = parseInt($('#likes-'+id).val());
	switch(action) {
		case "like":
		$('#lyrics-'+id+' .btn-likes').html('<input type="button" title="Unlike" class="unlike" onClick="addLikes('+id+',\'unlike\')" />');
		likes = likes+1;
		break;
		case "unlike":
		$('#lyrics-'+id+' .btn-likes').html('<input type="button" title="Like" class="like"  onClick="addLikes('+id+',\'like\')" />')
		likes = likes-1;
		break;
	}
	$('#likes-'+id).val(likes);
	if(likes>0) {
		$('#lyrics-'+id+' .label-likes').html(likes+" Like(s)");
	} else {
		$('#lyrics-'+id+' .label-likes').html('');
	}
	}
	});
}