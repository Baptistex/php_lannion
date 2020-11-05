<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url');
    }
    
    private function hash_password($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
     
  
    public function list()
    {
        //Titre de la page
        $data['title'] = 'Liste des utilisateurs';
        $data['content'] = 'user/user_list';
        $data['userlist'] = $this->user_model->get_user();
        $this->load->vars($data);
        $this->load->view('templates/template');

    }

    public function signup()
    {
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


    public function login()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('identifiant', 'Pseudo', 'required');
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required');

        if ($this->form_validation->run() !== FALSE) {
            try
            {
                //TODO changer la structure, retirer le try
                //TODO changer les exceptions
                if (!$this->form_validation->run()) throw new UnexpectedValueException(validation_errors());

                $identifiant = $this->input->post('identifiant');
                $password = $this->input->post('mot_de_passe');
                $query = $this->db
                    ->select("*")
                    ->from("_user")
                    ->where('identifiant', $identifiant)
                    ->get();

                if ($query->num_rows() != 1)    throw new UnexpectedValueException("Wrong user!");

                $row = $query->row();
                if (!password_verify($password, $row->mot_de_passe)) throw new UnexpectedValueException("Invalid password!");

                echo "valid user";
                redirect('/jeux');

            }
            catch(Excecption $e)
            {
                echo "azeaea";
                //echo $e->getMessage();
                
            }
        }



        $data['title'] = 'Connexion d\'un utilisateur';
        $data['content'] = 'user/user_login';
        $this->load->vars($data);
        $this->load->view('templates/template');
    }
  

    public function delete($identifiant)
    {
        $this->user_model->delete_user($identifiant);
        $this->list();
    }

}
