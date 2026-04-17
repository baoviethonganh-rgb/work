<h2>Users List</h2>

<p>
    <a class="button" href="adduser.php">+ Add New User</a>
</p>

<table style="width:100%; border-collapse:collapse; table-layout:fixed;">

    <tr style="background:#f4f4f4;">
        <th style="padding:10px; width:200px; text-align:left;">Name</th>
        <th style="padding:10px; text-align:left;">Email</th>
        <th style="padding:10px; width:100px; text-align:center;">Role</th>
        <th style="padding:10px; width:140px; text-align:center;">Actions</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr style="border-bottom:1px solid #ddd;">


        <td style="padding:10px;">
            <?= htmlspecialchars($user['name']) ?>
        </td>


        <td style="padding:10px;">
            <a href="mailto:<?= htmlspecialchars($user['email']) ?>">
                <?= htmlspecialchars($user['email']) ?>
            </a>
        </td>


        <td style="padding:10px; text-align:center;">
            <?= htmlspecialchars($user['role']) ?>
        </td>


        <td style="padding:10px; text-align:center;">

            <a href="edituser.php?id=<?= $user['id'] ?>" 
               style="padding:5px 10px; background:#3cbc8d; color:white; text-decoration:none; border-radius:5px; margin-right:5px;">
               Edit
            </a>

            <form action="deleteuser.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="submit" value="Delete"
                       style="padding:5px 10px; background:#d9534f; color:white; border:none; border-radius:5px; cursor:pointer;">
            </form>

        </td>

    </tr>
    <?php endforeach; ?>

</table>