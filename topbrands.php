<?php include 'inc/header.php'; ?>

<div class="main Poppins">
    <div class="content py-5 px-3">
        <!-- EXAMPLE 1 -->
        <div class="content_top mb-4">
        <div class="heading bg-gradient p-3 rounded-3 shadow-sm">
        <h3 class="text-white fw-bold mb-0">NAME OF YOUR BRAND</h3>
      </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php
            $getTop4 = $pd->getTopbrandCompany1();
            if ($getTop4) {
                while ($result = $getTop4->fetch_assoc()) {
            ?>
            <div class="col">
                <div class="card border-0 shadow-lg hover-shadow-lg rounded-3">
                    <a href="details.php?proid=<?php echo $result['productId']; ?>">
                        <img src="admin/<?php echo $result['image']; ?>" class="card-img-top rounded-3 img-fluid transition-all" alt="">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title fs-5 fw-bold text-green"><?php echo $result['productName']; ?></h5>
                        <p class="price fw-bold text-white">₹ <?php echo $result['price']; ?></p>
                        <a href="details.php?proid=<?php echo $result['productId']; ?>" class="btn btn-outline-dark px-4 py-2 rounded-pill">Details</a>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>

        <!-- EXAMPLE 2 -->
        <div class="content_top mt-5 mb-4">
        <div class="heading bg-gradient p-3 rounded-3 shadow-sm">
        <h3 class="text-white fw-bold mb-0">NAME OF YOUR BRAND</h3>
      </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php
            $getTop1 = $pd->getTopbrandCompany2();
            if ($getTop1) {
                while ($result = $getTop1->fetch_assoc()) {
            ?>
            <div class="col">
                <div class="card border-0 shadow-lg hover-shadow-lg rounded-3">
                    <a href="details.php?proid=<?php echo $result['productId']; ?>">
                        <img src="admin/<?php echo $result['image']; ?>" class="card-img-top rounded-3 img-fluid transition-all" alt="">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title fs-5 fw-bold text-green"><?php echo $result['productName']; ?></h5>
                        <p class="price fw-bold text-white">₹ <?php echo $result['price']; ?></p>
                        <a href="details.php?proid=<?php echo $result['productId']; ?>" class="btn btn-outline-dark px-4 py-2 rounded-pill">Details</a>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>

        <!-- EXAMPLE 3 -->
        <div class="content_bottom mt-5 mb-4">
        <div class="heading bg-gradient p-3 rounded-3 shadow-sm">
        <h3 class="text-white fw-bold mb-0">NAME OF YOUR BRAND</h3>
      </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php
            $getTop2 = $pd->getTopbrandCompany3();
            if ($getTop2) {
                while ($result = $getTop2->fetch_assoc()) {
            ?>
            <div class="col">
                <div class="card border-0 shadow-lg hover-shadow-lg rounded-3">
                    <a href="details.php?proid=<?php echo $result['productId']; ?>">
                        <img src="admin/<?php echo $result['image']; ?>" class="card-img-top rounded-3 img-fluid transition-all" alt="">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title fs-5 fw-bold text-green"><?php echo $result['productName']; ?></h5>
                        <p class="price fw-bold text-white">₹ <?php echo $result['price']; ?></p>
                        <a href="details.php?proid=<?php echo $result['productId']; ?>" class="btn btn-outline-dark px-4 py-2 rounded-pill">Details</a>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>

        <!-- EXAMPLE 4 -->
        <div class="content_bottom mt-5 mb-4">
        <div class="heading bg-gradient p-3 rounded-3 shadow-sm">
        <h3 class="text-white fw-bold mb-0">NAME OF YOUR BRAND</h3>
      </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php
            $getTop3 = $pd->getTopbrandCompany4();
            if ($getTop3) {
                while ($result = $getTop3->fetch_assoc()) {
            ?>
            <div class="col">
                <div class="card border-0 shadow-lg hover-shadow-lg rounded-3">
                    <a href="details.php?proid=<?php echo $result['productId']; ?>">
                        <img src="admin/<?php echo $result['image']; ?>" class="card-img-top rounded-3 img-fluid transition-all" alt="">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title fs-5 fw-bold text-green"><?php echo $result['productName']; ?></h5>
                        <p class="price fw-bold text-white">₹ <?php echo $result['price']; ?></p>
                        <a href="details.php?proid=<?php echo $result['productId']; ?>" class="btn btn-outline-dark px-4 py-2 rounded-pill">Details</a>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
