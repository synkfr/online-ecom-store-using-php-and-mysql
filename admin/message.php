<?php include 'inc/header.php'; ?>

<div class="container-fluid">
    <div class="row">
		<?php include 'inc/sidebar.php'; ?>
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    <h4>Inbox</h4>
                </div>
                <div class="card-body">
                    <?php 
                    if (isset($_GET['seenid'])) {
                        $seenid = $_GET['seenid'];

                        $query = "UPDATE tbl_contact SET status = '1' WHERE id = '$seenid'";
                        $updated_row = $db->update($query);

                        if ($updated_row) {
                            echo "<div class='alert alert-success'>Message sent to the seen box.</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Something went wrong!</div>";
                        }
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC";
                                $msg = $db->select($query);
                                if ($msg) {
                                    $i = 0;
                                    while ($result = $msg->fetch_assoc()) {
                                        $i++;
                                ?>
                                    <tr>
                                        <td class="text-white"><?php echo $i; ?></td>
                                        <td class="text-white"><?php echo $result['name']; ?></td>
                                        <td class="text-white"><?php echo $result['email']; ?></td>
                                        <td class="text-white"><?php echo $result['contact']; ?></td>
                                        <td class="text-white"><?php echo $fm->textShorten($result['message'], 30); ?></td>
                                        <td class="text-white"><?php echo $fm->formatDate($result['date']); ?></td>
                                        <td>
                                            <a href="viewmsg.php?msgid=<?php echo $result['id']; ?>" class="btn btn-sm btn-info">View</a>
                                            <a href="replymsg.php?msgid=<?php echo $result['id']; ?>" class="btn btn-sm btn-warning">Reply</a>
                                            <a href="?seenid=<?php echo $result['id']; ?>" class="btn btn-sm btn-success" onclick="return confirm('Are you sure to move the message?');">Seen</a>
                                        </td>
                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h4>Seen Messages</h4>
                </div>
                <div class="card-body">
                    <?php  
                    if (isset($_GET['delid'])) {
                        $delid = $_GET['delid'];
                        $delquery = "DELETE FROM tbl_contact WHERE id = '$delid'";
                        $deldata = $db->delete($delquery);

                        if ($deldata) {
                            echo "<div class='alert alert-success'>Message deleted successfully.</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Message not deleted.</div>";
                        }
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM tbl_contact WHERE status='1' ORDER BY id DESC";
                                $msg = $db->select($query);
                                if ($msg) {
                                    $i = 0;
                                    while ($result = $msg->fetch_assoc()) {
                                        $i++;
                                ?>
                                    <tr>
                                        <td class="text-white"><?php echo $i; ?></td>
                                        <td class="text-white"><?php echo $result['name']; ?></td>
                                        <td class="text-white"><?php echo $result['email']; ?></td>
                                        <td class="text-white"><?php echo $result['contact']; ?></td>
                                        <td class="text-white"><?php echo $fm->textShorten($result['message'], 30); ?></td>
                                        <td class="text-white"><?php echo $fm->formatDate($result['date']); ?></td>
                                        <td>
                                            <a href="viewmsg.php?msgid=<?php echo $result['id']; ?>" class="btn btn-sm btn-info">View</a>
                                            <a href="?delid=<?php echo $result['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?');">Delete</a>
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
</div>

<?php include 'inc/footer.php'; ?>
