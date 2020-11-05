(function ($) {
    'use strict';

    var uza_window = $(window);

    // ****************************
    // :: 1.0 Preloader Active Code
    // ****************************

    uza_window.on('load', function () {
        $('#preloader').fadeOut('1000', function () {
            $(this).remove();
        });
    });

    // ****************************
    // :: 2.0 ClassyNav Active Code
    // ****************************

    if ($.fn.classyNav) {
        $('#uzaNav').classyNav();
    }

    // *********************************
    // :: 3.0 Welcome Slides Active Code
    // *********************************

    if ($.fn.owlCarousel) {
        var welcomeSlider = $('.welcome-slides');
        welcomeSlider.owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            smartSpeed: 1000,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoplayTimeout: 7000,
            dots: true
        })
        welcomeSlider.on('translate.owl.carousel', function () {
            var layer = $("[data-animation]");
            layer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).removeClass('animated ' + anim_name).css('opacity', '0');
            });
        });
        $("[data-delay]").each(function () {
            var anim_del = $(this).data('delay');
            $(this).css('animation-delay', anim_del);
        });
        $("[data-duration]").each(function () {
            var anim_dur = $(this).data('duration');
            $(this).css('animation-duration', anim_dur);
        });
        welcomeSlider.on('translated.owl.carousel', function () {
            var layer = welcomeSlider.find('.owl-item.active').find("[data-animation]");
            layer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).addClass('animated ' + anim_name).css('opacity', '1');
            });
        });
    }

    // ***********************************
    // :: 4.0 Portfolio Slides Active Code
    // ***********************************
    if ($.fn.owlCarousel) {
        var portfolioSlide = $('.portfolio-sildes');
        portfolioSlide.owlCarousel({
            items: 4,
            margin: 50,
            loop: true,
            autoplay: true,
            smartSpeed: 1500,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1400: {
                    items: 4
                }
            }
        });
    }

    // *************************************
    // :: 5.0 Testimonial Slides Active Code
    // *************************************
    if ($.fn.owlCarousel) {
        var testimonialSlide = $('.testimonial-slides');
        testimonialSlide.owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            autoplay: true,
            autoplayTimeout: 10000,
            smartSpeed: 1500,
            nav: true,
            navText: ['<i class="arrow_carrot-left"></i>', '<i class="arrow_carrot-right"></i>']
        });
    }

    // ******************************
    // :: 6.0 Team Slides Active Code
    // ******************************
    if ($.fn.owlCarousel) {
        var teamSlide = $('.client-carousel');
        teamSlide.owlCarousel({
            items: 6,
            margin: 50,
            loop: true,
            autoplay: true,
            smartSpeed: 1500,
            dots: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                },
                1400: {
                    items: 6
                }
            }
        });
    }

    // *******************************
    // :: 7.0 ImagesLoaded Active Code
    // *******************************
    if ($.fn.imagesLoaded) {
        $('.uza-portfolio').imagesLoaded(function () {
            // filter items on button click
            $('.portfolio-menu').on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
            // init Isotope
            var $grid = $('.uza-portfolio').isotope({
                itemSelector: '.single-portfolio-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.single-portfolio-item'
                }
            });
        });
    }

    // *********************************
    // :: 8.0 Portfolio Menu Active Code
    // *********************************
    $('.portfolio-menu button.btn').on('click', function () {
        $('.portfolio-menu button.btn').removeClass('active');
        $(this).addClass('active');
    });

    $(document).ready(function () {
        var current = location.pathname;
        console.log(current);
        $('#nav li a').each(function () {
            var $this = $(this);
            // if the current path is like this link, make it active
            if (current.includes($this.attr('href'))) {
                $this.parent('li').addClass('current-item');
                //console.log("yes");
            }
        })
    });

    // *********************************
    // :: 9.0 Magnific Popup Active Code
    // *********************************
    if ($.fn.magnificPopup) {
        $('.video-play-btn').magnificPopup({
            type: 'iframe'
        });
    }

    // ***************************
    // :: 10.0 Tooltip Active Code
    // ***************************
    if ($.fn.tooltip) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    // ***********************
    // :: 11.0 WOW Active Code
    // ***********************
    if (uza_window.width() > 767) {
        new WOW().init();
    }

    // ****************************
    // :: 12.0 Jarallax Active Code
    // ****************************
    if ($.fn.jarallax) {
        $('.jarallax').jarallax({
            speed: 0.2
        });
    }

    // ****************************
    // :: 13.0 Scrollup Active Code
    // ****************************
    if ($.fn.scrollUp) {
        uza_window.scrollUp({
            scrollSpeed: 2000,
            scrollText: '<i class="fa fa-angle-up"</i>'
        });
    }

    // **************************
    // :: 14.0 Sticky Active Code
    // **************************
    uza_window.on('scroll', function () {
        if (uza_window.scrollTop() > 0) {
            $('.main-header-area').addClass('sticky');
        } else {
            $('.main-header-area').removeClass('sticky');
        }
    });

    // ********************************
    // :: 15.0 Slick Slider Active Code
    // ********************************
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 15,
            time: 1500
        });
    }

    // *********************************
    // :: 16.0 Prevent Default 'a' Click
    // *********************************
    $('a[href="#"]').click(function ($) {
        $.preventDefault();
    });

})(jQuery);

$(document).ready(function () {

    $('#quote_form').ajaxForm({
        resetForm: true,
        beforeSend: function () {
            $('#formBt').text('Sending...')

        },
        success: function (data) {
            $('#formBt').text('Send Quote');
            if (data == 'ok') {
                $('#mssgBox').html(display_message('alert-success', 'Thanks for your enquiry ! We will be in touch with you soon.'));
            } else if (data == 'error') {
                $('#mssgBox').html(display_message('alert-danger', 'Unable to send enquiry !'));
            } else {
                var data = JSON.parse(data);
                var err = '';
                $.each(data, function (i, item) {
                    err += item + '<br/>';
                });
                $('#mssgBox').html(display_message('alert-danger', err));
            }
        },
        error: function (error) {
            $('#formBt').text('Send Quote');
            $('#mssgBox').html(display_message('alert-danger', 'Error encountered in form submission !'));
        }
    });

    $('#contact_form').ajaxForm({
        resetForm: true,
        beforeSend: function () {
            $('#conBt').text('Sending...')

        },
        success: function (data) {
            $('#conBt').text('Contact Us');
            if (data == 'ok') {
                $('#conBox').html(display_message('alert-success', 'Thanks for your enquiry ! We will be in touch with you soon.'));
            } else if (data == 'error') {
                $('#conBox').html(display_message('alert-danger', 'Unable to send enquiry !'));
            } else {
                var data = JSON.parse(data);
                var err = '';
                $.each(data, function (i, item) {
                    err += item + '<br/>';
                });
                $('#conBox').html(display_message('alert-danger', err));
            }
        },
        error: function (error) {
            $('#conBt').text('Contact Us');
            $('#conBox').html(display_message('alert-danger', 'Error encountered in form submission !'));
        }
    });

});


function display_message(t, m) {
    return '<div class="alert ' + t + ' alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>' + m + '</div>';

}