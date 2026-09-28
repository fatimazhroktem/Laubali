   $('.devin-show-card').click(function(e) {
    $('.devin-card').addClass('show').css('display', 'block');
    $('.devin-show-card').addClass('hide');
});

$('.devin-card .close').click(function(e) {
    $('.devin-card').addClass('hide');
    setTimeout(function() {
        $('.devin-card').css('display', 'none').removeClass('show').removeClass('hide');
    }, 1000);
    $('.devin-show-card').removeClass('hide');
});



   $('.feris-show-card').click(function(e) {
    $('.feris-card').addClass('show').css('display', 'block');
    $('.feris-show-card').addClass('hide');
});

$('.feris-card .close').click(function(e) {
    $('.feris-card').addClass('hide');
    setTimeout(function() {
        $('.feris-card').css('display', 'none').removeClass('show').removeClass('hide');
    }, 1000);
    $('.feris-show-card').removeClass('hide');
});


   $('.melwover-show-card').click(function(e) {
    $('.melwover-card').addClass('show').css('display', 'block');
    $('.melwover-show-card').addClass('hide');
});

$('.melwover-card .close').click(function(e) {
    $('.melwover-card').addClass('hide');
    setTimeout(function() {
        $('.melwover-card').css('display', 'none').removeClass('show').removeClass('hide');
    }, 1000);
    $('.melwover-show-card').removeClass('hide');
});


   $('.mesma-show-card').click(function(e) {
    $('.mesma-card').addClass('show').css('display', 'block');
    $('.mesma-show-card').addClass('hide');
});

$('.mesma-card .close').click(function(e) {
    $('.mesma-card').addClass('hide');
    setTimeout(function() {
        $('.mesma-card').css('display', 'none').removeClass('show').removeClass('hide');
    }, 1000);
    $('.mesma-show-card').removeClass('hide');
});


 $('.sumeyye-show-card').click(function(e) {
    $('.sumeyye-card').addClass('show').css('display', 'block');
    $('.sumeyye-show-card').addClass('hide');
});

$('.sumeyye-card .close').click(function(e) {
    $('.sumeyye-card').addClass('hide');
    setTimeout(function() {
        $('.sumeyye-card').css('display', 'none').removeClass('show').removeClass('hide');
    }, 1000);
    $('.sumeyye-show-card').removeClass('hide');
});