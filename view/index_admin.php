<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'admin') {
    header("Location: auth/login_form.php");
    exit;
}
?>

<h2>Halaman Admin</h2>
<p>Halo Admin, <?= $_SESSION['name']; ?>!</p>

<a href="/login_pwd/controller/logout.php">Logout</a>

