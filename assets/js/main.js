(function ($) {
    "use strict";

/*-- Variables --*/
var windows = $(window);
var screenSize = windows.width();
    

/*-- Product Hover Function --*/
$(window).on('load', function(){
    function productHover() {

        var productInner = $('.product-inner');
        var proImageHeight = productInner.find('img').outerHeight();

        productInner.hover(
            function() {
                var porContentHeight = $( this ).find('.content').innerHeight()-55;
                $( this ).find('.image-overlay').css({
                    "height": proImageHeight - porContentHeight,
                });
            }, function() {
                $( this ).find('.image-overlay').css({
                    "height": '100%',
                });
            }
        );

    }
    productHover();
    windows.resize(productHover);
});
    
    
/*--
    Menu Sticky
-----------------------------------*/
var sticky = $('.header-sticky');

windows.on('scroll', function() {
    var scroll = windows.scrollTop();
    if (scroll < 300) {
        sticky.removeClass('is-sticky');
    }else{
        sticky.addClass('is-sticky');
    }
});

/*--
    Mobile Menu
------------------------*/
var mainMenuNav = $('.main-menu nav');
mainMenuNav.meanmenu({
    meanScreenWidth: '991',
    meanMenuContainer: '.mobile-menu',
    meanMenuClose: '<span class="menu-close"></span>',
    meanMenuOpen: '<span class="menu-bar"></span>',
    meanRevealPosition: 'right',
    meanMenuCloseSize: '0',
});

/*--
    Header Search
------------------------*/
var searchToggle = $('.search-toggle');
var searchWrap = $('.header-search-wrap');

searchToggle.on('click', function(){
    
    if( !$(this).hasClass('active') ) {
        $(this).addClass('active');
        searchWrap.addClass('active');
    } else {
        $(this).removeClass('active');
        searchWrap.removeClass('active');
    }
    
});
/*--
    Header Cart
------------------------*/
var headerCart = $('.header-cart');
var closeCart = $('.close-cart, .cart-overlay');
var miniCartWrap = $('.mini-cart-wrap');

headerCart.on('click', function(e){
    e.preventDefault();
    $('.cart-overlay').addClass('visible');
    miniCartWrap.addClass('open');
});
closeCart.on('click', function(e){
    e.preventDefault();
    $('.cart-overlay').removeClass('visible');
    miniCartWrap.removeClass('open');
});
    
/*--
    Hero Slider
--------------------------------------------*/
var heroSlider = $('.hero-slider');
heroSlider.slick({
    arrows: true,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    fade: true,
    infinite: true,
    slidesToShow: 1,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
});
    
/*--
	Product Slider
-----------------------------------*/
$('.small-product-slider').slick({
    arrows: false,
    dots: false,
    autoplay: true,
    infinite: true,
    slidesToShow: 4,
    rows: 2,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 2,
                arrows: false,
            }
        },
        {
            breakpoint: 479,
            settings: {
                autoplay: true,
                slidesToShow: 1,
                arrows: false,
            }
        }
    ]
});
    
$('.best-deal-slider, .deal-product-slider').slick({
    arrows: false,
    dots: false,
    autoplay: true,
    infinite: true,
    slidesToShow: 1,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
});
    
/*----- 
	Testimonial Slider
--------------------------------*/
$('.testimonial-slider').slick({
    arrows: false,
    dots: false,
    autoplay: true,
    infinite: true,
    slidesToShow: 2,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
            }
        },
    ]
});

/*--
	Brand Slider
-----------------------------------*/
$('.brand-slider').slick({
    arrows: false,
    dots: false,
    autoplay: true,
    infinite: false,
    slidesToShow: 6,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-rounded-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-rounded-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 5,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 479,
            settings: {
                slidesToShow: 2,
            }
        }
    ]
});
    
/*--
	Product Slider
-----------------------------------*/
$('.pro-thumb-img').slick({
    arrows: true,
    dots: false,
    autoplay: true,
    infinite: true,
    slidesToShow: 4,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 479,
            settings: {
                slidesToShow: 3,
            }
        }
    ]
});
$('.product-slider, .related-product-slider-1').slick({
    arrows: true,
    dots: false,
    autoplay: true,
    infinite: true,
    slidesToShow: 4,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 1,
                arrows: false,
            }
        }
    ]
});
$('.related-product-slider-2').slick({
    arrows: true,
    dots: false,
    autoplay: true,
    infinite: true,
    slidesToShow: 3,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 1,
                arrows: false,
            }
        }
    ]
});
    
