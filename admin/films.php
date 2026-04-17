<?php
try {
    include __DIR__ . '/../includes/DatabaseConnection.php';

    $sql = 'SELECT id, title, description, release_year, image FROM films';
    $films = $pdo->query($sql);

    $title = 'Films List';

    ob_start();
    include 'templates/films.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';