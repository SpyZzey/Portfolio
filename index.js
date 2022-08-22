$(window).on('resize', function () {
    darkenBackgroundImage();
});
$('.card--rotate').on('click', function (e) {
    if(!$(e.target).closest("button").length) {
        $(this).toggleClass('active');
    }
});


// <editor-fold desc="Random Image Positioning">
const card = $('#card--skill .card-back');


// </editor-fold>



function darkenBackgroundImage() {
    const bgImage = $('.bg-image > img');
    const width = $(document).width();
    const brightness = Math.exp(width/1300) - 1.4;
    const clampBrightness = Math.min(Math.max(brightness, 0.5), 1);
    bgImage.css("filter", "brightness(" + clampBrightness + ")")
}

$('.footer-text > .copyright').html("&copy; 2021-" + new Date().getFullYear() + " Simon Brebeck");
darkenBackgroundImage();