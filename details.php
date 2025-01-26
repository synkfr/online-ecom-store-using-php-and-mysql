<?php include 'inc/header.php'; ?>

<?php
if (isset($_GET['proid'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $addCart = $ct->addToCart($quantity, $id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
    $productId = $_POST['productId'];
    $insertCom = $pd->insertCompareData($productId, $cmrId);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wlist'])) {
    $saveWlist = $pd->saveWishListData($id, $cmrId);
}
?>

<div class="main Poppins">
    <div class="content py-5 px-3">
        <div class="row g-5">
            <!-- Product Details Section -->
            <div class="col-lg-8">
                <?php 
                $getPd = $pd->getSingleProduct($id);
                if ($getPd) {
                    while ($result = $getPd->fetch_assoc()) {
                ?>
                <div class="card border-0 shadow-lg rounded-3">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="admin/<?php echo $result['image']; ?>" alt="Product Image" 
                                class="img-fluid rounded-start w-100" 
                                style="object-fit: contain; height: 100%; max-height: 400px;">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h2 class="card-title text-white fw-bold"><?php echo $result['productName']; ?></h2>
                                <div class="mb-3">
                                    <p class="card-text h5"><strong>Price:</strong> <span class="text-white">₹ <?php echo $result['price']; ?></span></p>
                                    <p class="card-text"><strong>Category:</strong> <?php echo $result['catName']; ?></p>
                                    <p class="card-text"><strong>Brand:</strong> <?php echo $result['brandName']; ?></p>
                                </div>
                                <form action="" method="post" class="d-flex gap-2 align-items-center mt-3">
                                    <input type="number" name="quantity" class="form-control" value="1" min="1">
                                    <button type="submit" name="submit" class="btn btn-primary px-4">Add to cart</button>
                                </form>

                                <div class="mt-3">
                                    <?php if (isset($addCart)) echo "<p class='text-danger'>$addCart</p>"; ?>
                                    <?php if (isset($insertCom)) echo "<p class='text-danger'>$insertCom</p>"; ?>
                                    <?php if (isset($saveWlist)) echo "<p class='text-danger'>$saveWlist</p>"; ?>
                                </div>

                                <?php if (Session::get("cuslogin")) { ?>
                                <div class="mt-4 d-flex gap-3">
                                    <form action="" method="post">
                                        <input type="hidden" name="productId" value="<?php echo $result['productId']; ?>">
                                        <button type="submit" name="compare" class="btn btn-outline-secondary w-100">Add to Compare</button>
                                    </form>
                                    <form action="" method="post">
                                        <button type="submit" name="wlist" class="btn btn-outline-secondary w-100">Save to List</button>
                                    </form>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <h3 class="fw-bold text-white">Product Details</h3>
                    <p class="lh-lg"><?php echo $result['body']; ?></p>
                </div>

                <?php 
                    }
                } 
                ?>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-lg rounded-3">
                    <div class="card-body">
                        <h3 class="card-title text-center fw-bold">Categories</h3>
                        <ul class="list-group list-group-flush">
                            <?php 
                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                                while ($result = $getCat->fetch_assoc()) {
                            ?>
                            <li class="list-group-item bg-dark">
                                <a href="productbycat.php?catId=<?php echo $result['catId']; ?>" class="text-decoration-none text-white">
                                    <?php echo $result['catName']; ?>
                                </a>
                            </li>
                            <?php }} ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
