(function($){

  var stickyContainer = $("#sticky-container");
  
  stickyContainer.sticky({ topSpacing: 0 });

  stickyContainer.on('sticky-start', function(){
    stickyContainer.addClass("sticky-on");    
  });

  stickyContainer.on('sticky-end', function(){
    stickyContainer.removeClass("sticky-on");
  });

  
})(jQuery);