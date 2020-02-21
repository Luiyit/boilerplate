/* Get location hash */
function getUrlParameter(name) {
  name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
  var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
  var results = regex.exec(location.search);
  return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
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

  
})(jQuery);