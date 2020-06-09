<!-- CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
<!-- JS files -->
<script src="<?=base_url();?>assets/js/validation.js"></script>
<script src="<?=base_url();?>assets/js/editor.js"></script>
<script src="<?=base_url();?>assets/js/show_todo.js"></script>
<script src="<?=base_url();?>assets/js/save_del_strike_todo.js"></script>
<script src="<?=base_url();?>assets/js/new_msg.js"></script>
<script src="<?=base_url();?>assets/js/inputTags.jquery.js"></script>
<script src="<?=base_url();?>assets/js/app.js"></script>
<script src="<?=base_url();?>assets/js/ajax_upload_img.js"></script>
<script src="<?=base_url();?>assets/js/show_avatar.js"></script>
<script src="<?=base_url();?>assets/js/security_up_pass.js"></script>
<script src="<?=base_url();?>assets/js/edit_bio.js"></script>
<script src="<?=base_url();?>assets/js/likes.js"></script>
<script src="<?=base_url();?>assets/js/get_lyrics.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="<?=base_url();?>assets/js/tinymce_ini.js"></script>
<!-- Script Tags -->
<script>
// fade the successful box out
eval(function(p,a,c,k,e,r){e=String;if(!''.replace(/^/,String)){while(c--)r[c]=k[c]||c;k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(\'.0\').1(2).3(4);',5,5,'isa_success|delay|2000|fadeOut|300'.split('|'),0,{}))
// hide the editor
eval(function(p,a,c,k,e,r){e=String;if(!''.replace(/^/,String)){while(c--)r[c]=k[c]||c;k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(\'#0-1-2\').3();',4,4,'container|for|tinymce|hide'.split('|'),0,{}))
// refresh the current page, anchor tag is the trigger
eval(function(p,a,c,k,e,r){e=String;if(!''.replace(/^/,String)){while(c--)r[c]=k[c]||c;k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$("#0").1(2(){3.4()});',5,5,'ref_cur|click|function|location|reload'.split('|'),0,{})) 
// toggle menu for sidebar
eval(function(p,a,c,k,e,r){e=String;if(!''.replace(/^/,String)){while(c--)r[c]=k[c]||c;k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$("#1-2").3(4(0){0.5();$("#6").7("8")});',9,9,'e|menu|toggle|click|function|preventDefault|wrapper|toggleClass|toggled'.split('|'),0,{}))

$(document).ready(function() {
    $("#fileUpload").on('change', function() {
      //Get count of selected files
      var countFiles = $(this)[0].files.length;
      var imgPath = $(this)[0].value;
      var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
      var image_holder = $("#image-holder");
      image_holder.empty();
      if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof(FileReader) != "undefined") {
          //loop for each file selected for uploaded.
          for (var i = 0; i < countFiles; i++) 
          {
            var reader = new FileReader();
            reader.onload = function(e) {
              $("<img />", {
                "src": e.target.result,
                "class": "thumb-image",
                "width": 178,
                "height": 100,
                "id": "avatar"
              }).appendTo(image_holder);
            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[i]);
          }
        } else {
          alert("This browser does not support FileReader.");
        }
      } else {
        alert("Pls select only images");
        $("#up_prof_link").hide();
      }
    });
  });
    $("#up_prof_link").hide();
    function show_img(){     
         $("#up_prof_link").show();
    }
    
    function setbg(color){
   document.getElementById("comm").style.background=color
}
// auto logout for other pages
var timer = 0;
function set_interval() {
  // the interval 'timer' is set as soon as the page loads
  timer = setInterval("auto_logout()", 300000);
  // the figure '10000' above indicates how many milliseconds the timer be set to.
  // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
  // So set it to 300000
}

function reset_interval() {
  //resets the timer. The timer is reset on each of the below events:
  // 1. mousemove   2. mouseclick   3. key press 4. scroliing
  //first step: clear the existing timer

  if (timer != 0) {
    clearInterval(timer);
    timer = 0;
    // second step: implement the timer again
    timer = setInterval("auto_logout()", 300000);
    // completed the reset of the timer
  }
}

function auto_logout() {
  // this function will redirect the user to the logout script
  window.location = "auto_logout";
}
    
    var fixmeTop = $('#sidebar-wrapper').offset().top;       // get initial position of the element

   $(window).scroll(function() {                  // assign scroll event listener

    var currentScroll = $(window).scrollTop(); // get current position

    if (currentScroll >= fixmeTop) {           // apply position: fixed if you
        $('#sidebar-wrapper').css({                      // scroll to that element or below it
            top: '0',
        });
    } else {                                   // apply position: static
        $('#sidebar-wrapper').css({                      // if you scroll above it
            top: '',
        });
    }

});

   function log_out(){
     window.location = "admin_dashboard/logout"
   }
</script>