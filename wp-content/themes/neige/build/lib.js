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

    const hamburgerMenu = document.getElementById('hamburger-menu');
    const sideMenu = document.getElementById('side-menu');
    const closeMenu = document.querySelector('.close-menu');
    const menuItems = document.querySelectorAll('.menu-item');
    const menuRight = document.querySelector('.menu-right');

    hamburgerMenu.addEventListener('click', function () {
        sideMenu.classList.remove('hidden');
        hamburgerMenu.classList.add('hidden');
    });

    closeMenu.addEventListener('click', function () {
        sideMenu.classList.add('hidden');
        hamburgerMenu.classList.remove('hidden');
    });

    menuItems.forEach(item => {
        item.addEventListener('mouseover', function () {
            const imageID = this.dataset.featuredImage;
            const img = menuRight.querySelector(`.${imageID}`);
            menuRight.querySelectorAll('img').forEach(img => img.classList.remove('show'));
            img.classList.add('show');
        });
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

jQuery(document).ready(function(){
    jQuery('#rooms').owlCarousel({
      center: true,
      items: 2,
      loop: true, 
      margin: 10,
      nav: true,
    });
  });