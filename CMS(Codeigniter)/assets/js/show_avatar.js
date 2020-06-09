setInterval(function(){
"use strict";
   var data={'id':$("#admin_id").val()};
    $.ajax({                    
      url: 'http://[::1]/cms/admin_dashboard/navbar_show_avatar',     
      type: 'post',
      data : data,
      dataType: 'text',
      cache: false,
      success:function(show_avatar){
          $("#avatar_link").html(show_avatar);
            // Get the modal
            var modal = document.getElementById('profModal');

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById('prof');
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
      },
      error:function(xhr,ajaxOptions,thrownError){	
        alert(thrownError);
      }
    });
}, 1000);