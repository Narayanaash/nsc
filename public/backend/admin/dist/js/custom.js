(function($) {

setTimeout(fade_out, 2000);

function fade_out() {
  $(".msg_box").css({'opacity': '0', 'transform': 'scale(0)'});
}
})(jQuery);
