<h2 id="connexion">Connexion</h2>
<?php echo form_open('user/login') ?>
<div class="container">
    <?php echo $this->session->flashdata('login_attempt');?>

    <?php echo validation_errors(); ?>

    <div class="form-input"><i class="fa fa-user fa-2x" aria-hidden="true"></i>
        <input type="text" name="identifiant" placeholder="Pseudo" />
    </div>
    <div class="form-input"><i class="fa fa-lock fa-2x" aria-hidden="true"></i>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" />
    </div>
    <input type="submit" id="submit" value="valider" /><br>
    <?php echo anchor("user/signup", "S'inscrire ?", "") ?>
</div>
</form>