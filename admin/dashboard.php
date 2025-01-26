<?php include 'inc/header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include 'inc/sidebar.php'; ?>
        <div class="col-md-9 col-lg-10 p-4">
            <!-- Dashboard Card -->
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white rounded-top">
                    <h2 class="mb-0">Dashboard</h2>
                </div>
                <div class="card-body" style="height: 700px; font-size: 16px;">
                    <h4 class="card-title text-success">Welcome to the Admin Panel</h4>
                    <p class="card-text">
                        The Admin Panel is a powerful dashboard that provides complete control over the management of your website. With an intuitive interface, you can navigate through various sections to oversee and modify content efficiently.
                    </p>
                    <p class="card-text">
                        <strong>Features:</strong>
                        <ul>
                            <li>Create and manage categories, brands, and products effortlessly.</li>
                            <li>Add, update, and monitor product listings with ease.</li>
                            <li>Review and handle customer messages and queries in real time.</li>
                            <li>Modify site settings, manage social media links, and update key site details.</li>
                        </ul>
                    </p>
                    <p class="card-text">
                        This Admin panel is only designed for desktop. its not modified for multiple devices like mobiles. if you like modify this Admin panel you can do it feel free to do it and i would really like it if if share that with me. This My GitHub page  <a href="https://github.com/synkfr">GitHub (synkfr)</a>
                    </p>
                    <div class="text-center mt-4">
                        <a href="productlist.php" class="btn btn-success btn-lg me-3">
                            <i class="bi bi-boxes me-2"></i> Manage Products
                        </a>
                        <a href="catlist.php" class="btn btn-outline-success btn-lg">
                            <i class="bi bi-folder me-2"></i> View Categories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
