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

function intro_start() {


    let s = Snap('#intrologo');

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

    s.attr('class', 'show');
    var curindex = 0;
    $('.intro__section').on('click', function (e) {

        if ($(e.target).is('.pointer *')) {
            $('html, body').animate({scrollTop: $(window).height()});
            return;
        }

        curindex = curindex + 1;

        var
            photos = intro_content.photos,
            lead = intro_content.lead,
            photo = $('.intro__img'),
            text = $('.intro__section h1 span');


        if (typeof photos[curindex] === 'undefined') {
            curindex = 0;
        }

        var img = new Image();
        img.src = photos[curindex]['full'];

        img.onload = function () {
            photo.attr('src', img.src)
        };


        text.text(lead[curindex]['content'])

        sh();
    });


}
$(document).ready(function () {
    intro_start();

});