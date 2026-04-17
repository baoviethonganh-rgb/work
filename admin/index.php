<?php
session_start();

$title = 'Home';

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header('location: ../auth/login.php');
    exit();
}

ob_start();
include __DIR__ .'../templates/home.html.php';
$output = ob_get_clean();

include __DIR__ .'../templates/layout.html.php';