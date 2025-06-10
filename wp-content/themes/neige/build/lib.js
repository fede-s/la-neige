document.addEventListener('DOMContentLoaded', function () {
    const body = document.querySelector('body');
    const hamburgerMenu = document.querySelector('#hamburger-menu');
    const closeMenu = document.querySelector('.close-menu');
    const menuItems = document.querySelectorAll('.menu-item');
    const menuRight = document.querySelector('.menu-right');

    hamburgerMenu.addEventListener('click', function () {
        body.classList.add('menu-opened');
    });

    closeMenu.addEventListener('click', function () {
        body.classList.remove('menu-opened');
    });

    menuItems.forEach(item => {
        item.addEventListener('mouseover', function () {
            const imageID = this.dataset.featuredImage;
            const img = menuRight.querySelector(`.${imageID}`);
            menuRight.querySelectorAll('img').forEach(img => img.classList.remove('show'));
            img.classList.add('show');
        });
    });

    body.onscroll = function(e) {
        if (window.scrollY > 150) {
            body.classList.add('scrolled');
        } else {
            body.classList.remove('scrolled');
        }
    }

    const seasonSelectors = document.querySelectorAll('.season-selector-item a');

    seasonSelectors.forEach(el => {
        el.addEventListener('click', async (event) => {
            const currentSeason = el.dataset.currentSeason;
            const selectedSeason = el.dataset.newSeason;
            if (currentSeason !== selectedSeason && !el.href.includes(selectedSeason)) {
                event.preventDefault();
                await fetch('/wp-json/custom/v1/switch-season', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                });
                location.href = el.href;
            }
        });
    });
     function show(el) {
        var windowHeight = jQuery(window).height();
        jQuery(el).each(function() {
            var thisPos = jQuery(this).offset().top;
            var topOfWindow = jQuery(window).scrollTop();
            if (el == '.fadeIn03' || '.copyright') {
                if (topOfWindow + windowHeight > thisPos) {
                    jQuery(this).addClass('on');
                }
            }
            if (topOfWindow + windowHeight - 100 > thisPos) {
                jQuery(this).addClass('on');
            }
        });
    }

    jQuery(document).ready(function() {
        jQuery(window).scroll(function() {
            show('.fadeIn');
            show('.fadeIn02');
            show('.fadeIn03');
            show('.scrollAnimation');
        });
        show('.fadeIn');
        show('.fadeIn02');
        show('.fadeIn03');
        show('.scrollAnimation');
    });
});




function displayModal(selector) {
    jQuery(selector).css('display', 'block');
}

function closeModal() {
    jQuery('.modal ').css('display', 'none');
}

function displayModalGallery(selector, index) {
    jQuery(selector + ' .owl-carousel').trigger('to.owl.carousel', index);
    setTimeout(() => {
        displayModal(selector);
    }, 0);
    return false
}

jQuery(document).ready(function () {
    jQuery('#rooms').owlCarousel({
        center: true,
        items: 2,
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            1000: {
                items: 2,
                nav: true,
            }
        }
    });
});

window.scripts = {};
window.getScript = function (url, callback) {
    if (!scripts[url]) {
        scripts[url] = {
            requests: [callback]
        };
        jQuery.ajax({
            dataType: 'script',
            cache: true,
            url: url,
            success: function () {
                scripts[url].ready = true;
                window.notifyScriptReady(url);
            }
        });
    } else if (scripts[url].ready) {
        setTimeout(callback, 0);
    } else {
        scripts[url].requests.push(callback);
    }
};

window.notifyScriptReady = function (url) {
    var script = scripts[url];
    if (script.ready) {
        for (var i = 0; i < script.requests.length; i++) {
            if (script.requests[i]) {
                script.requests[i].call();
            }
        }
        script.requests = [];
    }
}

window.getHSFormScript = function (callback) {
    window.getScript('https://js.hsforms.net/forms/v2.js', callback);
};

window.createHubForm = function (opts) {
    opts.portalId = '2766250';
    if (opts.deferred) {
        document.addEventListener('DOMContentLoaded', function () {
            getHSFormScript(function () {
                hbspt.forms.create(opts);
            });
        });
    } else {
        getHSFormScript(function () {
            hbspt.forms.create(opts);
        });
    }
}
