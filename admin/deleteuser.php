<?php
try {
    include '../includes/DatabaseConnection.php';

    $sql = 'DELETE FROM users WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();

    header('location: users.php');
    exit;

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to delete user: ' . $e->getMessage();
}

include '../templates/layout.html.php';