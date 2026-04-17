<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($title ?? 'My Site') ?></title>
    <link rel="stylesheet" href="/coursework-1841/review.css">
</head>

<body>

<header style="padding:10px; background:#333; color:white;">
    <h1>Film Review System</h1>

    <?php if (isset($_SESSION['loggedin'])): ?>
        <p>
            Welcome <?= htmlspecialchars($_SESSION['username']) ?> |
        </p>
    <?php endif; ?>
</header>

<main style="padding:20px;">
    <?= $output ?>
</main>

</body>
</html>