<h1 class="mt-3">Inscription</h1>
<!--if errors form-->
<?php if (!empty($this->errors)): ?>
    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement</p>
        <ul>
            <?php foreach ($this->errors as $error): ?>
                <li>
                    <?= $error; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form method="post" action="" class="mt-3 mb-5">
    <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Confirmer votre mot de passe</label>
        <input type="password" class="form-control" name="confirm_password">
    </div>
    <button class="btn btn-primary">Submit</button>
</form>