<h2><?php echo $title ?></h2>

<div id="jeux_game">
<div id="game" class="row col-lg-12">
    <div>
        <img src="<?php echo $gamedata['couverture']?>" width="300" height="600">
    </div>
    <div>
        <label id="labeljeux">Nom du jeu : <?php echo $gamedata['titre']?></label><br>
        <label id="labeljeux">ID : <?php echo $gamedata['id']?></label><br>
        <label id="labeljeux">Date de sortie : <?php echo $gamedata['sortie']?></label>
    </div>
</div>
<label id="description" class="col-lg-8">Description : <?php echo $gamedata['description']?></label>
</div>

<div id="bouton">
    <a href="index.html"><button>Retour</button></a>
    <?php echo anchor('collection/add/'.$gamedata["id"],'<button>Ajouter à la collection</button>');?>
</div>
