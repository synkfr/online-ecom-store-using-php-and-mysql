<?php include 'inc/header.php'; ?>

<?php 
$search = mysqli_real_escape_string($db->link, $_GET['search']);
if (!isset($search) || $search == NULL) {
    header("Location:404.php");
} else {
    $search = $search;
}
?>

<div class="main py-5 Poppins" style="background-color:rgb(46, 46, 46);">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-12 text-center">
                <h3 class="display-6 fw-bold text-white">All Searching Products</h3>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <?php 
            $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$search%' OR body LIKE '%$search%' ORDER BY productId DESC LIMIT 30";
            $post = $db->select($query);

            if ($post) {
                while ($result = $post->fetch_assoc()) {
            ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="details.php?proid=<?php echo $result['productId']; ?>" class="text-decoration-none">
                            <img src="admin/<?php echo $result['image']; ?>" class="card-img-top" alt="<?php echo $result['productName']; ?>" />
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $result['productName']; ?></h5>
                            <p class="card-text text-white"><strong>₹ <?php echo $result['price']; ?></strong></p>
                            <a href="details.php?proid=<?php echo $result['productId']; ?>" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
            <?php } 
            } else { ?>
                <div class="col-12 text-center">
                    <p class="text-danger fs-4 fw-bold">Your Search Query Did Not Return Any Results!</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
