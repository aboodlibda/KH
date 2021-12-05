/*

[Main Script]

Project     : USNews - Multipurpose News, Magazine and Blog HTML5 Template
Author      : themelooks.com
Author URI  : https://themeforest.net/user/themelooks

*/

;(function ($) {
    "use strict";
    
    /* ------------------------------------------------------------------------- *
     * COMMON VARIABLES
     * ------------------------------------------------------------------------- */
    var $wn = $(window),
        $document = $(document),
        $body = $('body'),
        isRTL = $('html').attr('dir') === 'rtl' ? true : false;

    $(function () {
        /* ------------------------------------------------------------------------- *
         * BACKGROUND IMAGE
         * ------------------------------------------------------------------------- */
        var $bgImg = $('[data-bg-img]');
        
        $bgImg.each(function () {
            var $t = $(this);

            $t.css('background-image', 'url(' + $t.data('bg-img') + ')')
              .addClass('bg--img')
              .attr('data-rjs', 2)
              .removeAttr('data-bg-img');
        });

        /* ------------------------------------------------------------------------- *
         * RETINAJS
         * ------------------------------------------------------------------------- */
        $('img').attr('data-rjs', 2);

        retinajs();
        
        /* ------------------------------------------------------------------------- *
         * STICKY
         * ------------------------------------------------------------------------- */
        var $sticky = $('[data-trigger="sticky"]');
        
        $sticky.each(function () {
            $(this).sticky({
                zIndex: 999
            });
        });

        /* ------------------------------------------------------------------------- *
         * TOOLTIP
         * ------------------------------------------------------------------------- */
        var $tooltip = $('[data-toggle="tooltip"]');

        $tooltip.tooltip();
        
        /* ------------------------------------------------------------------------- *
         * MARQUEE
         * ------------------------------------------------------------------------- */
        var $marquee = $('[data-marquee]');
        
        $marquee.marquee({
            direction: isRTL ? 'right' : 'left',
            delayBeforeStart: 0,
            duration: isRTL ? 8000 : 20000,
            pauseOnHover: true,
            startVisible: true
        });
        
        /* ------------------------------------------------------------------------- *
         * ZOOM IMAGE
         * ------------------------------------------------------------------------- */
        var $zoomImg = $('[data-zoom="img"]');

        if ( $zoomImg.length ) {
            $zoomImg.zoom();
        }

        /* ------------------------------------------------------------------------- *
         * SMOOTH SCROLL
         * ------------------------------------------------------------------------- */
        var $smoothScroll = $('[data-trigger="smoothScroll"]');

        $smoothScroll.on('click', function (e) {
            e.preventDefault();

            e.$el = $(this);
            e.$target = this.hash;

            $('html, body').animate({
                scrollTop: $(e.$target).offset().top - 60
            }, 1200);
        });

        /* ------------------------------------------------------------------------- *
         * FORM VALIDATION
         * ------------------------------------------------------------------------- */
        var $formValidation = $('[data-form="validate"]');
        
        $formValidation.each(function () {
            var $t = $(this);
            
            $t.validate({
                errorPlacement: function () {
                    return true;
                }
            });
        });

        /* ------------------------------------------------------------------------- *
         * AJAX TAB
         * ------------------------------------------------------------------------- */
        var $ajaxTab = $('[data-ajax="tab"]');

        $ajaxTab.on('click', '[data-ajax-action]', function (e) {
            var $t = $(this),
                $content = $t.parents('[data-ajax="tab"]').siblings('[data-ajax-content="outer"]'),
                $preloader = $content.find('.preloader'),
                ajaxUrl = $t.attr('href'),
                action = $t.data('ajax-action');

            $preloader.fadeIn();

            $.post(ajaxUrl, { action: action }, function (res) {
                $preloader.fadeOut();
            });

            if ( $t.parent('li').length ) {
                $t.parent('li').addClass('active').siblings().removeClass('active');
            }

            e.preventDefault();
        });

        /* ------------------------------------------------------------------------- *
         * AJAX FORM
         * ------------------------------------------------------------------------- */
        var $ajaxForm = $('[data-form="ajax"]');
        
        $ajaxForm.each(function () {
            var $form = $(this),
                $formStatus = $form.find('.status');
            
            $form.validate({
                errorPlacement: function () {
                    return true;
                },
                submitHandler: function (el) {
                    var $form = $(el),
                        formUrl = $form.attr('action'),
                        formData = $form.serialize();

                    $.post(formUrl, formData, function (res) {
                        $formStatus.show().html(res).delay(3000).fadeOut('show');
                    });
                }
            });
        });

        /* ------------------------------------------------------------------------- *
         * MAILCHIMP AJAX FORM
         * ------------------------------------------------------------------------- */
        var $formMailchimpAjax = $('[data-form="mailchimpAjax"]');

        $formMailchimpAjax.each(function () {
            $(this).validate({
                errorPlacement: function () {
                    return false;
                },
                submitHandler: function (el) {
                    var $form = $(el),
                        $formStatus = $form.children('.status'),
                        formData = $form.serialize(),
                        formURL = $form.attr('action').replace('/post?', '/post-json?').concat('&c=?'),
                        $formBtnIcon = $form.find('button[type="submit"] .fa'),
                        formIconClass = function () {
                            if ( $formBtnIcon.hasClass('fa-paper-plane-o') ) {
                                return 'fa-paper-plane-o';
                            } else if ( $formBtnIcon.hasClass('fa-close') ) {
                                return 'fa-close';
                            } else if ( $formBtnIcon.hasClass('fa-check') ) {
                                return 'fa-check';
                            }
                        };

                    $formStatus.slideUp('slow');
                    $formBtnIcon.toggleClass( formIconClass() + ' fa-spinner fa-spin' );

                    $.getJSON(formURL, formData, function (res) {
                        res.text = res.msg.charAt(0) === '0' ? res.msg.substring(4) : res.msg;
                        res.fa = res.result === 'error' && res.msg.charAt(0) === '0' ? 'fa-close' : 'fa-check';

                        $formStatus.html( '<p>' + res.text + '</p>' ).slideDown('slow');
                        $formBtnIcon.toggleClass( 'fa-spinner fa-spin ' + res.fa );
                    });
                }
            });
        });

        /* ------------------------------------------------------------------------- *
         * POLL WIDGET
         * ------------------------------------------------------------------------- */
        var $pollWidget = $('.poll--widget');

        $pollWidget.on('submit', 'form', function (e) {
            var $t = $(this);

            $t.find('.btn').addClass('disabled').attr('disabled', 'disabled');

            e.preventDefault();
        });
        
        /* ------------------------------------------------------------------------- *
         * CART WIDGET
         * ------------------------------------------------------------------------- */
        var $cartWidget = $('.cart--widget');

        $cartWidget.on('click', '.remove', function (e) {
            e.preventDefault();

            e.$el = $(this);
            e.$parent = e.$el.parent('li');

            e.$el.fadeOut(function () {
                if ( e.$parent.index() === 0 && e.$parent.next().length === 0 ) {
                    e.$parent.html('<p>No products in cart.</p>');
                } else {
                    e.$parent.remove();
                }
            });
        });
        
        /* ------------------------------------------------------------------------- *
         * FB WIDGET
         * ------------------------------------------------------------------------- */
        var $fbWidgetIframe = $('.fb--widget > iframe');

        if ( $fbWidgetIframe.length ) {
            $fbWidgetIframe
                .attr('src', function (i, v) {
                    var $t = $(this),
                        parentWidth = $t.parent().width();

                    v = v.replace( $t.width(), parentWidth );
                    
                    return v;
                })
                .attr('width', function () {
                    return $(this).parent().width();
                });
        }
        
        /* ------------------------------------------------------------------------- *
         * HOVER INTENT
         * ------------------------------------------------------------------------- */
        var $hoverIntent = $('[data-trigger="hoverIntent"]');
        
        $hoverIntent.hoverIntent({
            selector: 'li.dropdown',
            over: function () {
                $(this).addClass('open');
            },   
            out: function () {
                $(this).removeClass('open');
            },
            timeout: 200,
            interval: 200
        });
        
        /* -------------------------------------------------------------------------*
         * COUNTDOWN
         * -------------------------------------------------------------------------*/
        var $countDown = $('[data-countdown]');
            
        $countDown.each(function () {
            var $t = $(this);
            
            $t.countdown($t.data('countdown'), function(e) {
                $(this).html( '<ul>' + e.strftime('<li><strong>%D</strong><span>DAYS</span></li><li><strong>%H</strong><span>HOURS</span></li><li><strong>%M</strong><span>MINUTES</span></li><li><strong>%S</strong><span>SECONDS</span></li>') + '</ul>' );
            });
        });

        /* ------------------------------------------------------------------------- *
         * PRELOADER
         * ------------------------------------------------------------------------- */
        var $preloaderInner = $('.preloader--inner'),
            preloaderSnippers = function ($el, i) {
                i = {
                    now: 1,
                    max: i,
                    result: ''
                };

                while (i.now++ <= i.max) {
                    i.result += '<span></span>';
                }

                $el.append( i.result );
            };

        $preloaderInner.each(function () {
            var $t = $(this),
                preloader = $t.parent('.preloader').data('preloader');

            switch ( preloader ) {
                case 6:
                    preloaderSnippers($t, 12);
                    break;

                case 7:
                    preloaderSnippers($t, 5);
                    break;

                case 8:
                    preloaderSnippers($t, 4);
                    break;

                case 9:
                    preloaderSnippers($t, 9);
                    break;

                case 10:
                    preloaderSnippers($t, 4);
                    break;

                case 'img':
                    $t.append('<img src="' + $t.parent().data('preloader-img') + '" alt="Preloader Logo">');
                    break;

                default:
                    break;
            }
        });

        /* ------------------------------------------------------------------------- *
         * MEGAMENU
         * ------------------------------------------------------------------------- */
        var $megamenu = $('.megamenu');

        $megamenu.on('click', '.dropdown-menu', function (e) {
            e.stopPropagation();
        });

        $megamenu.on('click', '.dropdown-toggle', function (e) {
            e.$el = $(this);

            if ( $wn.width() < 992 ) {
                if ( e.$el.parent('.posts').length || e.$el.parent('.filter').length ) {
                    e.preventDefault();
                    window.location = e.$el.attr('href');
                }
            }
        });

        $megamenu.on('click', '.megamenu--filter a[data-action]', function (e) {
            var $t = $(this),
                $megemenuPreloader = $t.parents('.megamenu').find('.megamenu--posts .preloader'),
                ajaxUrl = $t.attr('href'),
                action = $t.data('action'),
                cat = $t.data('cat');

            $megemenuPreloader.fadeIn();

            $.post(ajaxUrl, {
                action: action,
                cat: cat
            }, function () {
                $megemenuPreloader.fadeOut();
            });

            $t.parent('li').addClass('active').siblings().removeClass('active');

            e.preventDefault();
        });

        /* ------------------------------------------------------------------------- *
         * HEADER SECTION
         * ------------------------------------------------------------------------- */
        var $headerSearchForm = $('.header--search-form');

        $headerSearchForm.on('click', '.btn', function (e) {
            $headerSearchForm.addClass('active');

            setTimeout(function () {
                $headerSearchForm.children('.form-control').trigger('focus');

                $document.on('click.headerSearchForm', function (e) {
                    e.$target = $( e.target );

                    if ( e.$target.not('.header--search-form').length === 0 || e.$target.parents('.header--search-form').length === 0 ) {
                        $headerSearchForm.removeClass('active');
                        $document.off('click.headerSearchForm');
                    }
                });
            }, 200);
        });

        var $headerNavbar = $('.header--navbar'),
            $headerNavbarToggle = $('.header--navbar .navbar-toggle'),
            $headerNav = $('#headerNav');

        $headerNavbarToggle.on('click', function (e) {
            setTimeout(function () {
                $document.on('click.headerNavbarToggle', function (e) {
                    e.$target = $( e.target );

                    if ( e.$target.parents('#headerNav').length === 0 ) {
                        $headerNav.removeClass('in');
                        $headerNavbarToggle.addClass('collapsed');
                        $document.off('click.headerNavbarToggle');
                    }
                });
            }, 200);
        });

        /* ------------------------------------------------------------------------- *
         * STICKY CONTENT
         * ------------------------------------------------------------------------- */
        var $stickyContent = $('[data-sticky-content="true"]');

        if ( $stickyContent.length ) {
            $stickyContent.theiaStickySidebar({
                additionalMarginTop: $headerNavbar.length ? $headerNavbar.outerHeight() : 0
            });
        }

        /* ------------------------------------------------------------------------- *
         * MAP
         * ------------------------------------------------------------------------- */
        var $map = $('[data-trigger="map"]');

        $.fn.initMap = function () {
            var $el = this,
                map;

            if ( typeof google !== 'undefined' ) {
                map = new google.maps.Map($el[0], {
                    center: {lat: $el.data('map-latitude'), lng: $el.data('map-longitude')},
                    zoom: $el.data('map-zoom'),
                    scrollwheel: false,
                    disableDefaultUI: true,
                    zoomControl: true
                });
                
                if ( typeof $el.data('map-marker') !== 'undefined' ) {
                    var data = $el.data('map-marker'),
                        i = 0;

                    for ( i; i < data.length; i++ ) {
                        new google.maps.Marker({
                            position: {lat: data[i][0], lng: data[i][1]},
                            map: map,
                            animation: google.maps.Animation.DROP,
                            draggable: true
                        });
                    }
                }
            }
        };

        $map.each(function () {
            $(this).initMap();
        });

        /* ------------------------------------------------------------------------- *
         * POST
         * ------------------------------------------------------------------------- */
        var $postMap = $('.post--map');

        $postMap.on('click', '.btn-link', function () {
            var $t = $(this);

            $t.addClass('active');

            if ( typeof $t.data('map-status') === 'undefined' ) {
                $t.attr('data-map-status', 'loaded');

                $t.siblings('.map--wrapper').children('div').initMap();
            }

            setTimeout(function () {
                $document.on('click.postMap', function (e) {
                    e.$target = $( e.target );

                    if ( e.$target.not('.map--wrapper').length === 0 || e.$target.parents('.map--wrapper').length === 0 ) {
                        $t.removeClass('active');
                        $document.off('click.postMap');
                    }
                });
            }, 200);
        });

        /* ------------------------------------------------------------------------- *
         * CONTRIBUTOR ITEM
         * ------------------------------------------------------------------------- */
        var $contributorItem3 = $('.contributor--item.style--3');

        if ( $contributorItem3.length ) {
            $contributorItem3.css('padding-bottom', function () {
                return $(this).children('.info').outerHeight();
            });
        }

        /* ------------------------------------------------------------------------- *
         * COUNTER ITEM SECTION
         * ------------------------------------------------------------------------- */
        var $counterItem = $('.counter--item'),
            counterItemH = 0;

        if ( $counterItem.length ) {
            $counterItem.css('height', function (i, h) {
                h = parseInt( h, 10 );
                counterItemH = h > counterItemH ? h : counterItemH;

                if ( $counterItem.length === (i + 1) ) {
                    $counterItem.css('height', counterItemH);
                }
            });
        }

        /* ------------------------------------------------------------------------- *
         * PRODUCTS SECTION
         * ------------------------------------------------------------------------- */
        var $productRatingSelect = $('#productRatingSelect');
        
        if ( $productRatingSelect.length ) {
            $productRatingSelect.barrating({
                theme: 'fontawesome-stars-o',
                hoverState: false
            });
        }

        /* ------------------------------------------------------------------------- *
         * CART SECTION
         * ------------------------------------------------------------------------- */
        var $cartItems = $('.cart--items');
        
        $cartItems.on('click', '.remove', function (e) {
            e.preventDefault();

            e.$el = $(this);
            e.$parents = e.$el.parent('td').parent('tr');

            e.$el.fadeOut(function () {
                if ( e.$parents.index() === 0 && e.$parents.next().length === 0 ) {
                    e.$parents.html('<td colspan="6" class="text-left">No products in cart.</td>');
                } else {
                    e.$parents.remove();
                }
            });
        });

        /* ------------------------------------------------------------------------- *
         * CHECKOUT SECTION
         * ------------------------------------------------------------------------- */
        var $checkoutInfoToggle = $('.checkout--info-toggle');
        
        $checkoutInfoToggle.on('click', function (e) {
            e.preventDefault();

            var $t = $(this);

            $t.toggleClass('active').parent('p').parent('.title').siblings('.checkout--info-form').slideToggle();
        });

        /* ------------------------------------------------------------------------- *
         * CONTACT SECTION
         * ------------------------------------------------------------------------- */
        var $contactCatsLi = $('.contact--cats > .nav > li'),
            contactCatsLiH = 0;

        $contactCatsLi.each(function (e) {
            var $t = $(this),
                height = $t.outerHeight();

            if ( height > contactCatsLiH ) {
                contactCatsLiH = height;
            }

            if ( $contactCatsLi.length === (e + 1) ) {
                $contactCatsLi.css('min-height', contactCatsLiH );
            }
        });

        /* ------------------------------------------------------------------------- *
         * FOOTER SECTION
         * ------------------------------------------------------------------------- */
        var $footerCopyright = $('.footer--copyright'),
            $footerSocial = $footerCopyright.find('.social'),
            $footerSocialBg = $footerCopyright.children('.social--bg');

        if ( isRTL && $footerSocialBg.length ) {
            $footerSocialBg.css('right', function () {
                return $footerCopyright.outerWidth() - ( $footerSocial.position().left + $footerSocial.outerWidth() );
            });
        } else if ( !isRTL && $footerSocialBg.length ) {
            $footerSocialBg.css('left', $footerSocial.position().left);
        }

        /* ------------------------------------------------------------------------- *
         * BACK TO TOP BUTTON
         * ------------------------------------------------------------------------- */
        var $backToTop = $('#backToTop');

        $backToTop.on('click', 'a', function (e) {
            e.preventDefault();

            $('html, body').animate({
                scrollTop: 0
            }, 1200);
        });

        /* ------------------------------------------------------------------------- *
         * COLOR SWITCHER
         * ------------------------------------------------------------------------- */
        if ( typeof $.cColorSwitcher !== "undefined" ) {
            $.cColorSwitcher({
                'switcherTitle': 'Main Colors:&lrm;',
                'switcherColors': [{
                    bgColor: '#da0000',
                    filepath: 'css/colors/theme-color-1.css'
                }, {
                    bgColor: '#119ee6',
                    filepath: 'css/colors/theme-color-2.css'
                }, {
                    bgColor: '#179ea8',
                    filepath: 'css/colors/theme-color-3.css'
                }, {
                    bgColor: '#82b440',
                    filepath: 'css/colors/theme-color-4.css'
                }, {
                    bgColor: '#f69323',
                    filepath: 'css/colors/theme-color-5.css'
                }, {
                    bgColor: '#fc5143',
                    filepath: 'css/colors/theme-color-6.css'
                }, {
                    bgColor: '#d48b91',
                    filepath: 'css/colors/theme-color-7.css'
                }, {
                    bgColor: '#8cbeb2',
                    filepath: 'css/colors/theme-color-8.css'
                }, {
                    bgColor: '#00b249',
                    filepath: 'css/colors/theme-color-9.css'
                }, {
                    bgColor: '#924cf3',
                    filepath: 'css/colors/theme-color-10.css'
                }],
                'switcherTarget': $('#changeColorScheme')
            });
        }
    });
    
    $wn.on('load', function () {
        /* ------------------------------------------------------------------------- *
         * BODY SCROLLING
         * ------------------------------------------------------------------------- */
        var isBodyScrolling = function () {
            if ( $wn.scrollTop() > 1 ) {
                $body.addClass('isScrolling');
            } else {
                $body.removeClass('isScrolling');
            }
        };

        isBodyScrolling();
        $wn.on('scroll', isBodyScrolling);

        /* ------------------------------------------------------------------------- *
         * ADJUST ROW
         * ------------------------------------------------------------------------- */
        var $adjustRow = $('.AdjustRow');
        
        if ( $adjustRow.length ) {
            $adjustRow.isotope({
                originLeft: isRTL ? false : true,
                layoutMode: 'fitRows'
            });
        }

        /* ------------------------------------------------------------------------- *
         * DROPDOWN MENU
         * ------------------------------------------------------------------------- */
        var $headerDropdownMenu = $('.header--navbar .dropdown-menu'),
            $headerDropdownMenuChild = $headerDropdownMenu.children('.dropdown');

        $headerDropdownMenu.each(function () {
            var $t = $(this),
                $parent = $t.parent('li'),
                space = $parent.parents('.container').width() - ($parent.position().left - 15),
                spaceRTL = ($parent.position().left - 15) + $parent.width();

            if ( $parent.parent('ul.nav').length && !$parent.hasClass('megamenu') ) {
                if ( isRTL && spaceRTL < $t.width() ) {
                    $parent.addClass('dropdown-left');
                } else if ( space < $t.width() ) {
                    $parent.addClass('dropdown-left');
                }
            }
        });

        if ( $headerDropdownMenuChild.length ) {
            $headerDropdownMenuChild.on('mouseenter', function () {
                var $t = $(this);

                if ( typeof $t.data('switch') === 'undefined' ) {
                    setTimeout(function () {
                        var $dropdown = $t.children('.dropdown-menu'),
                            $parent = $t.parents('.dropdown'),
                            a = $t.parents('.container').width(),
                            b = ( $parent.position().left - 15 ) + $t.width(),
                            c = b + $dropdown.width(),
                            e = ( $parent.position().left - 15 ) + $parent.width(),
                            f = $t.width() + $dropdown.width(),
                            g = '';

                        $t.addClass(function () {
                            if ( (isRTL && f > e) || (!isRTL && c < a) ) {
                                return 'switch--right';
                            } else if ( (isRTL && f < e) || (!isRTL && c > a) ) {
                                return 'switch--left';
                            }
                        }).attr('data-switch', true);
                    }, 420);
                }
            });
        }

        $headerDropdownMenuChild.on('click', '.dropdown-toggle', function (e) {
            e.preventDefault();
            e.stopPropagation();
        });
        
        /* ------------------------------------------------------------------------- *
         * GOGGLE PLUS WIDGET
         * ------------------------------------------------------------------------- */
        var $gPlusWidgetDiv = $('.google-plus--widget > .g-page');

        $gPlusWidgetDiv.each(function (i) {
            var $t = $(this);

            $t.attr( 'data-width', $t.parent().width() );

            if ( $gPlusWidgetDiv.length === (i + 1) && typeof gapi !== 'undefined' ) {
                gapi.page.go();
            }
        });
        
        /* ------------------------------------------------------------------------- *
         * PORTFOLIO SECTION
         * ------------------------------------------------------------------------- */
        var $portfolio = $('.portfolio--section'),
            $portfolioItems = $portfolio.find('.portfolio--items');

        if ( $portfolioItems.length ) {
            $portfolioItems.isotope({
                animationEngine: 'best-available',
                itemSelector: '.portfolio--item'
            });
        }

        /* ------------------------------------------------------------------------- *
         * PRELOADER
         * ------------------------------------------------------------------------- */
        var $bodyPreloader = $('#preloader');

        if ( $bodyPreloader.length ) {
            $bodyPreloader.fadeOut('slow');
        }
    });

})(jQuery);
