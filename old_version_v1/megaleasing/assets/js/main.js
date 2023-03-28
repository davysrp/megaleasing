
// jQuery(document).ready(function ($) {

  /* mb navbar */
  $('.ad-mb-navbar .arrow').click(function () {
    $(this).next('.ad-sub-menu').slideToggle();
    $(this).toggleClass('on');
  });

  /* sticky header */
  var header_height = document.getElementById('ad-main-navbar').offsetHeight;

  if ($('#ad-main-navbar').length) {
    var hero_height = document.getElementById('ad-main-navbar').offsetHeight;
  } else {
    var hero_height = document.getElementById('page-header-bg').offsetHeight;
  }

  $(window).scroll(function () {

    var scroll = $(window).scrollTop();

    if (scroll >= header_height) {
      $(".ad-main-navbar").addClass("scroll-header");
      $("body").addClass("page-scroll");
    } else {
      $(".ad-main-navbar").removeClass("scroll-header");
      $("body").removeClass("page-scroll");
    }

  });


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

  /* prodyct category slider */
  if ($('.swiper-cate-slider').length) {
    var swiper = new Swiper('.swiper-cate-slider', {
      swipermargin: 0,
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
        nextEl: '.ad-slider-nav_next',
        prevEl: '.ad-slider-nav_prev',
      },
      breakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        480: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        640: {
          slidesPerView: 3,
          spaceBetween: 15,
        },
        769: {
          slidesPerView: 4,
          spaceBetween: 20,
        }
      },
    });
  }

  /* product slider */
  if ($('.swiper-pro-slider').length) {
    var swiper = new Swiper('.swiper-pro-slider', {
      swipermargin: 0,
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
        nextEl: '.ad-slider-nav_next',
        prevEl: '.ad-slider-nav_prev',
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
        480: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 15,
        },
        769: {
          slidesPerView: 3,
          spaceBetween: 15,
        }
      },
    });
  }


  /* product gallery */
  var swiper = new Swiper(".swiper-pro-thumb", {
    loop: true,
    spaceBetween: 5,
    slidesPerView: 5,
    centeredSlides: true,
    freeMode: true,
    watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".swiper-pro-gallery", {
    loop: true,
    spaceBetween: 0,
    navigation: {
      nextEl: '.ad-slider-nav_next',
      prevEl: '.ad-slider-nav_prev',
    },
    thumbs: {
      swiper: swiper,
    },
  });


  /* form validation */
  (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()

  $(".table-job tbody tr").click(function () {
    window.location = $(this).data("href");
  });


    /* input range  */
  if ($('#t_range').length) {
    
    window.onload = input_range();
    //input_range();

    function input_range(params) {
      range = document.getElementById('t_range'),
        rangeV = document.getElementById('t_rangeV'),
        setValue = () => {
          const
            newValue = Number((range.value - range.min) * 100 / (range.max - range.min)),
            newPosition = 10 - (newValue * 0.2);
          rangeV.innerHTML = `<span>${range.value}%</span>`;
          rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;
        };
      document.addEventListener("DOMContentLoaded", setValue);
      range.addEventListener('input', setValue);
    }

  }


  /* product item price  */

  window.onload = product_cost();

  $('#t_price').keyup(function () {
      product_cost();
  });

  $('#t_range').change(function () {
    product_cost();
  });

  $("input[type='radio'][name='installment_payment']").change(function () {
      product_cost();
  })

  function product_cost(){

    const t_price = document.getElementById('t_price');
    const t_deposit = document.getElementById('t_deposit');
    const t_installment_payment = $("input[type='radio'][name='installment_payment']:checked");
    const t_monlty_payment = document.getElementById('t_monlty_payment');
    const t_range = document.getElementById('t_range');  

    // currency formart
    let dollarUSLocale = Intl.NumberFormat('en-US');
  
    //total down payment
    deposit_price = t_price.value * t_range.value / 100;
    //t_deposit.value = dollarUSLocale.format(deposit_price);
    t_deposit.value = deposit_price;

    //total monlty payment
    total_product_cost = t_price.value - deposit_price;
    total_monlty_payment = total_product_cost / t_installment_payment.val();
    t_monlty_payment.value = dollarUSLocale.format(total_monlty_payment);

  }

// });




