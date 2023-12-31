<?php
use PHP_SAB\Config;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $data['pageTitle'] . ' | '. Config::SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?= Config::BASE_URL . '/public/assets/styles/main.css'; ?>">
</head>
<body>
    <header>
        <h1><?= Config::SITE_NAME; ?></h1>
        <nav>
            <a href="<?= Config::BASE_URL; ?>" alt="Accueil">Accueil</a>
            <a href="<?= Config::BASE_URL . '/a-propos'; ?>" alt="A propos">A propos</a>
            <a href="<?= Config::BASE_URL . '/contact'; ?>" alt="Contact">Contact</a>
        </nav>
        <nav>
            <a href="<?= Config::BASE_URL . '/auth'; ?>" alt="Connexion">Connexion</a>
            <a href="<?= Config::BASE_URL . '/auth/inscription'; ?>" alt="Inscription">Inscription</a>
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