(function ($) {

    'use strict';

    var PageController = function () {

        function slideUp() {
            // $('body').append($('<button id="go-up" class="no-show">↑</button>'));
            // $('#go-up').on('click', function() {
            //     $("html, body").animate({scrollTop: 0}, 1000);
            //     return false;
            // });
            // $(window).on('scroll', function() {
            //     if ($(document).scrollTop() < 100) {
            //         $('#go-up').addClass('no-show');
            //     } else {
            //         $('#go-up').removeClass('no-show');
            //     }
            // })
			console.log('test');
        }

        function init() {
           slideUp();
        }

        return {
            init: init
        };
    }

    var controller = new PageController();
    controller.init();

})(jQuery);
