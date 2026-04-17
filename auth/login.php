<?php
session_start();

include __DIR__ . '/../includes/DatabaseConnection.php';

if (isset($_POST['email'])) {

    $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':password', $_POST['password']);
    $stmt->execute();

    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        header('location: ../index.php');
        exit();
    } else {
        $error = 'Invalid login';
    }
}

$title = 'Login';

ob_start();
include __DIR__ .'/../templates/login.html.php';
$output = ob_get_clean();

include __DIR__ . '/../templates/layout.html.php';