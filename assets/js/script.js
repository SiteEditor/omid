/**
 * Theme Front end main js
 *
 */

(function($) {

    $(document).ready(function() {

        var $body = $("body");

        /**
         * upsells
         */
        var $rtl = ( $body.hasClass("rtl-body") ) ? true : false;

        $(".services-slider-wrapper").livequery(function(){

            $(this).slick({
                //mobileFirst         : true ,
                arrows              : true,
                slidesToShow        : 3,
                slidesToScroll      : 1,
                dots                : false,
                //centerMode          : false,
                rtl                 : $rtl,
                //swipe               : true ,
                touchMove           : true ,
                infinite            : true,
                prevArrow : '<span class="slide-nav-bt slide-prev"></span>',
                nextArrow : '<span class="slide-nav-bt slide-next"></span>',

                responsive: [
                  {
                    breakpoint: 910,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1,
                      infinite: true,
                      dots: true
                    }
                  },
                  {
                    breakpoint: 600,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
                  // You can unslick at a given breakpoint now by adding:
                  // settings: "unslick"
                  // instead of a settings object
                ]

            });

        });

        $(".testimonial-slider-wrapper").livequery(function(){

            $(this).slick({
                //mobileFirst         : true ,
                arrows              : true,
                slidesToShow        : 1,
                slidesToScroll      : 1,
                dots                : false,
                //centerMode          : false,
                rtl                 : $rtl,
                //swipe               : true ,
                touchMove           : true ,
                infinite            : false,
                prevArrow : '<span class="slide-nav-bt slide-prev"></span>',
                nextArrow : '<span class="slide-nav-bt slide-next"></span>',

                responsive: [
                  {
                    breakpoint: 910,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2,
                      infinite: true,
                      dots: true
                    }
                  },
                  {
                    breakpoint: 600,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
                  // You can unslick at a given breakpoint now by adding:
                  // settings: "unslick"
                  // instead of a settings object
                ]

            });

        });



        $(".gallery-slider-wrapper").livequery(function(){

            $(this).slick({ 
                rtl                 : $rtl, 
                slidesToShow        : 3,
                slidesToScroll      : 1,
                arrows              : true,
                dots                : false,
                centerMode          : true,
                centerPadding       : '110px',
                focusOnSelect       : true,
                prevArrow : '<span class="slide-nav-bt slide-prev"></span>',
                nextArrow : '<span class="slide-nav-bt slide-next"></span>',

                responsive: [
                  {
                    breakpoint: 910,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2,
                      infinite: true,
                      dots: true
                    }
                  },
                  {
                    breakpoint: 600,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
                  // You can unslick at a given breakpoint now by adding:
                  // settings: "unslick"
                  // instead of a settings object
                ]

            });

        });

        /**
         * Resize
         
        setTimeout(function(){$(window).trigger(window.tg_debounce_resize);}, 2000);
        */


        /**
         * Loading
        */ 

        var removePreloader = function() {
            setTimeout(function() {
                jQuery('.preloader').hide();
            }, 1500);
        };

        removePreloader();

    });


})(jQuery);
