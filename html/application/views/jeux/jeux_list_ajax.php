<div class="jeux_recents">
    <?php echo $recent_title ?>
    <div class="row col-lg-10 offset-lg-1 d-none d-lg-block">
        <?php foreach ($recent as $jeu) : ?>
            <div class="example-1 card ">
                <div class="wrapper">
                    <img alt="<?php echo 'Couverture de' . $jeu["titre"] ?>" src=<?php echo $jeu['couverture'] ?> width="273">
                    <div class="date">
                        <span class="day"><?php if ($jeu['sortie'] != "null") {
                                                echo $jeu['sortie'];
                                            } else {
                                                echo "Non déterminée";
                                            } ?></span>
                    </div>
                    <div class="data">
                        <div class="content">
                            <h1 class="title"> <a href="<?php echo site_url("jeux/game/") . $jeu["id"] ?>" class="inner"><?php echo $jeu['titre'] ?></a></h1>
                            <p class="text"><?php echo $jeu["description"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<div id="listejeu" class="col-lg-10 offset-lg-1">
    <?php foreach ($jeuxlist as $jeu) : ?>
        <div class="pattern">
            <ul class="list img-list">
                <li>
                    <a href="<?php echo site_url("jeux/game/") . $jeu["id"] ?>" class="inner">
                        <div class="li-img">
                            <img alt="<?php echo "Couverture de" . $jeu["titre"] ?>" src="<?php echo $jeu['couverture'] ?>" width="200" height="240">
                        </div>
                        <div class="li-text">
                            <h4 class="li-head"><?php echo $jeu['titre'] ?></h4>
                            <p class="li-sub d-none d-lg-block">
                                <?php echo substr($jeu['description'], 0, 150);
                                if (strlen($jeu['description']) > 150) {
                                    echo '...';
                                } ?>
                            </p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <!--End Pattern HTML-->
    <?php endforeach ?>
</div>