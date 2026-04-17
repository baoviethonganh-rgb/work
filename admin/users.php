<?php
try {
    include __DIR__ . '/../includes/DatabaseConnection.php';

    $sql = 'SELECT id, name, email, role FROM users';

    $users = $pdo->query($sql);

    $title = 'User List';

    ob_start();
    include 'templates/users.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';