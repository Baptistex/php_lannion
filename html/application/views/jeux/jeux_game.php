
<div>
<div id="jeux_game">
<div id="game" class="row col-lg-12">
    <div>
        <img src="<?php echo $gamedata['couverture']?>" width="300" height="600">
    </div>
    <div id="labels">
        <label id="labeljeux"><?php echo $gamedata['titre']?></label><br>
        <label id="labeljeux">Sorti le :<?php echo $gamedata['sortie']?></label>
    </div>

<div id="labeldescription">
<label id="description"><?php echo $gamedata['description']?></label>
</div>
</div>
</div>
</div>
<div id="bouton">
    <?php echo anchor('collection/add/'.$gamedata["id"],'<button class="btn btn-light">Ajouter à la collection</button>');?>
</div>
