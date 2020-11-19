<h2><?php echo $title ?></h2>

<div id="demo">

<?php echo $this->session->flashdata('self_delete');?>
    <div class="shadow-z-1">
        <!-- Table starts here -->
        
        <table id="table" class="table table-hover table-mc-light-blue">
            <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Rôle</th>

                </tr>
            </thead>
            <?php foreach($userlist as $user):?>
            <tr>
                <td><?php echo $user['identifiant']?></td>
                <td><?php echo $user['nom']?></td>
                <td><?php echo $user['prenom']?></td>
                <td><?php echo $user['role']?></td>
                <td><?php echo anchor('collection/collection/'.$user["identifiant"],'<button>Consulter</button>');?></td>
                <td><?php if ($adminid!=$user["identifiant"]) {echo anchor('user/delete/'.$user["identifiant"],'<button>Supprimer</button>');}?></td>    
            </tr>

            <?php endforeach ?>
            <tr>
                <td colspan="6"><?php echo anchor('user/newadmin','<button>Ajouter un administrateur</button>');?></td>
            </tr>
        </table>
    </div>
</div>
