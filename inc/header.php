<?php

include 'lib/Session.php';
Session::init();

include 'lib/Database.php';
include 'helpers/Formate.php';
spl_autoload_register(function($class){
include_once "classess/".$class.".php";

});

$db = new Database();
$fm = new Format();
$pd = new Product();
$cat = new Category();
$ct = new Cart();
$cmr = new Customer();
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Online Shopping</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Header -->
<div class="container-fluid bg-dark py-3">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
        <div class="header-top-right d-flex flex-wrap align-items-center mt-2 mt-lg-0">
            <form class="d-flex me-3 flex-fill mb-3 mb-lg-0" action="search.php" method="get">
                <input class="form-control me-2 Poppins" type="text" name="search" placeholder="Search for Products" aria-label="Search">
                <button class="btn btn-primary Poppins" type="submit" name="submit">Search</button>
            </form>
            <div class="shopping_cart me-3 text-center mb-3 mb-lg-0">
                <a href="cart.php" class="btn btn-outline-dark d-flex align-items-center px-3 py-2 rounded-3 shadow-sm text-decoration-none position-relative">
                    <i class="fa fa-shopping-cart me-2"></i>
                    <div class="d-flex flex-column text-start">
                        <span class="cart_title fs-6 Poppins">Cart</span>
                    </div>
                    <?php
                    $getData = $ct->checkCartTable();
                    if ($getData) {
                        $qty = Session::get("qty");
                        echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">' . $qty . '</span>';
                    }
                    ?>
                </a>
            </div>
            <div class="login mb-3 mb-lg-0 Poppins">
                <?php
                $login = Session::get("cuslogin");
                if ($login == false) {
                    echo '<a class="btn btn-outline-warning" href="login.php">Login</a>';
                } else {
                    echo '<a class="btn btn-outline-danger" href="?cid=' . Session::get('cmrId') . '">Logout</a>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top Poppins">
    <div class="container">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="topbrands.php">Top Brands</a></li>
                <?php if ($ct->checkCartTable()) { ?>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="payment.php">Payment</a></li>
                <?php } ?>
                <?php if ($ct->checkOrder(Session::get("cmrId"))) { ?>
                    <li class="nav-item"><a class="nav-link" href="orderdetails.php">Order</a></li>
                <?php } ?>
                <?php if (Session::get("cuslogin")) { ?>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                <?php } ?>
                <?php if ($pd->getCompareData(Session::get("cmrId"))) { ?>
                    <li class="nav-item"><a class="nav-link" href="compare.php">Compare</a></li>
                <?php } ?>
                <?php if ($pd->checkWlistData(Session::get("cmrId"))) { ?>
                    <li class="nav-item"><a class="nav-link" href="wishlist.php">Wishlist</a></li>
                <?php } ?>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
