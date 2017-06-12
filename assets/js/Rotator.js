export default class Rotator {
  constructor(selector) {

    this.selector = selector;

    let $rotator = $(this.selector);

    $(document).ready(() => {

      $('.ellipsis__loader').fadeOut('slow', function() {
        $rotator.addClass('loaded');

        var swiper1 = new Swiper('.swipe1', {
           slidesPerView: 1,
           loop: true,
           effect: 'fade',
           centeredSlides: true,
           autoplay: 8500,
           autoplayDisableOnInteraction: true
        });

        var swiper2 = new Swiper('.swiper2', {

          direction: 'vertical',
          autoplay: 2000,
          slidesPerView: 'auto',
          //  centeredSlides: true,
          loop: true

        });
      });
    });
  }
}
