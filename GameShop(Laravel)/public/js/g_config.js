$(document).ready(function() {
    var vg = new vGallery({
        gallery: '#gallery',
        images: [
            $("#img1").val(),
            $("#img2").val(),
            $("#img3").val(),
            $("#img4").val(),
            $("#img5").val(),
            $("#img6").val(),
            $("#img7").val(),
            $("#img8").val(),
            $("#img9").val()
        ],
        indicators: {
            element: '#indicators',
            round: true,
            opacity:0.5,
        },
        text: {
            element: '#text',
            items: [
                '<div class="text_header">'+$('#title1').val()+'</div>'+$('#caption1').val(),
                '<div class="text_header">'+$('#title2').val()+'</div>'+$('#caption2').val(),
                '<div class="text_header">'+$('#title3').val()+'</div>'+$('#caption3').val(),
                '<div class="text_header">'+$('#title4').val()+'</div>'+$('#caption4').val(),
                '<div class="text_header">'+$('#title5').val()+'</div>'+$('#caption5').val(),
                '<div class="text_header">'+$('#title6').val()+'</div>'+$('#caption6').val(),
                '<div class="text_header">'+$('#title7').val()+'</div>'+$('#caption7').val(),
                '<div class="text_header">'+$('#title8').val()+'</div>'+$('#caption8').val(),
                '<div class="text_header">'+$('#title9').val()+'</div>'+$('#caption9').val(),
            ],
        },
        loading: {
            image: '/images/loading.gif',
        },
    });
    vg.start();
});
/*==================================================================================================*/
var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 7000); 
    }