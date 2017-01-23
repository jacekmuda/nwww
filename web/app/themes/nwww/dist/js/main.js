'use strict';

var H = {
    addClass: function addClass(el, cl) {
        if (el.classList) {
            el.classList.add(cl);
        } else {
            el.className += ' ' + el;
        }
    },
    removeClass: function removeClass(el, cl) {
        if (el.classList) el.classList.remove(cl);else el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
    },
    toggleClass: function toggleClass(el, cl) {
        var newClass = void 0;
        var currentClass = el.className;
        if (currentClass.split(" ").indexOf(cl) > -1) {
            newClass = currentClass.replace(new RegExp('\\b' + cl + '\\b', 'g'), "");
        } else {
            newClass = currentClass + " " + cl;
        }
        el.className = newClass.trim();
    }
};

var AD = {};

AD.init = function () {
    this.menu_scroll = this.menu_scroll.bind(this);
    this.menu_toggle = this.menu_toggle.bind(this);

    window.addEventListener('scroll', this.menu_scroll);

    var toggle_btn = document.querySelector('.menu_toggle');
    toggle_btn.addEventListener('click', this.menu_toggle);
};
AD.menu_toggle = function (e) {
    console.log('clickd');
    var navbar = document.querySelector('.navbar__right'),
        cl = 'hidden-xs';
    H.toggleClass(navbar, cl);
};

AD.menu_scroll = function (e) {
    var header = document.querySelector('.header__wrapper'),
        body = document.querySelector('body'),
        scroll = body.scrollTop,
        classname = 'scrolled';

    if (scroll > 200) {
        H.addClass(header, classname);
    } else {
        H.removeClass(header, classname);
    }
};

AD.init();