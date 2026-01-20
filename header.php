<?php
;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=UnifrakturMaguntia&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Документ</title>
</head>
<body>
    <header>
        <nav>
            <a class="my-button" href="http://localhost/Praktika/praktika/creater.php">Добавить друга</a>
            
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a class="my-button" href="http://localhost/Praktika/praktika/reg.php">Регистрация</a>
                <a class="my-button" href="http://localhost/Praktika/praktika/login.php">Вход</a>
            <?php else: ?>
                <a class="my-button" href="http://localhost/Praktika/praktika/logout.php">Выход</a>
            <?php endif; ?>
            
            <a class="my-button" href="http://localhost/Praktika/praktika/content.php">База</a>
            
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                <a class="my-button" href="http://localhost/Praktika/praktika/admin.php">Админ-панель</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>