<?php include 'inc/header.php'; ?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    $msg = '<div class="alert alert-danger" role="alert">Please Login to place your order.  <a href="login.php" class="alert-link">Login</a></div>';
    echo $msg;
}
?>

<?php 
if (isset($_GET['orderid']) && $_GET['orderid'] == 'Order') {
 $cmrId = Session::get("cmrId");
 $insertOrder = $ct->orderProduct($cmrId);
 $delData = $ct->delCustomerCart();


 $msg = '<div class="alert alert-success" role="alert">Ordered Successfully!! you can go back to <a href="index.php" class="alert-link">HOMEPAGE</a></div>';
    echo $msg;

}
?>

<div class="main py-5 Poppins">
    <div class="container">
        <div class="row">
            <!-- Cart Details Section -->
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                        <tr class="card-title fw-bold">
                            <th>No</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $sum = 0;
                        $qty = 0;

                        $getPro = $ct->getCartProduct();
                        if ($getPro) {
                            $i = 0;
                            while ($result = $getPro->fetch_assoc()) {
                                $i++;
                        ?>
                        <tr>
                            <td class="text-white"><?php echo $i;?></td>
                            <td class="text-white"><?php echo $result['productName']; ?></td>
                            <td class="text-white">₹ <?php echo $result['price']; ?></td>
                            <td class="text-white"><?php echo $result['quantity']; ?></td>
                            <td class="text-white">₹ <?php
                                $total = $result['price'] * $result['quantity'];
                                echo $total;
                            ?></td>
                        </tr>
                        <?php 
                            $qty += $result['quantity'];
                            $sum += $total;
                        } 
                        } 
                        ?>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <tr>
                        <th class="card-title fw-bold">Sub Total</th>
                        <td class="text-white fw-bold">₹ <?php echo $sum; ?></td>
                    </tr>
                    <tr>
                        <th class="card-title fw-bold">VAT</th>
                        <td class="text-white fw-bold">10% (₹ <?php echo $vat = $sum * 0.1; ?>)</td>
                    </tr>
                    <tr>
                        <th class="card-title fw-bold">Total</th>
                        <td class="text-white fw-bold">₹ <?php $gtotal = $sum + $vat; echo $gtotal; ?></td>
                    </tr>
                    <tr>
                        <th class="card-title fw-bold">Quantity</th>
                        <td class="text-white fw-bold"><?php echo $qty; ?></td>
                    </tr>
                </table>
            </div>

            <!-- Customer Profile Section -->
            <div class="col-md-6">
                <?php 
                $id = Session::get("cmrId");
                $getdata = $cmr->getCustomerData($id);
                if ($getdata) {
                    while ($result = $getdata->fetch_assoc()) {
                ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2" class="card-title fw-bold">Your Profile Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-white fw-bold">Name</td>
                            <td class="text-white"><?php echo $result['name'];?></td>
                        </tr>
                        <tr>
                            <td class="text-white fw-bold">Phone</td>
                            <td class="text-white"><?php echo $result['phone'];?></td>
                        </tr>
                        <tr>
                            <td class="text-white fw-bold">Email</td>
                            <td class="text-white"><?php echo $result['email'];?></td>
                        </tr>
                        <tr>
                            <td class="text-white fw-bold">Address</td>
                            <td class="text-white"><?php echo $result['address'];?></td>
                        </tr>
                        <tr>
                            <td class="text-white fw-bold">City</td>
                            <td class="text-white"><?php echo $result['city'];?></td>
                        </tr>
                        <tr>
                            <td class="text-white fw-bold">Zipcode</td>
                            <td class="text-white"><?php echo $result['zip'];?></td>
                        </tr>
                        <tr>
                            <td class="text-white fw-bold">Country</td>
                            <td class="text-white"><?php echo $result['country'];?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="editprofile.php">Update Details</a></td>
                        </tr>
                    </tbody>
                </table>
                <?php }} ?>
            </div>
        </div>
        
        <!-- Order Now Section -->
        <div class="text-center mt-4">
            <a href="?orderid=Order" class="btn btn-danger btn-lg">Order Now</a>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
