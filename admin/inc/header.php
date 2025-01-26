<?php
include '../lib/Session.php';
Session::checkSession();

include '../lib/Database.php';
include '../helpers/Formate.php';

spl_autoload_register(function($class) {
    include_once "classess/" . $class . ".php";
});

$db = new Database();
$fm = new Format();

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     <!-- JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
</head>

<body>
    <div class="container-fluid Poppins">
        <header class="d-flex justify-content-between align-items-center">
            <div id="branding" class="d-flex align-items-center">
                <img src="" alt="Logo" class="me-3" width="50" />
                <div>
                    <h1>Online Shopping Dashboard</h1>
                    <p>Admin Panel</p>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <img src="img/img-profile.jpg" alt="Profile Pic" class="rounded-circle me-2" width="40" height="40">
                <ul class="nav ms-3">
                    <li class="nav-item">
                        <span class="nav-link text-white">Hello, <?php echo Session::get('adminName'); ?></span>
                    </li>
                    <li class="nav-item">
                        <a href="?action=logout" type="button" class="btn btn-outline-danger">Logout</a>
                    </li>
                </ul>
            </div>
        </header>

        <div class="row row no-wrap-row">
            <nav id="sidebar" class="col-md-3 col-lg-2 p-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link active">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="inbox.php" class="nav-link">Inbox</a>
                    </li>
                    <li class="nav-item">
                        <a href="message.php" class="nav-link">
                            Messages
                            <?php 
                            $query = "SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC";
                            $msg = $db->select($query);
                            if ($msg) {
                                $count = mysqli_num_rows($msg);
                                echo "<span class='badge'>{$count}</span>";
                            } else {
                                echo "<span class='badge bg-secondary'>0</span>";
                            }
                            ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="www.yourdomain.com" class="nav-link" target="_blank">Visit Website</a>
                    </li>
                </ul>
            </nav>

            <main class="col-md-9 col-lg-10 p-4">
 

