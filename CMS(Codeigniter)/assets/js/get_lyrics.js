$('.animation_image').show();
setInterval(function(){
    $.ajax({                    
      url: 'http://[::1]/cms/admin_dashboard/ajax_get_lyrics',     
      type: 'post',
      dataType: 'text',
      cache: false,
      success:function(data){
          $("#results").html(data);
          $('.animation_image').hide();
      },
      error:function(xhr,ajaxOptions,thrownError){	
        alert(thrownError);
      }
    });
}, 5000);