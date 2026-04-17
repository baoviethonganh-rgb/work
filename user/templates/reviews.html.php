<h2>Reviews List</h2>

<p>
    <a class="button" href="addreview.php" style="padding:6px 10px; text-decoration:none;">
        + Add New Review
    </a>
</p>

<table style="width:100%; border-collapse:collapse; table-layout:fixed;">

    <tr style="background:#f4f4f4; text-align:left;">
        <th style="padding:8px; width:80px;">Image</th>
        <th style="padding:8px; width:140px;">User</th>
        <th style="padding:8px; width:160px;">Film</th>
        <th style="padding:8px;">Review</th>
        <th style="padding:8px; width:90px; text-align:center;">Rating</th>
        <th style="padding:8px; width:140px; text-align:center;">Actions</th>
    </tr>

    <?php foreach ($reviews as $review): ?>
    <tr style="border-bottom:1px solid #ddd;"
        onmouseover="this.style.background='#f9f9f9'"
        onmouseout="this.style.background='white'">

        <!-- Image -->
        <td style="padding:8px; vertical-align:middle;">
            <?php if (!empty($review['image'])): ?>
                <img src="../uploads/<?= htmlspecialchars($review['image']) ?>" 
                     style="width:50px; display:block;">
            <?php endif; ?>
        </td>

        <!-- User -->
        <td style="padding:8px; vertical-align:middle;">
            <?= htmlspecialchars($review['user_name']) ?>
        </td>

        <!-- Film -->
        <td style="padding:8px; vertical-align:middle;">
            <?= htmlspecialchars($review['film_title']) ?>
        </td>

        <!-- Review -->
        <td style="padding:8px; vertical-align:middle; word-wrap:break-word;">
            <?= htmlspecialchars($review['review_text']) ?>
        </td>

        <!-- Rating -->
        <td style="padding:8px; text-align:center; vertical-align:middle;">
            ⭐ <?= htmlspecialchars($review['rating']) ?>
        </td>

        <!-- Actions -->
        <td style="padding:8px; text-align:center; vertical-align:middle;">

            <a href="editreview.php?id=<?= $review['id'] ?>" 
               style="padding:4px 8px; background:#3cbc8d; color:white; text-decoration:none; border-radius:5px; margin-right:4px;">
               Edit
            </a>

            <form action="deletereview.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $review['id'] ?>">
                <input type="submit" value="Delete"
                       style="padding:4px 8px; background:#d9534f; color:white; border:none; border-radius:5px; cursor:pointer;">
            </form>

        </td>

    </tr>
    <?php endforeach; ?>

</table>