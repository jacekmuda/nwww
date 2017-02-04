import $ from 'jquery';
import jQuery from 'jquery';


window.$ = $;
window.jQuery = jQuery;

import moment from 'moment';
window.moment = moment;
moment().format();
moment.locale('pl');


import anime from 'animejs';
window.anime = anime;


import swiper from 'swiper';
window.swiper = swiper;

import Rotator from './Rotator';

let AD =  {
    ajax: app.ajax_url
};

AD.init = function () {
    this.menu_scroll = this.menu_scroll.bind(this);
    this.menu_toggle = this.menu_toggle.bind(this);


    $(window).on('scroll', this.menu_scroll);
    $('.menu_toggle').on('click', this.menu_toggle);



}
AD.menu_toggle = function (e) {
    $('.navbar__right').toggleClass( 'hidden-xs' );
}



AD.menu_scroll = function(e) {
    let s = $(window).scrollTop();
    $('.header__wrapper')[ (s > 200 ? 'addClass' : 'removeClass') ]('scrolled');

}


AD.init();


new Rotator('.last__actions__actions');