/* eslint-disable no-undef */
function volumeToggle(button) {
  var muted = $('.preview_video').prop('muted');
  $('.preview_video').prop('muted', !muted);

  $(button).find('i').toggleClass('fa-volume-mute');
  $(button).find('i').toggleClass('fa-volume-up');
}
