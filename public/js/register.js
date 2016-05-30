/**
 * Created by Phuwanart on 12/23/2015.
 */
$(document).ready(function() {
    $('#register').on('click', function() {
        $('div.regispanel').animate({
            'width': 'show'
        }, 1000, function() {
            $('div.register').fadeIn(500);
        });
    });



    $('span.closeregister').on('click', function() {
        $('div.register').fadeOut(500, function() {
            $('div.regispanel').animate({
                'width': 'hide'
            }, 1000);
        });
    });
});