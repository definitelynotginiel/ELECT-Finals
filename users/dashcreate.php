<?php
    // Include the database connection file
    require '../connection/db_connection.php';

    // You can now use the $m variable to interact with the database
	// $m
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project</title>

    <link rel="stylesheet" href="../cssFontawesome/all.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../cssFontawesome/fontawesome.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../design/dashcreate.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <img src="../Pictures/logo.png" width="26" height="26" alt="Logo">
                </button>
                <div class="sidebar-logo">
                    <a href="#">WeThrive</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="./dashboard.php" class="sidebar-link">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-folder"></i>
                        <span>My Project</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="./dashcreate.php" class="sidebar-link">
                        <i class="fa-solid fa-folder-plus"></i>
                        <span>Create Project</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-users"></i>
                        <span>Community</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <div class="create-container">
                <div class="create-project-box" onclick="location.href='dashedit.php';">
                    <i class="fa-solid fa-plus" style="font-size: 2rem;"></i>
                    <p>Create a Project</p>
                </div>
            </div>
        </div>
    </div>
    <script src="../script/dashboard.js"></script>
</body>
</html>


