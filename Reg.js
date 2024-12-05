document.getElementById('btn').addEventListener('click', (event) => {
    event.preventDefault();

    const username = document.getElementById('Username').value;
    const password = document.getElementById('password').value;
    const Confirm = document.getElementById('ConfirmPassword').value;
    const email = document.getElementById('Email').value;

    // Validate email only if the email field is not empty
    if (email && !email.includes('@')) {
        alert('Please enter a valid email address with an "@" symbol.');
        return; // Stop the form submission if the email is invalid
    }

    // Check if password and confirm password match
    if (Confirm !== password) {
        alert('Password is not the same');
        return;
    }

    // Check if all fields are filled out
    if (username && password && Confirm && email) {
        localStorage.setItem('username', username);
        localStorage.setItem('password', password);
        localStorage.setItem('email', email); // Optionally store the email
        alert('Registration successful!');
        window.location.href = 'login.html';
    } else {
        alert('Please fill out all fields.');
    }
});
