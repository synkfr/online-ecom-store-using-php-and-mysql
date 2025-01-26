<?php include 'inc/header.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $fm->validation($_POST['name']);
    $email = $fm->validation($_POST['email']);
    $contact = $fm->validation($_POST['contact']);
    $message = $fm->validation($_POST['message']);

    $name = mysqli_real_escape_string($db->link, $name);
    $email = mysqli_real_escape_string($db->link, $email);
    $contact = mysqli_real_escape_string($db->link, $contact);
    $message = mysqli_real_escape_string($db->link, $message);

    $error = "";

    if (empty($name)) {
        $error = "Name must not be empty!";
    } elseif (empty($email)) {
        $error = "Email must not be empty!";
    } elseif (empty($contact)) {
        $error = "Contact field must not be empty!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid Email Address!";
    } elseif (empty($message)) {
        $error = "Message field must not be empty!";
    } else {
        $query = "INSERT INTO tbl_contact(name, email, contact, message) VALUES('$name', '$email', '$contact', '$message')";
        $inserted_rows = $db->insert($query);

        if ($inserted_rows) {
            $msg = "Message Sent Successfully.";
        } else {
            $error = "Message not sent!";
        }
    }
}
?>
<div class="main">
    <div class="container mt-4 Poppins">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title">Contact Us</h3>

                        <?php if (isset($error)) { ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php } ?>

                        <?php if (isset($msg)) { ?>
                            <div class="alert alert-success"><?php echo $msg; ?></div>
                        <?php } ?>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label text-white">Name</label>
                                <input type="text" name="name" class="form-control bg-dark" id="name" value="">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label text-white">Email</label>
                                <input type="email" name="email" class="form-control bg-dark" id="email" value="">
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label text-white">Mobile No</label>
                                <input type="text" name="contact" class="form-control bg-dark" id="contact" value="">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label text-white">Message</label>
                                <textarea name="message" class="form-control bg-dark" id="message" rows="4"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">Company Information</h4>
                        <p class="text-white">Barasat, West Bengal, India</p>
                        <p class="text-white">Mobile: 0000000000</p>
                        <p class="text-white">Email: <a href="mailto:username@gmail.com">username@gmail.com</a></p>
                        <p class="text-white">Follow on: 
                            <a href="#" class="text-primary">Instagram</a>, 
                            <a href="#" class="text-primary">Twitter</a>, 
                            <a href="#" class="text-primary">Threads</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
