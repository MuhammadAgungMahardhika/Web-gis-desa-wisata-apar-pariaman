// smooth scrooling

jQuery(document).ready(function ($) {
    var scrollSpy = new bootstrap.ScrollSpy(document.body, { target: '#navbar-example' });

    $('#MyName .NamaSaya').addClass('Muncul');
    $('#MyFoto .rounded-circle').addClass('muncul');

    $('#MyCertificates .card').hover(function () {
        $('.star').css({
            'transition': '2s',
            'color': '#ffd700'
        });
    });

    $(window).scroll(function () {

        var wScrool = $(this).scrollTop();
        // parallax efex pada tulisan Nama saya


        $('#MyFoto').css({
            'transform': 'translate(0px,' + wScrool / 12 + '%)'
        });

        $('#MyName').css({
            'transform': 'translate(0px,' + wScrool / 4 + '%)'
        });

        //parallax efek untuk tulisan about me

        if (wScrool > $('#About').offset().top - 500) {
            $('.efek1').addClass('Muncul');

        }
        //parallax untuk tulisan myproject

        if (wScrool > $('#MyProjects').offset().top - 500) {
            $('#MyProjects .efek2').addClass('Muncul');

        }

        //parralax efek pada card my projects

        if (wScrool > $('#MyProjects').offset().top - 500) {
            $('#MyProjects .card ').addClass('muncul');

        } else {
            $('#MyProjects .card ').removeClass('muncul');

        }
        //parallax untuk tulisan My certificate
        if (wScrool > $('#MyCertificates').offset().top - 500) {
            $('#MyCertificates .efek3').addClass('Muncul');

        }
        //parallax efek pada card my certificate

        if (wScrool > $('#MyCertificates').offset().top - 500) {
            $('#MyCertificates .card ').addClass('muncul');

        } else {
            $('#MyCertificates .card ').removeClass('muncul');

        }
        //parallax efek untuk tulisan contact

        if (wScrool > $('#MyContacts').offset().top - 500) {
            $('.efek4').addClass('Muncul');

        }
        //parallax efek untuk card my contact

    });

});