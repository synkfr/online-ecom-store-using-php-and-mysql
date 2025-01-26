<?php include '../classess/Adminlogin.php';?>
<?php
$al = new Adminlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminUser = $_POST['adminUser'];
    $adminPassword = md5($_POST['adminPassword']);

    $loginchk = $al->adminlogin($adminUser, $adminPassword);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap 5.2.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        .login-form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-form h1 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            text-align: center;
        }
        .login-form input {
            margin-bottom: 15px;
        }
        .login-form .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-form">
        <form action="login.php" method="post">
            <h1>Admin Login</h1>
            <?php if (isset($loginchk)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $loginchk; ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" name="adminUser" required />
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="adminPassword" required />
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Log In</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <a href="#" class="text-decoration-none">Back to Online Shopping</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
