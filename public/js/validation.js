const input1 = document.getElementById('input1');
const input2 = document.getElementById('input2');
const input1Status = document.querySelector('.message1');
const input2Status = document.querySelector('.message2');

let isAlreadyValidate = 0;
let isValidated = false;
let input1ValidationCount = 0;
let input2ValidationCount = 0;

if (input1){
    // Функция для проверки правильности ввода
    function validateInput(inputElement, statusElement, validationCount) {
        if (inputElement.value === '') {
            statusElement.textContent = null;
            inputElement.classList.remove('border-danger', 'border-success');
            isValidated = false;
        } else if (/^[А-Я][а-я]*$/.test(inputElement.value) && validationCount > 0) {
            statusElement.textContent = 'Звучит хорошо!';
            statusElement.classList.remove('text-danger');
            statusElement.classList.add('text-succes');
            inputElement.classList.remove('border-danger');
            inputElement.classList.add('border-succes');
            isValidated = true;
        } else if (!/^[А-Я][а-я]*$/.test(inputElement.value)) {
            statusElement.textContent = 'Ошибка! Неверные данные';
            statusElement.classList.remove('text-succes');
            statusElement.classList.add('text-danger');
            inputElement.classList.remove('border-succes');
            inputElement.classList.add('border-danger');
            validationCount++;
            isValidated = false;
        } else if (/^[А-Я][а-я]*$/.test(inputElement.value) && validationCount === 0) {
            statusElement.textContent = '';
            isValidated = true;
        }

        // Добавляем проверку на пустую строку
        if (!inputElement.value) {
            isValidated = false;
        }

        return validationCount;
    }

// Добавляем обработчики событий на изменение значений инпутов
    input1.addEventListener('input', function() {
        if (!isValidated || (isValidated && input1.value !== '')) {
            input1ValidationCount = validateInput(input1, input1Status, input1ValidationCount);
        }
    });

    input2.addEventListener('input', function() {
        if (!isValidated || (isValidated && input2.value !== '')) {
            input2ValidationCount = validateInput(input2, input2Status, input2ValidationCount);
        }
    });

// проверка на правильность повтора пароля

    const passwordPar = document.getElementById('password')
    const passwordRetryPar = document.getElementById('password_retry')

    const passwordIn = passwordPar.querySelector('input')
    const passwordRetryIn = passwordRetryPar.querySelector('input')

    passwordRetryIn.addEventListener('input', () => {
        if (passwordRetryIn.value != passwordIn.value){
            passwordRetryPar.querySelector('span').innerHTML = 'Пароли не совпадают'
        } else {
            passwordRetryPar.querySelector('span').innerHTML = ''
        }
    })
}

