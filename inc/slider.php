<div class="header_bottom">
  <div class="container-fluid main">
    <div class="row">
      <!-- Right Column (Slider) - Positioned on top -->
      <div class="col-12 mb-4 Poppins">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/1.jpg" class="d-block w-100 rounded-3" alt="Slide 1">
            </div>
            <div class="carousel-item">
              <img src="images/2.jpg" class="d-block w-100 rounded-3" alt="Slide 2">
            </div>
            <div class="carousel-item">
              <img src="images/3.jpg" class="d-block w-100 rounded-3" alt="Slide 3">
            </div>
            <div class="carousel-item">
              <img src="images/4.jpg" class="d-block w-100 rounded-3" alt="Slide 4">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <!-- Left Column (Products) -->
      <div class="col-lg-8 col-md-12 Poppins">
	  <h3 class="text-white fw-bold mb-0">Latest Products</h3>
        <div class="row product-grid">
          <!-- iPhone Products -->
    <?php 
    $getIphone = $pd->latestFromIphone();
    if ($getIphone) {
      while ($result = $getIphone->fetch_assoc()) {
    ?>
    <div class="col-6 col-md-4 col-lg-3 mb-4">
      <div class="card border-0 shadow-sm hover-shadow-lg">
        <img src="admin/<?php echo $result['image']; ?>" class="card-img-top rounded-3" alt="Product Image">
        <div class="card-body text-center">
          <h5 class="card-title">iPhone</h5>
          <p class="card-text"><?php echo $result['productName']; ?></p>
          <a href="details.php?proid=<?php echo $result['productId']; ?>" class="btn btn-primary px-4 py-2 rounded-pill">Details</a>
        </div>
      </div>
    </div>
    <?php }} ?>

    <!-- Samsung Products -->
    <?php 
    $getSamsung = $pd->latestFromSamsung();
    if ($getSamsung) {
      while ($result = $getSamsung->fetch_assoc()) {
    ?>
    <div class="col-6 col-md-4 col-lg-3 mb-4">
      <div class="card border-0 shadow-sm hover-shadow-lg">
        <img src="admin/<?php echo $result['image']; ?>" class="card-img-top rounded-3" alt="Product Image">
        <div class="card-body text-center">
          <h5 class="card-title">Samsung</h5>
          <p class="card-text"><?php echo $result['productName']; ?></p>
          <a href="details.php?proid=<?php echo $result['productId']; ?>" class="btn btn-primary px-4 py-2 rounded-pill">Details</a>
        </div>
      </div>
    </div>
    <?php }} ?>

    <!-- Acer Products -->
    <?php 
    $getAcer = $pd->latestFromAcer();
    if ($getAcer) {
      while ($result = $getAcer->fetch_assoc()) {
    ?>
    <div class="col-6 col-md-4 col-lg-3 mb-4">
      <div class="card border-0 shadow-sm hover-shadow-lg">
        <img src="admin/<?php echo $result['image']; ?>" class="card-img-top rounded-3" alt="Product Image">
        <div class="card-body text-center">
          <h5 class="card-title">Acer</h5>
          <p class="card-text"><?php echo $result['productName']; ?></p>
          <a href="details.php?proid=<?php echo $result['productId']; ?>" class="btn btn-primary px-4 py-2 rounded-pill">Details</a>
        </div>
      </div>
    </div>
    <?php }} ?>

    <!-- Canon Products -->
    <?php 
    $getCanon = $pd->latestFromCanon();
    if ($getCanon) {
      while ($result = $getCanon->fetch_assoc()) {
    ?>
    <div class="col-6 col-md-4 col-lg-3 mb-4">
      <div class="card border-0 shadow-sm hover-shadow-lg">
        <img src="admin/<?php echo $result['image']; ?>" class="card-img-top rounded-3" alt="Product Image">
        <div class="card-body text-center">
          <h5 class="card-title">Canon</h5>
          <p class="card-text"><?php echo $result['productName']; ?></p>
          <a href="details.php?proid=<?php echo $result['productId']; ?>" class="btn btn-primary px-4 py-2 rounded-pill">Details</a>
        </div>
      </div>
    </div>
    <?php }} ?>
      </div>
    </div>
  </div>
</div>
