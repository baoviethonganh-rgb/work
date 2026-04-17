<h2>Add a new film</h2>

<form action="addfilm.php" method="post" enctype="multipart/form-data">

    <label>Film title:</label><br>
    <input type="text" name="title" required>
    <br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="4" cols="40" required></textarea>
    <br><br>

    <label>Release year:</label><br>
    <input type="number" name="release_year" required>
    <br><br>

    <label>Choose image:</label><br>
    <input type="file" name="image">
    <br><br>

    <input type="submit" value="Add Film">

</form>