(function (jQuery) {

    'use strict';

    var PageController = function () {
        function slideUp() {
            jQuery('body').append(jQuery('<button id="go-up" class="no-show">POWRÓT DO GÓRY</button>'));
            jQuery('#go-up').on('click', function() {
                jQuery("html, body").animate({scrollTop: 0}, 1000);
                return false;
            });
            jQuery(window).on('scroll', function() {
                if (jQuery(document).scrollTop() < 100) {
                    jQuery('#go-up').addClass('no-show');
                } else {
                    jQuery('#go-up').removeClass('no-show');
                }
            })
        }

        function slideDown() {
            jQuery('.js-anchor-link').on('click', function(event) {
                event.preventDefault();
                var pageHeight = window.innerHeight;
                console.log(pageHeight);
                jQuery("html, body").animate({scrollTop: pageHeight}, 1000);
                return false;
            });
        }

        function menuDecor() {
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

        function menuController() {
            var windowWidth = window.innerWidth;
            var navButton = jQuery(".navbar-header").find("button");
            var submenuParent = jQuery(".menu-item-has-children");

            if (windowWidth < 992) {
                var submenu = submenuParent.find(".sub-menu");
                submenu.hide();
                navButton.on("click", function() {
                    if(!jQuery(this).parent().next().hasClass("in")) {
                        jQuery(this).addClass("accordion-active");
                    }
                    else {
                        jQuery(this).removeClass("accordion-active");
                        submenuParent.removeClass("accordion-active");
                    }
                });
                submenuParent.find("a").off().on("click", function(event) {
                    var $this = jQuery(this).parent();
                    var currentSubmenu = $this.find(".sub-menu");
                    event.preventDefault();
                    submenu.slideUp();
                    submenuParent.removeClass("accordion-active");
                    currentSubmenu.slideDown();
                    $this.addClass("accordion-active");
                });
            }
            if (windowWidth > 992) {
                submenuParent.find(">a").on("click", function(event) {
                    event.preventDefault();
                });
                submenuParent.on("mouseenter", function() {
                    var submenu = jQuery(this).find(".sub-menu");
                    var submenuElement = submenu.find("li");
                    var parentOffset = jQuery(this).offset();
                    submenu.css("left", "-" + parentOffset.left + "px");
                    submenuElement.css("left", parentOffset.left + "px");
                });
            }
        }

        function checkWindowSize() {
            jQuery(window).on("resize", menuController);
        }

        function init() {
           slideUp();
           slideDown();
           menuDecor();
           offerModuleController();
           menuController();
           checkWindowSize();
        }

        return {
            init: init
        };
    }

    var controller = new PageController();
    controller.init();

})(jQuery);
