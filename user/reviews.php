<?php
try {
    include __DIR__ . '/../includes/DatabaseConnection.php';

    $sql = 'SELECT r.id, r.review_text, r.rating, r.image, r.created_at,
                   f.title AS film_title,
                   u.name AS user_name
            FROM reviews r
            JOIN films f ON r.film_id = f.id
            JOIN users u ON r.user_id = u.id';

    $reviews = $pdo->query($sql);

    $title = 'Reviews List';

    ob_start();
    include 'templates/reviews.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';