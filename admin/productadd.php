<?php include 'inc/header.php'; ?>
<?php include '../classess/Product.php'; ?>
<?php include '../classess/Category.php'; ?>
<?php include '../classess/Brand.php'; ?>

<?php
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertProduct = $pd->productInsert($_POST, $_FILES);
}
?>

<div class="container-fluid mt-4">
    <div class="row">
        <?php include 'inc/sidebar.php'; ?>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2>Add New Product</h2>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($insertProduct)) {
                        echo '<div class="alert alert-info">' . $insertProduct . '</div>';
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Name</label>
                            <input type="text" name="productName" id="productName" class="form-control bg-dark text-white" placeholder="Enter Product Name..." required>
                        </div>
                        <div class="mb-3">
                            <label for="catId" class="form-label">Category</label>
                            <select id="catId" name="catId" class="form-select bg-dark text-white">
                                <option value="">Select Category</option>
                                <?php 
                                $cat = new Category();
                                $getCat = $cat->getAllCat();
                                if ($getCat) {
                                    while ($result = $getCat->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="brandId" class="form-label">Brand</label>
                            <select id="brandId" name="brandId" class="form-select bg-dark text-white">
                                <option value="">Select Brand</option>
                                <?php 
                                $brand = new Brand();
                                $getBrand = $brand->getAllBrand();
                                if ($getBrand) {
                                    while ($result = $getBrand->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Description</label>
                            <textarea id="body" name="body" class="form-control tinymce bg-dark text-white" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control bg-dark text-white" placeholder="Enter Price..." required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" name="image" id="image" class="form-control bg-dark text-white">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Product Type</label>
                            <select id="type" name="type" class="form-select bg-dark text-white">
                                <option value="">Select Type</option>
                                <option value="0">Featured</option>
                                <option value="1">General</option>
                            </select>
                        </div>
                        <div class="gap-3">
                        <button type="submit" name="submit" class="btn btn-success p-3">Save</button>
                        <a type="button" href="productlist.php" class="btn btn-success p-3">Products</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js"></script>
<script>
    $(document).ready(function () {
        setupTinyMCE();
    });
</script>
<?php include 'inc/footer.php'; ?>
