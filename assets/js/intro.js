const
    Snap = require(`imports-loader?this=>window,fix=>module.exports=0!snapsvg/dist/snap.svg.js`);

const margin = 54,
    w = $(window).width(),
    h = $(window).height(),
    iw = w / 4,
    ih = h / 4;
function rand_int(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
function intro_start(intro_content) {

    $(document).ready(function () {

        let s = Snap('#intrologo');
        s
            .attr({viewBox: [0, 0, w, h].join(',')})
            .attr('height', h)
            .attr('width', w);


        let
            groups = s.selectAll('.gr');

        groups.forEach(function (elem, i) {
            let matrix = new Snap.Matrix(),
                hh = margin + ih * rand_int(0, 2),
                ww = margin + iw * i;
            matrix.scale(.8);
            matrix.translate(ww, hh);


            elem.attr({transform: matrix})

            console.log(matrix)
        });


    });


    if (!intro_content) {
        return;
    } else {
        const photos = intro_content.photos,
            lead = intro_content.lead;
        console.log(photos)

    }
}

intro_start();