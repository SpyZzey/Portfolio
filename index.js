$(window).on('resize', function () {
    darkenBackgroundImage();
});

function darkenBackgroundImage() {
    const bgImage = $('.bg-image > img');
    const width = $(document).width();
    const brightness = Math.exp(width/1300) - 1.4;
    const clampBrightness = Math.min(Math.max(brightness, 0.5), 1);
    bgImage.css("filter", "brightness(" + clampBrightness + ")")
}

darkenBackgroundImage();