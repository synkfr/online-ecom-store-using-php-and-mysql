<?php include 'inc/header.php'; ?>
<?php include '../classess/Brand.php'; ?>
<?php
if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
    echo "<script>window.location='brandlist.php';</script>";
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['brandid']);
}

$brand = new Brand();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['brandName'];
    $updateBrand = $brand->brandUpdate($brandName, $id);
}
?>
<div class="container-fluid mt-4">
    <div class="row">
        <?php include 'inc/sidebar.php'; ?>
        
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2>Update Brand</h2>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($updateBrand)) {
                        echo '<div class="alert alert-info">' . $updateBrand . '</div>';
                    }

                    $getBrand = $brand->getBrandById($id);
                    if ($getBrand) {
                        while ($result = $getBrand->fetch_assoc()) {
                    ?>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="brandName" class="form-label">Brand Name</label>
                                    <input type="text" name="brandName" id="brandName" class="form-control bg-dark text-white" value="<?php echo $result['brandName']; ?>" required>
                                </div>
                                    <div class="gap-3">
                                        <button type="submit" name="submit" class="btn btn-success p-3">Update</button>
                                        <a type="button" href="brandlist.php" class="btn btn-success p-3">Backs</button>
                                    </div>
                            </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
