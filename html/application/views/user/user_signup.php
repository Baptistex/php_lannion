

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Jeux</title>
    <meta charset="UTF-8">
    <?php echo "<link rel='stylesheet' " ."href='". base_url().'public/css/style.css'."'"  ?>
</head>

<body>
<h1 id="connexion">S'inscrire</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('user/signup') ?>
        <div class="container">
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
            <button>Retour WIP</button>
        </div>
    </form>
</body>
