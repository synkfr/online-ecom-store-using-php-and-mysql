<?php include 'inc/header.php'; ?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
?>

<div class="main py-5 Poppins">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title mb-4 fw-bold">Choose Payment Option</h2>
                        <div class="d-grid gap-3">
                            <a href="paymentoffline.php" class="btn btn-danger btn-lg">Pay Offline Cash</a>
                            <a href="paymentonline.php" class="btn btn-primary btn-lg">Online Payment</a>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="cart.php" class="btn btn-secondary btn-lg">
                        <i class="bi bi-arrow-left"></i> Back to Cart
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
