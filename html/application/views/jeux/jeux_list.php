

<h2><?php echo $title ?></h2>
<ul>
    <?php foreach($jeuxlist as $jeu):?>

    <?php echo "<li> ".$jeu['id'].": ".$jeu['titre']." ".$jeu['sortie'] .anchor('collection/add/'.$jeu["id"],'[Ajouter]');?>
</li>
<?php endforeach ?>
</ul>