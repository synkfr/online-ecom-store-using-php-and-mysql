<?php include 'inc/header.php'; ?>

<?php
if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
    echo "<script>window.location='inbox.php';</script>";
} else {
    $id = $_GET['msgid'];
}
?>

<div class="container-fluid">
    <div class="row">
        <?php include 'inc/sidebar.php'; ?>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2>View Message</h2>
                </div>
                <div class="card-body">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        echo "<script>window.location='inbox.php';</script>";
                    }

                    $query = "SELECT * FROM tbl_contact WHERE id='$id'";
                    $msg = $db->select($query);
                    if ($msg) {
                        while ($result = $msg->fetch_assoc()) {
                    ?>

                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control bg-dark text-white" value="<?php echo $result['name']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control bg-dark text-white" value="<?php echo $result['email']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" class="form-control bg-dark text-white" value="<?php echo $result['contact']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="text" id="date" class="form-control bg-dark text-white" value="<?php echo $fm->formatDate($result['date']); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" class="form-control bg-dark text-white" rows="5" readonly><?php echo $result['message']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success bg-success text-white">Ok</button>
                    </form>

                    <?php
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Message not found.</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
