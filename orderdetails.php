<?php include 'inc/header.php'; ?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
?>

<?php 
if (isset($_GET['customerId'])) {
    $id = $_GET['customerId'];
    $confirm = $ct->productShiftConfirm($id);
}
?>

<div class="main py-5 Poppins">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-4 text-center fw-bold text-white">Your Ordered Details</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="card-title bg-dark">
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $cmrId = Session::get("cmrId");
                                    $getOrder = $ct->getOrderedProduct($cmrId);
                                    if ($getOrder) {
                                        $i = 0;
                                        while ($result = $getOrder->fetch_assoc()) {
                                            $i++;
                                    ?>
                                        <tr>
                                            <td class="text-white"><?php echo $i; ?></td>
                                            <td class="text-white"><?php echo $result['productName']; ?></td>
                                            <td class="text-white"><img src="admin/<?php echo $result['image']; ?>" alt="" class="img-fluid" style="max-width: 100px;"></td>
                                            <td class="text-white"><?php echo $result['quantity']; ?></td>
                                            <td class="text-white">₹ <?php echo $result['price']; ?></td>
                                            <td class="text-white"><?php echo $fm->formatDate($result['date']); ?></td>
                                            <td class="text-white">
                                                <?php
                                                if ($result['status'] == '0') {
                                                    echo "Pending";
                                                } elseif($result['status'] == '1') {
                                                    echo "Shifted";
                                                } else { 
                                                    echo "Ok";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if ($result['status'] == '1') { ?>
                                                    <a href="?customerId=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm">Confirm</a>
                                                <?php } elseif($result['status'] == '2'){ ?>
                                                    <span class="badge bg-success">Ok</span>
                                                <?php } elseif ($result['status'] == '0') { ?>
                                                    <span class="badge bg-warning">N/A</span>
                                                <?php } ?>
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
</div>

<?php include 'inc/footer.php'; ?>
