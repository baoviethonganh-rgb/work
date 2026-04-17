<h2>Edit User</h2>

<?php if (!empty($error)): ?>
<p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="post">

<input type="hidden" name="id" value="<?= $user["id"] ?>">

Name: <input type="text" name="name" value="<?= htmlspecialchars($user["name"]) ?>"><br><br>

Email: <input type="email" name="email" value="<?= htmlspecialchars($user["email"]) ?>"><br><br>

Role:
<select name="role">
<option value="user" <?= $user["role"] == "user" ? "selected" : "" ?>>User</option>
<option value="admin" <?= $user["role"] == "admin" ? "selected" : "" ?>>Admin</option>
</select>

<br><br>
<input type="submit" value="Update">

</form>