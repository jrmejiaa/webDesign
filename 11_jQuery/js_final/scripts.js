$(function(){	 // JQuery simple form to wait until the HTML is finished
    'use strict';
    // It uses to run the JavaScript after all the HTML code has deployed
    
    $('.nuestros-servicios div:first').show();
    $('.servicios nav a:first').addClass('activo');

    $('.servicios nav a').on('click', mostrarTabs);

    function mostrarTabs() {
        $('.servicios nav a').removeClass('activo');
        $(this).addClass('activo');
        let enlace = $(this).attr('href');
        $('.nuestros-servicios div').fadeOut();
        $(enlace).fadeIn();

        return false;
    }
});