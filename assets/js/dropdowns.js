document.querySelector('body').addEventListener('click', function(e) {
    if (e.target.matches('.dropdown-text') || e.target.matches('.dropdown-header') || e.target.matches('.dropdown-icon')) {
        let dropdown_container;
        if (e.target.matches('.dropdown-text') || e.target.matches('.dropdown-icon'))
            dropdown_container = e.target.parentElement.parentElement.parentElement;
        else
            dropdown_container = e.target.parentElement.parentElement;

        if (dropdown_container.querySelector('.dropdown').classList.contains('dropdown-active')) 
            close_dropdown(dropdown_container);
        else 
            open_dropdown(dropdown_container);     
    }

    if (e.target.matches('.dropdown-item'))
        close_dropdown(e.target.parentElement.parentElement.parentElement.parentElement);

    if (e.target.matches('.dropdown-overlay'))
        close_dropdown(e.target.parentElement);
});

function open_dropdown (elem_container) {
    let dropdown_container = elem_container;
    let dropdown_overlay = dropdown_container.querySelector('.dropdown-overlay');
    let dropdown = dropdown_container.querySelector('.dropdown');
    let dropdown_header = dropdown.querySelector('.dropdown-header');
    let dropdown_items = dropdown.querySelector('.dropdown-items');

    dropdown_overlay.style.display = "block";
    dropdown_items.style.display = "block";
    dropdown.classList.add('dropdown-active');
    dropdown_header.classList.add('dropdown-active-header');
}

function close_dropdown(elem_container) {
    let dropdown_container = elem_container;
    let dropdown_overlay = dropdown_container.querySelector('.dropdown-overlay');
    let dropdown = dropdown_container.querySelector('.dropdown');
    let dropdown_header = dropdown.querySelector('.dropdown-header');
    let dropdown_items = dropdown.querySelector('.dropdown-items');

    dropdown_overlay.style.display = "none";
    dropdown_items.style.display = "none";
    dropdown.classList.remove('dropdown-active');
    dropdown_header.classList.remove('dropdown-active-header');
}