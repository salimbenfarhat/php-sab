<h1>Inscription</h1>
<form action="/auth/inscription" method="post">
  <label for="email">Adresse e-mail :</label>
  <input type="email" id="email" name="email" required>

  <button type="submit">S'inscrire</button>
</form>
<hr>
<a href="<?= $baseUrl; ?>" alt="Retour à l'accueil">Retour à l'accueil</a>