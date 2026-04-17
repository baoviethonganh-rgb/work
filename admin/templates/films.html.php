<h2>Films List</h2>

<p>
    <a class="button" href="addfilm.php">+ Add New Film</a>
</p>

<table style="width:100%; border-collapse:collapse; table-layout:fixed;">

<tr style="background:#f4f4f4;">
    <th style="padding:10px; width:80px; text-align:left;">Film</th>
    <th style="padding:10px; width:200px; text-align:left;">Name</th>
    <th style="padding:10px; text-align:left;">Description</th>
    <th style="padding:10px; width:80px; text-align:center;">Year</th>
    <th style="padding:10px; width:140px; text-align:center;">Actions</th>
</tr>

<?php foreach ($films as $film): ?>

<tr style="border-bottom:1px solid #ddd;">

    <!-- Image -->
    <td style="padding:10px;">
        <?php if (!empty($film['image'])): ?>
            <img src="../uploads/<?= htmlspecialchars($film['image']) ?>" style="width:60px; display:block;">
        <?php endif; ?>
    </td>

    <!-- Name -->
    <td style="padding:10px;">
        <?= htmlspecialchars($film['title']) ?>
    </td>

    <!-- Description -->
    <td style="padding:10px;">
        <?= htmlspecialchars($film['description']) ?>
    </td>

    <!-- Year -->
    <td style="padding:10px; text-align:center;">
        <?= htmlspecialchars($film['release_year']) ?>
    </td>

    <!-- Actions -->
    <td style="padding:10px; text-align:center;">

        <a href="editfilm.php?id=<?= $film['id'] ?>"
           style="padding:5px 10px; background:#3cbc8d; color:white; text-decoration:none; border-radius:5px; margin-right:5px;">
           Edit
        </a>

        <form action="deletefilm.php" method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?= $film['id'] ?>">
            <input type="submit" value="Delete"
                   style="padding:5px 10px; background:#d9534f; color:white; border:none; border-radius:5px; cursor:pointer;">
        </form>

    </td>

</tr>

<?php endforeach; ?>

</table>