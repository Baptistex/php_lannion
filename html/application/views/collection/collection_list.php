
<h2><?php echo $title ?></h2>

<h4><?php echo "Collection de: ".$prenom ." \"".$identifiant."\" ".$nom ;  ?></h4>


<div class="row offset-lg-1 col-lg-11 center d-none d-lg-block">
<?php foreach($collectionlist as $jeu):?>
    <div class="example-1 card ">
        <div class="wrapper">
            <img src="<?php echo $jeu['couverture']?>" width="272.95">
            <div class="date">
                <span class="day"><?php echo $jeu['sortie']?></span>
            </div>
            <div class="data">
                <div class="content">
                    <h1 class="title"> <a href="<?php echo base_url()."jeux/game/".$jeu["id"]?>" class="inner"><?php echo $jeu['titre']?></a></h1>
                    <p class="text"><?php echo $jeu['description']?></p>
                </div>
            </div>
        </div>
        <?php if ($isadmin==FALSE){ echo anchor('collection/delete/'.$jeu["id"],'<button id="suppr">Supprimer</button>');} ?>
    </div>
    <?php endforeach ?>
</div>
<div class="col-12 offset-1 d-lg-none">
<?php foreach($collectionlist as $jeu):?>
    <div id="cardtel" class="example-1 card ">
        <div class="wrapper">
            <img src="<?php echo $jeu['couverture']?>" width="272.95">
            <div class="date">
                <span class="day"><?php echo $jeu['sortie']?></span>
            </div>
            <div class="data">
                <div class="content">
                    <h1 class="title"> <a href="<?php echo base_url()."jeux/game/".$jeu["id"]?>" class="inner"><?php echo $jeu['titre']?></a></h1>
                    <p class="text"><?php echo $jeu['description']?></p>
                </div>
            </div>
        </div>
        <?php if ($isadmin==FALSE){ echo anchor('collection/delete/'.$jeu["id"],'<button>Supprimer</button>');} ?>
    </div>
    <?php endforeach ?>
</div>
    
<div class="row col-lg-5 offset-lg-5 offset-3">
    <?php echo $delete?>
</div>