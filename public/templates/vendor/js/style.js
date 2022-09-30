$(document).ready(function(){
    // $(".slider").owlCarousel({
    //     items:1,
    //     loop:true,
    // });
    $(".slider-produk-terbaru").owlCarousel({
        margin:5,
        items:1,
        // responsive:{
        //     0:{
        //         items:2
        //     },
        //     600:{
        //         items:3
        //     },
        //     1000:{
        //         items:2
        //     }
        // }
    });

    $(".slider-terlaris").owlCarousel({
        // nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
});


