<h1>Contactez-nous</h1>
<form action="/contact" method="post">
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" class="form-control <?= !empty($errors['name']) ? 'is-invalid' : (isset($_POST['name']) ? 'is-valid' : ''); ?>" value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>">
        <?php if (!empty($errors['name'])) : ?>
            <div class="invalid-feedback"><?= $errors['name'][0]; ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control <?= !empty($errors['email']) ? 'is-invalid' : (isset($_POST['email']) ? 'is-valid' : ''); ?>" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        <?php if (!empty($errors['email'])) : ?>
            <div class="invalid-feedback"><?= $errors['email'][0]; ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" class="form-control <?= !empty($errors['message']) ? 'is-invalid' : (isset($_POST['message']) ? 'is-valid' : ''); ?>" rows="5"><?= isset($_POST['message']) ? $_POST['message'] : ''; ?></textarea>
        <?php if (!empty($errors['message'])) : ?>
            <div class="invalid-feedback"><?= $errors['message'][0]; ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
<a href="<?= $baseUrl; ?>" alt="Retour à l'accueil">Retour à l'accueil</a>
