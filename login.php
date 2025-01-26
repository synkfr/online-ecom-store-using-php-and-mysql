<?php
error_reporting(E_ALL); // Enable error reporting
ini_set('display_errors', 1); // Display errors
?>

<?php include 'inc/header.php';?>
<?php 
$login = Session::get("cuslogin");
if ($login == true) {
    
}
 ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $custLogin = $cmr->customerLogin($_POST);
}

?>
<div class="main py-5" style="background-color:rgb(46, 46, 46);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                
                <!-- Login Panel -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <?php 
                        if (isset($custLogin)) {
                            echo $custLogin;
                        }
                        ?>
                        <h3 class="card-title mb-4">Existing Account</h3>
                        <p class="mb-3 text-white">Sign in if already have an account.</p>
                        <form action="" method="post">
                            <div class="mb-3">
                                <input name="email" class="form-control bg-dark text-white" placeholder="Email" type="email" required />
                            </div>
                            <div class="mb-3">
                                <input name="pass" class="form-control bg-dark text-white" placeholder="Password" type="password" required />
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary" name="login" type="submit">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Registration Panel -->
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
                    $customerReg = $cmr->customerRegistration($_POST);
                }
                ?>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <?php 
                        if (isset($customerReg)) {
                            echo $customerReg;
                        }
                        ?>
                        <h3 class="card-title mb-4">Register New Account</h3>
                        <p class="mb-3 text-white">Fill these informations to make a new account.</p>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control bg-dark text-white" placeholder="Name" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="city" class="form-control bg-dark text-white" placeholder="City" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="zip" class="form-control bg-dark text-white" placeholder="Zip-Code" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="email" name="email" class="form-control bg-dark text-white" placeholder="Email" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="address" class="form-control bg-dark text-white" placeholder="Address" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="country" class="form-control bg-dark text-white" placeholder="Country" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="phone" class="form-control bg-dark text-white" placeholder="Phone" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="password" name="pass" class="form-control bg-dark text-white" placeholder="Password" required />
                                </div>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-success" name="register" type="submit">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
