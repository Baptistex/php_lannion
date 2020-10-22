

<h2><?php echo $title ?></h2>
<ul>
    <?php foreach($userlist as $user):?>
   
    <?php echo "<li> ".$user['identifiant'].": ".$user['nom']." ".$user['prenom'].", ".$user['mot_de_passe']." -". anchor('user/delete/'.$user["identifiant"],'[del]');?>
</li>
<?php endforeach ?>
</ul>
