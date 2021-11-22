const check = (input) => {
    if (input.value !== document.getElementById('passwordSignUp').value) {
        input.setCustomValidity('Password must be matching.');
    } else {
        input.setCustomValidity('');
    }
}