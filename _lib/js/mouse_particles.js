const defaultJitter = 20;
const movementJitter = 10;
const particleOffsetX = 0;
const particleOffsetY = 64;

let timer;
let spawnRatePerSecond = 5000;
let millisFadeOutMin = 400;
let millisFadeOutMax = 1000;
let oldMousePos = { x: -1, y: -1 };
let currentMousePos = { x: -1, y: -1 };

$(document).mousemove(function (event) {
    currentMousePos.x = event.pageX;
    currentMousePos.y = event.pageY;
});

let scrollLeft = 0;
let scrollTop = 0;
$(window).scroll(function (event) {
    if(currentMousePos.x < 0 || currentMousePos.y < 0) return;
    if(scrollLeft !== $(document).scrollLeft()) {
        currentMousePos.x -= scrollLeft;
        scrollLeft = $(document).scrollLeft();
        currentMousePos.x += scrollLeft;
    }
    if(scrollTop !== $(document).scrollTop()) {
        currentMousePos.y -= scrollTop;
        scrollTop = $(document).scrollTop();
        currentMousePos.y += scrollTop;
    }
});

function updateMousePosition(event) {
    currentMousePos.x = event.pageX;
    currentMousePos.y = event.pageY;
}

setInterval(function () {
    let jitter = defaultJitter;
    if (oldMousePos.x !== currentMousePos.x || oldMousePos.y !== currentMousePos.y) {
        jitter = movementJitter;
    }
    oldMousePos.x = currentMousePos.x;
    oldMousePos.y = currentMousePos.y;
    spawnParticle(currentMousePos, jitter);
}, 1000 / spawnRatePerSecond);

function spawnParticle(position, jitter) {
    const jitterX = Math.random() * jitter - jitter / 2;
    const max = Math.sqrt(Math.pow(jitter / 2, 2) - Math.pow(jitterX, 2));
    const jitterY = Math.random() * 2 * max - max;

    const color = colorizeParticle(position);
    const millisFadeOut = randomIntFromInterval(millisFadeOutMin, millisFadeOutMax);
    const particle = $('<div class="particle" ' +
        'style="left: ' + (currentMousePos.x - 5 + jitterX) + 'px; ' +
        'top: ' + (currentMousePos.y - 5 - particleOffsetY + jitterY) + 'px;' +
        'background-color: ' + color + '">' +
        '</div>');
    $('.particle-container').append(particle);
    $(particle).fadeOut(millisFadeOut, function () {
        $(this).remove();
    });
}
function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min)
}
function colorizeParticle(position) {
    return getBGColorOfElementByPixel(position);
}

function getBGColorOfElementByPixel(position) {
    const element = document.elementFromPoint(position.x, position.y);
    return getBGColorOfElement(element);
}

function getBGColorOfElement(element) {
    const obj = $(element);
    if(obj.hasClass('particle-color'))
        return obj.css('background-color');
    else
        return "rgba(255, 255, 255)";
}

$('body').append('<div class="particle-container"></div>');