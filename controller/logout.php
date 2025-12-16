<?php
session_start();
session_destroy();

header("Location: /login_pwd/view/auth/login_form.php");
exit;
