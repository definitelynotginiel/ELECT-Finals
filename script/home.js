// Toggle password visibility
const togglePassword = document.getElementById("togglePassword");
const passwordField = document.getElementById("password");
const eyeIcon = document.getElementById("eyeIcon");

togglePassword.addEventListener("click", function () {
    // Toggle the type attribute of the password field
    const type = passwordField.type === "password" ? "text" : "password";
    passwordField.type = type;
    
    // Toggle the eye icon
    eyeIcon.classList.toggle("fa-eye");
    eyeIcon.classList.toggle("fa-eye-slash");
});

