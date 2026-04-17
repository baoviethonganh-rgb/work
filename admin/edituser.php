<?php
session_start();
include '../includes/DatabaseConnection.php';

if ($_SESSION["role"] != "admin") {
    header("Location: ../auth/login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    if (empty($name) || empty($email)) {
        $error = "Fields required";
    } else {

        $stmt = $pdo->prepare("UPDATE users 
                               SET name = :name, email = :email, role = :role
                               WHERE id = :id");

        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':role' => $role,
            ':id' => $id
        ]);

        header("Location: users.php");
        exit();
    }
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $_GET["id"]);
$stmt->execute();
$user = $stmt->fetch();

ob_start();
include '../templates/edituser.html.php';
$output = ob_get_clean();

include '../templates/layout.html.php';
?>