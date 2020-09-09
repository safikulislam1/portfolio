$(function () {

    $('#exampleSlider').multislider(
        {interval: 4000, slideAll: true, duration: 1500}
    );

    $(window).scroll(function () {
        if ($(window).scrollTop() >= 120) {
            $('.fix-nav').addClass('fixed-header');
        } else {
            $('.fix-nav').removeClass('fixed-header');
        }
    });

    $('.collapse-menu span').click(function () {
        $('.header nav ul').toggle();
    });

    $('.btn').click(function () {
        var value = $(this).attr('data-filter');
        if (value == 'all') {
            $('.filter').show('1000');
        } else {
            $('.filter')
                .not('.' + value)
                .hide('1000');
            $('.filter')
                .filter('.' + value)
                .show('1000');
        }

        $('ul .btn').click(function () {
            $(this)
                .addClass('active')
                .siblings()
                .removeClass('active');
        })

    });

    $('.box').click(function () {

        $('.fixed-header').hide();

    });
    $('.example-image').click(function () {

        $('.fixed-header').hide();

    });

    $('.lb-close, #lightbox').click(function () {

        // $('.fixed-header').show();
        location.reload();

    });

});