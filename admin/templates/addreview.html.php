<form action="" method="post" enctype="multipart/form-data">

    <label>Review:</label><br>
    <textarea name="review_text" rows="4" cols="40"></textarea>
    <br><br>

    <label>Rating (1–5):</label><br>
    <input type="number" name="rating" min="1" max="5">
    <br><br>

    <label>Select Film:</label><br>
    <select name="film_id">
        <?php foreach ($films as $film): ?>
            <option value="<?= $film['id'] ?>">
                <?= htmlspecialchars($film['title']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <label>Select User:</label><br>
    <select name="user_id">
        <?php foreach ($users as $user): ?>
            <option value="<?= $user['id'] ?>">
                <?= htmlspecialchars($user['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Image:</label><br>
    <input type="file" name="image">
    <br><br>

    <input type="submit" value="Add Review">

</form>