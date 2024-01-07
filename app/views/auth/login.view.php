<h1>Connexion</h1>
<form action="/auth/connexion" method="post">
  <label for="email">Adresse e-mail :</label>
  <input type="email" id="email" name="email" required>
  <button type="submit">Se connecter</button>
</form>
<hr>
<a href="<?= $baseUrl; ?>" alt="Retour à l'accueil">Retour à l'accueil</a>