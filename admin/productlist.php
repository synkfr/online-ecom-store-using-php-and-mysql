<?php include 'inc/header.php'; ?>
<?php include '../classess/Product.php'; ?>
<?php include_once '../helpers/Formate.php'; ?>

<?php
$pd = new Product();
$fm = new Format();

if (isset($_GET['delpro'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
    $delpro = $pd->delProById($id);
}
?>

<div class="container-fluid mt-4">
    <div class="row">
        <?php include 'inc/sidebar.php'; ?>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2>Product List</h2>
                </div>
                <div class="card-body">
                    <?php 
                    if (isset($delpro)) {
                        echo '<div class="alert alert-danger">' . $delpro . '</div>';
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>SL</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $getPd = $pd->getAllProduct();
                                if ($getPd) {
                                    $i = 0;
                                    while ($result = $getPd->fetch_assoc()) {
                                        $i++;
                                ?>
                                <tr>
                                    <td class="text-white"><?php echo $i; ?></td>
                                    <td class="text-white"><?php echo $result['productName']; ?></td>
                                    <td class="text-white"><?php echo $result['catName']; ?></td>
                                    <td class="text-white"><?php echo $result['brandName']; ?></td>
                                    <td class="text-white"><?php echo $fm->textShorten($result['body'], 50); ?></td>
                                    <td class="text-white">₹ <?php echo $result['price']; ?></td>
                                    <td>
                                        <img src="<?php echo $result['image']; ?>" class="img-fluid rounded" style="height: 40px; width: 60px;">
                                    </td>
                                    <td class="text-white">
                                        <?php echo ($result['type'] == 0) ? "Featured" : "General"; ?>
                                    </td>
                                    <td>
                                        <a href="productedit.php?proid=<?php echo $result['productId']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="?delpro=<?php echo $result['productId']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
