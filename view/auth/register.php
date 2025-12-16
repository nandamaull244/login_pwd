<?php
require_once "../../controller/auth.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $auth = new Auth();

    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $status   = $_POST['status']; // admin / user

    if ($auth->register($name, $email, $password, $status)) {
        header("Location: login_form.php");
        exit;
    } else {
        $message = "Register gagal! Email sudah digunakan.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Register page</title>
</head>
<body>
    <div class="container">
        
        <h2>Register</h2>

        <!-- MESSAGE -->
        <?php if ($message): ?>
            <p style="color:red;"><?= $message ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <div>
                <label for="name">Name :</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div>
                <label for="status">Status :</label>
                <input type="text" id="status" name="status" required>
            </div>
            <div class="button-login">
                <button type="submit">Register</button>
            </div>
        </form>

        <br>
        <div>
            Already have an account? <a href="login_form.php">Login here</a>
        </div>
    </div>
</body>
</html>
