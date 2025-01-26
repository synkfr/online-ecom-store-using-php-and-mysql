<?php include 'inc/header.php';?>
<?php include '../classess/Category.php';?>
<?php
$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];
    $insertCat = $cat->catInsert($catName);
}
?>
<div class="container-fluid">
    <div class="row">
        <?php include 'inc/sidebar.php';?>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2 class="mb-0">Add New Category</h2>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($insertCat)){
                        echo $insertCat;
                    }
                    ?>

                    <form action="catadd.php" method="post">
                        <div class="mb-3">
                            <label for="catName" class="form-label">Category Name</label>
                            <input type="text" name="catName" id="catName" class="form-control bg-dark text-white" placeholder="Enter Category Name..." required>
                            <div class="invalid-feedback">
                                Please enter a category name.
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>

<script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
