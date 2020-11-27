<div>
    <div id="jeux_game">
        <?php echo $this->session->flashdata('add_attempt'); ?>

        <div id="game" class="row col-lg-12">
            <div>
                <img alt="<?php echo $gamedata['titre']; ?>" src="<?php echo $gamedata['couverture'] ?>" width="300" height="360">
            </div>
            <div id="labels">
                <label class="labeljeux"><?php echo $gamedata['titre'] ?></label><br>
                <label class="labeljeux"><?php if ($gamedata['sortie'] != "null") {
                                                echo "Sorti le:" . $gamedata['sortie'];
                                            } else {
                                                echo "Sortie non déterminée";
                                            } ?></label>
            </div>

            <div id="labeldescription">
                <label id="description"><?php echo $gamedata['description'] ?></label>
            </div>
            <div id="bouton" class="offset-lg-10">
                <?php echo anchor('collection/add/' . $gamedata["id"], '<div class="btn btn-light">Ajouter à la collection</div>'); ?>
            </div>
        </div>

    </div>

</div>