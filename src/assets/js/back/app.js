/**
 * import styles into webpack bundler
 */
import 'scss/back/soft-ui-dashboard.scss'

/**
 * import icons into webpack bundler
 */
/* brands */
import 'icons/brands/ic_brand_apple.svg'
import 'icons/brands/ic_brand_facebook.svg'
import 'icons/brands/ic_brand_github.svg'
import 'icons/brands/ic_brand_google.svg'
import 'icons/brands/ic_brand_instagram.svg'
import 'icons/brands/ic_brand_linkedin.svg'
import 'icons/brands/ic_brand_microsoft.svg'
import 'icons/brands/ic_brand_slack.svg'
import 'icons/brands/ic_brand_spotify.svg'
import 'icons/brands/ic_brand_swagger.svg'
import 'icons/brands/ic_brand_tiktok.svg'
import 'icons/brands/ic_brand_trustpilot.svg'
import 'icons/brands/ic_brand_x.svg'
import 'icons/brands/ic_brand_whatsapp.svg'
import 'icons/brands/ic_brand_white_facebook.svg'
import 'icons/brands/ic_brand_white_linkedin.svg'
/* favorites */
import 'icons/app/fav/ic_fav_16x16.png'
import 'icons/app/fav/ic_fav_32x32.png'
import 'icons/app/fav/ic_fav_36x36.png'
import 'icons/app/fav/ic_fav_48x48.png'
import 'icons/app/fav/ic_fav_72x72.png'
import 'icons/app/fav/ic_fav_96x96.png'
import 'icons/app/fav/ic_fav_144x144.png'
import 'icons/app/fav/ic_fav_168x168.png'
import 'icons/app/fav/ic_fav_192x192.png'
import 'icons/app/fav/ic_fav_256x256.png'
import 'icons/app/fav/ic_fav_512x512.png'
/* flags */
import 'icons/flag/ic_flag_BE.svg'
import 'icons/flag/ic_flag_CZ.svg'
import 'icons/flag/ic_flag_DE.svg'
import 'icons/flag/ic_flag_DK.svg'
import 'icons/flag/ic_flag_EN.svg'
import 'icons/flag/ic_flag_ES.svg'
import 'icons/flag/ic_flag_FI.svg'
import 'icons/flag/ic_flag_FR.svg'
import 'icons/flag/ic_flag_GB.svg'
import 'icons/flag/ic_flag_GR.svg'
import 'icons/flag/ic_flag_IT.svg'
import 'icons/flag/ic_flag_NL.svg'
import 'icons/flag/ic_flag_NO.svg'
import 'icons/flag/ic_flag_PH.svg'
import 'icons/flag/ic_flag_PL.svg'
import 'icons/flag/ic_flag_PT.svg'
import 'icons/flag/ic_flag_SE.svg'
import 'icons/flag/ic_flag_TR.svg'
/* general */
import 'icons/ic_box_3d.svg'
import 'icons/ic_creditcard.svg'
import 'icons/ic_customer_support.svg'
import 'icons/ic_document.svg'
import 'icons/ic_down_arrow.svg'
import 'icons/ic_down_arrow_dark.svg'
import 'icons/ic_down_arrow_white.svg'
import 'icons/ic_merge.svg'
import 'icons/ic_office.svg'
import 'icons/ic_settings.svg'
import 'icons/ic_shop.svg'
import 'icons/ic_spaceship.svg'
import 'icons/ic_user_avatar.svg'

/**
 * import images into webpack bundler
 */
import 'images/curved/img_curved0.jpg'
import 'images/curved/img_curved1.jpg'
import 'images/curved/img_curved6.jpg'
import 'images/curved/img_curved7.jpg'
import 'images/curved/img_curved8.jpg'
import 'images/curved/img_curved9.jpg'
import 'images/curved/img_curved10.jpg'
import 'images/curved/img_curved11.jpg'
import 'images/curved/img_curved14.jpg'
import 'images/curved/img_green_curved.jpg'
import 'images/curved/img_white_curved.jpg'

/**
 * import illustrations into webpack bundler
 */
import 'images/illustrations/img_illu_chat.png'
import 'images/illustrations/img_illu_chat_danger.png'
import 'images/illustrations/img_illu_error_404.png'
import 'images/illustrations/img_illu_error_500.png'
import 'images/illustrations/img_illu_lock.png'
import 'images/illustrations/img_illu_lock_dark.png'
import 'images/illustrations/img_illu_rocket_white.png'

/**
 * import placeholders into webpack bundler (visit: https://placehold.co/)
 */
