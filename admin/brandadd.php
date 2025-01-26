<?php include 'inc/header.php';?>
<?php include '../classess/Brand.php';?>
<?php
$brand = new Brand();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['brandName'];
    $insertBrand = $brand->brandInsert($brandName);
}
?>
<div class="container-fluid mt-4">
    <div class="row">
        <?php include 'inc/sidebar.php'; ?>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2>Add New Brand</h2>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($insertBrand)) {
                        echo '<div class="alert alert-info">' . $insertBrand . '</div>';
                    }
                    ?>

                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="brandName" class="form-label">Brand Name</label>
                            <input type="text" name="brandName" id="brandName" class="form-control bg-dark text-white" placeholder="Enter Brand Name..." required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>
