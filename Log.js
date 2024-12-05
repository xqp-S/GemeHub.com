const btn = document.getElementById('btn');
btn.addEventListener("click", (event) => {
    event.preventDefault();

    const usernameField = document.getElementById('Username');
    const passwordField = document.getElementById('password');

    const username = usernameField.value.trim();
    const password = passwordField.value.trim();

    const storedUsername = localStorage.getItem('username');
    const storedPassword = localStorage.getItem('password');

    // Validation for required fields
    let isValid = true;

    if (!username) {
        usernameField.classList.add('is-invalid'); // Add Bootstrap's invalid styling class
        isValid = false;
    } else {
        usernameField.classList.remove('is-invalid');
    }

    if (!password) {
        passwordField.classList.add('is-invalid'); // Add Bootstrap's invalid styling class
        isValid = false;
    } else {
        passwordField.classList.remove('is-invalid');
    }

    if (!isValid) {
        alert('Please fill out all required fields.');
        return;
    }

    // Login logic
    if (username === storedUsername && password === storedPassword) {
        if (username === 'admin' && password === 'admin') {
            alert('Login successful to the admin page');
            window.location.href = 'admin.html';
        } else {
            alert('Login successful to the user page');
            window.location.href = 'index.html';
        }
    } else {
        alert('Invalid username or password.');
    }
});
