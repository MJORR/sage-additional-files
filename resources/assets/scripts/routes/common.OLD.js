/* eslint-disable */

import { TimelineLite, TweenMax, TimelineMax } from 'gsap';
import ScrollMagic from 'scrollmagic';
import 'animation.gsap'

import Headroom from 'headroom.js/dist/headroom';

export default {
  init() {
    /* JavaScript to be fired on all pages */
    
    $( window ).resize(function() {
      $( ".sweep").each(function( index ) {
        $(this).css({ 'top': $(this).height() * -1 + 'px' });
        $(this).parent().prevAll('section:not(.d-block)').first().addClass('section-extra-padding-bottom');
      });
    }).resize();

    $('#menu-toggle').toggle(function(){
      $(this).addClass('open');
    }, function(){
      headroom.init();
      $(this).removeClass('open');
    });

    // Secondary menu
    $('#main-navigation > li').click(function(e) {

      var submenu = $(this).data('submenu');

      if ($('#submenu-' + submenu).length) {
        e.preventDefault();

        $('.main-navigation-secondary').hide();
        $('.main-navigation-secondary li').css('opacity', 0);
        $('#submenu-' + submenu).show();

        if($('#menu-secondary').css('left') == '100%') {
          alert('VISIBLE');
          $('#menu-secondary').css('left', '100%');
        } 
        
        $('#menu-secondary').animate( { left: '50%' }, 'slow', function() {
          var mtl = new TimelineMax;
          mtl.staggerFromTo("#submenu-" + submenu + " li", 0.5, {opacity:0, marginLeft: 40}, {opacity:1, marginLeft:0}, 0.05);
        });
      }
      
    });

    // $('#search-display').click(function(){
    //   $('#menu-search').fadeIn("fast", "linear");
    // });
  
    $('#search-toggle').toggle(function(){

      $('#menu').fadeOut("fast", "linear"); 
      $('#menu-toggle').removeClass('open');
      headroom.destroy();
      $('#menu-search').fadeIn("fast", "linear");
  
    }, function(){
  
      headroom.init();
      $('#menu-search').fadeOut("fast", "linear");
  
    });

    $('.faqs .faq h4').toggle(function(e){
      e.preventDefault();
      $(this).find("i").addClass('active');
      $(this).next('div').slideToggle('fast');
    }, function(e){
      e.preventDefault();
      $(this).find("i").removeClass('active');
      $(this).next('div').slideToggle('fast');
    });

    var tl = new TimelineLite;
    tl.add( TweenLite.to('header .container', 1.5, {opacity: 1, visibility: "visible"}) );
    tl.add( TweenLite.to('.landing > .container > div', 0.5, {opacity: 1, y:5, visibility: "visible"}), "-=1" );
    tl.add( TweenLite.to('.landing > .container a.button', 0.3, {opacity: 1, visibility: "visible"}), "-=1");

    var header_final_height;
    var logo_height;
    var logo_top;
    // var menu_position;
    // var top_nav_position;

    if($(window).width() >= 1024){
      header_final_height = 70;
      // menu_position = 10;
      // top_nav_position = 14;
      // gradient_cover_top = 55;
      logo_height = 30;
      logo_top = 20;
      // button_margin = 10;
    }else{
      header_final_height = 60;
      // menu_position = 5;
      // top_nav_position = 9;
      // gradient_cover_top = 45;
      logo_height = 25;
      logo_top = 19;
      // button_margin = 0;
    }

    var controller = new ScrollMagic.Controller();

    var header_actions = new TimelineLite();
    header_actions.add([
    TweenMax.to('header.animate', 0.2, { backgroundColor: '#fff', height:header_final_height, boxShadow: '0 3px 5px 0 rgba(0,0,0,.15)' }),
    TweenMax.to('header.animate a.logo-container img:first-of-type', 0.2, { opacity: '1'}, '-=0.2'),
    TweenMax.to('header.animate a.logo-container img+img', 0.2, { opacity: '0'}, '-=0.2'),
    TweenMax.to('header.animate .logo', 0.2, { top: logo_top, height: logo_height }, '-=0.2'),
    TweenMax.to('header.animate i', 0.2, { color: '#71c3d4' }, '-=0.2'),
    TweenMax.to('header.animate #menu-toggle span, header.animate #mobile-menu-toggle span', 0.2, { background: '#71c3d4' }, '-=0.2'),
    // TweenMax.to('#menu-toggle', 0.2, { top: '18px' }, '-=0.1'),
    TweenMax.to('header.animate .button', 0.2, { top: '10px', background: 'linear-gradient(90deg, #f9b700 0, #ea4a36)' }, '-=0.1'),
    ]);
    new ScrollMagic.Scene({ offset: 50 }).setTween(header_actions).addTo(controller);

    if(!iOS()){

      if($(window).width() >= 1024){
 
        var animation_time = 0.6;
        var animation_distance = 30;
        var offset_distance = $(window).height()-100;
 
       $('[data-fade]').each(function(index, elem){

         if($(this).data("fade-random") !== undefined) {
           animation_time = getRandomInt(5, 20)/10;
          animation_distance = getRandomInt(20, 80);
         }
         
         var params = { opacity: "0" };
         
         switch($(elem).data('fade')){
             case "left":
               params["x"] = animation_distance * -1; break;
             case "right":
               params["x"] = animation_distance; break;
             case "bottom":
               params["y"] = animation_distance; break;
             default:
               break;
         }
 
         var scene = new ScrollMagic.Scene({
             offset: $(elem).offset().top-offset_distance,
             reverse: true
         })
         .setTween(TweenMax.from(elem, animation_time, params))
         .addTo(controller);
       });
 
     }
 
   }

   function getRandomInt(min, max) {
      min = Math.ceil(min);
      max = Math.floor(max);
      return Math.floor(Math.random() * (max - min + 1)) + min;
  }
 
   function iOS(){
      var iDevices = [
          'iPad Simulator',
          'iPhone Simulator',
          'iPod Simulator',
          'iPad',
          'iPhone',
          'iPod'
        ];
      while(iDevices.length){
          if(navigator.platform === iDevices.pop()){ return true; }
        }
        return false;
    }

    // $.noConflict(true);
    jQuery(document).ready(function($){
      //open/close mega-navigation
      $('#menu-toggle').on('click', function(event){
        event.preventDefault();
        toggleNav();
      });
    
      //close meganavigation
      $('.cd-dropdown .cd-close').on('click', function(event){
        event.preventDefault();
        toggleNav();
      });
    
      //on mobile - open submenu
      $('.has-children').children('a').on('click', function(event){
        //prevent default clicking on direct children of .has-children 
        event.preventDefault();
        var selected = $(this);
        selected.next('ul').removeClass('is-hidden').end().parent('.has-children').parent('ul').addClass('move-out');
      });
    
      //on desktop - differentiate between a user trying to hover over a dropdown item vs trying to navigate into a submenu's contents
      // var submenuDirection = ( !$('.cd-dropdown-wrapper').hasClass('open-to-left') ) ? 'right' : 'left';
      // $('.cd-dropdown-content').menuAim({
      //       activate: function(row) {
      //         $(row).children().addClass('is-active').removeClass('fade-out');
      //         if( $('.cd-dropdown-content .fade-in').length == 0 ) $(row).children('ul').addClass('fade-in');
      //       },
      //       deactivate: function(row) {
      //         $(row).children().removeClass('is-active');
      //         if( $('li.has-children:hover').length == 0 || $('li.has-children:hover').is($(row)) ) {
      //           $('.cd-dropdown-content').find('.fade-in').removeClass('fade-in');
      //           $(row).children('ul').addClass('fade-out')
      //         }
      //       },
      //       exitMenu: function() {
      //         $('.cd-dropdown-content').find('.is-active').removeClass('is-active');
      //         return true;
      //       },
      //       submenuDirection: submenuDirection,
      //   });
    
      //submenu items - go back link
      $('.go-back').on('click', function(){
        var selected = $(this),
          visibleNav = $(this).parent('ul').parent('.has-children').parent('ul');
        selected.parent('ul').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('move-out');
      }); 
    
      function toggleNav(){
        var navIsVisible = ( !$('.cd-dropdown').hasClass('dropdown-is-active') ) ? true : false;
        $('.cd-dropdown').toggleClass('dropdown-is-active', navIsVisible);
        $('.cd-dropdown-trigger').toggleClass('dropdown-is-active', navIsVisible);
        if( !navIsVisible ) {
          $('.cd-dropdown').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
            $('.has-children ul').addClass('is-hidden');
            $('.move-out').removeClass('move-out');
            $('.is-active').removeClass('is-active');
          });	
          headroom.init();
          $("#menu-toggle").removeClass('open');
          $('body').css("position", "relative");
        }else{
          headroom.destroy();
          $("#menu-toggle").addClass('open');
          $('body').css("position", "fixed");
          
        }
      }
    
      //IE9 placeholder fallback
      //credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
      // if(!Modernizr.input.placeholder){
      //   $('[placeholder]').focus(function() {
      //     var input = $(this);
      //     if (input.val() == input.attr('placeholder')) {
      //       input.val('');
      //       }
      //   }).blur(function() {
      //      var input = $(this);
      //       if (input.val() == '' || input.val() == input.attr('placeholder')) {
      //       input.val(input.attr('placeholder'));
      //       }
      //   }).blur();
      //   $('[placeholder]').parents('form').submit(function() {
      //       $(this).find('[placeholder]').each(function() {
      //       var input = $(this);
      //       if (input.val() == input.attr('placeholder')) {
      //          input.val('');
      //       }
      //       })
      //   });
      // }
    });

  },
  finalize() {
    /* JavaScript to be fired on all pages, after page specific JS is fired */
  },
};

