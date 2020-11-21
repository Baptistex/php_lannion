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
    
    private function hash_password($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
     
  
    public function list()
    {
        //Fonction pour la page affichant la liste des utilisateurs (visible seulement par un admin)

        if (!isset($this->session->role) || $this->session->role!='admin'){
            redirect('/jeux');
        };

        $data['title'] = 'Liste des utilisateurs';
        $data['content'] = 'user/user_list';
        $data['userlist'] = $this->user_model->get_user_role();
        set_template($data, $this->session->role, $this->session->identifiant);
        $this->load->vars($data);
        $this->load->view('templates/template');

    }

    public function signup()
    {
        if (isset($this->session->identifiant)){
            redirect('/jeux');
        };
        $this->load->helper('form');
        $this->load->library('form_validation');
        //TODO: verification du mot de passe
        $this->form_validation->set_rules('identifiant', 'Identifiant', 'required|callback_existing_user|callback_valid_chain', array('required' => 'Un identifiant est nécessaire.'));
        $this->form_validation->set_rules('nom', 'Nom', 'required',  array('required' => 'Le nom est nécessaire.'));
        $this->form_validation->set_rules('prenom', 'Prenom', 'required', array('required' => 'Le prénom est nécessaire.'));
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required', array('required' => 'Le mot de passe est nécessaire.'));
        $this->form_validation->set_rules('mot_de_passe_conf', 'Confirmation du mot de passe', 'required|matches[mot_de_passe]', 
        array(
            'required' => 'Le mot de passe doit être confirmé.', 
            'matches' => 'Le mot de passe doit être identique.'
        ));
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        if ($this->form_validation->run() !== FALSE) {
            $identifiant = $this->input->post('identifiant');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mot_de_passe = $this->hash_password($this->input->post('mot_de_passe')); 
            $this->user_model->add_user($identifiant, $nom, $prenom, $mot_de_passe);
            redirect('/user/login');          
        }
        $data['title'] = 'Inscription d\'un utilisateur';
        $data['content'] = 'user/user_signup';
        $data['formlink'] = 'user/signup';

        set_template($data, $this->session->role, $this->session->identifiant);

        $this->load->vars($data);
        $this->load->view('templates/template');
    }

    public function newadmin()
    {
        if (!isset($this->session->role) || $this->session->role!='admin'){
            redirect('/jeux');
        };

        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('identifiant', 'Identifiant', 'required|callback_existing_user|callback_valid_chain', array('required' => 'Un identifiant est nécessaire.'));
        $this->form_validation->set_rules('nom', 'Nom', 'required',  array('required' => 'Le nom est nécessaire.'));
        $this->form_validation->set_rules('prenom', 'Prenom', 'required', array('required' => 'Le prénom est nécessaire.'));
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required', array('required' => 'Le mot de passe est nécessaire.'));
        $this->form_validation->set_rules('mot_de_passe_conf', 'Confirmation du mot de passe', 'required|matches[mot_de_passe]', 
        array(
            'required' => 'Le mot de passe doit être confirmé.', 
            'matches' => 'Le mot de passe doit être identique.'
        ));
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        if ($this->form_validation->run() !== FALSE) {
            $identifiant = $this->input->post('identifiant');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mot_de_passe = $this->hash_password($this->input->post('mot_de_passe'));
            $this->user_model->add_admin($identifiant, $nom, $prenom, $mot_de_passe);
            redirect('/user/list');            
        }
        $data['title'] = 'Ajout d\'un administrateur';
        $data['content'] = 'user/user_signup';
        $data['formlink'] = 'user/newadmin';
        set_template($data, $this->session->role, $this->session->identifiant);

        $this->load->vars($data);
        $this->load->view('templates/template');
    }

    public function existing_user($identifiant)
    {
        if (!empty($this->user_model->log_user($identifiant))){
            $this->form_validation->set_message('existing_user','Cet identifiant est déjà utilisé !');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function valid_chain($chaine){
        if (preg_match("/^[a-zA-Z0-9]+$/", $chaine)){
            return TRUE;
        } else {
            $this->form_validation->set_message('valid_chain','Utiliser uniquement charactères alphanumériques !');
            return FALSE;
        }
    }

    public function disconnect()
    {
        if (isset($this->session->identifiant)){
            $this->session->sess_destroy();
            redirect('user/login');
        };
        redirect('user/login');

    }


    public function login()
    {
        if (isset($this->session->identifiant)){
            redirect('/jeux');
        };

        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('identifiant', 'Pseudo', 'required', 
        array('required' => '<div class="alert alert-danger" role="alert">Un identifiant est nécessaire.</div>'));
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required', 
        array('required' => '<div class="alert alert-danger" role="alert">Un mot de passe est nécessaire.</div>'));

        
        if ($this->form_validation->run() !== FALSE) {

            $identifiant = $this->input->post('identifiant');
            $password = $this->input->post('mot_de_passe');
            
            $user_info = $this->user_model->log_user($identifiant);

            if (empty($user_info)){
                $this->session->set_flashdata('login_attempt', '<div class="alert alert-danger" role="alert">Utilisateur Invalide !</div>');
            } elseif (!password_verify($password, $user_info[0]['mot_de_passe'])){
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
  
    //Supprimer un utilisateur
    public function delete($identifiant)
    {
        if ($this->session->identifiant!=$identifiant){
            $this->user_model->delete_user($identifiant);
        } elseif ($this->session->role=='admin'){
            $this->session->set_flashdata('self_delete', '<div class="alert alert-danger" role="alert">Vous ne pouvez pas vous supprimer vous-même en tant qu\'admin.</div>');
        } else {
            
            $this->session->sess_destroy();
            $this->user_model->delete_user($identifiant);
        }

        redirect('user/list');
    }
}