import 'images/placeholders/img_placeholder_160x160.svg'
import 'images/placeholders/img_placeholder_800x800.svg'
import 'images/placeholders/img_placeholder_1920x1080.svg'

// =========================================================
// Soft UI Dashboard - v1.0.7
// =========================================================

// Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
// Copyright 2023 Creative Tim (https://www.creative-tim.com)
// Licensed under MIT (https://github.com/creativetimofficial/soft-ui-dashboard/blob/main/LICENSE)

// Coded by www.creative-tim.com

// =========================================================

// The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

"use strict";
(function() {

    const isWindows = navigator.platform.indexOf('Win') > -1;

    if (isWindows) {
        // if we are on Windows OS we activate the perfectScrollbar function
        if (document.getElementsByClassName('main-content')[0]) {

            const mainpanel = document.querySelector('.main-content');
            const ps = new PerfectScrollbar(mainpanel);
        }

        if (document.getElementsByClassName('sidenav')[0]) {

            const sidebar = document.querySelector('.sidenav');
            const ps1 = new PerfectScrollbar(sidebar);
        }

        if (document.getElementsByClassName('fixed-plugin')[0]) {

            const fixedplugin = document.querySelector('.fixed-plugin');
            const ps3 = new PerfectScrollbar(fixedplugin);
        }
    }
})();

// Verify navbar blur on scroll
navbarBlurOnScroll('navbarBlur');


// initialization of Tooltips
const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
const tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

// Fixed Plugin
if (document.querySelector('.fixed-plugin')) {
    var fixedPlugin = document.querySelector('.fixed-plugin');
    var fixedPluginButton = document.querySelector('.fixed-plugin-button');
    var fixedPluginButtonNav = document.querySelector('.fixed-plugin-button-nav');
    var fixedPluginCard = document.querySelector('.fixed-plugin .card');
    var fixedPluginCloseButton = document.querySelectorAll('.fixed-plugin-close-button');
    var navbar = document.getElementById('navbarBlur');
    var buttonNavbarFixed = document.getElementById('navbarFixed');

    if (fixedPluginButton) {
        fixedPluginButton.onclick = function() {
            if (!fixedPlugin.classList.contains('show')) {
                fixedPlugin.classList.add('show');
            } else {
                fixedPlugin.classList.remove('show');
            }
        }
    }

    if (fixedPluginButtonNav) {
        fixedPluginButtonNav.onclick = function() {
            if (!fixedPlugin.classList.contains('show')) {
                fixedPlugin.classList.add('show');
            } else {
                fixedPlugin.classList.remove('show');
            }
        }
    }

    fixedPluginCloseButton.forEach(function(el) {
        el.onclick = function() {
            fixedPlugin.classList.remove('show');
        }
    })

    document.querySelector('body').onclick = function(e) {
        if (e.target != fixedPluginButton && e.target != fixedPluginButtonNav && e.target.closest('.fixed-plugin .card') != fixedPluginCard) {
            fixedPlugin.classList.remove('show');
        }
    }

    if (navbar) {
        if (navbar.getAttribute('navbar-scroll') == 'true') {
            buttonNavbarFixed.setAttribute("checked", "true");
        }
    }

}

// Tabs navigation
var total = document.querySelectorAll('.nav-pills');

total.forEach(function(item, i) {
    var moving_div = document.createElement('div');
    var first_li = item.querySelector('li:first-child .nav-link');
    var tab = first_li.cloneNode();
    tab.innerHTML = "-";

    moving_div.classList.add('moving-tab', 'position-absolute', 'nav-link');
    moving_div.appendChild(tab);
    item.appendChild(moving_div);

    var list_length = item.getElementsByTagName("li").length;

    moving_div.style.padding = '0px';
    moving_div.style.width = item.querySelector('li:nth-child(1)').offsetWidth + 'px';
    moving_div.style.transform = 'translate3d(0px, 0px, 0px)';
    moving_div.style.transition = '.5s ease';

    item.onmouseover = function(event) {
        let target = getEventTarget(event);
        let li = target.closest('li'); // get reference
        if (li) {
            let nodes = Array.from(li.closest('ul').children); // get array
            let index = nodes.indexOf(li) + 1;
            item.querySelector('li:nth-child(' + index + ') .nav-link').onclick = function() {
                moving_div = item.querySelector('.moving-tab');
                let sum = 0;
                if (item.classList.contains('flex-column')) {
                    for (var j = 1; j <= nodes.indexOf(li); j++) {
                        sum += item.querySelector('li:nth-child(' + j + ')').offsetHeight;
                    }
                    moving_div.style.transform = 'translate3d(0px,' + sum + 'px, 0px)';
                    moving_div.style.height = item.querySelector('li:nth-child(' + j + ')').offsetHeight;
                } else {
                    for (var j = 1; j <= nodes.indexOf(li); j++) {
                        sum += item.querySelector('li:nth-child(' + j + ')').offsetWidth;
                    }
                    moving_div.style.transform = 'translate3d(' + sum + 'px, 0px, 0px)';
                    moving_div.style.width = item.querySelector('li:nth-child(' + index + ')').offsetWidth + 'px';
                }
            }
        }
    }
});