/*----- 
	Product Zoom
--------------------------------*/
// Instantiate EasyZoom instances
var $easyzoom = $('.easyzoom').easyZoom();

// Setup thumbnails example
var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

$('.pro-thumb-img').on('click', 'a', function(e) {
    var $this = $(this);

    e.preventDefault();

    // Use EasyZoom's `swap` method
    api1.swap($this.data('standard'), $this.attr('href'));
});

/*--
	Count Down Timer
------------------------*/
$('[data-countdown]').each(function() {
	var $this = $(this), finalDate = $(this).data('countdown');
	$this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<span class="cdown day"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hours</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Mint</p></span> <span class="cdown second"><span class="time-count">%S</span> <p>Secs</p></span>'));
	});
});
    
/*--
	MailChimp
-----------------------------------*/
$('#mc-form').ajaxChimp({
	language: 'en',
	callback: mailChimpResponse,
	// ADD YOUR MAILCHIMP URL BELOW HERE!
	url: 'http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef'

});
function mailChimpResponse(resp) {
	
	if (resp.result === 'success') {
		$('.mailchimp-success').html('' + resp.msg).fadeIn(900);
		$('.mailchimp-error').fadeOut(400);
		
	} else if(resp.result === 'error') {
		$('.mailchimp-error').html('' + resp.msg).fadeIn(900);
	}  
}

/*--
    Ajax Contact Form JS
-----------------------------------*/
$(function () {
    // Get the form.
    var form = $('#contact-form');
    // Get the messages div.
    var formMessages = $('.form-message');
    // Set up an event listener for the contact form.
    $(form).submit(function (e) {
        // Stop the browser from submitting the form.
        e.preventDefault();
        // Serialize the form data.
        var formData = $(form).serialize();
        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
        })
        .done(function (response) {
        // Make sure that the formMessages div has the 'success' class.
        $(formMessages).removeClass('error');
        $(formMessages).addClass('success');

        // Set the message text.
        $(formMessages).text(response);

        // Clear the form.
        $('#contact-form input,#contact-form textarea').val('');
        })
        .fail(function (data) {
        // Make sure that the formMessages div has the 'error' class.
        $(formMessages).removeClass('success');
        $(formMessages).addClass('error');

        // Set the message text.
        if (data.responseText !== '') {
            $(formMessages).text(data.responseText);
        } else {
            $(formMessages).text(
                'Oops! An error occured and your message could not be sent.'
            );
        }
        });
    });
});

/*--
    Scroll Up
-----------------------------------*/
$.scrollUp({
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade',
    scrollText: '<i class="icofont icofont-swoosh-up"></i>',
});
    
/*--
    Nice Select
------------------------*/
$('.nice-select').niceSelect()
    
/*--
	Price Range Slider
------------------------*/
$('#price-range').slider({
   range: true,
   min: 0,
   max: 2000,
   values: [ 250, 1670 ],
   slide: function( event, ui ) {
	$('#price-amount').val( '$' + ui.values[ 0 ] + '  -  $' + ui.values[ 1 ] );
   }
  });
$('#price-amount').val( '$' + $('#price-range').slider( 'values', 0 ) +
   '  -  $' + $('#price-range').slider('values', 1 ) ); 
    
/*----- 
	Quantity cart
--------------------------------*/
$('.pro-qty').prepend('<span class="dec qtybtn"><i class="ti-minus"></i></span>');
$('.pro-qty').append('<span class="inc qtybtn"><i class="ti-plus"></i></span>');
$('.qtybtn').on('click', function() {
    var $button = $(this);
    var $input = $button.parent().find('input');
    var oldValue = parseFloat($input.val());
    var stock_quantity = $input.siblings('.stock_quantity').text();
    var queryAct = $(location).prop('search');
    var textErr = $button.parent().siblings('strong')
    console.log(stock_quantity);
    console.log(textErr.text());
    // console.log(stock_quantity[0].in);
    
    if ($button.hasClass('inc')) {
        var newVal = oldValue + 1;

    } else {
        // Don't allow decrementing below zero
        if (oldValue > 1) {
            var newVal = oldValue - 1;
        } else {
            newVal = 1;
        }
    }
    if(queryAct == '?act=cart'){
        if(newVal > stock_quantity){
            // alert(`Số lượng tối đa ${stock_quantity}`);
            textErr.css('display', 'block')
        } else{
            $input.val(newVal);
            textErr.css('display', 'none')
        }
    }else{
        $input.val(newVal);
    }
    updateTotal($input);

});


