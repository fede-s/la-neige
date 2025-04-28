document.addEventListener('DOMContentLoaded', function () {

    // jQuery(document).ready(function ($) {
    //     $('.logo-carousel').owlCarousel({
    //         loop: true,
    //         margin: 10,
    //         nav: false,
    //         autoplay: true,
    //         autoplayTimeout: 1000,
    //         autoplayHoverPause: true,
    //         dots: false,
    //     });
    // });

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
        if (window.scrollY > 100) {
            body.classList.add('scrolled');
        } else {
            body.classList.remove('scrolled');
        }
    }
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