import Headroom from 'headroom.js/dist/headroom';
var headroom = new Headroom(document.querySelector('header'));
headroom.init();

$('.carousel, .hero-carousel').slick({
  arrows: false,
  dots: true,
  //autoplay:true,
  //autoplaySpeed:4000,
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
});

//****** Testimonial Carousel ******/

$('.testimonial-slider').slick({
  arrows: false,
  dots: false,
  autoplay: true,
  autoplaySpeed: 4000,
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
});

$('.testimonial-navigation img').eq(0).addClass('active');

$('.testimonial-navigation a').click(function (e) {
  e.preventDefault();
  var slideIndex = $(this).index();
  $('.testimonial-slider').slick('slickGoTo', slideIndex);
  var currentSlide = $('.testimonial-slider').slick('slickCurrentSlide');
  $('.testimonial-navigation img').removeClass('active').eq(currentSlide).addClass('active');
});

// use this if autoplay is used to toggle nav
$('.testimonial-slider').on('afterChange', function (event, slick, currentSlide) {
  $('.testimonial-slider').slick('slickGoTo', currentSlide);
  $('.testimonial-navigation img').removeClass('active').eq(currentSlide).addClass('active');
});


//******  Media Carousel ******/

$('.media-slider').slick({

  dots: false,
  infinite: true,
  slidesToShow: 1,
  speed: 1000,
  centerPadding: '20%',
  centerMode: true,
  prevArrow: '<div class="media-slider-arrow media-slider-prev">PREV</div>',
  nextArrow: '<div class="media-slider-arrow media-slider-next">NEXT</div>',
  responsive: [
    {
      breakpoint: 768,   // everything up to 768
      settings: {
        centerMode: false,
        arrows:false,
      },
    },
  ],
})