// Tabs navigation resize
window.addEventListener('resize', function(event) {
    total.forEach(function(item, i) {
        item.querySelector('.moving-tab').remove();
        var moving_div = document.createElement('div');
        var tab = item.querySelector(".nav-link.active").cloneNode();
        tab.innerHTML = "-";

        moving_div.classList.add('moving-tab', 'position-absolute', 'nav-link');
        moving_div.appendChild(tab);

        item.appendChild(moving_div);

        moving_div.style.padding = '0px';
        moving_div.style.transition = '.5s ease';

        let li = item.querySelector(".nav-link.active").parentElement;

        if (li) {
            let nodes = Array.from(li.closest('ul').children); // get array
            let index = nodes.indexOf(li) + 1;

            let sum = 0;
            if (item.classList.contains('flex-column')) {
                for (var j = 1; j <= nodes.indexOf(li); j++) {
                    sum += item.querySelector('li:nth-child(' + j + ')').offsetHeight;
                }
                moving_div.style.transform = 'translate3d(0px,' + sum + 'px, 0px)';
                moving_div.style.width = item.querySelector('li:nth-child(' + index + ')').offsetWidth + 'px';
                moving_div.style.height = item.querySelector('li:nth-child(' + j + ')').offsetHeight;
            } else {
                for (var j = 1; j <= nodes.indexOf(li); j++) {
                    sum += item.querySelector('li:nth-child(' + j + ')').offsetWidth;
                }
                moving_div.style.transform = 'translate3d(' + sum + 'px, 0px, 0px)';
                moving_div.style.width = item.querySelector('li:nth-child(' + index + ')').offsetWidth + 'px';

            }
        }
    });

    if (window.innerWidth < 991) {
        total.forEach(function(item, i) {
            if (!item.classList.contains('flex-column')) {
                item.classList.add('flex-column', 'on-resize');
            }
        });
    } else {
        total.forEach(function(item, i) {
            if (item.classList.contains('on-resize')) {
                item.classList.remove('flex-column', 'on-resize');
            }
        })
    }
});

function getEventTarget(e) {
    e = e || window.event;
    return e.target || e.srcElement;
}
// End tabs navigation


//Set Sidebar Color
// function sidebarColor(a) {
//     var parent = a.parentElement.children;
//     var color = a.getAttribute("data-color");
//
//     for (var i = 0; i < parent.length; i++) {
//         parent[i].classList.remove('active');
//     }
//
//     if (!a.classList.contains('active')) {
//         a.classList.add('active');
//     } else {
//         a.classList.remove('active');
//     }
//
//     var sidebar = document.querySelector('.sidenav');
//     sidebar.setAttribute("data-color", color);
//
//     if (document.querySelector('#sidenavCard')) {
//         var sidenavCard = document.querySelector('#sidenavCard');
//         let sidenavCardClasses = ['card', 'card-background', 'shadow-none', 'card-background-mask-' + color];
//         sidenavCard.className = '';
//         sidenavCard.classList.add(...sidenavCardClasses);
//
//         var sidenavCardIcon = document.querySelector('#sidenavCardIcon');
//         let sidenavCardIconClasses = ['ni', 'ni-diamond', 'text-gradient', 'text-lg', 'top-0', 'text-' + color];
//         sidenavCardIcon.className = '';
//         sidenavCardIcon.classList.add(...sidenavCardIconClasses);
//     }
//
// }

// Set Navbar Fixed
// function navbarFixed(el) {
//     let classes = ['position-sticky', 'blur', 'shadow-blur', 'mt-4', 'left-auto', 'top-1', 'z-index-sticky'];
//     const navbar = document.getElementById('navbarBlur');
//
//     if (!el.getAttribute("checked")) {
//         navbar.classList.add(...classes);
//         navbar.setAttribute('navbar-scroll', 'true');
//         navbarBlurOnScroll('navbarBlur');
//         el.setAttribute("checked", "true");
//     } else {
//         navbar.classList.remove(...classes);
//         navbar.setAttribute('navbar-scroll', 'false');
//         navbarBlurOnScroll('navbarBlur');
//         el.removeAttribute("checked");
//     }
// }

