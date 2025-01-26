<?php include 'inc/header.php';?>
<?php include '../classess/Category.php';?>
<?php
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
    echo "<script>window.location='catlist.php';</script>";
} else {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catid']);
}

$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];
    $updateCat = $cat->catUpdate($catName, $id);
}

?>
<div class="container-fluid mt-4">
    <div class="row">
        <?php include 'inc/sidebar.php';?>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2>Update Category</h2>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($updateCat)){
                        echo $updateCat;
                    }
                    ?>

                    <?php
                    $getCat = $cat->getCatById($id);
                    if ($getCat) {
                        while ($result = $getCat->fetch_assoc()) {
                    ?>   
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="catName" class="form-label">Category Name</label>
                            <input type="text" name="catName" id="catName" value="<?php echo $result['catName'];?>" class="form-control bg-dark text-white" placeholder="Enter category name" required />
                        </div>
                        <div class="gap-3">
                        <button type="submit" name="submit" class="btn btn-success p-3">Update</button>
                        <a type="button" herf="catlist.php" class="btn btn-success p-3">Back</a>
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

<?php include 'inc/footer.php';?>
