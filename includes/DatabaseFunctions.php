<?php
function getAllReviews($pdo) {
    return $pdo->query("
        SELECT r.id, r.content, u.name, f.title
        FROM reviews r
        JOIN users u ON r.user_id = u.id
        JOIN films f ON r.film_id = f.id
    ");
}

function getReviewById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM reviews WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}

function addReview($pdo, $content, $user_id, $film_id) {
    $stmt = $pdo->prepare("
        INSERT INTO reviews (content, user_id, film_id)
        VALUES (:content, :user_id, :film_id)
    ");
    return $stmt->execute([
        ':content' => $content,
        ':user_id' => $user_id,
        ':film_id' => $film_id
    ]);
}

function updateReview($pdo, $id, $content) {
    $stmt = $pdo->prepare("
        UPDATE reviews SET content = :content WHERE id = :id
    ");
    return $stmt->execute([
        ':content' => $content,
        ':id' => $id
    ]);
}

function deleteReview($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM reviews WHERE id = :id");
    return $stmt->execute([':id' => $id]);
}

// ===== USERS =====
function getAllUsers($pdo) {
    return $pdo->query("SELECT * FROM users");
}

function addUser($pdo, $name, $email, $password, $role) {
    $stmt = $pdo->prepare("
        INSERT INTO users (name, email, password, role)
        VALUES (:name, :email, MD5(:password), :role)
    ");
    return $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
        ':role' => $role
    ]);
}

function updateUser($pdo, $id, $name, $email, $role) {
    $stmt = $pdo->prepare("
        UPDATE users SET name = :name, email = :email, role = :role
        WHERE id = :id
    ");
    return $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':role' => $role,
        ':id' => $id
    ]);
}

function deleteUser($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    return $stmt->execute([':id' => $id]);
}

// ===== FILMS =====
function getAllFilms($pdo) {
    return $pdo->query("SELECT * FROM films");
}

function addFilm($pdo, $title) {
    $stmt = $pdo->prepare("
        INSERT INTO films (title) VALUES (:title)
    ");
    return $stmt->execute([':title' => $title]);
}

function updateFilm($pdo, $id, $title) {
    $stmt = $pdo->prepare("
        UPDATE films SET title = :title WHERE id = :id
    ");
    return $stmt->execute([
        ':title' => $title,
        ':id' => $id
    ]);
}

function deleteFilm($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM films WHERE id = :id");
    return $stmt->execute([':id' => $id]);
}
?>