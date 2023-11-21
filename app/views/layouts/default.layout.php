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
        <h1><?= Config::SITE_NAME; ?></h1>
        <nav>
            <a href="<?= $data['baseUrl']; ?>" alt="Accueil">Accueil</a>
            <a href="<?= $data['baseUrl'] . '/a-propos'; ?>" alt="A propos">A propos</a>
            <a href="<?= $data['baseUrl'] . '/contact'; ?>" alt="Contact">Contact</a>
        </nav>
        <nav>
            <a href="<?= $data['baseUrl'] . '/auth'; ?>" alt="Connexion">Connexion</a>
            <a href="<?= $data['baseUrl'] . '/auth/inscription'; ?>" alt="Inscription">Inscription</a>
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