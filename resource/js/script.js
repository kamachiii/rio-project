//
    const passwordInput = document.getElementById('password');
    const eyeOpenIcon = document.getElementById('eyeOpen');
    const eyeClosedIcon = document.getElementById('eyeClosed');

    eyeOpenIcon.style.display = 'block';
    eyeClosedIcon.style.display = 'none';

    eyeOpenIcon.addEventListener('click', togglePasswordVisibility);
    eyeClosedIcon.addEventListener('click', togglePasswordVisibility);

    function togglePasswordVisibility() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeOpenIcon.style.display = 'none';
            eyeClosedIcon.style.display = 'block';
        } else {
            passwordInput.type = 'password';
            eyeOpenIcon.style.display = 'block';
            eyeClosedIcon.style.display = 'none';
        }
}
