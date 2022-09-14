$(document).ready(function() {

    // NAV LINK ACTIVE
    $(function($) {
        var path = window.location.href;
        $("nav ul li a").each(function() {
            if (this.href === path) {
                $(this).addClass("fw-bold");
            }
        });
    });

    // AOS Initialize
    AOS.init({
        duration: 1200,
    });

    $(".tracks tr").slice(0, 8).show();
    $("#loadMore").on("click", function(e) {
        e.preventDefault();
        // $(".tracks tr:hidden").slice(0, 8).slideDown();
        if ($(".tracks tr:hidden").length == 0) {
            $("#loadMore").addClass("d-none");
        }
    });

    //NAVBAR FIXED HIDE STARTS
    $(window).scroll(function(e) {
        var scroll = $(window).scrollTop();

        if (scroll >= 100) {
            $('header').addClass("navbar-hide");

        } else {
            $('header').removeClass("navbar-hide");
        }

    })
});

   // SLICK SLIDER
    //Logo Slider
    $(".AlbumSlider").slick({
        dots: true,
        arrows: false,
        autoplay: true,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
    });

    // SLICK SLIDER END


function close_offcanvas() {
    // darken_screen(false);
    document.querySelector('.mobile-offcanvas.show').classList.remove('show');
    document.body.classList.remove('offcanvas-active');
}

function show_offcanvas(offcanvas_id) {
    // darken_screen(true);
    document.getElementById(offcanvas_id).classList.add('show');
    document.body.classList.add('offcanvas-active');
}

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('[data-trigger]').forEach(function(everyelement) {

        let offcanvas_id = everyelement.getAttribute('data-trigger');

        everyelement.addEventListener('click', function(e) {
            e.preventDefault();
            show_offcanvas(offcanvas_id);

        });
    });

    document.querySelectorAll('.btn-close').forEach(function(everybutton) {

        everybutton.addEventListener('click', function(e) {
            e.preventDefault();
            close_offcanvas();
        });
    });

    // document.querySelector('.screen-darken').addEventListener('click', function(event){
    //     close_offcanvas();
    // });

});
// DOMContentLoaded  end

// end responsive header