let H = {
    addClass: function(el, cl) {
        if (el.classList) {
            el.classList.add(cl);
        } else {
            el.className += ' ' + el;
        }
    },
    removeClass: function (el, cl) {
        if (el.classList)
            el.classList.remove(cl);
        else
            el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
    },
    toggleClass: function(el, cl){
        let newClass;
        var currentClass = el.className;
        if(currentClass.split(" ").indexOf(cl) > -1){
            newClass = currentClass.replace(new RegExp('\\b'+cl+'\\b','g'),"")
        }else{
            newClass = currentClass + " " + cl;
        }
        el.className = newClass.trim();
    }
}

let AD =  {

    ajax: app.ajax_url

};

AD.init = function () {
    this.menu_scroll = this.menu_scroll.bind(this);
    this.menu_toggle = this.menu_toggle.bind(this);
    this.ajax_load = this.ajax_load.bind(this);

    window.addEventListener('scroll', this.menu_scroll);

    let toggle_btn = document.querySelector('.menu_toggle');
    toggle_btn.addEventListener('click', this.menu_toggle);


    // let cat = document.querySelectorAll('.cat__link'), i;
    //
    // for (i = 0; i < cat.length; ++i) {
    //     cat[i].addEventListener('click', this.ajax_load);
    //
    // }


}
AD.menu_toggle = function (e) {
    console.log('clickd');
    let navbar = document.querySelector('.navbar__right'),
        cl = 'hidden-xs';
    H.toggleClass(navbar, cl);

}

AD.ajax_load = function (e) {
    console.log(e)
    e.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/nwww/web/?cat=4');
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        }
        else {
            console.log(xhr.status);
        }
    };
    xhr.send();
}


AD.menu_scroll = function(e) {
    let header = document.querySelector('.header__wrapper'),
        body = document.querySelector('body'),
        scroll = body.scrollTop,
        classname = 'scrolled';

    if (scroll > 200) {
        H.addClass(header, classname)

    } else {
        H.removeClass(header, classname)
    }


}

AD.init();