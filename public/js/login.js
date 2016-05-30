/**
 * Created by Phuwanart on 12/23/2015.
 */
$(document).ready(function() {
    $('#login').on('click', function() {
        $('div.panel').animate({
            'width': 'show'
        }, 1000, function() {
            $('div.login').fadeIn(500);
        });
    });



    $('span.closelogin').on('click', function() {
        $('div.login').fadeOut(500, function() {
            $('div.panel').animate({
                'width': 'hide'
            }, 1000);
        });
    });
});