<?php
    require '../connection/db_connection.php';

    // Start the session
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the email and password from the request
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Fetch user data from the MongoDB database
        $userCollection = $m->users->userCollection; // access your collection

        $user = $userCollection->findOne(['gmail' => $email]);

        if ($user) {
            // Verify the password (ensure you're hashing passwords in your application)
            if ($user['pass'] === $password) { // In production, you'd typically hash your passwords
                $_SESSION['user'] = $user; // Save the user information in the session

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