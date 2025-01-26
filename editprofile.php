<?php include 'inc/header.php'; ?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
?>

<?php
$cmrId = Session::get("cmrId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateCmr = $cmr->customerUpdate($_POST, $cmrId);
}
?> 

<div class="main py-5 Poppins" style="background-color:rgb(46, 46, 46);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <?php 
                $id = Session::get("cmrId");
                $getdata = $cmr->getCustomerData($id);
                if ($getdata) {
                    while ($result = $getdata->fetch_assoc()) {
                ?>
                <div class="card p-4 shadow-sm">
                    <h2 class="text-center mb-4 fw-bold text-white">Update Profile Details</h2>
                    <?php 
                    if (isset($updateCmr)) {
                        echo "<div class='alert alert-info'>".$updateCmr."</div>";
                    }
                    ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">Name</label>
                            <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="<?php echo $result['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label text-white">Phone</label>
                            <input type="text" class="form-control bg-dark text-white" id="phone" name="phone" value="<?php echo $result['phone']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="email" class="form-control bg-dark text-white" id="email" name="email" value="<?php echo $result['email']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label text-white">Address</label>
                            <input type="text" class="form-control bg-dark text-white" id="address" name="address" value="<?php echo $result['address']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label text-white">City</label>
                            <input type="text" class="form-control bg-dark text-white" id="city" name="city" value="<?php echo $result['city']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="zip" class="form-label text-white">Zipcode</label>
                            <input type="text" class="form-control bg-dark text-white" id="zip" name="zip" value="<?php echo $result['zip']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label text-white">Country</label>
                            <input type="text" class="form-control bg-dark text-white" id="country" name="country" value="<?php echo $result['country']; ?>" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
