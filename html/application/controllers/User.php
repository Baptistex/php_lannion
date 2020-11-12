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
    }
    
    private function hash_password($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
     
  
    public function list()
    {
        //Titre de la page

        if (isset($this->session->role) && !$this->session->role=='admin'){
            redirect('/jeux');
        };

        $data['title'] = 'Liste des utilisateurs';
        $data['content'] = 'user/user_list';
        $data['userlist'] = $this->user_model->get_user();
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
        $this->form_validation->set_rules('identifiant', 'Identifiant', 'required', array('required' => 'Un identifiant est nécessaire.'));
        $this->form_validation->set_rules('nom', 'Nom', 'required',  array('required' => 'Le nom est nécessaire.'));
        $this->form_validation->set_rules('prenom', 'Prenom', 'required', array('required' => 'Le prénom est nécessaire.'));
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required', array('required' => 'Le mot de passe est nécessaire.'));
        $this->form_validation->set_rules('mot_de_passe_conf', 'Confirmation du mot de passe', 'required|matches[mot_de_passe]', 
        array(
            'required' => 'Le mot de passe doit être confirmé.', 'matches' => 'Le mot de passe doit être identique.'
        ));

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
        $this->load->vars($data);
        $this->load->view('templates/template');
    }

    public function newadmin()
    {
        if (isset($this->session->role) && !$this->session->role=='admin'){
            redirect('/jeux');
        };
        $this->load->helper('form');
        $this->load->library('form_validation');
        //TODO: verification du mot de passe
        $this->form_validation->set_rules('identifiant', 'Identifiant', 'required', array('required' => 'Un identifiant est nécessaire.'));
        $this->form_validation->set_rules('nom', 'Nom', 'required',  array('required' => 'Le nom est nécessaire.'));
        $this->form_validation->set_rules('prenom', 'Prenom', 'required', array('required' => 'Le prénom est nécessaire.'));
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required', array('required' => 'Le mot de passe est nécessaire.'));
        $this->form_validation->set_rules('mot_de_passe_conf', 'Confirmation du mot de passe', 'required|matches[mot_de_passe]', 
        array(
            'required' => 'Le mot de passe doit être confirmé.', 'matches' => 'Le mot de passe doit être identique.'
        ));

        if ($this->form_validation->run() !== FALSE) {
            $identifiant = $this->input->post('identifiant');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mot_de_passe = $this->hash_password($this->input->post('mot_de_passe'));
            $this->user_model->add_admin($identifiant, $nom, $prenom, $mot_de_passe);
        }
        $data['title'] = 'Ajout d\'un administrateur';
        $data['content'] = 'user/user_signup';
        $this->load->vars($data);
        $this->load->view('templates/template');
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
        
        $this->form_validation->set_rules('identifiant', 'Pseudo', 'required');
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required');

        
        if ($this->form_validation->run() !== FALSE) {
            //TODO changer la structure, retirer le try
            //TODO changer les exceptions

            $identifiant = $this->input->post('identifiant');
            $password = $this->input->post('mot_de_passe');
            
            $user_info = $this->user_model->log_user($identifiant);

            if (count($user_info) !=1){
                echo "Utilisateur Invalide ! ";
            } elseif (!password_verify($password, $user_info['mot_de_passe'])){
                echo "Mot de passe invalide !";
            } else {
                
                $this->session->role = $this->user_model->get_role($identifiant);
                $this->session->identifiant = $identifiant;
                

                redirect('/jeux');
            }        
        }



        $data['title'] = 'Connexion d\'un utilisateur';
        $data['content'] = 'user/user_login';
        $this->load->vars($data);
        $this->load->view('templates/template');
    }
  
    //Supprimer un utilisateur
    public function delete($identifiant)
    {
        $this->user_model->delete_user($identifiant);
        redirect('user/list');
    }

}
