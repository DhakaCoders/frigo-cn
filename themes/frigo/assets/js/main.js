(function($) {

/*Google Map Style*/
var CustomMapStyles  = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

var windowWidth = $(window).width();
$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	
  
//matchHeightCol
if($('.mHc').length){
  $('.mHc').matchHeight();
};
if($('.mHc1').length){
  $('.mHc1').matchHeight();
};
if($('.mHc2').length){
  $('.mHc2').matchHeight();
};
if($('.mHc3').length){
  $('.mHc3').matchHeight();
};
if($('.mHc4').length){
  $('.mHc4').matchHeight();
};
if($('.mHc5').length){
  $('.mHc5').matchHeight();
};


//$('[data-toggle="tooltip"]').tooltip();

//banner animation
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $('.page-banner-bg').css({
    '-webkit-transform' : 'scale(' + (1 + scroll/2000) + ')',
    '-moz-transform'    : 'scale(' + (1 + scroll/2000) + ')',
    '-ms-transform'     : 'scale(' + (1 + scroll/2000) + ')',
    '-o-transform'      : 'scale(' + (1 + scroll/2000) + ')',
    'transform'         : 'scale(' + (1 + scroll/2000) + ')'
  });
});


if($('.fancybox').length){
$('.fancybox').fancybox({
    //openEffect  : 'none',
    //closeEffect : 'none'
  });

}


/**
Responsive on 767px
*/

// if (windowWidth <= 767) {
  $('.toggle-btn').on('click', function(){
    $(this).toggleClass('menu-expend');
    $('.toggle-bar ul').slideToggle(500);
  });


// }



// http://codepen.io/norman_pixelkings/pen/NNbqgG
// https://stackoverflow.com/questions/38686650/slick-slides-on-pagination-hover


/**
Slick slider
*/
if( $('.responsive-slider').length ){
    $('.responsive-slider').slick({
      dots: true,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
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
}




if( $('#mapID').length ){
var latitude = $('#mapID').data('latitude');
var longitude = $('#mapID').data('longitude');

var myCenter= new google.maps.LatLng(latitude,  longitude);
function initialize(){
    var mapProp = {
      center:myCenter,
      mapTypeControl:true,
      scrollwheel: false,
      zoomControl: true,
      disableDefaultUI: true,
      zoom:7,
      streetViewControl: false,
      rotateControl: true,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
      styles: CustomMapStyles
      };

    var map= new google.maps.Map(document.getElementById('mapID'),mapProp);
    var marker= new google.maps.Marker({
      position:myCenter,
        //icon:'map-marker.png'
      });
    marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

}



/* BS form Validator*/
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


var windowLength = $(window).width();
var containerLength = $('.container').width();
var mainLenght = windowLength - containerLength;
var leftLenght = mainLenght / 2;
$(".search-results-lft-bg").css('width', leftLenght);

$('.qty').each(function() {
  var spinner = $(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.plus'),
    btnDown = spinner.find('.minus'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue == max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue == min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

});


if( $('.spotlightSlider').length ){
    $('.spotlightSlider').slick({
      dots: false,
      arrows: true,
      infinite: true,
      autoplay: false,
      autoplaySpeed: 2000,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      draggable: false,
      swipe: false,
      touchMove: false,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            arrows: false,
            dots: true,
            slidesToScroll: 1
          }
        },
      ]
    });
}

if( $('.workSlider').length ){
    $('.workSlider').slick({
      dots: false,
      arrow: false,
      infinite: true,
      autoplay: false,
      autoplaySpeed: 2000,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            arrows: false,
            dots: true,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            arrows: false,
            dots: true,
            slidesToScroll: 1
          }
        },
      ]
    });
}

/*
----------------------
 Tabs Js
----------------------
*/
if( $('.tabs').length ){
  $('.tabs:first').show();
  $('.tabs-menu li:first').addClass('active');

  $('.tabs-menu li').on('click',function(){
    index = $(this).index();
    $('.tabs-menu li').removeClass('active');
    $(this).addClass('active');
    $('.tabs').hide();
    $('.tabs').eq(index).show();
  });
}

var allPanels = $('.faq-accordion-dsc').hide();
  $('.faq-accordion-controller span').click(function() {
        //allPanels.slideUp();
        //$('.faq-accordion-controller span').removeClass('faq-accordion-active');
        if( $(this).next().is(':visible') ){
          $(this).next().slideUp();
          $(this).removeClass('faq-accordion-active');
      }else{
          $(this).next().slideDown();
          $(this).addClass('faq-accordion-active');
      }
      return false;
});




if (windowWidth <= 1199) {
  $('.xs-humbergur-btn').on('click', function(e){
    $('.xs-pop-up-menu').addClass('opacity-1');
    $('.bdoverlay').addClass('active');
    $('body').addClass('active-scroll-off');
    $(this).addClass('active-collapse');
  });
  $('.xs-menu-bar-close').on('click', function(e){
    $('.bdoverlay').removeClass('active');
    $('.xs-pop-up-menu').removeClass('opacity-1');
    $('body').removeClass('active-scroll-off');
    $('.xs-menu-bar-close').removeClass('active-collapse');
  });
   $('li.menu-item-has-children > a').on('click', function(e){
    e.preventDefault();
  $(this).toggleClass('sub-menu-active');
  $(this).next().slideToggle(300);

});
}

if( $('.fl-product').length ){
  $('.fl-product .woocommerce-product-gallery__wrapper').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    //fade: true,
    speed: 300,
    asNavFor: '.fl-product .thumbnails-cntlr .thumbnails'
  });
  $('.fl-product .thumbnails-cntlr .thumbnails').slick({
    slidesToShow: 4,
    slideToScroll: 1,
    asNavFor: '.fl-product .woocommerce-product-gallery__wrapper',
    dots: false,
    //centerMode: false,
    focusOnSelect: true,
    speed: 300,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 3,
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
}

  $('.woocommerce-ordering select, .woocommerce div.product form.cart .variations select').addClass('selectpicker');
  //$('select.country_select').addClass('selectpicker');

  if($('#frigo_make_account').length){
    // wc myaccount page
    $('#frigo_make_account').on('click', function(e){
      e.preventDefault();
      $(".frigo-signup-message").hide(300);
      $(".frigo-register").show(300);
    });
  }
  $('.sidebar-widget h4').on('click', function(){
    if( $(this).next().is(':visible') ){
      $(this).next().slideUp();
      $(this).parents('.sidebar-widget').removeClass('thisex');
    }else{
      $(this).next().slideDown();
      $(this).parents('.sidebar-widget').addClass('thisex');
    }
  });


if( $('.mainBnrSlider').length ){
    $('.mainBnrSlider').slick({
      dots: false,
      arrows: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      draggable: false,
      fade: true,
    });
}

})(jQuery);