

<h2><?php echo $title ?></h2>
<ul>
    <?php foreach($collectionlist as $jeu):?>

    <?php echo "<li> ".$jeu['id'].": ".$jeu['titre']." ".$jeu['sortie'];?>
</li>
<?php endforeach ?>
</ul>