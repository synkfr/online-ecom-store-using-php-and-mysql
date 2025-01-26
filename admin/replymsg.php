<?php include 'inc/header.php'; ?>


<?php
if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
    echo "<script>window.location='inbox.php';</script>";
} else {
    $id = $_GET['msgid'];
}
?>

<div class="container mt-4">
    <div class="row">
    <?php include 'inc/sidebar.php'; ?>
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4>View Message</h4>
                </div>
                <div class="card-body">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $to = $fm->validation($_POST['toEmail']);
                        $from = $fm->validation($_POST['fromEmail']);
                        $subject = $fm->validation($_POST['subject']);
                        $message = $fm->validation($_POST['message']);

                        $sendmail = mail($to, $subject, $message, $from);

                        if ($sendmail) {
                            echo "<div class='alert alert-success'>Message sent successfully.</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Something went wrong!</div>";
                        }
                    }
                    ?>

                    <form action="" method="post">
                        <?php
                        $query = "SELECT * FROM tbl_contact WHERE id='$id'";
                        $msg = $db->select($query);
                        if ($msg) {
                            while ($result = $msg->fetch_assoc()) {
                        ?>
                                <div class="mb-3">
                                    <label for="toEmail" class="form-label">To</label>
                                    <input type="email" readonly name="toEmail" class="form-control bg-dark text-white" id="toEmail" value="<?php echo $result['email']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="fromEmail" class="form-label">From</label>
                                    <input type="email" name="fromEmail" class="form-control bg-dark text-white" id="fromEmail" placeholder="Please enter your email address">
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" name="subject" class="form-control bg-dark text-white" id="subject" placeholder="Please enter your subject">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea name="message" class="form-control bg-dark text-white" id="message" rows="6"></textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" name="submit" class="btn btn-success">Send</button>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js"></script>
<script>
    $(document).ready(function() {
        setupTinyMCE();
    });
</script>

<?php include 'inc/footer.php'; ?>
