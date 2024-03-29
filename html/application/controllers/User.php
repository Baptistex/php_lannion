<?php
//Classe qui gère les logins utilisateurs
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->helper('header');
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Fonction pour la page affichant la liste des utilisateurs (visible seulement par un admin)
     */
    public function list()
    {

        user_exists();
        if (!isset($this->session->role) || $this->session->role != 'admin') {
            redirect('/jeux');
        };

        $data['title'] = 'Liste des utilisateurs';
        $data['content'] = 'user/user_list';
        $data['userlist'] = $this->user_model->get_user_role();
        set_template($data, $this->session->role, $this->session->identifiant);
        $this->load->vars($data);
        $this->load->view('templates/template');
    }
    /**
     * Page de création d'utilisateur.
     */
    public function signup()
    {
        user_exists();
        if (isset($this->session->identifiant)) {
            redirect('/jeux');
        };
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'identifiant',
            'Identifiant',
            'required|callback__existing_user|alpha_numeric',
            array(
                'required'      => 'Un identifiant est nécessaire.',
                'alpha_numeric' => 'Utiliser uniquement charactères alphanumériques !'
            )
        );
        $this->form_validation->set_rules('nom', 'Nom', 'required',  array('required' => 'Le nom est nécessaire.'));
        $this->form_validation->set_rules('prenom', 'Prenom', 'required', array('required' => 'Le prénom est nécessaire.'));
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required', array('required' => 'Le mot de passe est nécessaire.'));
        $this->form_validation->set_rules(
            'mot_de_passe_conf',
            'Confirmation du mot de passe',
            'required|matches[mot_de_passe]',
            array(
                'required'  =>  'Le mot de passe doit être confirmé.',
                'matches'   =>  'Le mot de passe doit être identique.'
            )
        );
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
        if ($this->form_validation->run() !== FALSE) {
            $identifiant = $this->input->post('identifiant');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mot_de_passe = $this->hash_password($this->input->post('mot_de_passe'));
            $this->user_model->add_user($identifiant, $nom, $prenom, $mot_de_passe, "user");
            redirect('/user/login');
        }
        $data['title']      = 'Inscription d\'un utilisateur';
        $data['content']    = 'user/user_signup';
        $data['formlink']   = 'user/signup';

        set_template($data, $this->session->role, $this->session->identifiant);

        $this->load->vars($data);
        $this->load->view('templates/template');
    }


    /**
     * Page de création d'utilisateur.
     */
    public function newadmin()
    {
        user_exists();
        if (!isset($this->session->role) || $this->session->role != 'admin') {
            redirect('/jeux');
        };

        $this->load->helper('form');
        $this->load->library('form_validation');


        //Regles de validation des formulaires
        $this->form_validation->set_rules(
            'identifiant',
            'Identifiant',
            'required|callback__existing_user|alpha_numeric',
            array(
                'required'      => 'Un identifiant est nécessaire.',
                'alpha_numeric' => 'Utiliser uniquement charactères alphanumériques !'
            )
        );
        $this->form_validation->set_rules('nom', 'Nom', 'required',  array('required' => 'Le nom est nécessaire.'));
        $this->form_validation->set_rules('prenom', 'Prenom', 'required', array('required' => 'Le prénom est nécessaire.'));
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required', array('required' => 'Le mot de passe est nécessaire.'));
        $this->form_validation->set_rules(
            'mot_de_passe_conf',
            'Confirmation du mot de passe',
            'required|matches[mot_de_passe]',
            array(
                'required'  => 'Le mot de passe doit être confirmé.',
                'matches'   => 'Le mot de passe doit être identique.'
            )
        );
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        if ($this->form_validation->run() !== FALSE) {
            $identifiant = $this->input->post('identifiant');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mot_de_passe = $this->hash_password($this->input->post('mot_de_passe'));
            $this->user_model->add_user($identifiant, $nom, $prenom, $mot_de_passe, "admin");
            redirect('/user/list');
        }
        $data['title']      = 'Ajout d\'un administrateur';
        $data['content']    = 'user/user_signup';
        $data['formlink']   = 'user/newadmin';
        set_template($data, $this->session->role, $this->session->identifiant);

        $this->load->vars($data);
        $this->load->view('templates/template');
    }

    /**
     *  Fonction de formulaire utilisée pour vérifier qu'un identifiant n'est pas déjà présent
     * dans la base de donnée.
     */
    public function _existing_user($identifiant)
    {
        user_exists();
        if (!empty($this->user_model->log_user($identifiant))) {
            $this->form_validation->set_message('_existing_user', 'Cet identifiant est déjà utilisé !');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Déconnecte un utilisateur.
     * 
     * Détruit sa session.
     */
    public function disconnect()
    {
        if (isset($this->session->identifiant)) {
            session_unset();
            $this->session->sess_destroy();
            redirect('user/login');
        };
        redirect('user/login');
    }

    /**
     * Page de connexion d'un utilisateur
     * 
     * Si l'utilisateur est connecté, le redirige vers le catalogue.
     * Autrement, vérifie que les champs sur la pages sont corrects, et génère une session pour l'utilisateur si valides.
     */
    public function login()
    {
        user_exists();
        if (isset($this->session->identifiant)) {
            redirect('/jeux');
        };
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'identifiant',
            'Pseudo',
            'required',
            array('required' => '<div class="alert alert-danger" role="alert">Un identifiant est nécessaire.</div>')
        );
        $this->form_validation->set_rules(
            'mot_de_passe',
            'Mot de passe',
            'required',
            array('required' => '<div class="alert alert-danger" role="alert">Un mot de passe est nécessaire.</div>')
        );
        if ($this->form_validation->run() !== FALSE) {
            $identifiant = $this->input->post('identifiant');
            $password = $this->input->post('mot_de_passe');
            $user_info = $this->user_model->log_user($identifiant);

            if (empty($user_info)) {
                $this->session->set_flashdata('login_attempt', '<div class="alert alert-danger" role="alert">Utilisateur Invalide !</div>');
            } elseif (!password_verify($password, $user_info[0]['mot_de_passe'])) {
                $this->session->set_flashdata('login_attempt', '<div class="alert alert-danger" role="alert">Mot de passe incorrect !</div>');
            } else {
                $this->session->role = $this->user_model->get_role($identifiant);
                $this->session->identifiant = $identifiant;
                redirect('/jeux');
            }
        }



        $data['title'] = 'Connexion d\'un utilisateur';
        $data['content'] = 'user/user_login';
        set_template($data, $this->session->role, $this->session->identifiant);
        $this->load->vars($data);
        $this->load->view('templates/template');
    }


    /**
     * Supprime un utilisateur
     * 
     * Les utilisateurs ne peuvent supprimer qu'eux même.
     * Les admins peuvent supprimer qui ils veulent, sauf eux même (évite qu'il n'y ai aucun admin dans la BDD) 
     */
    public function delete($identifiant)
    {
        user_exists();
        if ($this->session->identifiant != $identifiant) {
            $this->user_model->delete_user($identifiant);
        } elseif ($this->session->role == 'admin') {
            $this->session->set_flashdata('self_delete', '<div class="alert alert-danger" role="alert">Vous ne pouvez pas vous supprimer vous-même en tant qu\'admin.</div>');
        } else {

            $this->session->sess_destroy();
            $this->user_model->delete_user($identifiant);
        }

        redirect('user/list');
    }
}
