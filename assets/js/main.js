import $ from "jquery";
import jQuery from "jquery";
import moment from "moment";
import anime from "animejs";
import swiper from "swiper";
import Rotator from "./Rotator";


window.$ = $;
window.jQuery = jQuery;

window.moment = moment;
moment().format();
moment.locale('pl');

window.anime = anime;
window.swiper = swiper;


let AD = {
    ajax: app.ajax_url
};

AD.init = function () {
    this.menu_scroll = this.menu_scroll.bind(this);

    $(window).on('scroll', this.menu_scroll);

    $('.menu__toggle').on('click', function (e) {
        $('.menu__toggle').toggleClass('toggled');
        $('.top__menu').toggleClass('open');
        $('body').toggleClass('menu__open');
    });
    $('.close_menu').on('click', function (e) {
        $('.menu__toggle').toggleClass('toggled');
        $('.top__menu').toggleClass('open');
        $('body').toggleClass('menu__open');
    });
}

AD.menu_scroll = function (e) {
    let s = $(window).scrollTop();
    $('body')[(s > $(window).height() - 23 ? 'addClass' : 'removeClass')]('scrolled');
}


AD.init();

new Rotator('.last__actions__actions');
