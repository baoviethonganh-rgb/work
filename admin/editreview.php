<?php
include __DIR__ . '/../includes/DatabaseConnection.php';

try {

    if (isset($_POST['review_text'])) {

        $imageName = $_POST['existing_image'];


        if (!empty($_FILES['image']['name'])) {
            $imageName = time() . '_' . $_FILES['image']['name'];

            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                __DIR__ . '/../uploads/' . $imageName
            );
        }


        $sql = 'UPDATE reviews SET
                review_text = :text,
                rating = :rating,
                image = :image,
                film_id = :film_id,
                user_id = :user_id
                WHERE id = :id';

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':text', $_POST['review_text']);
        $stmt->bindValue(':rating', $_POST['rating']);
        $stmt->bindValue(':image', $imageName);
        $stmt->bindValue(':film_id', $_POST['film_id']);
        $stmt->bindValue(':user_id', $_POST['user_id']);
        $stmt->bindValue(':id', $_POST['id']);

        $stmt->execute();

        header('location: reviews.php');
        exit();

    } else {

        $sql = 'SELECT * FROM reviews WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();

        $review = $stmt->fetch();


        $films = $pdo->query('SELECT id, title FROM films')->fetchAll();
        $users = $pdo->query('SELECT id, name FROM users')->fetchAll();

        $title = 'Edit Review';

        ob_start();
        include  'templates/editreview.html.php';
        $output = ob_get_clean();
    }

} catch (PDOException $e) {

    $title = 'Error';
    $output = 'Error editing review: ' . $e->getMessage();
}

include  'templates/layout.html.php';