<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

<div class="main Poppins">
  <div class="content">
    
    <!-- Featured Products Section -->
    <div class="content_top mb-5">
      <div class="heading bg-gradient p-3 rounded-3 shadow-sm">
        <h3 class="text-white fw-bold mb-0">Featured Products</h3>
      </div>
      <div class="clear"></div>
    </div>
    
    <!-- Featured Products Grid -->
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
      <?php
      $getFpd = $pd->getFeaturedProduct();
      if ($getFpd) {
        while ($result = $getFpd->fetch_assoc()) { 
      ?>
      
      <div class="col">
        <div class="card border-0 shadow-lg hover-shadow-lg rounded-3">
          <a href="details.php?proid=<?php echo $result['productId']; ?>">
            <img src="admin/<?php echo $result['image']; ?>" class="card-img-top rounded-3 img-fluid transition-all" alt="Product Image">
          </a>
          <div class="card-body text-center">
            <h5 class="card-title fs-5 fw-bold text-green"><?php echo $result['productName']; ?></h5>
            <p><span class="price text-white fw-bold">₹ <?php echo $result['price']; ?></span></p>
            <a href="details.php?proid=<?php echo $result['productId']; ?>" class="btn btn-outline-dark px-4 py-2 rounded-pill">Details</a>
          </div>
        </div>
      </div>
      
      <?php }} ?>
    </div>
    
    <!-- New Products Section -->
    <div class="content_bottom mt-5">
      <div class="heading bg-gradient p-3 rounded-3 shadow-sm">
        <h3 class="text-white fw-bold mb-0">New Products</h3>
      </div>
      <div class="clear"></div>
    </div>

    <!-- New Products Grid -->
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
      <?php
      $getNpd = $pd->getNewProduct();
      if ($getNpd) {
        while ($result = $getNpd->fetch_assoc()) { 
      ?>
      
      <div class="col">
        <div class="card border-0 shadow-lg hover-shadow-lg rounded-3">
          <a href="details.php?proid=<?php echo $result['productId']; ?>">
            <img src="admin/<?php echo $result['image']; ?>" class="card-img-top rounded-3 img-fluid transition-all" alt="Product Image">
          </a>
          <div class="card-body text-center">
            <h5 class="card-title fs-5 fw-bold text-green"><?php echo $result['productName']; ?></h5>
            <p><span class="price text-white fw-bold">₹ <?php echo $result['price']; ?></span></p>
            <a href="details.php?proid=<?php echo $result['productId']; ?>" class="btn btn-outline-dark px-4 py-2 rounded-pill">Details</a>
          </div>
        </div>
      </div>
      
      <?php }} ?>
    </div>
    
  </div>
</div>

<?php include 'inc/footer.php';?>
