
    function validateForm(event) {
        event.preventDefault(); // Prevent the form from submitting

        // Get form inputs
        const fname = document.getElementById('fname');
        const lname = document.getElementById('lname');
        const email = document.getElementById('email');
        const phone = document.getElementById('phone');
        const password = document.getElementById('password');
        const cpassword = document.getElementById('cpassword');

        // Remove previous warnings
        const warnings = document.querySelectorAll('.warning');
        warnings.forEach(warning => warning.remove());

        // Check if fields are empty or invalid
        let isValid = true;

        if (fname.value.trim() === '') {
            isValid = false;
            showWarning(fname, 'First name is required');
        }
        if (lname.value.trim() === '') {
            isValid = false;
            showWarning(lname, 'Last name is required');
        }
        if (email.value.trim() === '') {
            isValid = false;
            showWarning(email, 'Email is required');
        }
        if (phone.value.trim() === '') {
            isValid = false;
            showWarning(phone, 'Phone number is required');
        } else if (!/^\d{11}$/.test(phone.value)) {
            isValid = false;
            showWarning(phone, 'Phone number must be exactly 11 digits');
        }
        if (password.value.trim() === '') {
            isValid = false;
            showWarning(password, 'Password is required');
        }
        if (cpassword.value.trim() === '') {
            isValid = false;
            showWarning(cpassword, 'Confirm password is required');
        } else if (password.value !== cpassword.value) {
            isValid = false;
            showWarning(cpassword, 'Passwords do not match');
        }

        // If all fields are valid, redirect to home.html
        if (isValid) {
            alert('Form submitted successfully!');
            window.location.href = 'home.html'; // Redirect to home.html
        }
    }

    function showWarning(input, message) {
        // Create a warning message
        let warning = input.nextElementSibling;
        if (!warning || !warning.classList.contains('warning')) {
            warning = document.createElement('span');
            warning.classList.add('warning');
            warning.style.color = 'red';
            warning.style.fontSize = '12px';
            input.parentNode.appendChild(warning);
        }
        warning.innerText = message;
    }
    function togglePasswordVisibility(inputId, toggleId) {
        const input = document.getElementById(inputId);
        const toggle = document.getElementById(toggleId);
        if (input.type === "password") {
            input.type = "text";
            toggle.classList.add("bi-eye-slash");
            toggle.classList.remove("bi-eye");
        } else {
            input.type = "password";
            toggle.classList.add("bi-eye");
            toggle.classList.remove("bi-eye-slash");
        }
    }
