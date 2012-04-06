$(document).ready(function() {
    $('.alert').bind('closed', function () {
        var count = $("#notices .well").children().length;
        if(count <= 1) {
            $('.notices').animate({
                opacity: 0,
                height: 'toggle',
                padding: 0,
                margin: 0
            }, 200);
        }
    });
	$().UItoTop({ easingType: 'easeOutQuart' });
});