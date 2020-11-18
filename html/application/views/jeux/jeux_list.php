<h2><?php echo $title ?></h2>

<div class="recherche">
    <?php echo form_open('jeux/index') ?>
    <input type="text" name="searchtext" placeholder="Rechercher un jeu">
    <div class="search"></div>
    </form>
</div>

<div id="listejeu" class="col-lg-10 offset-lg-1">
    <?php foreach($jeuxlist as $jeu):?>
    <div id="pattern" class="pattern">
        <ul class="list img-list">
            <li>
                <a href="<?php echo base_url()."jeux/game/".$jeu["id"]?>" class="inner">
                    <div class="li-img">
                        <img src="<?php echo $jeu['couverture']?>" width="200" height="300">
                    </div>
                    <div class="li-text">
                        <h4 class="li-head"><?php echo $jeu['titre']?></h4>
                        <p class="li-sub d-none d-lg-block"><?php echo substr($jeu['description'],0,100); if (strlen($jeu['description'])>100){echo '...';}?></p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <!--End Pattern HTML-->

    <?php endforeach ?>