$('.media-navigation img').eq(0).addClass('active');

$('.media-navigation a').click(function (e) {
  e.preventDefault();
  var slideIndex = $(this).index();
  $('.media-slider').slick('slickGoTo', slideIndex);
  var currentSlide = $('.media-slider').slick('slickCurrentSlide');
  $('.media-navigation img').removeClass('active').eq(currentSlide).addClass('active');
});

// use this if autoplay is used to toggle nav
$('.media-slider').on('afterChange', function (event, slick, currentSlide) {
  $('.media-slider').slick('slickGoTo', currentSlide);
  $('.media-navigation img').removeClass('active').eq(currentSlide).addClass('active');
});

//******  FONTAWESOME ******/

// Import then needed Font Awesome functionality
import { library, dom } from '@fortawesome/fontawesome-svg-core';

// Import the specified icons
import { faChevronDown, faPlus, faMinus } from '@fortawesome/pro-light-svg-icons';

// add imported Font Awesome icons to the library
library.add(
  faChevronDown,
  faPlus,
  faMinus
);
// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();

//******  FAQ ******/

$('.faq-group h2').click(function(){
  $(this).next('div').slideToggle('fast');
  $(this).parent().toggleClass('active');
});

$('.faq h3').click(function(e){
  e.preventDefault();
  $(this).find('a svg').fadeToggle();
  $(this).next('div').slideToggle('fast');
  $(this).find('a').toggleClass('active');
});
