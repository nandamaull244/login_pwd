<?php
session_start();
require_once "../../controller/auth.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $auth = new Auth();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = $auth->login($email, $password);

    if ($login) {
        $_SESSION['email']  = $login['email'];
        $_SESSION['name']   = $login['name'];
        $_SESSION['status'] = $login['status']; // admin / user

        if ($login['status'] === 'admin') {
            header("Location: ../index_admin.php");
        } else {
            header("Location: ../index_user.php");
        }
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Login page</title>
</head>
<body>
    <div class="container">
        
        <h2>Login</h2>
        <?php if ($error): ?>
            <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <div>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="button-login">
                <button type="submit">Login</button>
            </div>
        </form>

        <br> 
        <div>
            Don't have an account? <a href="register.php">Register here</a>
        </div>
    </div>
</body>
</html>
