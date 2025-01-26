<?php include 'inc/header.php'; ?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
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
                    <h2 class="text-center mb-4 fw-bold text-white">Your Profile Details</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td class="text-white"><strong>Name</strong></td>
                                <td class="text-white"><?php echo $result['name']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Phone</strong></td>
                                <td class="text-white"><?php echo $result['phone']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Email</strong></td>
                                <td class="text-white"><?php echo $result['email']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Address</strong></td>
                                <td class="text-white"><?php echo $result['address']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>City</strong></td>
                                <td class="text-white"><?php echo $result['city']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Zipcode</strong></td>
                                <td class="text-white"><?php echo $result['zip']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Country</strong></td>
                                <td class="text-white"><?php echo $result['country']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="editprofile.php" class="btn btn-primary btn-lg px-4 py-2">Update Details</a>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
