$(document).ready(function(){

    // Banner Owl Carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    // Today's Promo Owl Carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0:{
                items: 1
            },
            600:{
                items: 3
            },
            1000:{
                items:5
            }
        }
    });

    // Isotope Filter
    var $grid = $(".grid").isotope({
        itemSelector: '.grid-item',
        layoutMode : 'fitRows'
    });

    // Filter item saat button di klik
    $(".button-group").on("click", "button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter: filterValue});
    })

    // New Product Owl Carousel
    $("#new-product .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0:{
                items: 1
            },
            600:{
                items: 3
            },
            1000:{
                items:5
            }
        }
    });

    // Blogs Owl Carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0:{
                items: 1
            },
            600:{
                items: 3
            }
        }
    })


    // Product Qty Section
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $input = $(".qty.qty_input");

    // Qty on Click
    $qty_up.click(function(e){
        if($input.val() >= 1 && $input.val() <= 9){
            $input.val(function(i, oldval){
                return ++oldval;
            })
        }
    });

});