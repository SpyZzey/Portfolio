const defaultJitter = 0;
const movementJitter = 0;
const particleOffsetX = 0;
const particleOffsetY = 64;

let spawnRatePerSecond = 80;
let millisFadeOutMin = 400;
let millisFadeOutMax = 1000;
let oldMousePos = { x: -1, y: -1 };
let currentMousePos = { x: -1, y: -1 };

/*
    Create a particle container
 */
const particleContainer = $('<div class="particle-container"></div>');
$('body').append(particleContainer);

/*
    Check if the mouse is on the screen
 */
let isMouseOnScreen = true;
$(document).on('pointerenter', function(e){
    if(e.pointerType === "mouse") isMouseOnScreen=true;
})
$(document).on('pointerleave', function(e){
    isMouseOnScreen=false;
});

/*
    Get the current mouse position and safe it in currentMousePos
 */
$(document).on('pointermove', function (e) {
    if(e.pointerType === "mouse") {
        currentMousePos.x = e.pageX;
        currentMousePos.y = e.pageY;
    }
});

/*
    Scrolls particles with the page
 */
let scrollLeft = 0;
let scrollTop = 0;
$(window).scroll(function (e) {
    if(!isMouseOnScreen) return;
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

/*
    Spawns particles on a fixed interval
 */
setInterval(function () {
    let jitter = defaultJitter;
    if (oldMousePos.x !== currentMousePos.x || oldMousePos.y !== currentMousePos.y) {
        jitter = movementJitter;
    }
    oldMousePos.x = currentMousePos.x;
    oldMousePos.y = currentMousePos.y;
    spawnParticle(currentMousePos, jitter);
}, 1000 / spawnRatePerSecond);

/*
    Spawn a particle
    @param position: 2-Tuple of x and y position
    @param jitter: Jitter of the particle
 */
function spawnParticle(position, jitter) {
    if(!isMouseOnScreen) return;

    const jitterX = Math.random() * jitter - jitter / 2;
    const max = Math.sqrt(Math.pow(jitter / 2, 2) - Math.pow(jitterX, 2));
    const jitterY = Math.random() * 2 * max - max;

    const color = colorizeParticle(position);
    const millisFadeOut = randomIntFromInterval(millisFadeOutMin, millisFadeOutMax);
    const particle = $('<div class="particle"></div>');

    particle.css('left', currentMousePos.x - 5 + jitterX);
    particle.css('top', currentMousePos.y - 5 - particleOffsetY + jitterY);
    particle.css('background-color', color);

    particleContainer.append(particle);
    $(particle).fadeOut(millisFadeOut, function () {
        $(this).remove();
    });
}

/*
    Get a random integer between min and max
    @param min: Minimum value
    @param max: Maximum value
 */
function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min)
}

/*
    Returns a color for a particle based on the background color of the element under the mouse
    @param position: 2-Tuple of x and y position
 */
function colorizeParticle(position) {
    return getBGColorOfElementByPixel(position);
}

/*
    Get the background color of an element by pixel
    @param position: 2-Tuple of x and y position
 */
function getBGColorOfElementByPixel(position) {
    const element = document.elementFromPoint(position.x, position.y);
    return getBGColorOfElement(element);
}

/*
    Get the background color of an element
    @param element: DOM element
 */
function getBGColorOfElement(element) {
    const obj = $(element);
    if(obj.hasClass('particle-color'))
        return obj.css('background-color');
    else
        return "rgba(255, 255, 255)";
}