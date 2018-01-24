jQuery(document).ready(function($) {
  if ($('body').hasClass('home')) {
    $(window).trigger('resize'); // fix issue with slider width
  }
})
