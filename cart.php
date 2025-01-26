<?php include 'inc/header.php'; ?>

<?php 
if (isset($_GET['delpro'])) {
    $delId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
    $delProduct = $ct->delProductByCart($delId);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $updateCart = $ct->updateCartQuantity($cartId, $quantity);

    if ($quantity <= 0) {
        $delProduct = $ct->delProductByCart($cartId);
    }
}

if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=cart' />";
}
?>

<div class="main py-5 Poppins">
    <div class="container">
        <h2 class="text-center mb-4 text-white w-bold">Your Cart</h2>
        
        <?php 
        if (isset($updateCart)) {
            echo "<div class='alert alert-success'>$updateCart</div>";
        }

        if (isset($delProduct)) {
            echo "<div class='alert alert-danger'>$delProduct</div>";
        }
        ?>

        <?php $getPro = $ct->getCartProduct(); ?>
        <?php if ($getPro) { ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 0;
                        $sum = 0;
                        $qty = 0;

                        while ($result = $getPro->fetch_assoc()) {
                            $i++;
                            $total = $result['price'] * $result['quantity'];
                            $sum += $total;
                            $qty += $result['quantity'];
                        ?>
                        <tr>
                            <td class="text-white"><?php echo $i; ?></td>
                            <td class="text-white"><?php echo $result['productName']; ?></td>
                            <td>
                                <img src="admin/<?php echo $result['image']; ?>" class="img-thumbnail" style="width: 80px; height: auto;" alt="Product Image">
                            </td>
                            <td class="text-white">₹ <?php echo $result['price']; ?></td>
                            <td>
                                <form action="" method="post" class="d-flex align-items-center justify-content-center gap-2">
                                    <input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>">
                                    <input type="number" name="quantity" value="<?php echo $result['quantity']; ?>" class="form-control form-control-sm" style="width: 80px;">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                            <td class="text-white">₹ <?php echo $total; ?></td>
                            <td>
                                <a onclick="return confirm('Are you sure to delete this item?')" href="?delpro=<?php echo $result['cartId']; ?>" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="row justify-content-end mt-4">
                <div class="col-md-4">
                    <div class="border p-3 text-white">
                        <h4>Cart Summary</h4>
                        <ul class="list-unstyled">
                            <li><strong>Sub Total:</strong>  ₹ <?php echo $sum; ?></li>
                            <li><strong>VAT (10%):</strong>  ₹ <?php $vat = $sum * 0.1; echo $vat; ?></li>
                            <li><strong>Grand Total:</strong>  ₹ <?php $gtotal = $sum + $vat; echo $gtotal; ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="index.php" class="btn btn-success btn-lg">
                    <i class="bi bi-arrow-left-circle"></i> Continue Shopping
                </a>
                <a href="payment.php" class="btn btn-primary btn-lg">
                    Proceed to Checkout <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        <?php } else { ?>
            <div class="alert alert-info text-center">
                Your cart is empty. <a href="index.php" class="text-decoration-none">Start shopping now!</a>
            </div>
        <?php } ?>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
