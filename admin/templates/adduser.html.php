<h2>Add User</h2>

<?php if (!empty($error)): ?>
<p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="post">

Name: <input type="text" name="name"><br><br>
Email: <input type="email" name="email"><br><br>
Password: <input type="password" name="password"><br><br>

Role:
<select name="role">
<option value="user">User</option>
<option value="admin">Admin</option>
</select>

<br><br>
<input type="submit" value="Add User">

</form>