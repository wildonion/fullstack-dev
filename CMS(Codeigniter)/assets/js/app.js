jQuery(document).ready(function($){
        "use strict";
           var data={'id':jQuery("#admin_id").val()};
            jQuery.ajax({                    
              url: 'http://[::1]/cms/admin_dashboard/ajax_show_tags',     
              type: 'post',
              data : data,
              dataType: 'text',
              cache: false,
              success:function(skills){
                  var tags = jQuery('#tags').inputTags({
                  tags: skills.split(/\s*,\s*/),
              autocomplete: {
              values: ['PHP', 'Javascript', 'CSS', 'jQuery', 'HTML', 'AJAX', 'C#', 'C++', 'Python', 'node.js', 'JAVA', 'Perl', 'Ruby', 'MySQL', 'DS', 'SQL Server', 'Back-End Developer', 'Front-End Developer']
                       },
                   });
              },
              error:function(xhr,ajaxOptions,thrownError){	
                alert(thrownError);
              }
      });
});