<h2><?php echo $title ?></h2>

<h4><?php echo "Collection de: " . $prenom . " \"" . $identifiant . "\" " . $nom;  ?></h4>


<div class="row offset-lg-1 col-lg-11 center d-none d-lg-block">
    <?php foreach ($collectionlist as $jeu) : ?>
    <div class="example-1 card ">
        <div class="wrapper">
            <img alt="<?php echo $jeu["titre"] ?>" src="<?php echo $jeu['couverture'] ?>" width="273">
            <div class="date">
                <span class="day"><?php if ($jeu['sortie'] != "null") {
                                            echo $jeu['sortie'];
                                        } else {
                                            echo "Non déterminée";
                                        } ?></span>
            </div>
            <div class="data">
                <div class="content">
                    <h1 class="title"> <a href="<?php echo site_url("/jeux/game/") . $jeu["id"] ?>"
                            class="inner"><?php echo $jeu['titre'] ?></a></h1>
                    <p class="text"><?php echo $jeu['description'] ?></p>
                </div>
            </div>
        </div>
        <?php if ($isadmin == FALSE) {
                echo anchor('collection/delete/' . $jeu["id"], '<div class="btn btn-light suppr">Supprimer</div>');
            } ?>
    </div>
    <?php endforeach ?>
</div>
<div class="col-12 offset-1 d-lg-none">
    <?php foreach ($collectionlist as $jeu) : ?>
    <div class="example-1 card cardtel">
        <div class="wrapper">
            <img alt="<?php echo $jeu["titre"] ?>" src="<?php echo $jeu['couverture'] ?>" width="273">
            <div class="date">
                <span class="day"><?php if ($jeu['sortie'] != "null") {
                                            echo $jeu['sortie'];
                                        } else {
                                            echo "Non déterminée";
                                        } ?></span>
            </div>
            <div class="data">
                <div class="content">
                    <h1 class="title"> <a href="<?php echo site_url("/jeux/game/"). $jeu["id"] ?>"
                            class="inner"><?php echo $jeu['titre'] ?></a></h1>
                    <p class="text"><?php echo $jeu['description'] ?></p>
                </div>
            </div>
        </div>
        <?php if ($isadmin == FALSE) {
                echo anchor('collection/delete/' . $jeu["id"], '<div>Supprimer</div>');
            } ?>
    </div>
    <?php endforeach ?>
</div>

<div class="row col-lg-5 offset-lg-5 offset-3">
    <?php echo $delete ?>
</div>