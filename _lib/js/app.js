$(window).on('resize', function () {
    darkenBackgroundImage();
});
$('.card--rotate').on('click', function (e) {
    if(!$(e.target).closest("button").length) {
        $(this).toggleClass('active');
    }
});


// <editor-fold desc="|| Navigation">
$('#navigation-burger').on('click', function () {
    $('#navigation-drawer').toggleClass('active');
    $(this).toggleClass('active');
});
$('#navigation-drawer a').on('click', function () {
    $('#navigation-drawer').removeClass('active');
    $('#navigation-burger').removeClass('active');
});
// </editor-fold>
// <editor-fold desc="|| Buttons">
$('#button--about').on('click', function () {
    window.location.href = "/about/";
});
$('#button--education').on('click', function () {
    window.location.href = "/education/";
});
$('#button--skills').on('click', function () {
    window.location.href = "/skills/";
});
// </editor-fold>

// <editor-fold desc="|| Text">
$('.floating-label-container > .text-field').on('focus', function () {
    focusTextfieldLabel($(this));
}).on('blur', function () {
    blurTextfieldLabel($(this));
}).each(function (i, obj) {
    if($(obj).val() !== "") {
        focusTextfieldLabel($(obj));
    }
});
$('.text-indicator').on('keyup', function () {
    updateTextIndicator($(this));
});
function focusTextfieldLabel(obj) {
    obj.parent().addClass('active');
}
function blurTextfieldLabel(obj) {
    if(obj.val() === "") {
        obj.parent().removeClass('active');
    }
}
function updateTextIndicator(obj) {
    const length = obj.val().length;
    const maxLength = obj.attr('maxlength');
    const indicator = obj.data('indicator');
    $('#' + indicator).text(length + '/' + maxLength);
}

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