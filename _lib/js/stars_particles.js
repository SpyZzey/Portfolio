// Spawn rate in particles per second
const spawnRate = 5;
const spawnBatchSize = 10;
const millisUntilRemove = 3000;
const maxWidth = 1300;

setInterval(function () {
    for(let i = 0; i < spawnBatchSize; i++) {
        spawnParticle();
    }
}, 1000 / spawnRate);

function spawnParticle() {

    let width = $(window).width();
    let height = $(window).height();

    let layer = Math.floor(Math.random() * 100);
    if(layer > 90) layer = 2;
    else if(layer > 60) layer = 1;
    else layer = 0;

    let calcWidth = Math.min(width, maxWidth);
    let delta = (width - calcWidth) / 2;
    let x = (Math.random() * (calcWidth - 60) + delta + 30) / width * 100;

    // Random hue
    const hue = Math.floor(Math.random() * 360);
    const color = `hsl(${hue}, 100%, 90%)`;

    const particle = $(`<div class="particle star layer${layer}"></div>`);

    particle.css('left', x + "%");
    particle.css('top', 0);
    particle.css('background-color', color);

    $('#particleLayer').append(particle);

    $(particle).fadeOut(millisUntilRemove, function () {
        $(this).remove();
    });
}
