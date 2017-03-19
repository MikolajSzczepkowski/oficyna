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

        function rotatePanel() {
            var rotateInterval;
            var rotator = jQuery(".rotator");
            var panelsContainer = rotator.find(".vc_tta-panels");
            panelsContainer.map(function() {
                var ul = jQuery("<ul>");
                var panels = jQuery(this).find(".vc_tta-panel");
                panels.map(function(){
                    var li = jQuery("<li class='col-xs-3'>");
                    var span = jQuery("<span>");
                    li.append(span);
                    ul.append(li);
                });
                jQuery(this).parent().append(ul);
            });
            function intervalCall() {
                rotateInterval = setInterval(function() {
                    panelsContainer.map( function() {
                        var active = jQuery(this).find(jQuery(".vc_active"));
                        var nextPanel = active.next();
                        var circles = jQuery(this).next().find("span");
                        active.fadeOut();
                        active.removeClass("vc_active");
                        circles.removeClass("circle-active");
                        if (nextPanel.length == 0) {
                            jQuery(this).children().first().addClass("vc_active");
                            jQuery(this).children().first().fadeIn();
                        }
                        else {
                            nextPanel.addClass("vc_active");
                            nextPanel.fadeIn();
                        }
                        var currentPanelIndex = jQuery(this).find(jQuery(".vc_active")).index();
                        jQuery(circles[currentPanelIndex]).addClass("circle-active");
                    });
                }, 3000);
            }
            intervalCall();
            jQuery(".vc_tta-panels-container span").on("click", function() {
                var clickedCircleIndex = jQuery(this).parent().index();
                var closestPanel = jQuery(this).parent().parent().prev().find(".vc_tta-panel");
                clearInterval(rotateInterval);
                closestPanel.fadeOut();
                closestPanel.removeClass("vc_active");
                panelsContainer.next().find("span").removeClass("circle-active");
                jQuery(closestPanel[clickedCircleIndex]).fadeIn();
                jQuery(closestPanel[clickedCircleIndex]).addClass("vc_active");
                jQuery(this).addClass("circle-active");
                intervalCall();
            });
        }

        function checkWindowSize() {
            jQuery(window).on("resize", menuController);
        }

        function runTypographer() {
            jQuery('#document').typographer({
                modules: ['orphan', 'punctuation'] // wywoływane moduły
            });
        }

        function productSlider() {
            var wrapper = jQuery('.thumbnails');
            var slides = wrapper.find('a');
            var prevButton = jQuery('#prev-slide');
            var nextButton = jQuery('#next-slide');
            var counter = 0;

            if(slides.length <= 4) {
                prevButton.hide();
                nextButton.hide();
            }
            else {
                var slideWidth = slides.eq(0).css('width');
                var slideMargin = slides.eq(0).css('marginRight');
                var slideSize = parseInt(slideWidth) + parseInt(slideMargin);
                nextButton.on('click', function() {
                    if (counter < slides.length - 4 ) {
                        slides.eq(0).animate({marginLeft:'-=' + slideSize },'fast');
                        counter++;
                    }
                });
                prevButton.on('click', function() {
                    if(counter > 0) {
                        slides.eq(0).animate({marginLeft:'+=' + slideSize },'fast');
                        counter--;
                    }
                });
            }
        }

        function shortenPostExcerpt() {
            var postExcerpt = jQuery('.vc_gitem-post-data-source-post_excerpt');
            jQuery.map(postExcerpt, function(excerpt) {
                var postExcerptPara = jQuery(excerpt).find("p").eq(1);
                var textArray = postExcerptPara.text().split(" ");
                if(textArray.length > 15) {
                    var cutText = textArray.slice(0, 15);
                    var returnText = cutText.join(" ");
                    postExcerptPara.html(returnText + "...");
                }
            });
        }

        function init() {
           slideUp();
           slideDown();
           menuDecor();
           offerModuleController();
           menuController();
           rotatePanel();
           checkWindowSize();
           runTypographer();
           productSlider();
           setTimeout(shortenPostExcerpt, 3000);
        }

        return {
            init: init
        };
    }

    jQuery(document).ready(function() {
        var controller = new PageController();
        controller.init();
    });

})(jQuery);