function updateTotal(input) {
    var row = $(input).closest("tr");
    var price = parseFloat(row.find(".pro-price .amount").text());
    var quantity = parseInt($(input).val());
    var total = price * quantity;
    row.find(".pro-subtotal").text(total.toFixed(1));

    // updateProductTotal(row);
    updateGrandTotal();
}

// function updateProductTotal(row) {
//     var price = parseFloat(row.find(".pro-price .amount").text());
//     var quantity = parseInt(row.find(".pro-quantity input").val());
//     var total = ((price * quantity) /26000);
//     const formatedTotal = '$' + total.toFixed(2)
//     row.find(".pro-subtotal").text(formatedTotal);
// }

function updateGrandTotal() {
    var rows = $('tbody#mycart tr');
    var grandTotal = 0;
    rows.each(function() {
        var total = parseFloat($(this).find(".pro-subtotal").text());
        grandTotal += total;
    });
     const formatedTotal =  '$' + grandTotal.toFixed(2);
    // Update grand total
    $('#grand-total').text(formatedTotal);
    $('#grand-subTotal').text(formatedTotal);
}
$(document).ready(function() {
    updateGrandTotal();
  });
/*----- 
	Shipping Form Toggle
--------------------------------*/ 
$('[data-shipping]').on('click', function(){
    if( $('[data-shipping]:checked').length > 0 ) {
        $('#shipping-form').slideDown();
    } else {
        $('#shipping-form').slideUp();
    }
})
    
/*----- 
	Payment Method Select
--------------------------------*/
$('[name="payment-method"]').on('click', function(){
    
    var $value = $(this).attr('value');

    $('.single-method p').slideUp();
    $('[data-method="'+$value+'"]').slideDown();
    
})
    
   
})(jQuery);	


///binking checckout
const containOverlayProductDetail = document.querySelector(
    ".contain-overlay-product-detail"
  );
  
  const closeShow = document.querySelector(".close_show");
  const closeText = document.querySelector(".button-back-pay");
  const credit = document.querySelectorAll("input[name='credit']");
  const buttonPayBack = document.querySelector(".button-back-pay");
  
  let isClose = false;
  let clearTimer ;
  var timerId;
  const arrInforPay = ["Đang chờ quét mã","Đang xác nhận","Đã chuyển khoản thành công"];
  
  if(credit.length != 0 ){
  
  credit[0].addEventListener("click", () => {
      isClose = true;
      if (isClose) {
        containOverlayProductDetail.style.display = "flex";
        handlePayMoney(isClose);
        var fiveMinutes = 60 * 10,
        display = document.querySelector('.timeRestPay');
        startTimer(fiveMinutes, display);
  
      }  
      
    });
  
  }
  // ----------------------------Đóng mở menu--------------------------------
  if(closeShow){
    closeShow.addEventListener("click", () => {
      isClose = false;
      
      clearInterval(clearTimer);
      clearInterval(timerId);
      const processingPay = document.querySelector(".processing-pay");
      const loadingPayIcon = document.querySelector(".loading-pay-icon");
      loadingPayIcon.classList.add("loading-pay-icon-ani");
      buttonPayBack.style.display = "none"  ;
      processingPay.innerHTML = arrInforPay[0];
      if (!isClose) {
        containOverlayProductDetail.style.display = "none"; 
      }
    });
  
  
    closeText.addEventListener("click", () => {
      const loadingPayIcon = document.querySelector(".loading-pay-icon");
      loadingPayIcon.classList.add("loading-pay-icon-ani");
      buttonPayBack.style.display = "none"  ;  
      isClose = false;  
      if (!isClose) {
        containOverlayProductDetail.style.display = "none";
      }
    });
  
  }
  
  
  function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        clearTimer = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
  
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
  
        display.textContent = minutes + ":" + seconds;
  
        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
  }
  
  
  
  function handlePayMoney(isCLose){
    
   let pay = -1;
   const processingPay = document.querySelector(".processing-pay");
   const loadingPayIcon = document.querySelector(".loading-pay-icon.loading-pay-icon-ani");
   if(isCLose){
   function getInforPay(){
    pay++;
    if(pay >= arrInforPay.length - 1 ){
      clearInterval(timerId);
    }
    if(pay == 2){
      loadingPayIcon.classList.remove("loading-pay-icon-ani");
      buttonPayBack.style.display = 'block';
    }
    processingPay.innerHTML = arrInforPay[pay];
   }
   
    timerId = setInterval(()=>{
    getInforPay();
   },3000);   
  }
  }
  
  
  
  