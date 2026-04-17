<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('location: auth/login.php');
    exit();
}

if ($_SESSION['role'] === 'admin') {
    header('location: admin/index.php');
    exit();
}

if ($_SESSION['role'] === 'user') {
    header('location: user/index.php');
    exit();
}

header('location: auth/login.php');
exit();