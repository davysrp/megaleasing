jQuery(document).ready(function($) {

 /*    $(window).on('load', function () {
        $('#loader').delay(400).fadeOut(400);
    });
 */

    var $html = $('html');
    var $body = $('body');
    var $menuOverlay = $('.menu-overlay');
    var $hamburgerbtn = $('.hamburger--squeeze');
    var $hamburgerText = $('.hamburger-box-label');
    // return {toggle: toggle};

    function open() {
        $html.addClass('menu-open hamburger-open');
        $body.addClass('overflow-hidden');
        $menuOverlay.stop(true).fadeIn();
        $hamburgerText.text('CLOSE');
    }

    function close() {
        $html.removeClass('menu-open hamburger-open');
        $body.removeClass('overflow-hidden');
        $menuOverlay.stop(true).fadeOut();
        $hamburgerText.text('MENU');
    }

    function toggle() {
        if ($html.hasClass('menu-open')) {
            close();
        } else {
            open();
        }
    }
    $('.hamburger--squeeze, .menu-overlay').click(function () {
        toggle();
    });

    $('.h-mb-left-menu .arrow').click(function(){
        $(this).next('.sub-menu').slideToggle();
        $(this).toggleClass('on');
    });


    // sticky header
    var header_height = document.getElementById('ad-site-header').offsetHeight;
    
    if($('#ad-main-header-slider').length){
        var hero_height = document.getElementById('ad-main-header-slider').offsetHeight;
    }else{
        var hero_height = document.getElementById('page-header-bg').offsetHeight;
    }
   
    
    $(window).scroll(function() {
     
        var scroll = $(window).scrollTop();

        if (scroll >= header_height) {
            $(".ad-site-header").addClass("scroll-header");
            $("body").addClass("page-scroll");
        } else {
            $(".ad-site-header").removeClass("scroll-header");
            $("body").removeClass("page-scroll");
        }

        if (scroll >= hero_height) {
            $(".h-scroll-booking-widget").addClass("scroll-widget");
            $(".ad-site-header").addClass("scroll-header-body");
            $("body").addClass("page-scroll-hero");
        }else{
            $(".h-scroll-booking-widget").removeClass("scroll-widget");
            $(".ad-site-header").removeClass("scroll-header-body");
            $("body").removeClass("page-scroll-hero");
        }

    });

      

    // input number spinner
    $('.number-spinner .btn-spinner').click(function () {
        var btn = $(this),
            oldValue = btn.closest('.number-spinner').find('input').val().trim(),
            newVal = 0;

        if (btn.attr('data-dir') == 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        btn.closest('.number-spinner').find('input').val(newVal);
    });


    // if($('#check-in').length){
    //     var foopicker = new FooPicker({
    //         id: 'check-in',
    //         dateFormat: 'dd-MM-yyyy',

    //     });
    // };

    // if($('#check-out').length){
    //     var foopicker = new FooPicker({
    //         id: 'check-out',
    //         dateFormat: 'dd-MM-yyyy',
    //     });
    // };

    /* datepicker */
    $('.check-out, .check-in').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
    });


    if($('.ad-header-video-bg').length) {
        $('[data-youtube]').youtube_background();
    };

/*heading slider*/
if ($('.swiper-heading-slider').length) {
    var swiper = new Swiper('.swiper-heading-slider', {
        spaceBetween: 0,
        centeredSlides: true,
        effect: 'fade',
        speed: 1000,
        loop: true,
        lazy: true,
        autoplay: {
            delay: 7000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        // navigation: {
        //     nextEl: '.ad-feature-item_img_next',
        //     prevEl: '.ad-feature-item_img_prev',
        // },
    });
}


    /* feature gallery */
    function gallery_slider(){
        if ($('.ad-feature-item_img-container').length) {
            var swiper = new Swiper('.ad-feature-item_img-container', {
                swipermargin: 0,
                items: 1,
                spaceBetween: 0,
                centeredSlides: true,
                speed: 600,
                loop: true,
                lazy: true,
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.ad-feature-item_img_next',
                    prevEl: '.ad-feature-item_img_prev',
                },
            });
        }
    }
    gallery_slider();

    /* feature gallery modal */
    $(".modal").on('shown.bs.modal', function() {
        gallery_slider();
    });
    $(".collapse").on('shown.bs.collapse', function() {
        gallery_slider();

        var $panel = $(this).closest('.collapse-even');
        $('html,body').animate({
            scrollTop: $panel.offset().top - 80
        }, 500);

    });

    /* company notices acc scroll to top*/
    // $('.ad-faq-child_content').on('shown.bs.collapse', function (e) {
    //     /*var $panel = $(this).closest('.ad-company-notice_item');*/
    //     var $panel = $(this).closest('.ad-faq-acc_item');
    //     $('html,body').animate({
    //         scrollTop: $panel.offset().top - 80
    //     }, 500);
    // });


    /* review slider */
    if ($('.swiper-review-slider').length) {
        var swiper = new Swiper('.swiper-review-slider', {
            swipermargin: 0,
            items: 1,
            spaceBetween: 0,
            speed: 600,
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            // pagination: {
            //     el: '.swiper-pagination',
            //     clickable: true,
            // },
            navigation: {
                nextEl: '.ad-reivew-nav_next',
                prevEl: '.ad-reivew-nav_prev',
            },  
        });
    }

    /* ad gallery tap */
	 if ($('.ad-shuffle').length) {
         
		var Shuffle = window.Shuffle;
        var jQuery = window.jQuery;
        
        var myShuffle = new Shuffle(document.querySelector('.ad-shuffle'), {
			itemSelector: '.gallery-item',
			sizer: '.ad-sizer-element',
			buffer: 1,
		});

		jQuery('input[name="shuffle-filter"]').on('change', function (evt) {
			var input = evt.currentTarget;
			if (input.checked) {
				myShuffle.filter(input.value);
			}
		});

	 }

     /* aos animation */
     AOS.init({
        duration: 1000,
      })

});
