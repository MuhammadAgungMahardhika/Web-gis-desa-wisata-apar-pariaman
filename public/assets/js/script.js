// smooth scrooling

jQuery(document).ready(function ($) {
    var scrollSpy = new bootstrap.ScrollSpy(document.body, { target: '#navbar-example' });

    $('#MyName .NamaSaya').addClass('muncul');
    $('#MyFoto .rounded-circle').addClass('muncul');

    $('#MyCertificates .card').hover(function () {
        $('.star').css({
            'transition': '2s',
            'color': '#ffd700'
        });
    });

    $(window).scroll(function () {

        var wScrool = $(this).scrollTop();
        //parallax efek untuk tulisan about me

        if (wScrool > $('#About').offset().top - 500) {
            $('.efek1').addClass('muncul');
           $('.efek5').addClass('muncul');

        }
        //parallax untuk tulisan myproject

        if (wScrool > $('#MyProjects').offset().top - 500) {
            $('#MyProjects .efek2').addClass('muncul');

        }

        //parralax efek pada card my projects

        if (wScrool > $('#MyProjects').offset().top - 500) {
            $('#MyProjects .card ').addClass('muncul');

        } else {
            $('#MyProjects .card ').removeClass('muncul');

        }
        //parallax untuk tulisan My certificate
        if (wScrool > $('#MyCertificates').offset().top - 500) {
            $('#MyCertificates .efek3').addClass('muncul');

        }
        //parallax efek pada card my certificate

        if (wScrool > $('#MyCertificates').offset().top - 500) {
            $('#MyCertificates .card ').addClass('muncul');

        } else {
            $('#MyCertificates .card ').removeClass('muncul');

        }
        //parallax efek untuk tulisan contact

    });

});