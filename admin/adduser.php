<?php
session_start();
include '../includes/DatabaseConnection.php';

if ($_SESSION["role"] != "admin") {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    if (empty($name) || empty($email) || empty($password)) {
        $error = "All fields required";
    } else {

        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role)
                               VALUES (:name, :email, MD5(:password), :role)");

        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role
        ]);

        header("Location: users.php");
        exit();
    }
}

ob_start();
include '../templates/adduser.html.php';
$output = ob_get_clean();

include '../templates/layout.html.php';
?>