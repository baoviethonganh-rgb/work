<?php
include __DIR__ . '/../includes/DatabaseConnection.php';

try {

    if (isset($_POST['title'])) {

        $imageName = $_POST['existing_image'];
        if (!empty($_FILES['image']['name'])) {
            $imageName = time() . '_' . $_FILES['image']['name'];

            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                __DIR__ . '/../uploads/' . $imageName
            );
        }

        $sql = 'UPDATE films SET
                title = :title,
                description = :description,
                release_year = :year,
                image = :image
                WHERE id = :id';

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':title', $_POST['title']);
        $stmt->bindValue(':description', $_POST['description']);
        $stmt->bindValue(':year', $_POST['release_year']);
        $stmt->bindValue(':image', $imageName);
        $stmt->bindValue(':id', $_POST['id']);

        $stmt->execute();

        header('location: films.php');

    } else {

        $sql = 'SELECT * FROM films WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();

        $film = $stmt->fetch();

        $title = 'Edit Film';

        ob_start();
        include __DIR__ . '/templates/editfilm.html.php';
        $output = ob_get_clean();
    }

} catch (PDOException $e) {

    $title = 'Error';
    $output = 'Error editing film: ' . $e->getMessage();
}

include __DIR__ . '/templates/layout.html.php';