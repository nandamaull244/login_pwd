<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'user') {
    header("Location: auth/login_form.php");
    exit;
}
?>

<h2>Halaman User</h2>
<p>Halo, <?= $_SESSION['name']; ?>!</p>

<a href="/login_pwd/controller/logout.php">Logout</a>

