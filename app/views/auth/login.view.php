<h1>Connexion</h1>
<form action="/auth/connexion" method="post">
    <label for="username">Identifiant :</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Se connecter</button>
</form>

<p><a href="/auth/reset-mdp">Mot de passe oublié</a></p>
<p><a href="/auth/reset-id">Identifiant oublié</a></p>
<hr>
<a href="<?= $baseUrl; ?>" alt="Retour à l'accueil">Retour à l'accueil</a>