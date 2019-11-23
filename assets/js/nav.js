var open_menu = document.querySelector('.btn-open-menu');
var close_menu = document.querySelector('.btn-close-menu');
var minimize_menu = document.querySelector('.btn-minimize-menu');

open_menu.addEventListener('click', () => {
    document.getElementById('nav').style.transform = 'translateX(0%)';
});

close_menu.addEventListener('click', () => {
    document.getElementById('nav').style.transform = 'translateX(100%)';
});

minimize_menu.addEventListener('click', () => {
    let x = document.getElementById('nav');
    let labels = document.querySelectorAll('.aside-item-label');

    if (x.style.width != "4.5rem") {
        labels.forEach((label) => {
            label.style.display = "none";
        });
        x.style.width = "4.5rem";
    }
    else {
        setTimeout(() => {
            labels.forEach((label) => {
                label.style.display = "block";
            });
        }, 400);
        x.style.width = "20rem";
    }
});