$(document).ready(function(){
    "use strict";
    var curr_pass = '';
    var new_pass = '';
    var con_new_pass = '';
  //---------------------------------------------------------------------------------
    $("#curr_pass").keyup(function(){
        
        var vall = $(this).val();
        
        if(vall == ''){
            $("#curr_pass").css({"outline":"none !important", "border":"3px solid red", "box-shadow":"0 0 10px #ff0000"});
            curr_pass = "";
        } else if(vall.length < 8){
            $("#err_msg").html("<div style='color:#D8000C'><i class='fa fa-times-circle'></i> your current password must be 8-20 characters</div>");
            $("#curr_pass").css({"outline":"none !important", "border":"3px solid red", "box-shadow":"0 0 10px #ff0000"});
            curr_pass = "";
        } else{
            $("#err_msg").html('');
            $("#curr_pass").css({"outline":"none !important", "border":"3px solid #1aff1a", "box-shadow":"0 0 10px #1aff1a"});
            curr_pass = vall;
        }
    });
  //---------------------------------------------------------------------------------
    $("#new_pass").keyup(function(){
        
        var vall = $(this).val();
        
        if(vall == ''){
            $("#new_pass").css({"outline":"none !important", "border":"3px solid red", "box-shadow":"0 0 10px #ff0000"});
            new_pass = "";
        } 
        else if(vall.search(/^\S*$/)==-1){
            $("#err_msg").html("<div style='color:#D8000C'><i class='fa fa-times-circle'></i> new password must have no spaces.</div>");
            $("#new_pass").css({"outline":"none !important", "border":"3px solid red", "box-shadow":"0 0 10px #ff0000"});
            new_pass = "";
        } 
        else if(vall.search(/.*^(?=.{8,20})(?=.*[a-z]).*$/)==-1){
            $("#err_msg").html("<div style='color:#D8000C'><i class='fa fa-times-circle'></i> must be 8-20 characters. at least one lowercase letter,</div>");
            $("#new_pass").css({"outline":"none !important", "border":"3px solid red", "box-shadow":"0 0 10px #ff0000"});
            new_pass = "";
        } 
        else if(vall.search(/.*^(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/)==-1){
            $("#err_msg").html("<div style='color:#D8000C'><i class='fa fa-times-circle'></i> one uppercase letter, one digit and allows specifying special characters.</div>");
            $("#new_pass").css({"outline":"none !important", "border":"3px solid red", "box-shadow":"0 0 10px #ff0000"});
            new_pass = "";
        } 
        else if(vall == curr_pass){
            $("#err_msg").html("<div style='color:#D8000C'><i class='fa fa-times-circle'></i> current password and new password shouldnt be the same.</div>");
            $("#new_pass").css({"outline":"none !important", "border":"3px solid red", "box-shadow":"0 0 10px #ff0000"});
            new_pass = "";
        }
        else{
            $("#err_msg").html('');
            $("#new_pass").css({"outline":"none !important", "border":"3px solid #1aff1a", "box-shadow":"0 0 10px #1aff1a"});
            new_pass = vall;
        }

    });
  //---------------------------------------------------------------------------------
    $("#confirm_pass").keyup(function(){
        
        var vall = $(this).val();
        
        if(vall == ''){
            $("#confirm_pass").css({"outline":"none !important", "border":"3px solid red", "box-shadow":"0 0 10px #ff0000"});
            con_new_pass = "";
        } else if(vall != new_pass){
            $("#err_msg").html("<div style='color:#D8000C'><i class='fa fa-times-circle'></i> password and confirm password doesnt match</div>");
            con_new_pass = "";
        } else{
            $("#err_msg").html('');
            $("#confirm_pass").css({"outline":"none !important", "border":"3px solid #1aff1a", "box-shadow":"0 0 10px #1aff1a"});
            con_new_pass = vall;
        }

    });
  //--------------------------------------------------------------------------------- 
    $("#up_pass").click(function(e){
		e.preventDefault();
        if(curr_pass === ''|| new_pass === ''|| con_new_pass === ''){
            alert("pls fill all the fields!");
            return;
        }
        var data={'current_pass':curr_pass, 'new_pass': new_pass, 'con_new_pass': con_new_pass, 'id':$("#admin_id").val()};
        $.ajax({
              url: 'http://[::1]/cms/admin_dashboard/ajax_update_pass',     
              type: 'post',
              data : data,
              dataType: 'text',
              cache: false,
              success:function(msg){
                   if(msg != ''){
                       alert(msg);
                  }
                  $("#curr_pass").val('');
                  curr_pass = '';
                  $("#new_pass").val('');
                  new_pass = '';
                  $("#confirm_pass").val('');
                  con_new_pass = '';
                  $("#curr_pass").css({"outline":"", "border":"", "box-shadow":""});
                  $("#new_pass").css({"outline":"", "border":"", "box-shadow":""});
                  $("#confirm_pass").css({"outline":"", "border":"", "box-shadow":""});
                  $("#err_msg").html("<div style='color:#4F8A10'><i class='fa fa-check'></i> Successfully Updated.</div>").fadeIn(1000).delay(3000).fadeOut(2000);

              },
              error:function(xhr,ajaxOptions,thrownError){	
                alert(thrownError);
              }
        });
    });
});