function sendData(){
    "use strict";
   var data={'email':$("#admin_email").val()};
    $.ajax({                    
      url: 'http://[::1]/cms/admin_dashboard/get_admin_email_for_up_img',     
      type: 'post',
      data : data,
      dataType: 'text',
      cache: false,
      error:function(xhr,ajaxOptions,thrownError){	
        alert(thrownError);
      }
    });
  var form_data = new FormData($('#update_img')[0]);
  
$.ajax({
	type:"POST",
	url:"http://[::1]/cms/admin_dashboard/update_img",
    data:  form_data,
    mimeType:"multipart/form-data",
    contentType: false,
    cache: false,
    processData:false,
	beforeSend:function(){
		$("#up_prof").delay(100).fadeOut("slow");
        $(".fileUpload").delay(100).fadeOut("slow");
	},
	success:function(msg){    
        setTimeout(function(){
            if(msg!= ''){
                $("#ajax_msg").html(msg);
                
            } else{
                $("#ajax_msg").html("<div class='isa_success' id='ajax_suc_msg'><i class='fa fa-check'></i>Successfully Updated!</div>");
                $("#ajax_suc_msg").delay(4000).fadeOut("slow");
                $("#up_prof_link").delay(300).fadeOut("slow");
                
            }
            $("#up_prof").delay(900).fadeIn("slow");
            $(".fileUpload").delay(900).fadeIn("slow");
        }, 600);
        
	},
	error:function(xhr,ajaxOptions,thrownError){	
		alert(thrownError);
	  }
	});
}