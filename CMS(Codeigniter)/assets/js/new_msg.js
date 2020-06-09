$(document).ready(function(){
    "use strict";
   var isNumRows = false;
    
    jQuery.ajax({
      type: "POST", 
      dataType: "json",
      url: "http://[::1]/cms/admin_dashboard/show_messages", 
      success:function(response){
        // if 'new' field in database is set to 'Y' append the number of rows to the tag_icon element
        if(Number.isInteger(response[0]["num_rows"])){
          isNumRows = true;
          $("#tag_icon").append(response[0]["num_rows"]); 
        }
        
        $.each(response, function(idx, obj) {
           $("#menu1").prepend('<li id="lis_of_messages"><a><span><span id="user_name"><strong>'+ obj.name +
            '</strong></span><span class="time" id="msg_date">'+obj.msg_date+
            '</span></span><span class="message" id="msgs">'+obj.message+' ...'+
            '</span></a></li>');
        });

        if(isNumRows){
           // add css property to the list of messages here
              $("#lis_of_messages").mouseover(function(){
              $("#lis_of_messages").css("background-color", "#ffc299");
          });
          $("#lis_of_messages").mouseout(function(){
              $("#lis_of_messages").css("background-color", "#fff7e6");
          });
        }
      },
      error:function (xhr, ajaxOptions, thrownError){
        alert(thrownError);
      }
     });

  });

  $('#msg').click(function(){
      "use strict";
    $('#tag_icon').remove();
    // ajax call 
    jQuery.ajax({
    type: 'POST', 
    url: 'http://[::1]/cms/admin_dashboard/message_update_item', 
    error:function (xhr, ajaxOptions, thrownError){
      alert(thrownError);
    }
   });
});