$(document).ready(function(){
    "use strict";
    var skills = '';
    var birth_date = '';
    var bio = '';
  //---------------------------------------------------------------------------------
    $("#bio").keypress(function(){
        
        var vall = $(this).val();
        
        if(vall == ''){
            bio = "";
        } else if(vall.length < 5){
            $("#bio").css({"outline":"none !important", "border":"3px solid red", "box-shadow":"0 0 10px #ff0000"});
            $("#err_msg_for_bio").html('');
            $("#err_msg_for_bio").html("<div style='color:#D8000C'><i class='fa fa-times-circle'></i> 5 characters long required.</div>");
            bio = "";
        } else{
            $("#bio").css({"outline":"", "border":"", "box-shadow":""});
            $("#err_msg_for_bio").html("<img src='http://[::1]/cms/assets/images/saving.gif' alt='saving' width='80' height='80'/>");
            bio = vall;
            var data={'bio': bio, 'id':$("#admin_id").val()};
        $.ajax({
              url: 'http://[::1]/cms/admin_dashboard/ajax_update_bio',     
              type: 'post',
              data : data,
              dataType: 'text',
              cache: false,
              success:function(){
                $("#err_msg_for_bio").html('');

              },
              error:function(xhr,ajaxOptions,thrownError){	
                alert(thrownError);
              }
           });
        }
    });
  //---------------------------------------------------------------------------------
     $("#b_date").change(function(){
        
        var vall = $(this).val();
         
        if(vall == ''){
            birth_date = "";
        } else{
            $("#err_msg_for_bio").html("<img src='http://[::1]/cms/assets/images/saving.gif' alt='saving' width='80' height='80'/>");
            birth_date = vall;
            var data={'b_date': birth_date, 'id':$("#admin_id").val()};
        $.ajax({
              url: 'http://[::1]/cms/admin_dashboard/ajax_update_bdate',     
              type: 'post',
              data : data,
              dataType: 'text',
              cache: false,
              success:function(){
                $("#err_msg_for_bio").html('');

              },
              error:function(xhr,ajaxOptions,thrownError){	
                alert(thrownError);
              }
           });
        }
    });
  //---------------------------------------------------------------------------------
     $("#tags").keyup(function(){
        
        var vall = $(this).val();
         
        if(vall == ''){
            skills = "";
        } else{
            $("#err_msg_for_bio").html("<img src='http://[::1]/cms/assets/images/saving.gif' alt='saving' width='80' height='80'/>");
            skills = vall;
            var data={'skills': skills, 'id':$("#admin_id").val()};
        $.ajax({
              url: 'http://[::1]/cms/admin_dashboard/ajax_update_skill',     
              type: 'post',
              data : data,
              dataType: 'text',
              cache: false,
              success:function(){
                $("#err_msg_for_bio").html('');

              },
              error:function(xhr,ajaxOptions,thrownError){	
                alert(thrownError);
              }
           });
        }
    });

});
  