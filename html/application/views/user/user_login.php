

<h1 id="connexion">Connexion</h1>
<?php echo validation_errors(); ?>
<?php echo form_open('user/login') ?>
    <div class="container">
        <div class="form-input"><i class="fa fa-user fa-2x" aria-hidden="true"></i>
            <input type="text" name="identifiant" placeholder="Pseudo" />
        </div>
        <div class="form-input"><i class="fa fa-lock fa-2x" aria-hidden="true"></i>
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" />
        </div>
        <input type="submit" id="submit" value="valider" /><br>
        <a href="#">Mot de passe oublier ?</a>
    </div>
</form>