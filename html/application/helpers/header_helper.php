<?php




function set_template(&$data, $role, $identifiant){
    
    //Permet de changer le header en fonction de la connexion
    if (!isset($role)){
        $data['header'] = 'templates/header_off';
        $data['pseudonyme'] = "";
    } elseif ($role=='user'){
        $data['header'] = 'templates/header_on';
        $data['pseudonyme'] = 'Connecté(e) en tant que : '.$identifiant;
    } elseif ($role=='admin'){
        $data['header'] = 'templates/header_admin';
        $data['pseudonyme'] = 'Connecté(e) en tant que : '.$identifiant;
        $data['adminid'] = $identifiant;

    } else {
        //Dans le cas d'une erreur, affiche le header deconnecté
        $data['header'] = 'templates/header_on';
        $data['pseudonyme'] = "";

    }

}

function user_exists(){
    $CI =& get_instance();
    if (isset($CI->session->identifiant)){
        $CI->load->model('user_model');
        if (empty($CI->user_model->log_user($CI->session->identifiant))){
            session_unset();
            $CI->session->sess_destroy();
        }
    }
}


?>