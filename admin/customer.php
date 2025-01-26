<?php include 'inc/header.php'; ?>
<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classess/Customer.php');
?>
<?php
if (!isset($_GET['custId']) || $_GET['custId'] == NULL) {
    echo "<script>window.location='inbox.php';</script>";
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['custId']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<script>window.location='inbox.php';</script>";
}
?>
<div class="container-fluid py-2">
    <div class="row">
    <?php include 'inc/sidebar.php'; ?>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2 class="mb-0">Customer Details</h2>
                </div>
                <div class="card-body">
                    <?php
                    $cus = new Customer();
                    $getCust = $cus->getCustomerData($id);
                    if ($getCust) {
                        while ($result = $getCust->fetch_assoc()) {
                    ?>   
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control bg-dark text-white" readonly value="<?php echo $result['name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" id="address" class="form-control bg-dark text-white" readonly value="<?php echo $result['address']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" id="city" class="form-control bg-dark text-white" readonly value="<?php echo $result['city']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="zipcode" class="form-label">Zipcode</label>
                            <input type="text" id="zipcode" class="form-control bg-dark text-white" readonly value="<?php echo $result['zip']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" class="form-control bg-dark text-white" readonly value="<?php echo $result['phone']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control bg-dark text-white" readonly value="<?php echo $result['email']; ?>">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Ok</button>
                        </div>
                    </form>
                    <?php 
                        } 
                    } 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
