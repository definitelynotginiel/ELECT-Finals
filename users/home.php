<?php
// Include the database connection file
require '../connection/db_connection.php';

// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the email and password from the request
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user data from the MongoDB database
    $userCollection = $m->users->userCollection; 

    $user = $userCollection->findOne(['gmail' => $email]);

    if ($user) {
        // Verify the password (ensure you're hashing passwords in your application)
        if ($user['pass'] === $password) { // hash your passwords
            $_SESSION['user'] = $user;

            // Redirect to dashboard.php
            echo json_encode(['status' => 'success', 'redirect' => 'dashboard.php']);
            exit;
        }
    }

    // If we reach this point, login failed
    echo json_encode(['status' => 'error', 'message' => 'Wrong username or password']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/home.css">
    <link rel="stylesheet" href="../cssFontawesome/all.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../cssFontawesome/fontawesome.min.css"> <!-- Font Awesome -->
    
    <link rel="stylesheet" href="../animation/cssanimation.min.css"> <!-- Font Awesome -->
    <script src="../animation/letteranimation.js"></script>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <title>Project</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="title-box">
                <img class="img-logo" src="../Pictures/logo.png" alt="Logo">
                <h2 class="logo-we cssanimation leFadeInTop sequence">We</h2><h2 class="logo-th cssanimation leFadeInTop sequence">Thrive</h2>
            </div>
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Premium</a></li>
                    </ul>
                    <button type="button" class="btn login" data-bs-toggle="modal" data-bs-target="#login">Login</button>
                </div>
                <a class="btn-link " href="../users/google.php">Get Started</a>
            </div>
        </nav>
    </header>

    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="loginLabel">Login Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                <div class="modal-body">
                    <!-- Login Form -->
                    <div class="logbox">
                        <img src="../Pictures/logo.png" class="logo-center" alt="Logo">
                    </div>

                    <form id="loginForm">
                        <div class="logform">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                        <i class="fas fa-eye" id="eyeIcon"></i>
                                    </span>
                                </div>
                            </div>
							<button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                    </form>

                        <div class="signbox">
						    <label class="label-dont">Don't have an account in WeThrive? <a class="sign" href="./register.php">Sign up</a></label>
						</div>
                            <label class="label-continue">Or continue with</label>
                        <a href="./google.php">
                            <img src="../Pictures/gmail-icon.png" width="38" height="38" alt="Logo">
                        </a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->

    <div class="containerbox">
        <div class="des-box">
            <p class="info">Join us as we dive <br>into </p>
            <div class="info-t-box">
                <p class="t-one cssanimation leSnake sequence">We</p>
                <p class="t-two cssanimation leSnake sequence">Thrive</p>
            </div>
            <p class="info-t">empowers you to design,<br>and launch your own<br>stunning website with<br> ease.</p>
            <div class="start-box">
                <a class="btn link-two" href="../users/google.php">Get Started</a>
            </div>
        </div>
        <div class="pic-box cssanimation fadeIn">
            <img class="cssanimation leWaterWave sequence" src="../Pictures/main-pic.png" alt="Image" width="597" height="300">
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer-section">
                    <h5>Navigation</h5>
                    <div class="footer-links"><a href="#">FAQs</a></div>
                </div>
                <div class="col-md-3 footer-section">
                    <h5>About Us</h5>
                    <div class="footer-links">
                        <a href="#">Developers</a>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                    </div>
                </div>
                <div class="col-md-3 footer-section">
                    <h5>Contact</h5>
                    <div class="footer-links">
                        <label>wethrive.official@gmail.com</label>
                        <label>#09223342304</label>
                    </div>
                </div>
                <div class="col-md-3 footer-section">
                    <h5>Social Media</h5>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/joshuaenrico0" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2024 WeThrive. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="../script/home.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script>
    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Gather form data
            let email = $('#email').val();
            let password = $('#password').val();

            // Send data to login.php
            $.ajax({
                url: './login.php',
                type: 'POST',
                data: {
                    email: email,
                    password: password
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Redirect to dashboard
                        window.location.href = response.redirect;
                    } else {
                        // Show error message
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('An error occurred during the login process.');
                }
            });
        });
    });
    </script>
</body>
</html>
