document.addEventListener('click', function(e) {
    if (!e.target) return;

    if (e.target.matches('.open-modal')) 
        openModal(e.target.getAttribute('data-modal'));

    if (e.target.matches('.close-modal'))
        closeModal(e.target.getAttribute('data-modal'));

    if (e.target.matches('.modal-wrapper'))
        closeModal(e.target.closest('.modal').getAttribute('id'));
});

function openModal(id) {
    let modal = document.getElementById(id);
    let modal_overlay = modal.querySelector('.modal-overlay');
    let modal_container = modal.querySelector('.modal-container');

    modal.style.display = 'block';
    
    setTimeout(() => {
        modal_container.classList.toggle('modal-fade');
    }, 100);
}

function isOpenModal(id) {
    let modal = document.getElementById(id);
    
    if (modal.style.display === 'block')
        return true;
    return false;
}

function closeModal(id) {
    let modal = document.getElementById(id);
    let modal_overlay = modal.querySelector('.modal-overlay');
    let modal_container = modal.querySelector('.modal-container');

    modal_container.classList.toggle('modal-fade'); 

    setTimeout(() => {
        modal.style.display = 'none';
        modal_container.style.removeProperty('width');
        modal_container.style.removeProperty('transform');
    }, 300);
}