// Navbar blur on scroll
function navbarBlurOnScroll(id) {
    const navbar = document.getElementById(id);
    let navbarScrollActive = navbar ? navbar.getAttribute("navbar-scroll") : false;
    let scrollDistance = 5;
    let classes = ['position-sticky', 'blur', 'shadow-blur', 'mt-4', 'left-auto', 'top-1', 'z-index-sticky'];
    let toggleClasses = ['shadow-none'];

    if (navbarScrollActive == 'true') {
        window.onscroll = debounce(function() {
            if (window.scrollY > scrollDistance) {
                blurNavbar();
            } else {
                transparentNavbar();
            }
        }, 10);
    } else {
        window.onscroll = debounce(function() {
            transparentNavbar();
        }, 10);
    }

    function blurNavbar() {
        navbar.classList.add(...classes)
        navbar.classList.remove(...toggleClasses)

        toggleNavLinksColor('blur');
    }

    function transparentNavbar() {
        if (navbar) {
            navbar.classList.remove(...classes)
            navbar.classList.add(...toggleClasses)

            toggleNavLinksColor('transparent');
        }
    }

    function toggleNavLinksColor(type) {
        let navLinks = document.querySelectorAll('.navbar-main .nav-link')
        let navLinksToggler = document.querySelectorAll('.navbar-main .sidenav-toggler-line')

        if (type === "blur") {
            navLinks.forEach(element => {
                element.classList.remove('text-body')
            });

            navLinksToggler.forEach(element => {
                element.classList.add('bg-dark')
            });
        } else if (type === "transparent") {
            navLinks.forEach(element => {
                element.classList.add('text-body')
            });

            navLinksToggler.forEach(element => {
                element.classList.remove('bg-dark')
            });
        }
    }
}


// Debounce Function
// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.
function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this,
            args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

//Set Sidebar Type
function sidebarType(a) {
    var parent = a.parentElement.children;
    var color = a.getAttribute("data-class");

    var colors = [];

    for (var i = 0; i < parent.length; i++) {
        parent[i].classList.remove('active');
        colors.push(parent[i].getAttribute('data-class'));
    }

    if (!a.classList.contains('active')) {
        a.classList.add('active');
    } else {
        a.classList.remove('active');
    }

    var sidebar = document.querySelector('.sidenav');

    for (var i = 0; i < colors.length; i++) {
        sidebar.classList.remove(colors[i]);
    }

    sidebar.classList.add(color);
}


// Toggle Sidenav
const iconNavbarSidenav = document.getElementById('iconNavbarSidenav');
const iconSidenav = document.getElementById('iconSidenav');
const sidenav = document.getElementById('sidenav-main');
let body = document.getElementsByTagName('body')[0];
let className = 'g-sidenav-pinned';

if (iconNavbarSidenav) {
    iconNavbarSidenav.addEventListener("click", toggleSidenav);
}

if (iconSidenav) {
    iconSidenav.addEventListener("click", toggleSidenav);
}

function toggleSidenav() {
    if (body.classList.contains(className)) {
        body.classList.remove(className);
        setTimeout(function() {
            sidenav.classList.remove('bg-white');
        }, 100);
        sidenav.classList.remove('bg-transparent');

    } else {
        body.classList.add(className);
        sidenav.classList.add('bg-white');
        sidenav.classList.remove('bg-transparent');
        iconSidenav.classList.remove('d-none');
    }
}

// Resize navbar color depends on configurator active type of sidenav

let referenceButtons = document.querySelector('[data-class]');

window.addEventListener("resize", navbarColorOnResize);

function navbarColorOnResize() {
    if (window.innerWidth > 1200) {
        if (referenceButtons.classList.contains('active') && referenceButtons.getAttribute('data-class') === 'bg-transparent') {
            sidenav.classList.remove('bg-white');
        } else {
            sidenav.classList.add('bg-white');
        }
    } else {
        sidenav.classList.add('bg-white');
        sidenav.classList.remove('bg-transparent');
    }
}

// Deactivate sidenav type buttons on resize and small screens
window.addEventListener("resize", sidenavTypeOnResize);
window.addEventListener("load", sidenavTypeOnResize);

function sidenavTypeOnResize() {
    let elements = document.querySelectorAll('[onclick="sidebarType(this)"]');
    if (window.innerWidth < 1200) {
        elements.forEach(function(el) {
            el.classList.add('disabled');
        });
    } else {
        elements.forEach(function(el) {
            el.classList.remove('disabled');
        });
    }
}