// Sliding sidebar
var sipPos = 0;
$(document).ready(function() {
    // Sliding left sidebar
    $("#panel-tab").click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        $("#panel").animate({ left: sipPos }, 410, 'linear', function() {
            $('.side-toggle').toggleClass('open');
            if(sipPos == 0) { sipPos = -205; }
            else { sipPos = 0; }
        });
    });
    $("#panel").click(function(e) {
        e.stopPropagation();
    });
    $('html').click(function(e)
    {
        if ( $('.side-toggle').hasClass('open') ) {
            // alert(+sipPos);
            $("#panel").animate({ left: -205 }, 410, 'linear', function() {

                $('.side-toggle').toggleClass('open');
                if(sipPos == 0) { sipPos = -205; }
                else { sipPos = 0; }
            });
    }

    });
});