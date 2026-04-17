<?php
if (isset($_POST['title'])) {

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

        $sql = 'INSERT INTO films SET
                title = :title,
                description = :description,
                release_year = :year,
                image = :image';

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':title', $_POST['title']);
        $stmt->bindValue(':description', $_POST['description']);
        $stmt->bindValue(':year', $_POST['release_year']);
        $stmt->bindValue(':image', $imageName);

        $stmt->execute();

        header('location: films.php');

    } catch (PDOException $e) {

        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }

} else {

    include __DIR__ . '/../includes/DatabaseConnection.php';

    $title = 'Add a new film';

    ob_start();
    include  'templates/addfilm.html.php';
    $output = ob_get_clean();
}

include 'templates/layout.html.php';