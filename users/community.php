<?php
    // Include the database connection file
    require '../connection/db_connection.php';
    
    if (!isset($_SESSION['user'])) {

      header("Location: home.php");
      exit;
    }
    // You can now use the $m variable to interact with the database
	// $m
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community</title>

    <link rel="stylesheet" href="../cssFontawesome/all.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../cssFontawesome/fontawesome.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../design/community.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="../Pictures/logo.png" alt="Logo">
        </div>
        <div class="nav-right">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-gear settings-icon"></i>
            </a>
            <a href="#" class="nav-link">
                <i class="fa-solid fa-user profile-icon"></i>
            </a>
        </div>
    </div>
    <aside id="sidebar">
        <ul class="sidebar-nav">
            <li class="sidebar-bar sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-bars toggle-btn"></i>
                    <span class="sidebar-logo">WeThrive</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="dashboard.php" class="sidebar-link">
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
                <a href="dashcreate.php" class="sidebar-link">
                    <i class="fa-solid fa-pen-nib"></i>
                    <span>Create Project</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="community.html" class="sidebar-link">
                    <i class="fa-solid fa-users"></i>
                    <span>Community</span>
                </a>
            </li>
        </ul>
    </aside>

    <div class="main"> <!-- main content -->
        <div class="posts"> <!-- posts container -->
            <div class="post-card"> <!-- one post container -->
                <div class="image-placeholder">
                    <img src="/" alt="Post Image">
                </div> <!-- content container -->
                <div class="rate-section">
                    <h5>Rate</h5>
                    <div class="comment-section">
                        <i class="fa-solid fa-comment chat-icon"></i>
                        <input type="text" class="comment-input" placeholder="Comment">
                        <button class="delete-btn"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="add-post-btn">
        <button class="btn-add">
            <i class="fa-solid fa-plus"></i>
            <a href="#"></a> Add Post
        </button>
    </div>

    <script>
        // JavaScript for toggling the sidebar
        document.querySelector('.toggle-btn').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('expanded');
        });
    </script>
</body>

</html>


