<?php
try {
    include __DIR__ . '/../includes/DatabaseConnection.php';

    $sql = 'DELETE FROM films WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();

    header('location: films.php');
    exit;

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to delete film: ' . $e->getMessage();
}

include 'templates/layout.html.php';