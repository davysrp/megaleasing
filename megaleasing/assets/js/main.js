
// jQuery(document).ready(function ($) {


  // $("ul.sidemenu-board-director li:nth-child(4) > a").attr("href", 'https://www.cambodiacreative.com/megaleasingdemo/about-company/board-of-directors');
  // $("ul.main-menu li:nth-child(2) ul li:nth-child(4) > a").attr("href", 'https://www.cambodiacreative.com/megaleasingdemo/about-company/board-of-directors');

  $('li.has-megamenu').on('click', function (e){
    var url = $('#branches-href').attr('href');
    window.location.href = url;
  });

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

    // currency formart
    let dollarUSLocale = Intl.NumberFormat('en-US');


    // ប្រាក់បង់ប្រចាំខែ = (ប្រាក់ត្រូវបង់រំលស់ x អត្រាការប្រាក់គោល x រយៈពេល + ប្រាក់ត្រូវបង់រំលស់) / រយៈពេល ។
    // ប្រាក់ត្រូវបង់រំលស់ = តម្លៃផលិតផល - ប្រាក់ចូលរួម


  // ១	គ្រឿងអេឡិចត្រូនិក	1.75%	12 - 24 ខែ
  // ២	គ្រឿងសង្ហារិម	1.99%	12 - 24 ខែ
  //
  // ៣ ទោចក្រយានយន្ត	1.80%	12 - 36 ខែ
  // ៤	រថយន្តទេសចរណ៍	1.65%	12 - 60 ខែ
  //
  // ៥	រថយន្តដឹកទំនិញ	1.65%	12 - 60 ខែ
  //
  // ៦	គ្រឿងចក្រធុនធ្ងន់	1.65%	12 - 60 ខែ
  //
  // ៧	គ្រឿងចក្រកសិកម្ម	1.45%	12 - 60 ខែ


    const t_price = document.getElementById('t_price');
    const t_deposit = document.getElementById('t_deposit');
    const t_installment_payment = $("input[type='radio'][name='installment_payment']:checked");
    const t_monlty_payment = document.getElementById('t_monlty_payment');
    const t_range = document.getElementById('t_range');
    const interest_rate = $('#interest_rate').text() / 100;
    const duraction = t_installment_payment.val();



    // var total_price = t_price.value;
    // var installment_payment = t_deposit.value;  //10%
    // var afterInstallPaymet = total_price - installment_payment;

    // var interest = 1.75 ; // 7%

    // var monthly_payment = ((afterInstallPaymet * interest * duraction) + afterInstallPaymet) / duraction;



    //total down payment
    deposit_price = t_price.value * t_range.value / 100;
    //t_deposit.value = dollarUSLocale.format(deposit_price);
    t_deposit.value = t_price.value - deposit_price;

    //total monlty payment
    total_product_cost = t_price.value - deposit_price;
    // total_monlty_payment = total_product_cost / t_installment_payment.val();
    total_monlty_payment = ((total_product_cost * interest_rate * duraction) + total_product_cost) / duraction;
    t_monlty_payment.value = dollarUSLocale.format(total_monlty_payment);


  }

// });




