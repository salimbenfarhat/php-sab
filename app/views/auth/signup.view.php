<h1>Inscription</h1>
<?php if (isset($signupError)): ?>
    <p style="color: red;"><?= $signupError; ?></p>
<?php endif; ?>
<form action="/auth/inscription" method="post">
    <label for="email">Adresse e-mail :</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">S'inscrire</button>
</form>
<hr>
<a href="<?= $baseUrl; ?>" alt="Retour à l'accueil">Retour à l'accueil</a>
