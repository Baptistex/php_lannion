<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url');
    }

    
    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Liste des utilisateurs';
        // a title to display above the list
        $data['content'] = 'main';
        // template will call 'task_list ' sub -view
        $this->form_validation->set_rules('identifiant', 'Pseudo', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('mot_de_passe', 'MDP', 'required');
        if ($this->form_validation->run() !== FALSE) {
            $identifiant = $this->input->post('identifiant');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $mot_de_passe = $this->input->post('mot_de_passe');
            $this->user_model->add_user($identifiant, $nom, $prenom, $mot_de_passe);
        }
        $data['userlist'] = $this->user_model->get_user();
        $this->load->vars($data);
        $this->load->view('template');
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
            $data['content'] = 'add_success';
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
