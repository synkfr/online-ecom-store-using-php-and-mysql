<?php include 'inc/header.php'; ?>

<?php 
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
    echo "<script>window.location='404.php';</script>";
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catId']);
}
?>

<div class="main Poppins py-5">
    <div class="container">
        <div class="content_top mb-4">
            <div class="heading">
                <h3 class="text-center">Latest from Category</h3>
            </div>
        </div>
        
        <div class="row">
            <?php 
            $productbycat = $pd->productByCat($id);
            if ($productbycat) {
                while ($result = $productbycat->fetch_assoc()) {
            ?>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card shadow-sm">
                        <a href="details.php?proid=<?php echo $result['productId']; ?>" class="card-link">
                            <img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['productName']; ?>" class="card-img-top img-fluid" />
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $result['productName']; ?></h5>
                            <p class="card-text"><?php echo $fm->textShorten($result['body'], 60); ?></p>
                            <p><span class="price"> ₹ <?php echo $result['price']; ?></span></p>
                            <a href="details.php?proid=<?php echo $result['productId']; ?>" class="btn btn-primary btn-sm w-100">Details</a>
                        </div>
                    </div>
                </div>
            <?php 
                }
            } else {
                header("location:404.php");
            } 
            ?>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
