<?php

/**
 * Fichier helper ayant pour fonction de générer le header des pages, 
 * ainsi que de  vérifier que la session de l'utilisateur est valide.
 */




/**
 * Ajoute un jeu à la collection d'un utilisateur.
 *
 * @param array    $data Données de la page à afficher, on y ajoute le lien vers le header
 *                  ainsi qu'une phrase de connexion.
 * @param string   $role Le rôle de l'utilisateur connecté.
 * @param string   $identifiant L'identifiant de l'utilisateur connecté.
 */
function set_template(&$data, $role, $identifiant)
{
    //Permet de changer le header en fonction de la connexion
    if (!isset($role)) {
        $data['header'] = 'templates/header_off';
        $data['pseudonyme'] = "";
    } elseif ($role == 'user') {
        $data['header'] = 'templates/header_on';
        $data['pseudonyme'] = 'Connecté(e) en tant que : ' . $identifiant;
    } elseif ($role == 'admin') {
        $data['header'] = 'templates/header_admin';
        $data['pseudonyme'] = 'Connecté(e) en tant que : ' . $identifiant;
        $data['adminid'] = $identifiant;
    } else {
        //Dans le cas d'une erreur, affiche le header deconnecté
        $data['header'] = 'templates/header_on';
        $data['pseudonyme'] = "";
    }
}


/**
 * Vérifie qu'un utilisateur est dans la base de donnée.
 *
 * On vérifie dans la base de donnée que la variable identifiant de la session s'y trouve.
 * Cette vérification est nécessaire pour que lorsqu'un utilisateur est supprimé alors qu'il est connecté,
 * sa session se ferme.
 * 
 */
function user_exists()
{
    $CI = &get_instance();
    if (isset($CI->session->identifiant)) {
        $CI->load->model('user_model');
        if (empty($CI->user_model->log_user($CI->session->identifiant))) {
            session_unset();
            $CI->session->sess_destroy();
        }
    }
}