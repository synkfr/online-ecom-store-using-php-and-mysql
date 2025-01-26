<?php include 'inc/header.php';?>
<?php include '../classess/Brand.php';?>
<?php
$brand = new Brand();

if (isset($_GET['delbrand'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delbrand']);
    $delbrand = $brand->delbrandById($id);
}
?>
<div class="container-fluid mt-4">
    <div class="row">
        <?php include 'inc/sidebar.php'; ?>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2>Brand List</h2>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($delbrand)) {
                        echo '<div class="alert alert-info">' . $delbrand . '</div>';
                    }
                    ?>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Serial No.</th>
                                <th>Brand Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $getBrand = $brand->getAllBrand();
                            if ($getBrand) {
                                $i = 0;
                                while ($result = $getBrand->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td class="text-white"><?php echo $i; ?></td>
                                        <td class="text-white"><?php echo $result['brandName']; ?></td>
                                        <td class="text-white">
                                            <a href="brandedit.php?brandid=<?php echo $result['brandId']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="?delbrand=<?php echo $result['brandId']; ?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger">Delete</a>
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
<?php include 'inc/footer.php';?>
