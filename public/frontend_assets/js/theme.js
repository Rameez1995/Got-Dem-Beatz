$(document).ready(function() {
    
    
     // partners
    $(".SpotlightSlider").slick({
        slidesToScroll: 1,
        slidesToShow: 4,
        dots: false,
        infinite: true,
        speed: 300,
        autoplay: true,
        arrows: false,
        margin:'15px',
        // centerMode: true,
        // focusOnSelect: true
      responsive: [{
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                },
            },
               {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });
    

$('.share').popover({ 
    content: '<div class="d-flex justify-content-between pb-2"> <span>Final Fee</span> <span>$0</span> </div> ', html: true, placement: "bottom",  trigger: "focus" });
        
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
    
  $('.stripeForm').hide();
 $('input:radio[name="paymentMethodsCardStripe"]').change(
function() {
	if ($(this).is(':checked') && $(this).val() == 'stripe')
	{$('.stripeForm').show();
  }
  
  else {
    $('.stripeForm').hide();
   }
	}
);



});

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
// start show password hidden password
function showPassHiddedPass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
// end show password hidden password