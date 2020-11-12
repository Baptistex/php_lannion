<h2><?php echo $title ?></h2>

<div class="row col-lg-12 offset-lg-3">
    <div>
        <img src="<?php echo $gamedata['couverture']?>" width="300" height="600">
    </div>
    <div>
        <label>Nom du jeu : <?php echo $gamedata['titre']?>label><br>
        <label>ID : <?php echo $gamedata['id']?></label><br>
        <label>Date de sortie : <?php echo $gamedata['sortie']?></label>
    </div>
</div>
<label id="description">Description : <?php echo $gamedata['description']?></label>

<div id="bouton">
    <a href="index.html"><button>Retour</button></a>
    <button>Ajouter à la collection</button>
</div>
