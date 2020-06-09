$(document).ready(function(){

	$("body").ready(function(){

		$.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "deactive.php",
                    cache: false,
                    success: function(htmldata) {
                     if(htmldata != ''){
                       $('form').remove();
                       $('body').css('background-image', 'none');
                       $('body').css('background-color', '#0099cc');
                       $('#dsite').html(htmldata);
                       }
                    }
                   
                     
                  });

	});
});