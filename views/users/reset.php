<?php include 'partials/header.php'; ?>
    <h1>Réinitialiser mon mot de passe</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="">Mot de passe</label>
            <input type="password" name="password" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Confirmation du mot de passe</label>
            <input type="password" name="password_confirm" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary">Réinitialiser mon mot de passe</button>
    </form>
<?php include 'partials/footer.php'; ?>