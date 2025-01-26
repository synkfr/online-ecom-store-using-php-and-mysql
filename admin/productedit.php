<?php include 'inc/header.php'; ?>
<?php include '../classess/Product.php'; ?>
<?php include '../classess/Category.php'; ?>
<?php include '../classess/Brand.php'; ?>

<?php
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
    echo "<script>window.location='productlist.php';</script>";
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}

$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateProduct = $pd->productUpdate($_POST, $_FILES, $id);
}
?>

<div class="container-fluid mt-4">
    <div class="row">
            <?php include 'inc/sidebar.php'; ?>
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0 text-center">Update Product</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($updateProduct)) {
                        echo '<div class="alert alert-info">' . $updateProduct . '</div>';
                    }

                    $getPro = $pd->getProById($id);
                    if ($getPro) {
                        while ($value = $getPro->fetch_assoc()) {
                    ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" name="productName" id="productName" class="form-control bg-dark text-white" value="<?php echo $value['productName']; ?>" required />
                                </div>

                                <div class="mb-3">
                                    <label for="catId" class="form-label">Category</label>
                                    <select id="catId" name="catId" class="form-select bg-dark text-white" required>
                                        <option>Select Category</option>
                                        <?php
                                        $cat = new Category();
                                        $getCat = $cat->getAllCat();
                                        if ($getCat) {
                                            while ($result = $getCat->fetch_assoc()) {
                                                echo '<option value="' . $result['catId'] . '" ' . ($value['catId'] == $result['catId'] ? 'selected' : '') . '>' . $result['catName'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="brandId" class="form-label">Brand</label>
                                    <select id="brandId" name="brandId" class="form-select bg-dark text-white" required>
                                        <option>Select Brand</option>
                                        <?php
                                        $brand = new Brand();
                                        $getBrand = $brand->getAllBrand();
                                        if ($getBrand) {
                                            while ($result = $getBrand->fetch_assoc()) {
                                                echo '<option value="' . $result['brandId'] . '" ' . ($value['brandId'] == $result['brandId'] ? 'selected' : '') . '>' . $result['brandName'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="body" class="form-label">Description</label>
                                    <textarea name="body" id="body" class="form-control bg-dark text-white" rows="4"><?php echo $value['body']; ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" name="price" id="price" class="form-control bg-dark text-white" value="<?php echo $value['price']; ?>" required />
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Image</label>
                                    <div>
                                        <img src="<?php echo $value['image']; ?>" height="80px" width="200px" class="mb-2" />
                                    </div>
                                    <input type="file" name="image" id="image" class="form-control bg-dark text-white" />
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Product Type</label>
                                    <select id="type" name="type" class="form-select bg-dark text-white" required>
                                        <option>Select Type</option>
                                        <option value="0" <?php echo ($value['type'] == 0) ? 'selected' : ''; ?>>Featured</option>
                                        <option value="1" <?php echo ($value['type'] == 1) ? 'selected' : ''; ?>>General</option>
                                    </select>
                                </div>

                                <div class="d-grid gap-3">
                                <button type="submit" name="submit" class="btn btn-success w-100 p-2">Update</button>
                                <a type="button" href="productlist.php" class="btn btn-success w-100 p-2">BACK</a>
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
