

<h2 id="connexion"><?php echo $title?></h2>
<?php echo form_open($formlink) ?>
    <div class="container">
    <?php echo validation_errors(); ?>

        <div class="form-input">
            <input type="text" name="nom" placeholder="Nom" />
        </div>
        <div class="form-input">
            <input type="text" name="prenom" placeholder="Prénom" />
        </div>
        <div class="form-input">
            <input type="text" name="identifiant" placeholder="Identifiant" />
        </div>
        <div class="form-input">
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" />
        </div>
        <div class="form-input">
            <input type="password" name="mot_de_passe_conf" placeholder="Confirmer mot de passe" />
        </div>
        <input type="submit" name="submit" id="submit" value="Valider" /><br>
    </div>
</form>

