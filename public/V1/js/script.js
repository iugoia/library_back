let showPassword = document.querySelector('#show-password');

if (showPassword){
    showPassword.addEventListener('click', toggleType)

    function toggleType() {
        let input = document.querySelector('.password');
        if (input.type === 'password') {
            input.type = 'text';
        } else {
            input.type = 'password';
        }
    }
}
