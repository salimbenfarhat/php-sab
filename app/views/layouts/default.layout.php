<?php
use PHP_SAB\Config;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $data['pageTitle'] . ' | '. Config::SITE_NAME; ?></title>
</head>
<body>
    <header>
        <h1>Welcome to <?= Config::SITE_NAME; ?></h1>
        <nav>
            <a href="<?= $data['baseUrl']; ?>" alt="Home">Home</a>
            <a href="<?= $data['baseUrl'] . '/about'; ?>" alt="About">About</a>
            <a href="<?= $data['baseUrl'] . '/contact'; ?>" alt="Contact">Contact</a>
        </nav>
    </header>

    <main>
        <?= $content; ?>
    </main>

    <footer>
        <p>© 2023 <?= Config::SITE_NAME; ?></p>
    </footer>
</body>
</html>