    // Toggle Password Visibility for Signup and Login
    $("#togglePassword").click(function () {
        const passwordInput = $(this).siblings("input");
        const icon = $(this).find("i");
        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            icon.removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            passwordInput.attr("type", "password");
            icon.removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });

    
    // Switch from Login to Signup
    $('#switchToSignupButton').click(function() {
        $('#login').modal('hide');
        $('#signup').modal('show');
    });

