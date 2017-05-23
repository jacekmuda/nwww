export default class Rotator {
  constructor(selector) {

    this.selector = selector;

    let $rotator = $(this.selector);

    $(document).ready(() => {

      $('.ellipsis__loader').fadeOut('slow', function() {
        $rotator.addClass('loaded');

        var swiper = new Swiper('.swiper-container', {

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
