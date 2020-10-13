/* Get location hash */
function getUrlParameter(name) {
  name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
  var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
  var results = regex.exec(location.search);
  return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};

const sliceUp = {
  delay: 200,
  duration: 400,
  distance: '50px',
  easing: 'ease-in',
};

const sliceDown = {
  delay: 200,
  duration: 400,
  distance: '-50px',
  easing: 'ease-in',
};

const sliceRight = {
  delay: 200,
  duration: 400,
  distance: '50px',
  easing: 'ease-in',
  origin: 'left'
};

const sliceLeft = {
  delay: 200,
  duration: 400,
  distance: '50px',
  easing: 'ease-in',
  origin: 'right'
};

(function($){

  /*
   * Animated scroll
   * To works:
   * Set up the url hash. Ex: contact
   * Set up the section with the id {HASH}-section. Ex: contact-section
   * TO DO: Allow disabled this funcitonality
   * */
  const scrollAnimate = function(hash, time = 800){
    const url = window.location.href.substr(0, window.location.href.indexOf('#'))
    history.replaceState("", document.title, window.location.pathname);

    const div = $(hash+"-section")
    const offset = 93;
    if(div.length > 0){
      $('html, body').animate({ scrollTop: div.offset().top - offset }, time);

    // If we are on homepage, discart the redirect to prevent inf loop
    } else if(window.location.origin + "/" !== url){
      document.location.href = window.location.origin + hash;
    } else {
      console.log('Invalide hash');
    }
  }

  // Detect url hash change
  $(window).on('hashchange', function(e){
    const hash = window.location.hash;
    scrollAnimate(hash);
  });

  // Scroll down on load
  const hash = window.location.hash;
  if (hash) setTimeout(() => {
    scrollAnimate(hash, 1600);
  }, 1000);

  // Mansory grid
  // https://masonry.desandro.com/layout.html
  var $grid = $('.masonry-grid').masonry({
    itemSelector: '.grid-item',
    percentPosition: true,
    gutter: 0
  });

  // layout Masonry after each image loads
  // https://github.com/desandro/imagesloaded
  $grid.imagesLoaded().progress(function (instance, image) {
    if (image.isLoaded) {
      const gridNode =  $(image.img).parent().parent();
      gridNode.addClass('is-complete');
      const index = gridNode.data('index');
      ScrollReveal().reveal(gridNode, Object.assign(sliceUp, {
        delay: parseInt(index)* 100,
        duration: 400,
      }));
    }

    $grid.masonry('layout');
  });

  // Lightbox
  // https://lokeshdhakar.com/projects/lightbox2/#options
  lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true,
    disableScrolling: true,
    showImageNumberLabel: false
  });

  // Main slider
  $('#slick-banner').slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 4000,
    pauseOnHover: false,
  });
  
  $('#slick-products').slick({
    dots: false,
    infinite: true,
    speed: 500,
    slidesToShow: 4,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 4000,
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });
  
  // Main slider
  $('#slick-seconday-slider').slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 4000,
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });

  $('#slick-simple-slider').slick({
    dots: false,
    infinite: true,
    speed: 800,
    slidesToShow: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 4000,
    pauseOnHover: false,
    fade: true,
  });
  
  $('#slick-simple-slider-2').slick({
    dots: false,
    infinite: true,
    speed: 800,
    slidesToShow: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    pauseOnHover: false,
    fade: true,
  });

  // Sticky menu
  var stickyContainer = $("#sticky-container");
  stickyContainer.sticky({ topSpacing: 0 });
  
  // Callbacks
  stickyContainer.on('sticky-start', function(){
    stickyContainer.addClass("sticky-on");    
  });

  stickyContainer.on('sticky-end', function(){
    stickyContainer.removeClass("sticky-on");
  });
  
  

  // ScrollReveral
  ScrollReveal().reveal('.sr-slice-up', sliceUp);
  ScrollReveal().reveal('.sr-slice-down', sliceDown);
  ScrollReveal().reveal('.sr-slice-right', sliceRight);
  ScrollReveal().reveal('.sr-slice-left', sliceLeft);
  ScrollReveal().reveal('.sr-slice-right-2x-delay', Object.assign(sliceRight, {delay: 600}));
  ScrollReveal().reveal('.sr-slice-left-2x-delay', Object.assign(sliceLeft, {delay: 600}));
  ScrollReveal().reveal('.sr-slice-left-3x-delay', Object.assign(sliceLeft, {delay: 900}));

  
  
})(jQuery);