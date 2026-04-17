<form action="" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $film['id']; ?>">
    <input type="hidden" name="existing_image" value="<?= $film['image']; ?>">

    <label>Edit film title:</label><br>
    <input type="text" name="title" value="<?= $film['title']; ?>">
    <br><br>

    <label>Edit description:</label><br>
    <textarea name="description" rows="4" cols="40">
<?= $film['description']; ?>
    </textarea>
    <br><br>

    <label>Edit release year:</label><br>
    <input type="number" name="release_year" value="<?= $film['release_year']; ?>">
    <br><br>

    <label>Current image:</label><br>
    <?php if (!empty($film['image'])): ?>
        <img src="../uploads/<?= $film['image']; ?>" width="100">
    <?php endif; ?>
    <br><br>

    <label>Change image:</label><br>
    <input type="file" name="image">
    <br><br>

    <input type="submit" name="submit" value="Save">

</form>