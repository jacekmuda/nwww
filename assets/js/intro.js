const
    Snap = require(`imports-loader?this=>window,fix=>module.exports=0!snapsvg/dist/snap.svg.js`);

const margin = 54,
    arr = [0, 1, 2, 3],
    w = $(window).width(),
    h = $(window).height(),
    iw = w / 4,
    ih = h / 4;

function shuffle(a) {
    for (let i = a.length; i; i--) {
        let j = Math.floor(Math.random() * i);
        [a[i - 1], a[j]] = [a[j], a[i - 1]];
    }
}
$('.intrall').addClass(function( index ) {
  return "item-" + index;
});

function intro_start(grabthis) {
  if ($(grabthis).length > 0) {
      let s = Snap(grabthis);

      s
          .attr({viewBox: [0, 0, w, h].join(',')})
          .attr('height', h)
          .attr('width', w);


      let groups = s.selectAll('.gr');

      function sh() {
          shuffle(arr);

          groups.forEach(function (elem, i) {
              let a = arr[i],
                  matrix = new Snap.Matrix(),
                  hh = margin + ih * a,
                  ww = margin + iw * i + (a * 30);
              matrix.scale(.8);

              if (hh > h * 0.9 && i == 0) {
                  hh = hh - 300;
              }

              matrix.translate(ww, hh);
              elem.attr({transform: matrix})
          });
      }
      sh();
    };
};

$(document).ready(function () {

    $('.intrall').each(function(index) {
        let classjob = '.item-' + index;
        intro_start(classjob);
    });
  });

$(document).ready(function () {
  $('.pointer *').on('click', function() {
  $('html, body').animate({scrollTop: $(window).height()});
  });
  });
