<?php
    require '../connection/db_connection.php';
    



    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../Design/google.css">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	<script src = "../../bootstrap/js/bootstrap.bundle.js"></script>
</head>
    <body>

    <div class="login-container">
        <h2 class="text-center">Login</h2>

        <!-- Login Form -->
        <form id="loginForm">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
            </div>
        </form>
            <button type="submit" class="btn btn-primary btn-block">Login</button>

    </body>
</html>