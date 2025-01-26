<?php include 'inc/header.php';?>
<?php include '../classess/Category.php';?>
<?php
$cat = new Category();

if (isset($_GET['delcat'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcat']);
    $delcat = $cat->delcatById($id);
}
?>

<div class="container-fluid">
    <div class="row">
        <?php include 'inc/sidebar.php';?>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2>Category List</h2>
                </div>
                <div class="card-body">
                    <?php 
                    if (isset($delcat)) {
                        echo $delcat;
                    }
                    ?>
                    <table class="table table-striped table-bordered" id="categoryTable">
                        <thead class="table-dark">
                            <tr>
                                <th>Serial No.</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        $getCat = $cat->getAllCat();
                        if ($getCat) {
                            $i = 0;
                            while ($result = $getCat->fetch_assoc()) {
                                $i++;
                        ?>
                                <tr>
                                    <td class="text-white"><?php echo $i;?></td>
                                    <td class="text-white"><?php echo $result['catName'];?></td>
                                    <td>
                                        <a href="catedit.php?catid=<?php echo $result['catId'];?>" class="btn btn-warning btn-sm">Edit</a> 
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="<?php echo $result['catId']; ?>">Delete</button>
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

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this category?
            </div>
            <div class="modal-footer">
                <form action="" method="get">
                    <input type="hidden" name="delcat" id="deleteCategoryId" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var deleteBtns = document.querySelectorAll('button[data-bs-target="#confirmDeleteModal"]');
    deleteBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var categoryId = btn.getAttribute('data-id');
            document.getElementById('deleteCategoryId').value = categoryId;
        });
    });
</script>

<?php include 'inc/footer.php';?>
