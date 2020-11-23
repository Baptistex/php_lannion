<div>
    <div id="jeux_game">
        <?php echo $this->session->flashdata('add_attempt');?>

        <div id="game" class="row col-lg-12">
            <div>
                <img src="<?php echo $gamedata['couverture']?>" width="300" height="360">
            </div>
            <div id="labels">
                <label id="labeljeux"><?php echo $gamedata['titre']?></label><br>
                <label id="labeljeux">Sorti le <?php echo $gamedata['sortie']?></label>
            </div>

            <div id="labeldescription">
                <label id="description"><?php echo $gamedata['description']?></label>
            </div>
            <div id="bouton" class="offset-lg-10">
                <?php echo anchor('collection/add/'.$gamedata["id"],'<button class="btn btn-light">Ajouter à la collection</button>');?>
            </div>
        </div>

    </div>

</div>