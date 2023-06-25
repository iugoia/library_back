var popup = document.querySelector('.booking_modal');
var openPopupButton = document.querySelector('.booking_modal_button_open');
var closePopupButton = document.querySelector('.booking_modal_button_close');
var openWarningButton = document.querySelector('.IsBooked_button');
var exitPopupButton = document.querySelector('.booking_modal_close_link');

if (popup){
    openPopupButton.addEventListener('click', function(evt) {
        evt.preventDefault();
        popup.classList.remove('modal_hide');
    });
    closePopupButton.addEventListener('click', function() {
        popup.classList.add('modal_hide');
    });
    exitPopupButton.addEventListener('click', function() {
        popup.classList.add('modal_hide');
    });
    openWarningButton.addEventListener('click', function(evt) {
        popup.classList.add('modal_hide');
    });
    document.addEventListener('keydown', function(evt) {
        if(evt.keyCode === 27){
            popup.classList.add('modal_hide');
        }
    });
}
