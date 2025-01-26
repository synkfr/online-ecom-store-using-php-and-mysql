<?php include 'inc/header.php'; ?>>

<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classess/Cart.php');
$ct = new Cart();
$fm = new Format();
?>

<?php 
if (isset($_GET['shiftid'])) {
    $id = $_GET['shiftid'];
    $shift = $ct->productShifted($id);
}

if (isset($_GET['delproid'])) {
    $id = $_GET['delproid'];
    $delOrder = $ct->delProductShifted($id);
}
?>

<div class="container-fluid mt-4">
    <div class="row">

            <?php include 'inc/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0 text-center">Inbox</h4>
                </div>
                <div class="card-body">
                    <?php 
                    if (isset($shift)) {
                        echo '<div class="alert alert-success">' . $shift . '</div>';
                    }

                    if (isset($delOrder)) {
                        echo '<div class="alert alert-danger">' . $delOrder . '</div>';
                    }
                    ?>

                    <!-- Orders -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Order Time</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Cust. ID</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $getOrder = $ct->getAllOrderProduct();
                                if ($getOrder) {
                                    while ($result = $getOrder->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td class="text-white"><?php echo $result['id']; ?></td>
                                            <td class="text-white"><?php echo $fm->formatDate($result['date']); ?></td>
                                            <td class="text-white"><?php echo $result['productName']; ?></td>
                                            <td class="text-white"><?php echo $result['quantity']; ?></td>
                                            <td class="text-white">₹ <?php echo $result['price']; ?></td>
                                            <td class="text-white"><?php echo $result['cmrId']; ?></td>
                                            <td>
                                                <a href="customer.php?custId=<?php echo $result['cmrId']; ?>" class="btn btn-info btn-sm">View Details</a>
                                            </td>
                                            <td>
                                                <?php 
                                                if ($result['status'] == '0') { ?>
                                                    <a href="?shiftid=<?php echo $result['id']; ?>" class="btn btn-success btn-sm">Shifted</a>
                                                <?php } elseif ($result['status'] == '1') { ?>
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                <?php } else { ?>
                                                    <a href="?delproid=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm">Remove</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php 
                                    }
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>

<?php include 'inc/footer.php'; ?>
