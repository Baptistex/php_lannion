<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url');
    }

    
    public function list()
    {
        $data['title'] = 'Liste des utilisateurs';
        // a title to display above the list
        $data['content'] = 'user/user_list';
        $data['userlist'] = $this->user_model->get_user();
        $this->load->vars($data);
        $this->load->view('templates/template');

    }

    public function signup()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // template will call 'task_list ' sub -view
        $this->form_validation->set_rules('identifiant', 'Pseudo', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required');
        $this->form_validation->set_rules('mot_de_passe_conf', 'Confirmation du mot de passe', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $identifiant = $this->input->post('identifiant');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mot_de_passe = $this->input->post('mot_de_passe');
            $this->user_model->add_user($identifiant, $nom, $prenom, $mot_de_passe);
        }
        $data['title'] = 'Création d\'un utilisateur';
        // a title to display above the list
        $data['content'] = 'user/user_signup';
        $data['userlist'] = $this->user_model->get_user();
        $this->load->vars($data);
        $this->load->view('templates/template');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('identifiant', 'Pseudo', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('mot_de_passe', 'MDP', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['content'] = 'form';
        } else {
            $identifiant = $this->input->post('identifiant');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mot_de_passe = $this->input->post('mot_de_passe');
            $this->user_model->add_user($identifiant, $nom, $prenom, $mot_de_passe);
            $data['content'] = 'user/add_success';
        }
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function delete($identifiant)
    {
        $this->user_model->delete_user($identifiant);
        $this->index();
    }
}
