(function (jQuery) {

    'use strict';

    var PageController = function () {

        function slideUp() {
            // jQuery('body').append(jQuery('<button id="go-up" class="no-show">↑</button>'));
            // jQuery('#go-up').on('click', function() {
            //     jQuery("html, body").animate({scrollTop: 0}, 1000);
            //     return false;
            // });
            // jQuery(window).on('scroll', function() {
            //     if (jQuery(document).scrollTop() < 100) {
            //         jQuery('#go-up').addClass('no-show');
            //     } else {
            //         jQuery('#go-up').removeClass('no-show');
            //     }
            // })
        }

        function menuArrow() {
            var arrow = jQuery("<span/>", {class: 'glyphicon glyphicon-chevron-down'});
            jQuery(".menu-item-has-children > a").append(arrow);
        }

        function offerModuleController() {
            var imageContainer = jQuery(".offer-inner-module-img img");
            var initialSrc = imageContainer.attr("src");
            var offerMap = {
                "WYDAWNICTWO": "/wp-content/themes/oficyna_peryferie/images/wydawnictwo.png",
                "SITODRUK": "/wp-content/themes/oficyna_peryferie/images/sitodruk.png",
                "RISO": "/wp-content/themes/oficyna_peryferie/images/riso.png",
                "WARSZTATY": "/wp-content/themes/oficyna_peryferie/images/warsztaty.png",
                "INTROLIGATORSTWO": "/wp-content/themes/oficyna_peryferie/images/introligatorstwo.png"
            };
            jQuery(".offer-module").on("mouseenter", function() {
                var currentModule = jQuery(this).find("h3 span").text();
                var newSrc = offerMap[currentModule];

                imageContainer.attr("src", newSrc);
            });
            jQuery(".offer-module").on("mouseleave", function() {
                imageContainer.attr("src", initialSrc);
            });
        }

        function init() {
           slideUp();
           menuArrow();
           offerModuleController();
        }

        return {
            init: init
        };
    }

    var controller = new PageController();
    controller.init();

})(jQuery);
