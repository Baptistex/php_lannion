<?php




function set_template(&$data, $role){
        
    //Permet de changer le header en fonction de la connexion
    if (!isset($role)){
        $data['header'] = 'templates/header_off';
    } elseif ($role=='user'){
        $data['header'] = 'templates/header_on';
    } elseif ($role=='admin'){
        $data['header'] = 'templates/header_admin';
    } else {
        //Dans le cas d'une erreur, affiche le header deconnecté
        $data['header'] = 'templates/header_off';
    }




}


?>