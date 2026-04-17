<form action="" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $review['id']; ?>">
    <input type="hidden" name="existing_image" value="<?= $review['image']; ?>">

    <label>Review:</label><br>
    <textarea name="review_text" rows="4" cols="40"><?= htmlspecialchars($review['review_text']); ?></textarea>
    <br><br>

    <label>Rating (1–5):</label><br>
    <input type="number" name="rating" value="<?= $review['rating']; ?>" min="1" max="5">
    <br><br>

    <label>Select Film:</label><br>
    <select name="film_id">
        <?php foreach ($films as $film): ?>
            <option value="<?= $film['id']; ?>"
                <?php if ($film['id'] == $review['film_id']) echo 'selected'; ?>>
                <?= htmlspecialchars($film['title']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Select User:</label><br>
    <select name="user_id">
        <?php foreach ($users as $user): ?>
            <option value="<?= $user['id']; ?>"
                <?php if ($user['id'] == $review['user_id']) echo 'selected'; ?>>
                <?= htmlspecialchars($user['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Current Image:</label><br>
    <?php if (!empty($review['image'])): ?>
        <img src="../uploads/<?= $review['image']; ?>" width="100">
    <?php endif; ?>
    <br><br>

    <label>Change Image:</label><br>
    <input type="file" name="image">
    <br><br>

    <input type="submit" value="Save">

</form>