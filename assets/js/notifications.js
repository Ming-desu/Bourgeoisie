var notification = document.querySelector('.notification');
var notification_container = notification.querySelector('.notification-container');
var close_notification_timeout;

function open_notification(title = "", message = "", autoClose = true, type = 0) {
    let background = notification.querySelector('.notification-header');
    let button = notification.querySelector('.notification-button');

    if (type == 1) {
        background.classList.add('notification-danger');
        button.classList.add('notification-button-danger');
    }

    notification.querySelector('.notification-title').innerHTML = title;
    notification.querySelector('.notification-message').innerHTML = message;
    notification.style.display = 'block';
    
    setTimeout(() => {
        notification_container.classList.toggle('notification-fade-in');

        if (autoClose)
            close_notification_timeout = setTimeout(close_notification, 3000);
    }, 100);
}

/*
*
*   The code below is for debug purposes
*

var btn_notification = document.querySelector('.open-notification');

btn_notification.addEventListener('click', () => {
    open_notification('Awesome.', 'You have successfully launched notification.', autoClose = false);
});

*/

var btn_close_notification = notification.querySelectorAll('.notification-close-button');

btn_close_notification.forEach((btn) => {
    btn.addEventListener('click', () => {
        close_notification();
    });
});

function close_notification() {
    notification_container.style.transform = 'scaleY(0)';

    setTimeout(() => {
        notification_container.style.width = '100%';
        
        setTimeout(() => {
            notification.style.display = 'none';
            notification_container.classList.toggle('notification-fade-in');
            notification_container.style.removeProperty('width');
            notification_container.style.removeProperty('transform');
            notification.querySelector('.notification-header').classList.remove('notification-danger');
            notification.querySelector('.notification-button').classList.remove('notification-button-danger');

            if (close_notification_timeout !== undefined)
                clearTimeout(close_notification_timeout);
        }, 300);
    }, 550);
}