$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})
/*-----------------------------------------------------*/
$(function() {
    $('.like').click(function(e) {
        e.preventDefault();
        var l = Ladda.create(this);
        var id=$(this).attr("id");
        l.start();
        $.post("/like", {
            "news_id" : $(this).attr("id"),
            "user_ip": $('#user_ip').val()
        }, function(response) {
            if(response.result!=null&&response.result=="1"){
                if(response.isunlike=="1"){
                    $("#"+id).removeClass("fa fa-thumbs-o-up");
                    $("#"+id).addClass("fa fa-thumbs-o-down");
                    $("#"+id).css("color", "red");
                   // $("#"+id).html(response.text);
                    $("#n_likes").html(response.number_of_likes);
                }else{
                    $("#"+id).removeClass('fa fa-thumbs-o-down');
                    $("#"+id).addClass("fa fa-thumbs-o-up");
                    $("#"+id).css("color", "green");
                   // $("#"+id).html(response.text);
                    $("#n_likes").html(response.number_of_likes);
                }
            }else{
                alert("Server Error");
            }
        }, "json").always(function() {
            l.stop();
        });
        return false;
    });
});