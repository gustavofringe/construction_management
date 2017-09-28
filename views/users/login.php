<?php 
$this->title = "Se connecter";?>
    <h1>Se connecter</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="">Pseudo ou e-mail</label>
            <input type="text" name="username" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="">Mot de passe <a href="<?= BASE_URL; ?>/forget">(mot de passe oublié)</a></label>
            <input type="password" name="password" class="form-control"/>
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
