<?php
if (isset($_POST['review_text'])) {

    try {
        include __DIR__ . '/../includes/DatabaseConnection.php';

        $imageName = null;

        if (!empty($_FILES['image']['name'])) {

            $imageName = time() . '_' . $_FILES['image']['name'];

            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                __DIR__ . '/../uploads/' . $imageName
            );
        }

        $sql = 'INSERT INTO reviews SET
                review_text = :text,
                rating = :rating,
                image = :image,
                film_id = :film_id,
                user_id = :user_id,
                created_at = NOW()';

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':text', $_POST['review_text']);
        $stmt->bindValue(':rating', $_POST['rating']);
        $stmt->bindValue(':image', $imageName);
        $stmt->bindValue(':film_id', $_POST['film_id']);
        $stmt->bindValue(':user_id', $_POST['user_id']); 

        $stmt->execute();

        header('location: reviews.php');

    } catch (PDOException $e) {

        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }

} else {

    include __DIR__ . '/../includes/DatabaseConnection.php';


    $films = $pdo->query('SELECT id, title FROM films')->fetchAll();
    $users = $pdo->query('SELECT id, name FROM users')->fetchAll();

    $title = 'Add a new review';

    ob_start();
    include  'templates/addreview.html.php';
    $output = ob_get_clean();
}

include 'templates/layout.html.php';