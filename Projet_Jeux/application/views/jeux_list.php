

<h2><?php echo $title ?></h2>
<ul>
    <?php foreach($jeulist as $jeu):?>

    <?php echo "<li> ".$jeu['id'].": ".$jeu['titre']." ".$jeu['sortie'].", ".$student['email']." -";?>
</li>
<?php endforeach ?>
</ul>