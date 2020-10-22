<h2>Creation d'un compte utilisateur</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('user/index') ?>

    <label for="title">Identifiant</label>
    <input type="input" name="identifiant" /><br />
    <label for="title">Nom</label>
    <input type="input" name="nom" /><br />
    <label for="title">Prenom</label>
    <input type="input" name="prenom" /><br />
    <label for="title">Mot de Passe</label>
    <input type="input" name="mot_de_passe" /><br />
    <input type="submit" name="submit" value="Ajoute un utilisateur" />
</form>