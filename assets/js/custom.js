import owlCarousel from "owl.carousel";

window.owlCarousel = owlCarousel;


function owl() {

  if ($('.owl-carousel').children('div').length > 1) {
    $(".owl-carousel").owlCarousel({
      items: 1,
      loop: true,
      autoplay: false,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      lazyLoad: true,
      margin: 10,
      autoHeight: true,
      dotsSpeed: 0
    });
  } else {
    $('.promo--wrapper').removeClass('owl-carousel')
  };

  if ($('.owl-dots').children('div').length == 2) {
    $('.owl-carousel').addClass('two-items')
  };
  if ($('.owl-dots').children('div').length == 3) {
    $('.owl-carousel').addClass('three-items')
  };
  if ($('.owl-dots').children('div').length == 4) {
    $('.owl-carousel').addClass('four-items')
  };
}

$(document).ready(function() {
  owl();
});

$(document).ready(function() {

  var pointerbounce = anime({
    targets: '.pointer',
    translateY: -25,
    direction: 'alternate',
    loop: true
  });

  var pointerbounce2 = anime({
    targets: '.smallpointer',
    translateY: -15,
    direction: 'alternate',
    loop: true
  });
  // Preloader

});
$(document).ready(function() {
  $("#preloader").delay(350).fadeOut("slow");
})

$(document).ready(function() {
  $(".smallpointer").click(function() {
    console.log("yes");
    $('html, body').animate({
        scrollTop: $(".campaign__desc").offset().top
    }, 2000);  });
    })
